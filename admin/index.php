<?php
//var_dump();
//Отладка, обработки ошибок
error_reporting(E_ALL);
ini_set('display_errors', 1);
//error_reporting(E_ERROR);// для прода
//ini_set('display_errors', 0);//для прода

session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/router-admin.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/functions/helpers.php';

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

/**
 * @var $pdo
 */
$user = checkAdminUser($pdo);
if (isset($_REQUEST['act']) && !empty($routersAdmin[$_REQUEST['act']])) {
    require_once $routersAdmin[$_REQUEST['act']];
//    var_dump($routersAdmin[$_REQUEST['act']]);
//    var_dump($_REQUEST['act']);

    die();
} else {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/actions/admin/index.php';
}


//var_dump($articles->fetch_assoc());
//die();

