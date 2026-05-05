<?php
//Отладка, обработки ошибок
error_reporting(E_ALL);
ini_set('display_errors', 1);
//error_reporting(E_ERROR);// для прода
//ini_set('display_errors', 0);//для прода

session_start();
require_once 'config.php';
require_once 'functions/helpers.php';

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'register':
            require_once 'actions/register.php';
            break;
        case 'logout':
            require_once 'actions/logout.php';
            break;
        case 'login':
            require_once 'actions/login.php';
            break;
        case 'profile':
            require_once 'actions/profile.php';
            break;
        case 'add':
            require_once 'actions/add.php';
            break;
        case 'articles':
            require_once 'actions/articles.php';
            break;
        case 'edit':
            require_once 'actions/edit.php';
            break;
        case 'delete':
            require_once 'actions/delete.php';
            break;
        case 'view':
            require_once 'actions/view.php';
            break;
    }
    die();
}


//var_dump($articles->fetch_assoc());
//die();

$userId = intval($_SESSION['userId'] ?? null);
$user = null;
if($userId){
    $result = $mysqli->query("SELECT * from user where id='" . $userId . "' LIMIT 1");
    $user = $result->fetch_assoc();
}
$articles = $mysqli->query("SELECT * from article ORDER BY id DESC LIMIT 9");

require_once 'templates/index.php';