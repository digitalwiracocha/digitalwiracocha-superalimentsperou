<?php
// Vérification du formulaire soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST["action"]) && $_POST["action"] === "addProduit") {
        // Récupération des données du formulaire
        $nomProduit = $_POST["nom"];
        $description = $_POST["description"];
        $prixVente = $_POST["prix"];
        $imageFile = $_FILES["image"];

        // Vérification des champs obligatoires
        if (!empty($nomProduit) && !empty($description) && !empty($prixVente) && !empty($imageFile)) {
            // Gestion du téléchargement de l'image
            $uploadDirectory = 'assets/img/';
            $uploadedFile = $imageFile['tmp_name'];
            $fileName = $imageFile['name'];
            $destination = $uploadDirectory . $fileName;

            if (move_uploaded_file($uploadedFile, $destination)) {
                // Le fichier a été téléchargé avec succès, vous pouvez continuer le traitement

                // Enregistrement du produit dans la base de données avec le chemin de l'image
                $produitManager = new ProduitsManager();
                $idProduit = $produitManager->createNewProduit($nomProduit, $description, $prixVente, $destination);

                if (!is_null($idProduit)) {
                    $produit = $produitManager->getProduitById($idProduit);
                    if (!is_null($produit)) {
                        include "views/produitDetail.php";
                        exit; 
                } else {
                    // Gestion des erreurs lors de la création du produit
                }
            } else {
                // Une erreur s'est produite lors du téléchargement du fichier
            }
        } else {
            // Des champs obligatoires sont manquants
        }
    }
}
}
// Le reste du code du script...

?>
