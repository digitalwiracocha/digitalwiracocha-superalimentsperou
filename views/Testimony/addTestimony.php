
<!-- Formulaire -->
<form method="POST" action="" enctype="multipart/form-data" class="p-f-nav">
    <input type="hidden" name="action" value="addtestimony">
    <label for="title">balise Title:</label><br>
    <textarea name="title" id="title" required><br>
    <label for="description">Meta Description:</label><br>
    <textarea name="description" id="description" required></textarea><br>
    <label for="keywords">Meta Keywords:</label><br>
    <textarea name="keywords" id="keywords" required></textarea><br>
    <label for="titre">Titre du témoignage :</label><br>
    <input type="text" name="titre" id="titre" required><br>
    <label for="description">Description du témoignage :</label><br>
    <textarea name="description" id="description" required></textarea><br>
    <label for="photo">Photo :</label><br>
    <input type="file" name="image" id="image" accept="image/*" required><br>
    <input type="submit" value="Ajouter">
</form>
