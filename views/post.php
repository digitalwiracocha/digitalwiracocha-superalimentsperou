<main>
            <div class="container">
                <div idA="container-inside">
                    <div class="header">
                        <div class="header__avatar">
                            <img src="https://i.pravatar.cc/40?img=<?= $id ?>" alt="<?= $post->getAuthor()->getUsername() ?>" class="user__image">
                        </div>
                        <div class="header__info">
                            <h5><?= $post->getAuthor()->getUsername() ?></h5>
                        </div>

                    <div class="post">

                        <h1><?= $post->getTitle() ?></h1>

                        <p class="post-header">Article publié le <?= date("d/m/Y à H:i", $post->getDate()->getTimestamp()) ?> par <?= $post->getAuthor()->getUsername() ?></p>

                        <p class="post-body"><?= $post->getMessage() ?></p>
        <?php
                $id=1;
                // On boucle sur tous les commentaires du post
                foreach($post->getComments() as $comment)
                {
                    $id++ ;
                    ?>
                        <div class="comment">
                            <div class="user">
                                <div class="avatar">
                                    <img src="https://i.pravatar.cc/40?img=<?= $id ?>" alt="<?= $post->getAuthor()->getUsername() ?>" class="user__image">
                                    <div class="user__info">
                                        <h5><?= $comment->getAuthor()->getUsername() ?></h5>
                                    </div>
                                </div>
                                <div class="comment-box">
                                    <p class="comment-header"><?= date("d/m/Y à H:i", $comment->getDate()->getTimestamp()) ?></p>
                                    <p class="comment-body"><?= $comment->getMessage() ?></p>
                                </div>
                            </div>
                        </div>
                    <?php
                }

        ?>

                    </div>
                </div>
            </div>
            <p class="center">
                <a href="index.php">Retour</a>
            </p>
        </main>
        <aside>
            <h2>Articles récents</h2>
            <ul>
    <?php
            $index = 0 ;
            foreach($blog->getPosts() as $post)
            {
                ?>
                <li><a href="index.php?page=post&id=<?= $index ?>"><?= $post->getTitle() ?></a></li>
                <?php
                $index++ ;
            }
    ?>
            </ul>
        </aside>
