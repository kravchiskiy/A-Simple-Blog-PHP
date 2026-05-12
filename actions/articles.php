<?php
/**
 * @var $pdo
 */

$user = checkUser($pdo);
$articles = $pdo->prepare("SELECT * from article where userId= ? ORDER BY id DESC");
$articles->execute([$user['id']]);
//$articles->fetch();

require_once 'templates/articles.php';