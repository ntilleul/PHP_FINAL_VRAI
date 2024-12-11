<?php
class ReactionController {
    function toggleReaction($pdo, $post_id, $reaction_type = 'like'){
        if(!isset($_SESSION['id'])){echo '[]';exit;}
        $user_id = $_SESSION['id'];
        $check = $pdo->prepare('SELECT id FROM reactions WHERE utilisateur_id = :uid AND post_id = :pid');
        $check->bindParam(':uid', $user_id);
        $check->bindParam(':pid', $post_id);
        $check->execute();
        $existing = $check->fetch(PDO::FETCH_ASSOC);
        if($existing){
            $upd = $pdo->prepare('UPDATE reactions SET reaction_type = :rt WHERE utilisateur_id = :uid AND post_id = :pid');
            $upd->bindParam(':rt', $reaction_type);
            $upd->bindParam(':uid', $user_id);
            $upd->bindParam(':pid', $post_id);
            $upd->execute();
        } else {
            $ins = $pdo->prepare('INSERT INTO reactions(utilisateur_id, post_id, reaction_type) VALUES (:uid, :pid, :rt)');
            $ins->bindParam(':uid', $user_id);
            $ins->bindParam(':pid', $post_id);
            $ins->bindParam(':rt', $reaction_type);
            $ins->execute();
        }

        $count = $pdo->prepare('SELECT reaction_type, COUNT(id) as c FROM reactions WHERE post_id = :pid GROUP BY reaction_type');
        $count->bindParam(':pid', $post_id);
        $count->execute();
        $res = $count->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($res);
    }
}
