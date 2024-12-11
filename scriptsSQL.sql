-- Active: 1733851320046@@127.0.0.1@3306@tp_final
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

SELECT * FROM users;
SELECT * FROM posts;
SELECT * FROM comments;

DELETE FROM users;
DELETE FROM posts;
DELETE FROM comments;

DROP TABLE users;
DROP TABLE posts;
DROP TABLE comments;

