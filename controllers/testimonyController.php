<?php
require_once 'models/Testimony/testimony.Class.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST["action"]) && $_POST["action"] === "addtestimony") {
        // Retrieve form data
        $titre = $_POST["titre"];
        $description = $_POST["description"];
        $imageFile = $_FILES["image"];

        // Check mandatory fields
        if (!empty($titre) && !empty($description) && !empty($imageFile)) {
            // Handling image upload
            $uploadDirectory = 'assets/img/';
            $uploadedFile = $imageFile['tmp_name'];
            $fileName = $imageFile['name'];
            $destination = $uploadDirectory . $fileName;

            if (move_uploaded_file($uploadedFile, $destination)) {
                // File has been uploaded successfully, you can continue processing

                // Record the testimony in the database with the image path
                $temoignagesManager = new TestimonyManager();
                $idTemoignage = $temoignagesManager->createNewTestimony($titre, $description, $destination);

                if (!is_null($idTemoignage)) {
                    $temoignage = $temoignagesManager->getTestimonyById($idTemoignage);
                    if (!is_null($temoignage)) {
                        include "views/Testimony/testimonyDetail.php";
                        exit; 
                    } else {
                        // Error handling during product creation
                    }
                }
            } else {
                // An error occurred during file upload
            }
        } else {
            // Mandatory fields are missing
        }
    }
}
// Rest of the script code...
?>
