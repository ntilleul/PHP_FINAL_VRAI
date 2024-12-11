<?php
class SearchController {
    function search($pdo, $term) {
        $term = '%'.$term.'%';
        $resultUsers = $pdo->prepare('SELECT nom FROM users WHERE nom LIKE :t OR email LIKE :t');
        $resultUsers->bindParam(':t', $term);
        $resultUsers->execute();
        $users = $resultUsers->fetchAll(PDO::FETCH_ASSOC);

        $resultPosts = $pdo->prepare('SELECT titre FROM posts WHERE titre LIKE :t OR contenu LIKE :t');
        $resultPosts->bindParam(':t', $term);
        $resultPosts->execute();
        $posts = $resultPosts->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode(['users'=>$users, 'posts'=>$posts]);
    }
}
