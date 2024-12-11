<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>TP Final</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
		crossorigin="anonymous"></script>
	<link rel="stylesheet" href="app/views/css/style.css">
</head>
<body id="body">
	<nav class="navbar navbar-expand-lg bg-body-tertiary">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="?c=home">Accueil</a>
			</li>
		</ul>
        <form class="d-flex ms-3" role="search">
            <input class="form-control me-2" type="search" placeholder="Recherche" aria-label="Search" id="search_input">
            <div id="search_results" class="position-absolute bg-white border" style="z-index:999;"></div>
        </form>
		<ul class="navbar-nav ms-auto">
            <?php if (isset($_SESSION['nom'])) { ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo htmlspecialchars($_SESSION['nom']); ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="?c=profil">Mon profil</a></li>
                        <li><a class="dropdown-item" href="?c=newPost">Poster</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-dark" href='?c=deconnection'>Déconnexion</a>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="btn btn-outline-dark me-2" href='?c=registerPage'>Inscription</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-dark" href='?c=connectionPage'>Connexion</a>
                </li>
            <?php } ?>
            <li class="nav-item ms-3">
                <button type="button" class="btn btn-secondary" id="toggle_mode">Mode</button>
            </li>
        </ul>
	</nav>
	<div class="container w-75 m-auto">
