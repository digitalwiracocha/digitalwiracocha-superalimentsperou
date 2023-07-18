
<!-- Formulaire -->
<form method="POST" action="" enctype="multipart/form-data" class="p-f-nav">
    <input type="hidden" name="action" value="addproduct">
    <label for="title">balise Title:</label><br>
    <textarea name="title" id="title" required><br>
    <label for="metadescription">Meta Description:</label><br>
    <textarea name="metadescription" id="metadescription" required></textarea><br>
    <label for="keywords">Meta Keywords:</label><br>
    <textarea name="keywords" id="keywords" required></textarea><br>
    <label for="nom">Nom du produit:</label><br>
    <input type="text" name="nom" id="nom" required><br>
    <label for="description">Description:</label><br>
    <textarea name="description" id="description" required></textarea><br>
    <label for="prix">Prix:</label><br>
    <input type="number" name="prix" id="prix" required><br>
    <label for="image">Image:</label><br>
    <input type="file" name="image" id="image" accept="image/*" required><br>

    

    <input type="submit" value="Ajouter">
</form>