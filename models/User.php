<?php
    class User {

        // Propriétés
        private $username ;
        private $firstname ;
        private $lastname ;

        // Constructeur
        public function __construct ($username, $firstname, $lastname)
        {
            $this->username = $username ;
            $this->firstname = $firstname ;
            $this->lastname = $lastname ;
        }

    
        // GETTERS/SETTERS
        public function setUsername($username) 
        {
            $this->username = $username ;
        }

        public function getUsername()
        {
            return $this->username ;
        }

        public function setFirstname($firstname) 
        {
            $this->firstname = $firstname ;
        }

        public function getFirstname()
        {
            return $this->firstname ;
        }

        public function setLastname($lastname) 
        {
            $this->lastname = $lastname ;
        }

        public function getLastname()
        {
            return $this->lastname ;
        }


    }
?>