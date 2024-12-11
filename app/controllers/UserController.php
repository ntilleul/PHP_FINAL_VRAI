<?php

class UserController {

    function register(){
        require_once(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR.'register.php');
    }

    function enregistrer($pdo){
        $name = $_POST['name'];
        $mail = $_POST['mail'];
        $pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);

        $requeteVerif = $pdo->prepare('SELECT COUNT(id) FROM users WHERE email = :email');
        $requeteVerif->bindParam(':email', $mail);
        $result = $requeteVerif->execute();

        if($requeteVerif->fetchColumn() > 0) {
            echo 'Cette adresse mail est déjà utilisée.';
        } else {
            $requete = $pdo->prepare('INSERT INTO users(nom, email, password, date_inscription) VALUES (:name, :mail, :password, NOW())');
            $requete->bindParam(':name', $name);
            $requete->bindParam(':mail', $mail);
            $requete->bindParam(':password', $pwd);

            $ok = $requete->execute();

            if($ok) {
                require_once(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR.'login.php');
            } else {
                echo 'Erreur lors de l\'enregistrement de l\'utilisateur.';
            }
        }
    }

    function connection(){
        require_once(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR.'login.php');
    }

    function verifyConnection($pdo) {
        $mail = $_POST['mail'];
        $pwd = $_POST['pwd'];

        $requetename = $pdo->prepare('SELECT * FROM users WHERE email = :mail');
        $requetename->bindParam(':mail', $mail);
        $requetename->execute();
        $user = $requetename->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            echo 'Echec de la connexion.';
        } else {
            $pwdHash = $user['password'];

            if (password_verify($pwd, $pwdHash)) {
                $_SESSION['id'] = $user['id'];
                $_SESSION['nom'] = $user['nom'];
                $_SESSION['email'] = $user['email'];
                echo "<script>window.location.href = '/PHP_TP_FINAL/?c=home';</script>";
            } else {
                echo 'Echec de la connexion.';    
            }
        }
    }

    function deconnection() {
        session_destroy();
        echo "<script>window.location.href = '/PHP_TP_FINAL/?c=home';</script>";
    }

    function profil($pdo){
        $id = $_SESSION['id'];

        $requeteidentifiant = $pdo->prepare('SELECT * FROM users WHERE id = :id');
        $requeteidentifiant->bindParam(':id', $id);
        $requeteidentifiant->execute();
        $user = $requeteidentifiant->fetch(PDO::FETCH_ASSOC);

        require_once(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR.'profil.php');
    }

}