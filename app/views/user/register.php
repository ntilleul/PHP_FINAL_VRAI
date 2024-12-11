<h1>Inscription</h1>
<form action="?c=register" method="post">
    <div class="mb-3">
        <label for="name" class="form-label">Nom</label>
        <input type="text" class="form-control" name="name" id="name" required>
    </div>
    <div class="mb-3">
        <label for="mail" class="form-label">Adresse mail</label>
        <input type="email" name="mail" id="mail" required>
    </div>
    <div class="mb-3">
        <label for="pwd" class="form-label">Mot de Passe</label>
        <input type="password" class="form-control" name="pwd" id="pwd" required>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary" id="enregistrer">Enregistrer</button>
    </div>
</form>