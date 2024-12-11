<h1>Profil de <?php echo htmlspecialchars($user['nom']); ?></h1>
<p>Email : <?php echo htmlspecialchars($user['email']); ?></p>
<p>Date d'inscription : <?php echo $user['date_inscription']; ?></p>
<a href="?c=home">Retour</a>
<script src="app/views/js/script.js"></script>