<?php
//Отладка, обработки ошибок
error_reporting(E_ALL);
ini_set('display_errors', 1);
//error_reporting(E_ERROR);// для прода
//ini_set('display_errors', 0);//для прода

session_start();
require_once 'config/config.php';
require_once 'config/router.php';
require_once 'functions/helpers.php';

$host = '127.0.0.1';
$db = 'edu-blog';
$user = 'root';
$pass = 'ServBay.dev';
$port = "3306";
$charset = 'utf8mb4';

$options = [
    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::ATTR_EMULATE_PREPARES => false,
];
//$dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=$charset;port=$port";
$pdo = new \PDO($dsn, DB_USER, DB_PASS, $options);

//$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
//Можно заменить на $_REQUEST
if (isset($_REQUEST['act'])) {
    if (!empty($routers[$_REQUEST['act']])) {
        require_once $routers[$_REQUEST['act']];
    }
//    switch ($_REQUEST['act']) {
//        case 'register':
//            require_once 'actions/register.php';
//            break;
//        case 'logout':
//            require_once 'actions/logout.php';
//            break;
//        case 'login':
//            require_once 'actions/login.php';
//            break;
//        case 'profile':
//            require_once 'actions/profile.php';
//            break;
//        case 'add':
//            require_once 'actions/add.php';
//            break;
//        case 'articles':
//            require_once 'actions/articles.php';
//            break;
//        case 'edit':
//            require_once 'actions/edit.php';
//            break;
//        case 'delete':
//            require_once 'actions/delete.php';
//            break;
//        case 'view':
//            require_once 'actions/view.php';
//            break;
//    }
    die();
}


//var_dump($articles->fetch_assoc());
//die();

$userId = intval($_SESSION['userId'] ?? null);
$user = null;
if ($userId) {
    $result = $pdo->prepare("SELECT * from user where id= ? LIMIT 1");
    $result->execute([$userId]);
    $user = $result->fetch();
}
$articles = $pdo->query("SELECT * from article ORDER BY id DESC LIMIT 9");

require_once 'templates/index.php';