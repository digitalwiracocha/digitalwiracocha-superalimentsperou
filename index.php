<?php
require_once "models/model.Class.php";
require_once "models/Product/productManager.Class.php";
require_once "models/Testimony/testimonyManager.Class.php";
require_once "models/Post/postManager.Class.php";
require_once "models/Order/orderManager.Class.php";

$p = $_GET["p"] ?? "";

include "views/Common/header.php";
include "views/Common/navbar.php";

$productManager = new ProductManager();
$productManager->loadAllProducts();
$products = $productManager->getAllProducts();

$testimonyManager = new TestimonyManager();
$testimonyManager->loadAllTestimonies();
$testimonies = $testimonyManager->getAllTestimonies();

$postManager = new PostManager();
$postManager->loadAllPosts();
$posts = $postManager->getAllPosts();

$orderManager = new OrderManager();
$orderManager->loadAllOrders();
$orders = $orderManager->getAllOrders();

switch ($p) {
    case "home":
    case "index":
    case "":
        include "views/home.php";
        break;

    case "admin":
        include "views/admin.php";
        break;

    case "contact":
        case "tocontact":
            case "contacter":
                include "views/Contact.php";
                break;
    case "cfp":
        include "assets/cfp.php";
        break;

    // Application "Order" //

    case "vieworders":
    case "orders":
        include "views/Order/ordersList.php";
        break;
        
    case "vieworder":
        $orderId = $_GET['id'] ?? null;
        if (!empty($orderId)) {
            $order = $orderManager->getOrderById($orderId);
            if (!is_null($order)) {
                include "views/Order/orderDetail.php";
            } else {
                echo "Order not found";
            }
        } else {
            echo "Invalid ID";
        }
        break;
            
    case "addorder":
    case "order":
    case "command":
    case "comand":
        include "controllers/orderController.php";
        include "views/Order/addOrder.php";
        break;

    // Application "Product" //

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

    // Application "Testimony" //

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

    // Application "Post" //

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

    // Static Pages //

    case "perou":
        include "views/Static/perou.php";
        break;

    case "qeros":
        include "views/Static/qeros.php";
        break;

    case "voyages":
        include "views/Static/voyages.php";
        break;

    case "engagement":
        include "views/Static/engagement.php";
        break;

    case "about":
        include "views/Static/about.php";
        break;

    case "faq":
        include "views/Static/faq.php";
        break;

    default:
        echo "Page not found";
        break;
}

include "views/Common/footer.php";
?>
