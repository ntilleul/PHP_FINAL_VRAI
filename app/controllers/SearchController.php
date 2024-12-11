<?php
class SearchController {
    function search($pdo, $term) {
        $term = '%'.$term.'%';
        
        $resultUsers = $pdo->prepare('SELECT id, nom, email FROM users WHERE nom LIKE :t OR email LIKE :t LIMIT 10');
        $resultUsers->bindParam(':t', $term);
        $resultUsers->execute();
        $users = $resultUsers->fetchAll(PDO::FETCH_ASSOC);

        $resultPosts = $pdo->prepare('SELECT id, titre FROM posts WHERE titre LIKE :t OR contenu LIKE :t LIMIT 10');
        $resultPosts->bindParam(':t', $term);
        $resultPosts->execute();
        $posts = $resultPosts->fetchAll(PDO::FETCH_ASSOC);

        $resultComments = $pdo->prepare('
            SELECT comments.id, comments.contenu, posts.id as post_id, posts.titre as post_titre 
            FROM comments 
            JOIN posts ON comments.post_id = posts.id 
            WHERE comments.contenu LIKE :t
            LIMIT 10
        ');
        $resultComments->bindParam(':t', $term);
        $resultComments->execute();
        $comments = $resultComments->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode(['users'=>$users, 'posts'=>$posts, 'comments'=>$comments]);
    }
    
}
