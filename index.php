<?php
session_start();
require_once(__DIR__.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR.'connectDB.php');
require_once(__DIR__.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'header.php');

require_once(__DIR__.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR.'UserController.php');
require_once(__DIR__.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR.'PostController.php');

$userController = new UserController();
$postController = new PostController();
//$commentController = new CommentController();

$route = isset($_GET['c']) ? $_GET['c'] : 'home';
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
    
    default:
        $postController->index($pdo);
        break; 
}
