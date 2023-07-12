<?php
require_once "models/model.Class.php";
require_once "models/Product/productManager.Class.php";
require_once "models/Testimony/testimonyManager.Class.php";
require_once "models/Post/postManager.Class.php";

$p = $_GET["p"] ?? "";

include "views/Common/header.php";
include "views/Common/navbar.php";

$productManager = new ProductManager();
$productManager->loadAllProducts();
$produits = $productManager->getAllProducts();

$testimonyManager = new TestimonyManager();
$testimonyManager->loadAllTestimonies();
$temoignages = $testimonyManager->getAllTestimonies();

$postManager = new PostManager();
$postManager->loadAllPosts();
$posts = $postManager->getAllPosts();

switch ($p) {
    case "home":
    case "index":
    case "":
        include "views/home.php";
        break;

    case "admin":
        include "assets/admin.php";
        break;

    case "cf":
        include "assets/cfp.php";
        break;

    // application "Product"//

    case "viewproducts":
    case "products":
        include "views/Product/productsList.php";
        break;

        case "viewproduct":
            $productId = $_GET['id'] ?? null;
            if (!empty($productId)) {
                $product = $productManager->getProductById($productId);
                if (!is_null($product)) {
                    include "views/Product/productDetail.php";
                } else {
                    echo "Product not found";
                }
            } else {
                echo "Invalid ID";
            }
            break;

    case "addproduct":
        include "controllers/productController.php";
        include "views/Product/addProduct.php";
        break;

    // application "Testimony"//

    case "viewtestimonies":
        include "views/Testimony/testimoniesList.php";
        break;

        case "viewtestimony":
            $testimonyId = $_GET['id'] ?? null;
            if (!empty($testimonyId)) {
                $testimony = $testimonyManager->getTestimonyById($testimonyId);
                if (!is_null($testimony)) {
                    include "views/Testimony/testimonyDetail.php";
                } else {
                    echo "Testimony not found";
                }
            } else {
                echo "Invalid ID";
            }
            break;

    case "addtestimony":
        include "controllers/testimonyController.php";
        include "views/Testimony/addTestimony.php";
        break;

    // application "Post"//

    case "viewposts":
    case "posts":
        include "views/Post/postsList.php";
        break;

        case "viewpost":
            $postId = $_GET['id'] ?? null;
            if (!empty($postId)) {
                $post = $postManager->getPostById($postId);
                if (!is_null($post)) {
                    include "views/Post/postDetail.php";
                } else {
                    echo "Post not found";
                }
            } else {
                echo "Invalid ID";
            }
            break;

    case "addpost":
        include "controllers/postController.php";
        include "views/Post/addPost.php";
        break;

    default:
        echo "Page not found";
        break;
}

include "views/Common/footer.php";




?>
