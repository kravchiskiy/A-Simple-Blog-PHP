<?php
/**
 * @var $pdo
 */

$user = checkUser($pdo);
$articles = $pdo->prepare("SELECT * from article ORDER BY id DESC");
$articles->execute();
//$articles->fetch();

require_once 'templates/articles.php';