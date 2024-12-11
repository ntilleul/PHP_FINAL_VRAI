<body>
    <h1>Modifier votre commentaire</h1>
    <form action="?c=Cedited&id=<?php echo $comment['id'];?>" method="post">
    <div class="mb-3">
        <label for="content" class="form-label">Contenu du commentaire</label>
        <textarea class="form-control" name="content" id="content" rows="3" required><?php echo htmlspecialchars($commentaire['contenu']); ?></textarea>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary" id="edit">Modifier</button>
    </div>
    </form>
</body>