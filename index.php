<?php
session_start();
require_once(__DIR__.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR.'connectDB.php');
require_once(__DIR__.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR.'UserController.php');
require_once(__DIR__.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR.'PostController.php');
require_once(__DIR__.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR.'ReactionController.php');
require_once(__DIR__.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR.'SearchController.php');
require_once(__DIR__.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR.'CommentController.php');

$commentController = new CommentController();
$userController = new UserController();
$postController = new PostController();
$reactionController  = new ReactionController();
$searchController = new SearchController();


$route = isset($_GET['c']) ? $_GET['c'] : 'home';

switch ($route) {
    case 'toggleReaction':
        $id = $_GET['id'];
        $reaction_type = isset($_GET['type']) ? $_GET['type'] : 'like';
        $reactionController->toggleReaction($pdo, $id, $reaction_type);
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
    case 'Pdelete':
        $id = $_GET['id'];
        $postController->delete($pdo, $id);
        break;
    case 'Pedit':
        $id = $_GET['id'];
        $postController->edit($pdo, $id);
        break;
    case 'Pedited':
        $id = $_GET['id'];
        $postController->edited($pdo, $id);
        break;  
    case 'detail':
        $id = $_GET['id'];
        $postController->detail($pdo, $id);
        break;
    case 'create':
        $commentController->comment();
        break;
    case 'comment':
        $commentController->add($pdo);
        break;
    case 'Cdelete':
        $id = $_GET['id'];
        $commentController->delete($pdo, $id);
        break;
    case 'Cedit':
        $id = $_GET['id'];
        $commentController->edit($pdo, $id);
        break;
    case 'Cedited':
        $id = $_GET['id'];
        $commentController->edited($pdo, $id);
        break;
    default:
        break; 
}
