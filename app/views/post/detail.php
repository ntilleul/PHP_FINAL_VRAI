<h1><?php echo htmlspecialchars($post['titre']); ?></h1>
<h3>Posté par <?php echo htmlspecialchars($post['nom']); ?> le <?php echo $post['date_publication']; ?></h3>
<p><?php echo nl2br(htmlspecialchars($post['contenu'])); ?></p>
<p>Nombre de likes : <span class="like_count" data-id="<?php echo $post['id']; ?>"><?php echo $post['like_count']; ?></span></p>

<?php if (isset($_SESSION['id'])): ?>
    <button class="btn btn-sm btn-primary like_btn" data-id="<?php echo $post['id'];?>">J'aime</button>
<?php endif; ?>

<a href="?c=home">Retour à la liste des posts</a>
