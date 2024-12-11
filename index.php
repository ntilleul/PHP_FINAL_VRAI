<?php
session_start();
require_once(__DIR__.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR.'connectDB.php');
require_once(__DIR__.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR.'UserController.php');
require_once(__DIR__.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR.'PostController.php');
require_once(__DIR__.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR.'LikeController.php');
require_once(__DIR__.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR.'SearchController.php');

$userController = new UserController();
$postController = new PostController();
$likeController = new LikeController();
$searchController = new SearchController();

$route = isset($_GET['c']) ? $_GET['c'] : 'home';

switch ($route) {
    case 'toggleLike':
        $id = $_GET['id'];
        $likeController->toggleLike($pdo, $id);
        exit;
        break;
    case 'search':
        $term = $_GET['term'];
        $searchController->search($pdo, $term);
        exit;
        break;
    default:
        require_once(__DIR__.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'header.php');
        break;
}

switch ($route) {
    case 'home':
        $postController->index($pdo);
        break;
    case 'registerPage':
        $userController->register();
        break;
    case 'connectionPage':
        $userController->connection();
        break;
    case 'register':
        $userController->enregistrer($pdo);
        break;
    case 'connection':
        $userController->verifyConnection($pdo);
        break;
    case 'deconnection':
        $userController->deconnection(); 
        break;
    case 'profil':
        $userController->profil($pdo);
        break;
    case 'newPost':
        $postController->newPostForm();
        break;
    case 'post':
        $postController->post($pdo);
        break;
    case 'delete':
        $id = $_GET['id'];
        $postController->delete($pdo, $id);
        break;
    case 'edit':
        $id = $_GET['id'];
        $postController->edit($pdo, $id);
        break;
    case 'edited':
        $id = $_GET['id'];
        $postController->edited($pdo, $id);
        break;  
    case 'detail':
        $id = $_GET['id'];
        $postController->detail($pdo, $id);
        break;
    
    default:
        $postController->index($pdo);
        break; 
}
