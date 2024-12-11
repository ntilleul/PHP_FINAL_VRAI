<body>
    <h4>Commentaires</h4>

    <div class="row">
        <?php foreach ($comments as $comment) : ?> 
            <div class="col-6 p-5"> 
                
                <div class="card post" data-id="<?php echo $comment['id']?>">
                    <div class="card-body">
                        <h5><?php echo $requete['utilisateur_nom']; ?></h5>
                        <h6><?php echo $requete['date_publication']; ?></h6>
                        <h8><?php echo $requete['contenu']; ?></h8>
                        
                        <p><?php echo $post['contenu']; ?></p>
                        <?php if (isset($_SESSION['id']) && $_SESSION['id'] == $comment['utilisateur_id']) : ?>
                            <a href="?c=Cedit&id=<?php echo $post['id'];?>" class="btn btn-primary">Modifier</a>
                            <a href="?c=Cdelete&id=<?php echo $post['id'];?>" class="btn btn-primary">Supprimer</a>

                        <?php endif; ?>    
                    </div>    
                </div> 
            </div>
        <?php endforeach; ?>        
    </div>
    
</body>