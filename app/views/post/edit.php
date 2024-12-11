<body>
    <h1>Modifier votre post</h1>
    <form action="?c=edited&id=<?php echo $post['id'];?>" method="post">
    <div class="mb-3">
        <label for="title" class="form-label">Titre du post</label>
        <input type="text" class="form-control" name="title" id="title" value="<?php echo htmlspecialchars($post['titre']); ?>" required>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Contenu du post</label>
        <textarea class="form-control" name="content" id="content" rows="3" required><?php echo htmlspecialchars($post['contenu']); ?></textarea>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary" id="edit">Modifier</button>
    </div>
    </form>
</body>