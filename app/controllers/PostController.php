<?php
class PostController{
    function verify($pdo, $id){
        $requeteVerif = $pdo->prepare('SELECT utilisateur_id FROM posts WHERE id = :id');
        $requeteVerif->bindParam(':id', $id);
        $requeteVerif->execute();
        $verif = $requeteVerif->fetch(PDO::FETCH_ASSOC);

        if($verif['utilisateur_id'] != $_SESSION['id']){
            return false;  
        }else{
            return true;
        }
    }

    function newPostForm(){
        require_once(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'post'.DIRECTORY_SEPARATOR.'create.php');
    }

    function post($pdo) {
        $title = $_POST['title'];
        $content = $_POST['content'];

        $requete = $pdo->prepare('INSERT INTO posts(titre, contenu, utilisateur_id, date_publication) VALUES (:title, :content, :id, NOW())');
        $requete->bindParam(':title', $title);
        $requete->bindParam(':content', $content);
        $requete->bindParam(':id', $_SESSION['id']);

        $ok = $requete->execute();

        if($ok) {
            echo "L'opération a été effectué avec succès";
            echo "<script>window.location.href = '/PHP_FINAL_VRAI/?c=home';</script>";
        } else {
            echo "L'opération a échoué";
            echo "<script>window.location.href = '/PHP_FINAL_VRAI/?c=home';</script>";

        }

    }

    function index($pdo){
        $requete = $pdo->prepare('SELECT posts.*, users.nom FROM posts JOIN users ON posts.utilisateur_id = users.id ORDER BY date_publication DESC');
        $requete->execute();
        $posts = $requete->fetchAll(PDO::FETCH_ASSOC);
        
        require_once(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'post'.DIRECTORY_SEPARATOR.'index.php');
    }

    function delete($pdo, $id){
        if($this->verify($pdo, $id) == false){
            echo "L'opération a échoué";
            echo "<script>window.location.href = '/PHP_FINAL_VRAI/?c=home';</script>";

            
        }else{
            $requete = $pdo->prepare('DELETE FROM posts WHERE id = :id');
            $requete->bindParam(':id', $id);
            $requete->execute();
            if($requete) {
                echo "L'opération a été effectué avec succès";
                echo "<script>window.location.href = '/PHP_FINAL_VRAI/?c=home';</script>";
            } else {
                echo "L'opération a échoué";
                echo "<script>window.location.href = '/PHP_FINAL_VRAI/?c=home';</script>";
            }
        }
    }

    function edit($pdo, $id){
        $requete = $pdo->prepare('SELECT * FROM posts WHERE id = :id');
        $requete->bindParam(':id', $id);
        $requete->execute();
        $post = $requete->fetch(PDO::FETCH_ASSOC);
        require_once(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'post'.DIRECTORY_SEPARATOR.'edit.php');
    }

    function edited($pdo, $id){
        if($this->verify($pdo, $id) == false){
            echo "L'opération a échoué";
        }else{  
            $title = $_POST['title'];
            $content = $_POST['content'];

            $requete = $pdo->prepare('UPDATE posts SET titre = :title, contenu = :content WHERE id = :id');
            $requete->bindParam(':title', $title);
            $requete->bindParam(':content', $content);
            $requete->bindParam(':id', $id);

            $ok = $requete->execute();

            if($ok) {
                echo "L'opération a été effectué avec succès";
                echo "<script>window.location.href = '/PHP_FINAL_VRAI/?c=home';</script>";
            } else {
                echo "L'opération a échoué";
                echo "<script>window.location.href = '/PHP_FINAL_VRAI/?c=home';</script>";

            }
        }
    }
}