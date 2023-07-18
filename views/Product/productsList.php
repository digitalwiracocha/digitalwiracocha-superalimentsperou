<body class="is-preload">

<!-- Wrapper -->
<div id="wrapper">
    <br><br><br>
    
    <!-- Main -->
    <section id="main" class="wrapper">
        <div class="inner">
            <h1 class="major">Liste de tous les products</h1>
            <!-- Table -->
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nom du product</th>
                            <th>Description</th>
                            <th>Prix</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product) { ?>
                            <tr>
                                <td><?= $product->getId() ?></td>
                                <td><a href="?p=viewproduct&id=<?= $product->getId() ?>"><?= $product->getNomProduit() ?></a></td>
                           
                                <td><?= $product->getDescription() ?></td>
                                <td><?= $product->getPrixVente() ?></td>
                                <td><img src="<?= $product->getImagePath() ?>" alt="Image du product"></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

