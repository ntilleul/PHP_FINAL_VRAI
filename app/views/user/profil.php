<h1>Profil de l'utilisateur : <span id="profil_identifiant_titre"><?php echo $user['nom']; ?></span></h1>
<div class="row">
    
    <div class="col">
        <p><b>Identifiant : </b><span id="profil_identifiant" data-id="<?php echo $user['id']; ?>" contenteditable="true"><?php echo $user['nom']; ?></span></p>
        <p><b>Email : </b><span id="profil_mail" data-id="<?php echo $user['id']; ?>" contenteditable="true"><?php echo $user['email']; ?></span></p>
    </div>
</div>
<hr>
<div id="boutons">
    <button id="bouton_modifier_profil" class="btn btn-primary d-none">Modifier le profil</button>
    <a href="?c=home" class="btn btn-primary">Retour à l'accueil</a>
</div>
<script src="app/views/js/script.js"></script>