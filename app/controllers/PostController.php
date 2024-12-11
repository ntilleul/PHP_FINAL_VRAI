<?php
class PostController{

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
        $requete = $pdo->prepare("SELECT posts.id, posts.titre, posts.contenu, posts.utilisateur_id, posts.date_publication, users.nom,
        (SELECT COUNT(*) FROM reactions WHERE post_id = posts.id AND reaction_type = 'like') as like_count,
        (SELECT COUNT(*) FROM reactions WHERE post_id = posts.id AND reaction_type = 'love') as love_count,
        (SELECT COUNT(*) FROM reactions WHERE post_id = posts.id AND reaction_type = 'funny') as funny_count
        FROM posts
        JOIN users ON posts.utilisateur_id = users.id
        ORDER BY date_publication DESC
        ");
        $requete->execute();
        $posts = $requete->fetchAll(PDO::FETCH_ASSOC);
        
        require_once(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'post'.DIRECTORY_SEPARATOR.'index.php');
    }
    

    function delete($pdo, $id){
        if(isset($_SESSION['id'])){
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
        if(isset($_SESSION['id'])){
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
    function detail($pdo, $id) {
        $requete = $pdo->prepare('
            SELECT posts.*, users.nom,
                (SELECT COUNT(*) FROM reactions WHERE post_id = posts.id AND reaction_type="like") AS like_count,
                (SELECT COUNT(*) FROM reactions WHERE post_id = posts.id AND reaction_type="love") AS love_count,
                (SELECT COUNT(*) FROM reactions WHERE post_id = posts.id AND reaction_type="funny") AS funny_count
            FROM posts
            JOIN users ON posts.utilisateur_id = users.id
            WHERE posts.id = :id
            GROUP BY posts.id
        ');
        $requete->bindParam(':id', $id);
        $requete->execute();
        $post = $requete->fetch(PDO::FETCH_ASSOC);

    
        if (!$post) {
            echo "Ce post n'existe pas.";
            return;
        }
    
        require_once(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'post'.DIRECTORY_SEPARATOR.'detail.php');
    }
    
}