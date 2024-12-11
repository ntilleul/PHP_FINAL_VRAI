
<body>
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
                        <?php if (isset($_SESSION['id']) && $_SESSION['id'] == $post['utilisateur_id']) : ?>
                            <a href="?c=edit&id=<?php echo $post['id'];?>" class="btn btn-primary">Modifier</a>
                            <a href="?c=delete&id=<?php echo $post['id'];?>" class="btn btn-primary">Supprimer</a>
                            
                        <?php endif; ?>    
                    </div>    
                </div> 
            </div>
        <?php endforeach; ?>        
    </div>
    
</body>

<script src="src/Views/js/script.js"></script>
