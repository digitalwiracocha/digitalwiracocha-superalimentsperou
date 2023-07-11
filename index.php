<?php
require_once "models/model.Class.php";
require_once "models/produitsManager.Class.php";

$p = $_GET["p"] ?? "";

include "views/header.php";

$produitManager = new ProduitsManager();
$produitManager->loadAllProduits();

// Retrieve all products
$produits = $produitManager->getAllProduits();

switch ($p) {
    case "home":
    case "index":
    case "":
        include "views/navbar.php";
        include "views/home.php";
        break;

    case "viewproducts":
        include "views/navbar.php";
        include "views/produits.php";
        break;

    case "viewproduct":
        include "views/navbar.php";
        $produitId = $_GET['id'] ?? null;
        if (!empty($produitId)) {
            $produit = $produitManager->getProduitById($produitId);
            if (!is_null($produit)) {
                include "views/produitDetail.php";
            } else {
                echo "Product not found";
            }
        } else {
            echo "Invalid product ID";
        }
        break;

    case "addproduct":
        include "views/navbar.php";
        include "controllers/produitsController.php";
        include "views/addProduit.php";
        break;

    default:
        echo "Page not found";
        break;
}

include "views/footer.php";
?>
