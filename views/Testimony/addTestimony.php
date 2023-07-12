<?php
$date = date("Y-m-d H:i:s");
?>
<!-- Formulaire -->
<form method="POST" action="" enctype="multipart/form-data" class="p-f-nav">
    <input type="hidden" name="action" value="addtestimony">
    <label for="titre">Titre du témoignage :</label><br>
    <input type="text" name="titre" id="titre" required><br>
    <label for="description">Description du témoignage :</label><br>
    <textarea name="description" id="description" required></textarea><br>
    <label for="photo">Photo :</label><br>
    <input type="file" name="image" id="image" accept="image/*" required><br>
    <label for="date_creation">Date de création :</label><br>
    <input type="text" name="date_creation" id="date_creation" value="<?php echo $date; ?>" readonly><br>
    <input type="submit" value="Ajouter">
</form>
