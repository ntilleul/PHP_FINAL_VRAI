<body>
    <?php 
    require_once(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR.'CommentController.php');
    $commentController = new CommentController(); 
    ?>
    <h1>Posts</h1>
    <div class="row">
        <?php foreach ($posts as $post) : ?> 
            <div class="col-15 p-2"> 
                <div class="card post" data-id="<?php echo $post['id']?>">
                    <div class="card-body">
                        <h2><?php echo $post['titre']; ?></h2>
                        <h3><?php echo $post['nom']; ?></h3>
                        <h6><?php echo $post['date_publication']; ?></h6>
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

                        <a href="?c=detail&id=<?php echo $post['id']; ?>" class="btn btn-info">Détails</a>

                        <?php if (isset($_SESSION['id']) && $_SESSION['id'] == $post['utilisateur_id']) : ?>
                            <a href="?c=Pedit&id=<?php echo $post['id'];?>" class="btn btn-primary">Modifier</a>
                            <a href="?c=Pdelete&id=<?php echo $post['id'];?>" class="btn btn-primary">Supprimer</a>
                        <?php endif; ?>
                        <a href="?c=create" class="btn btn-primary">Commenter</a>
                        <?php $commentController->index($pdo, $post['id']);?>    
                    </div>    
                </div> 
            </div>
        <?php endforeach; ?>        
    </div>
</body>
<script src="app/views/js/script.js"></script>
