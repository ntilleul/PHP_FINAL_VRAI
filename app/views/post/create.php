<h1>Nouveau post</h1>
<form action="?c=post" method="post">
    <div class="mb-3">
        <label for="title" class="form-label">Titre du post</label>
        <input type="text" class="form-control" name="title" id="title" required>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Contenu du post</label>
        <textarea class="form-control" name="content" id="content" rows="3" required></textarea>
    
    <div class="mb-3">
        <button type="submit" class="btn btn-primary" id="poster">Poster</button>
    </div>
</form>
<script src="app/views/js/script.js"></script>