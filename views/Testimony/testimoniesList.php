<body class="is-preload">

<!-- Wrapper -->
<div id="wrapper">
    <br><br><br>
    
    <!-- Main -->
    <section id="main" class="wrapper">
        <div class="inner">
            <h1 class="major">Liste de tous les témoignages</h1>
            <!-- Table -->
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Date de création</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($temoignages as $temoignage) { ?>
    <tr>
        <td><?= $temoignage->getId() ?></td>
        <td><a href="?p=viewtestimony&id=<?= $temoignage->getId() ?>"><?= $temoignage->getTitre() ?></a></td> <!-- Added Title display -->
        <td><?= $temoignage->createSummary() ?></td>
        <td><?= $temoignage->getDateCreation() ?></td>
        <td><img src="<?= $temoignage->getImagePath() ?>" alt="Image du temoignage"></td>
    </tr>
<?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
