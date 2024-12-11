<?php
class CommentController {

    function comment(){
        require_once(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'comment'.DIRECTORY_SEPARATOR.'create.php');
    }

    function edit(){
        require_once(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'comment'.DIRECTORY_SEPARATOR.'edit.php');
    }

    function add($pdo){
        if(isset($_SESSION['id'])){
            $comment = $_POST['content'];
            $requete = $pdo->prepare('INSERT INTO comments (contenu, utilisateur_id, post_id) VALUES (:comment, :utilisateur_id, :post_id)');
            $requete->bindParam(':comment', $comment);
            $requete->bindParam(':utilisateur_id', $_SESSION['id']);
            $requete->bindParam(':post_id', $_GET['id']);
            $requete->execute();
        }  
    }

    function edited($pdo, $id){
        if(isset($_SESSION['id'])) {
            $requete = $pdo->prepare('SELECT * FROM comments WHERE id = :id');
            $requete->bindParam(':id', $id);
            $requete->execute();
            $comment = $requete->fetch(PDO::FETCH_ASSOC);
            require_once(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'comment'.DIRECTORY_SEPARATOR.'edit.php');
        }
    }
    
    function delete($pdo, $id){
        if(isset($_SESSION['id'])) {
            $requete = $pdo->prepare('DELETE FROM comments WHERE id = :id');
            $requete->bindParam(':id', $id);
            $requete->execute();
            header('Location: index.php?c=home');
        }
    }

    function index($pdo){
        $requete = $pdo->prepare('SELECT comments.*, users.nom FROM comments JOIN users ON comments.utilisateur_id = users.id ORDER BY date_commentaire DESC');
        $requete->execute();
        $comments = $requete->fetchAll(PDO::FETCH_ASSOC);
        
        require_once(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'comment'.DIRECTORY_SEPARATOR.'index.php');
    }
}