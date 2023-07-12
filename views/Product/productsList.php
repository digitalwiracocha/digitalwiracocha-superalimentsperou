<body class="is-preload">

<!-- Wrapper -->
<div id="wrapper">
    <br><br><br>
    
    <!-- Main -->
    <section id="main" class="wrapper">
        <div class="inner">
            <h1 class="major">Liste de tous les produits</h1>
            <!-- Table -->
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nom du Produit</th>
                            <th>Description</th>
                            <th>Prix</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($produits as $produit) { ?>
                            <tr>
                                <td><?= $produit->getId() ?></td>
                                <td><a href="?p=viewproduct&id=<?= $produit->getId() ?>"><?= $produit->getNomProduit() ?></a></td>
                                <td><?= $produit->createSummary() ?></td>
                                <td><?= $produit->getPrixVente() ?></td>
                                <td><img src="<?= $produit->getImagePath() ?>" alt="Image du produit"></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

