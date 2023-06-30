<?php
require_once "models/Blog.php";
require_once "models/User.php";
require_once "models/Post.php";
require_once "models/Comment.php";

require_once  "test.php";
    
    $p = $_GET["p"] ?? "";

    include "views/header.php";
    
    switch($p){
        case "home":
            include "views/navbar.php";
            include "views/home.php";
        break;
       
        case "blog":
            include "views/navbar.php";
            include "views/blog.php";
        break;
    }
    
    include "views/footer.php";














?>