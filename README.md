<<<<<<< Updated upstream
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
 

=======
# PHP_FINAL_VRAI
README
Description du projet
Ce projet est un mini réseau social d’entreprise. Il permet aux employés de s’inscrire, de se connecter, de poster des messages, d’ajouter des commentaires (non implémenté intégralement dans cette version), et de réagir aux publications avec diverses réactions (like, love, funny). Le site suit une architecture MVC (Modèle-Vue-Contrôleur) et utilise une base de données MySQL. Les interactions principales, comme les réactions aux posts et la recherche en direct, sont gérées en AJAX, offrant une expérience utilisateur dynamique sans rechargement complet de la page.

Fonctionnalités
Gestion des utilisateurs

Inscription avec nom, email unique et mot de passe (hashé avec password_hash()).
Connexion et déconnexion.
Accès à un profil utilisateur (optionnel).
Gestion des publications (posts)

Affichage de tous les posts, du plus récent au plus ancien.
Création de posts (titre et contenu) une fois connecté.
Possibilité pour l’auteur d’un post de le modifier ou de le supprimer.
Affichage de la page détail d’un post spécifique.
Réactions et interactivité

Boutons de réactions (👍, ❤️, 😂) gérés en AJAX.
Compteur du nombre de réactions par type actualisé sans rechargement.
Recherche en direct d’utilisateurs et de posts (AJAX).
Mode sombre / mode clair togglable, mémorisé via localStorage.
Sécurité

Passwords hashés via password_hash().
Vérifications que seuls les utilisateurs connectés peuvent poster ou réagir.
Les utilisateurs ne peuvent pas modifier ou supprimer les posts d’autres utilisateurs.
Installation
Récupérer le code
Clonez ou téléchargez ce dépôt sur votre machine.

Configuration de la base de données

Créez une base de données MySQL nommée TP_FINAL.
Importez le script SQL fourni (scriptsSQL.sql) pour créer les tables users, posts, comments (si besoin), reactions, etc.
Paramètres de connexion à la base
Ouvrez app/models/connectDB.php et vérifiez l’hôte, le nom de la base, l’utilisateur et le mot de passe. Ajustez si nécessaire en fonction de votre environnement local (Ex: WAMP, XAMPP, etc.).

Lancement du site
Placez le projet dans votre répertoire accessible par votre serveur web (par exemple www ou htdocs) et accédez-y via http://localhost/PHP_FINAL_VRAI/ (selon le nom de votre dossier).

Utilisation
Rendez-vous sur la page d’accueil (?c=home).
Si vous n’êtes pas inscrit, allez sur ?c=registerPage pour créer un compte.
Connectez-vous depuis ?c=connectionPage.
Une fois connecté, vous pouvez :
Créer un nouveau post avec ?c=newPost.
Voir les détails d’un post via le bouton "Détails" sur la page d’accueil.
Réagir aux posts en cliquant sur une des réactions (like, love, funny).
Utiliser la barre de recherche en haut de la page pour chercher des utilisateurs ou des posts en temps réel.
Basculer en mode sombre ou clair grâce au bouton "Mode" dans la barre de navigation.
Architecture du Projet (MVC)
Modèle (app/models) : contient la logique d’accès à la base de données, les requêtes SQL.
Vues (app/views) : gèrent l’affichage (HTML/CSS). Les vues sont inclues par les contrôleurs.
Contrôleurs (app/controllers) : contiennent la logique métier, contrôlent le flux de données entre le modèle et la vue, et gèrent les actions utilisateur (connexion, création de post, etc.).
Évolutions possibles
Implémenter la fonctionnalité de commentaires de manière complète (en AJAX).
Ajouter une pagination pour les posts.
Améliorer la gestion du profil utilisateur (mise à jour du nom, email, mot de passe).
Ajouter d’autres types de réactions ou d’autres fonctionnalités sociales.
Auteurs
Ce projet a été réalisé dans le cadre d’un TP. Toutes les fonctionnalités de base demandées dans la consigne sont implémentées, avec quelques améliorations (détails de post, plusieurs types de réactions, etc.).
>>>>>>> Stashed changes
