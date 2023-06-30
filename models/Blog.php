<?php
class Blog {

    // Propriétés
    private $title ;
    private $description ;
    private $owner ;
    private $posts ;


    // Constructeur
    public function __construct($title)
    {
        $this->title = $title ;
        $this->posts = [] ;
    }

    // méthode pour ajouter un post au tableau de posts
    public function addPost($post)
    {
        array_push( $this->posts, $post) ;
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

    public function setDescription($description)
    {
        $this->description = $description ;
    }

    public function getDescription()
    {
        return $this->description ;
    }

    public function setOwner($owner)
    {
        $this->owner = $owner ;
    }

    public function getOwner()
    {
        return $this->owner ;
    }

    public function setPosts($posts)
    {
        $this->posts = $posts ;
    }

    public function getPosts()
    {
        return $this->posts ;
    }



}

?>
