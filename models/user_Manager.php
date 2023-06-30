<?php
    class UserManager extends Model{

        private $userTable = 'membres';

        public function register(){
            $userName = filter_var(htmlentities(ucfirst(strtolower($_POST["username"]))));
            $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
            $password = filter_var(htmlentities($_POST["password"]));
            $pwdhashed = password_hash($password, PASSWORD_DEFAULT);
            $fname = filter_var(htmlentities(ucfirst(strtolower($_POST["fname"]))));
            $prenom = filter_var(htmlentities(ucfirst(strtolower($_POST["prenom"]))));
            $dateNaissance = filter_var(htmlentities($_POST["dateNaissance"])); 
            $numTel = htmlentities($_POST["numTel"]);
            $adressePostale = filter_var(htmlentities($_POST["adressePostale"]));
            $codePostale = filter_var($_POST["codePostale"]);
            $ville = filter_var(htmlentities(strtolower(ucfirst($_POST["ville"]))));
            $token = bin2hex(random_bytes(20));

            // See if Email exists
            $emailExists = $this->getUserByEmail($email);

            if (!$emailExists){
                if(preg_match("/^(?=.*\d)(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{8,}$/", $_POST['password'])){
                    try{
                        
                        $sql = "INSERT INTO ".$this->userTable."(username, email, hash, nom, prenom, date_naissance, num_telephone, adresse_postale, code_postal, ville, token) VALUES(:nickname, :EmAIL, :pWd, :NoM, :pReNOm, :daNaissance, :nuTel, :adPostalE, :coPostaLe, :vIllE, :tOkeN)";
                
                        $req = $this->getDatabase()->prepare($sql);
                        $req->execute(['nickname'=> $userName, 'EmAIL'=> $email, 'pWd'=> $pwdhashed, 'NoM'=> $fname, 'pReNOm'=> $prenom, 'daNaissance'=>$dateNaissance, 'nuTel'=>$numTel,'adPostalE'=>$adressePostale,'coPostaLe'=>$codePostale,'vIllE'=>$ville,'tOkeN'=>$token]);
                        $req->closeCursor();
        
                        if ($req->rowCount()){
                            $to = $email;
                            $subject = "Veuillez activer votre compte";
                            $content="<p><a href='http://localhost/Project-Greta/index.php?p=logged&t=$token'>Merci de cliquer sur ce lien pour activer votre compte</a></a></p>";
                            $headers = array(
                                'From'=> 'idditaufiq@gmail.com',
                                'MIME-Version' => '1.0',
                                'Content-type' => 'text/html; charset=iso-8859-1',
                                'X-Mailer' => 'PHP/' . phpversion()
                            );
                            mail($to,$subject, $content, $headers);
                        }else array("error", "Problème lors de enregistrement");
                        return array("success", "Inscription réussie");
                    }catch (Exception $e){
                        return array("error",  $e->getMessage());
                    }
                }return array("error", "Le mot de passe doit comporter au moins 8 caractères dont au <br> moins 1 chiffre, 1 minuscule, 1 majuscule et 1 caractère spécial");
            } else {
                return array("error", "L'email existe déjà. Veuillez choisir une autre adresse e-mail.");
            }
        }

        function getUserById($id) {
            try {
                $sql = "SELECT * FROM $this->userTable WHERE id= :id";
                $req=$this->getDatabase()->prepare($sql);
                $req->execute(['id'=>$id]);
                if ($req->rowCount()){
                    // Renvoie toutes les infos de l'utilisateur
                    return $req->fetch();
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            } 
            return false;
        }

        function deleteUser($id){
            try {
                $sql = "AND id_membre = $id";
                $req= $this->getDatabase()->prepare('DELETE FROM $this->userTable WHERE id = :id'.$sql);
                return $req->execute(['id' => $id]);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            return false;
        }

        private function getUserByEmail($email) {
            try {
                $sql = "SELECT * FROM $this->userTable WHERE email= :EmAIL";
                $req = $this->getDatabase()->prepare($sql);
                $req->execute(['EmAIL'=>$email]);
                if($req->rowCount()){
                    return $req->fetch();
                }
                $req->closeCursor();
            } catch (Exception $e) {
                echo $e->getMessage();
            } 
            return false;
        }

        function login(){
            $email=filter_var(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL), FILTER_VALIDATE_EMAIL);
            $user = $this->getUserByEmail($email);
            if(!empty($user)){
                if(password_verify($_POST['password'], $user['hash'])){
                        $_SESSION['is_login']=true;
                        // $_SESSION['is_actif']=$user['actif'];
                        $_SESSION['id']=$user['id'];
                    return array("success", "Connexion réussie");               
                    //     return array("success, Connexion réussie");               
                    // }else  return array("error", "Veuillez activer votre compte");
                }else return array("error", "Mauvais identifiants");
            }else return array("error", "Mauvais identifiants");
        }  

        function waitReset(){
            $email=filter_var(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL), FILTER_VALIDATE_EMAIL);
            $user = $this->getUserByEmail($email);
            if($user){
                $token = bin2hex(random_bytes(20)); 
                $dateValideToken=time()+1200; // Ca fait 20 mins

                try{
                    $sql = "UPDATE $this->userTable SET token = :toKEn, date_validite_token = :dVtoKEn WHERE email = :EmAiL";
                    $req = $this->getDatabase()->prepare($sql);
                    $req->execute(['EmAiL'=> $email, 'toKEn'=>$token, 'dVtoKEn' =>$dateValideToken]);
                    $req->closeCursor();

                    if($req->rowCount()){
                        $to = $email;
                        $subject = "Veuillez réinitialisation votre copte";
                        $content="<p><a href='http://localhost/Project-Greta/index.php?p=resetPass&t=$token'>Merci de cliquer sur ce lien pour réinitialiser votre mot de passe</a></p>";
                        $headers = array(
                            'From'=> 'idditaufiq@gmail.com',
                            'MIME-Version' => '1.0',
                            'Content-type' => 'text/html; charset=iso-8859-1',
                            'X-Mailer' => 'PHP/' . phpversion() );
                        mail($to,$subject, $content, $headers);
                        return array("success", "Vous allez recevoir un mail pour réinitialiser votre mot de    passe".$content);
                    }else return array("error", "Problème lors de la réinitialisation");
                }catch (Exception $e){return array("error",  $e->getMessage());}
            }else return array("error", "Aucun compte ne correspond à cet email.");
        }

        function getUserByToken($token) {
            try {
                $sql = "SELECT * FROM $this->userTable WHERE token= :toKEn";
                $req = $this->getDatabase()->prepare($sql);
                $req->execute(['toKEn'=>$token]);
                if($req->rowCount()){
                    return $req->fetch();
                }
                $req->closeCursor();
            } catch (Exception $e) {
                echo $e->getMessage();
            } 
            return false;
        } 

        function resetPass(){
            $token=htmlspecialchars($_GET['t']);
            $user=$this->getUserByToken($token);

            //Testing how to get the email of this user and the below codes work
            // $userEmail = $user['email'];
            // var_dump($userEmail);

            if($user){
                if ($_POST['password']===$_POST['password2']){
                    if(preg_match("/^(?=.*\d)(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{8,}$/", $_POST['password'])){
                        $password=password_hash($_POST['password'], PASSWORD_DEFAULT);
                        try {
                            $sql= "UPDATE $this->userTable SET token = NULL, hash = :pwd WHERE token = :toKEn";
                            $req= $this->getDatabase()->prepare($sql);
                            $req->execute(['pwd'=> $password, 'toKEn'=> $token]);
                            if ($req->rowCount()){
                                $userEmail = $user['email']; //Getting the user'email
                                $content="<p>Votre mot de passe a été réinitialisé</p>";
                                // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
                                $headers = array(
                                    'MIME-Version' => '1.0',
                                    'Content-type' => 'text/html; charset=iso-8859-1',
                                    'X-Mailer' => 'PHP/' . phpversion()
                                );
                                // $user['email']
                                mail($userEmail,"Réinitialisation de mot de passe", $content, $headers);
                                return array("success", "Votre mot de passe a bien été réinitialisé");
                            }else return array("error", "Problème lors de la réinitialisation");
                        } catch (Exception $e) {
                            return array("error",  $e->getMessage()); //pour la base de donnée
                        } 
                    }else return array("error", "Le mot de passe doit comporter au moins 8 caractères dont au <br> moins 1 chiffre, 1 minuscule, 1 majuscule et 1 caractère spécial");
                }else return array("error", "Les 2 saisies de mot de passe doivent être identiques.");
            }else return array("error", "Les données ont été corrompues ! Veuillez <a href='?p=waitReset'>recommencer</a>");
        } 

    } 
?>
