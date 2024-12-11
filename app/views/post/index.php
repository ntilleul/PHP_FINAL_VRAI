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
                        <div class="d-flex align-items-center">
                            <?php if (isset($_SESSION['id'])): ?>
                                <button class="btn btn-sm btn-primary reaction_btn" data-id="<?php echo $post['id'];?>" data-type="like">👍</button>
                                <button class="btn btn-sm btn-primary reaction_btn ms-2" data-id="<?php echo $post['id'];?>" data-type="love">❤️</button>
                                <button class="btn btn-sm btn-primary reaction_btn ms-2" data-id="<?php echo $post['id'];?>" data-type="funny">😂</button>
                                <div class="reaction_count_container" data-id="<?php echo $post['id']; ?>">
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

                            <?php endif; ?>   
                        </div>

                        <a href="?c=detail&id=<?php echo $post['id']; ?>" class="btn btn-info">Détails</a>

                        <?php if (isset($_SESSION['id']) && $_SESSION['id'] == $post['utilisateur_id']) : ?>
                            <a href="?c=Pedit&id=<?php echo $post['id'];?>" class="btn btn-primary">Modifier</a>
                            <a href="?c=Pdelete&id=<?php echo $post['id'];?>" class="btn btn-primary">Supprimer</a>
                        <?php endif; ?>
                          
                    </div>    
                </div> 
            </div>
        <?php endforeach; ?>        
    </div>
</body>
<script src="app/views/js/script.js"></script>
