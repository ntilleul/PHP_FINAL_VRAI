<script src="app/views/js/script.js"></script>

<h1><?php echo htmlspecialchars($post['titre']); ?></h1>
<h3>Posté par <?php echo htmlspecialchars($post['nom']); ?> le <?php echo $post['date_publication']; ?></h3>

<p><?php echo $post['contenu']; ?></p>
    
<div class="d-flex align-items-center">
    <?php if (isset($_SESSION['id'])): ?>
        <button class="btn btn-sm btn-primary reaction_btn" data-id="<?php echo $post['id'];?>" data-type="like">👍</button>
        <button class="btn btn-sm btn-primary reaction_btn ms-2" data-id="<?php echo $post['id'];?>" data-type="love">❤️</button>
        <button class="btn btn-sm btn-primary reaction_btn ms-2" data-id="<?php echo $post['id'];?>" data-type="funny">😂</button>
        <div class="ms-2 reaction_count_container" data-id="<?php echo $post['id'];?>">
            <span class="reaction_count" data-type="like"><?php echo $post['like_count']; ?></span> 👍
        </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['id']) && $_SESSION['id'] == $post['utilisateur_id']) : ?>
            <a href="?c=edit&id=<?php echo $post['id'];?>" class="btn btn-primary ms-3">Modifier</a>
            <a href="?c=delete&id=<?php echo $post['id'];?>" class="btn btn-primary ms-3">Supprimer</a>
        <?php endif; ?>    
</div>
<a href="?c=home">Retour à la liste des posts</a>
