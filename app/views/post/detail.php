<script src="app/views/js/script.js"></script>
<body>
    <?php 
    require_once(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR.'CommentController.php');
    $commentController = new CommentController(); 
    ?>

    <h1><?php echo htmlspecialchars($post['titre']); ?></h1>
    <h3>Posté par <?php echo htmlspecialchars($post['nom']); ?> le <?php echo $post['date_publication']; ?></h3>

<p><?php echo $post['contenu']; ?></p>
    
<div class="d-flex align-items-center">
    <?php if (isset($_SESSION['id'])): ?>
        <button class="btn btn-sm btn-primary reaction_btn" data-id="<?php echo $post['id'];?>" data-type="like">👍</button>
        <button class="btn btn-sm btn-primary reaction_btn ms-2" data-id="<?php echo $post['id'];?>" data-type="love">❤️</button>
        <button class="btn btn-sm btn-primary reaction_btn ms-2" data-id="<?php echo $post['id'];?>" data-type="funny">😂</button>
        <div class="ms-3 reaction_count_container my-3" data-id="<?php echo $post['id']; ?>">
            <span class="reaction_count" data-type="like">
                <?php echo $post['like_count'] ?: 0; ?> 👍
            </span>
            <span class="reaction_count" data-type="love">
                <?php echo $post['love_count'] ?: 0; ?> ❤️
            </span>
            <span class="reaction_count" data-type="funny">
                <?php echo $post['funny_count'] ?: 0; ?> 😂
            </span>
        </div>
        <div>
                <?php endif; ?>
                <?php if (isset($_SESSION['id']) && $_SESSION['id'] == $post['utilisateur_id']) : ?>
                    <a href="?c=edit&id=<?php echo $post['id'];?>" class="btn btn-primary ms-3">Modifier</a>
                    <a href="?c=delete&id=<?php echo $post['id'];?>" class="btn btn-primary ms-3">Supprimer</a> 
                    <a href="?c=create" class="btn btn-sm btn-primary">Commenter</a>
                <?php endif; ?>  
            </div>  
    </div>
    <?php $commentController->index($pdo, $post['id']);?> 
    <a href="?c=home" class="btn btn-sm btn-primary">Retour à la liste des posts</a>