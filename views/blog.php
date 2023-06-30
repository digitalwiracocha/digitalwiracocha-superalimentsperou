<main class="blog-post">
  <?php
  // Boucle sur les posts du blog
  foreach($blog->getPosts() as $post){
  ?>
  <div class="post">
    <h2><?= $post->getTitle() ?></h2>
    <p><?= $post->getMessage() ?></p>
    <h3>Commentaires :</h3>
    <?php
    // Boucle sur les commentaires du post
    foreach($post->getComments() as $comment){
    ?>
    <div class="comment">
      <p>Auteur : <?= $comment->getAuthor()->getUsername() ?></p>
      <p>Message : <?= $comment->getMessage() ?></p>
      <p>Date : <?= $comment->getDate()->format('d/m/Y H:i') ?></p>
    </div>
    <?php
    }
    ?>
  </div>
  <?php
  }
  ?>
</main>
