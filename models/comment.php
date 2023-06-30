<?php
    class Comment {

        // Propriétés
        private $author ;
        private $date ;
        private $message ;


        // Constructeur
        public function __construct ($message, $author, $date)
        {
            $this->message = $message;
            $this->author = $author;
            $this->date = $date;
        }

    
        // GETTERS/SETTERS
        public function setAuthor($author) 
        {
            $this->author = $author ;
        }

        public function getAuthor()
        {
            return $this->author ;
        }
        public function setDate($date) 
        {
            $this->date = $date ;
        }

        public function getDate()
        {
            return $this->date ;
        }
        public function setMessage($message) 
        {
            $this->message = $message ;
        }

        public function getMessage()
        {
            return $this->message ;
        }
    }
?>