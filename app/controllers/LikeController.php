<?php
class LikeController {
    function toggleLike($pdo, $post_id){
        if(!isset($_SESSION['id'])){echo '0';exit;}
        $user_id = $_SESSION['id'];
        $check = $pdo->prepare('SELECT id FROM likes WHERE utilisateur_id = :uid AND post_id = :pid');
        $check->bindParam(':uid', $user_id);
        $check->bindParam(':pid', $post_id);
        $check->execute();
        if($check->fetch()){
            $del = $pdo->prepare('DELETE FROM likes WHERE utilisateur_id = :uid AND post_id = :pid');
            $del->bindParam(':uid', $user_id);
            $del->bindParam(':pid', $post_id);
            $del->execute();
        } else {
            $ins = $pdo->prepare('INSERT INTO likes(utilisateur_id, post_id) VALUES (:uid, :pid)');
            $ins->bindParam(':uid', $user_id);
            $ins->bindParam(':pid', $post_id);
            $ins->execute();
        }
        $count = $pdo->prepare('SELECT COUNT(id) as c FROM likes WHERE post_id = :pid');
        $count->bindParam(':pid', $post_id);
        $count->execute();
        $res = $count->fetch(PDO::FETCH_ASSOC);
        echo $res['c'];
    }
}
