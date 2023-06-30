<?php
    class Post {

        // Propriétés
        private $title ;
        private $author ;
        private $date ;
        private $views ;
        private $message ;
        private $comments ;


        // Constructeur
        public function __construct ()
        {
            $this->comments = [] ;
        }


        // Méthode pour ajouter un commentaire au tableau
        public function addComment($comment)
        {
            array_push( $this->comments, $comment) ;
        }
    
        // GETTERS/SETTERS
        public function setTitle($title) 
        {
            $this->title = $title ;
        }

        public function getTitle()
        {
            return $this->title ;
        }

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
        public function setViews($views) 
        {
            $this->views = $views ;
        }

        public function getViews()
        {
            return $this->views ;
        }
        public function setMessage($message) 
        {
            $this->message = $message ;
        }

        public function getMessage()
        {
            return $this->message ;
        }

        public function setComments($comments) 
        {
            $this->comments = $comments ;
        }
    
        public function getComments()
        {
            return $this->comments ;
        }
    }




?>