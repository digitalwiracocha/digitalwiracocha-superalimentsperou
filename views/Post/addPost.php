<?php
$date = date("Y-m-d H:i:s");
?>
<!-- Formulaire -->
<form method="POST" action="" enctype="multipart/form-data" class="p-f-nav">
    <input type="hidden" name="action" value="addpost">
    <label for="titre">Titre du post :</label><br>
    <input type="text" name="titre" id="titre" required><br>
    <label for="description">Description :</label><br>
    <textarea name="description" id="description" required></textarea><br>
    <label for="image">Image :</label><br>
    <input type="file" name="image" id="image" accept="image/*"><br>
    <label for="date_creation">Date de création :</label><br>
    <input type="text" name="date_creation" id="date_creation" value="<?php echo $date; ?>" readonly><br>
    <input type="submit" value="Ajouter">
</form>
