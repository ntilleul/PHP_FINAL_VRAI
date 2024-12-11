-- Active: 1733904789299@@127.0.0.1@3306
CREATE DATABASE TP_FINAL

CREATE TABLE users(
    id serial PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    date_inscription TIMESTAMP NOT NULL,
    UNIQUE(email)
);

CREATE TABLE posts (
    id SERIAL PRIMARY KEY,
    titre VARCHAR(100),
    contenu TEXT,
    utilisateur_id INT,
    date_publication TIMESTAMP
);

CREATE TABLE comments (
    id SERIAL PRIMARY KEY,
    contenu TEXT,
    utilisateur_id INT,
    post_id INT,
    date_commentaire TIMESTAMP
)
CREATE TABLE likes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur_id INT,
    post_id INT,
    date_like TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (utilisateur_id) REFERENCES users(id),
    FOREIGN KEY (post_id) REFERENCES posts(id)
);
ALTER TABLE likes ADD COLUMN reaction_type VARCHAR(50) NOT NULL DEFAULT 'like';
RENAME TABLE likes TO reactions;

/*
SELECT * FROM users;
SELECT * FROM posts;
SELECT * FROM comments;

DELETE FROM users;
DELETE FROM posts;
DELETE FROM comments;

DROP TABLE users;
DROP TABLE posts;
DROP TABLE comments;

*/