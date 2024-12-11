# PHP_TP_FINAL
## Description du projet
Ce projet est un mini réseau social d’entreprise. Il permet aux employés de s’inscrire, de se connecter, de poster des messages, d’ajouter des commentaires (non implémenté intégralement dans cette version), et de réagir aux publications avec diverses réactions (like, love, funny). Le site suit une architecture [MVC (Modèle-Vue-Contrôleur)](https://github.com/ntilleul/PHP_FINAL_VRAI/tree/main/app) et utilise une base de données MySQL. Les interactions principales, comme les réactions aux posts et la recherche en direct, sont gérées en AJAX, offrant une expérience utilisateur dynamique sans rechargement complet de la page.
## Fonctionnalités
### Gestion des utilisateurs
- Inscription avec nom, email unique et mot de passe (hashé avec password_hash()).
- Connexion et déconnexion.
- Accès à un profil utilisateur (optionnel).
- Gestion des publications (posts)

### Gestion des publications
- Affichage de tous les posts, du plus récent au plus ancien.
- Création de posts (titre et contenu) une fois connecté.
- Possibilité pour l’auteur d’un post de le modifier ou de le supprimer.
- Affichage de la page détail d’un post spécifique.
- Réactions et interactivité
    - Boutons de réactions (👍, ❤️, 😂) gérés en AJAX.
    - Compteur du nombre de réactions par type actualisé sans rechargement.
### Fonctionnalités supplémentaires
- Recherche en direct d’utilisateurs et de posts (AJAX).
- Mode sombre / mode clair togglable, mémorisé via localStorage.

## Sécurité
- Passwords hashés via password_hash().
- Vérifications que seuls les utilisateurs connectés peuvent poster ou réagir.
- Les utilisateurs ne peuvent pas modifier ou supprimer les posts d’autres utilisateurs.

## Liaison BDD
serveur mySQL
### Structure de la Base de Données

1. **Table `users`** :
    - `id` : Identifiant unique de l'utilisateur (clé primaire, auto-incrémentée).
    - `nom` : Nom de l'utilisateur.
    - `email` : Adresse email de l'utilisateur (unique).
    - `password` : Mot de passe de l'utilisateur.
    - `date_inscription` : Date d'inscription de l'utilisateur.

2. **Table `posts`** :
    - `id` : Identifiant unique de l'article (clé primaire, auto-incrémentée).
    - `titre` : Titre de l'article.
    - `contenu` : Contenu de l'article.
    - `utilisateur_id` : Identifiant de l'utilisateur qui a créé l'article (clé étrangère référencée à `users.id`).
    - `date_publication` : Date de publication de l'article.

3. **Table `comments`** :
    - `id` : Identifiant unique du commentaire (clé primaire, auto-incrémentée).
    - `contenu` : Contenu du commentaire.
    - `utilisateur_id` : Identifiant de l'utilisateur qui a créé le commentaire (clé étrangère référencée à `users.id`).
    - `post_id` : Identifiant de l'article auquel le commentaire est associé (clé étrangère référencée à `posts.id`).
    - `date_commentaire` : Date du commentaire.

4. **Table `reactions`** (anciennement `likes`) :
    - `id` : Identifiant unique de la réaction (clé primaire, auto-incrémentée).
    - `utilisateur_id` : Identifiant de l'utilisateur qui a réagi (clé étrangère référencée à `users.id`).
    - `post_id` : Identifiant de l'article auquel la réaction est associée (clé étrangère référencée à `posts.id`).
    - `date_like` : Date de la réaction.
    - `reaction_type` : Type de réaction (par défaut 'like').
 

