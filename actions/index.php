<?php
$userId = intval($_SESSION['userId'] ?? null);
$user = null;
if ($userId) {
    $result = $pdo->prepare("SELECT * from user where id= ? LIMIT 1");
    $result->execute([$userId]);
    $user = $result->fetch();
}
$articles = $pdo->query("SELECT * from article WHERE isPublished = 1 ORDER BY id DESC LIMIT 9");

require_once 'templates/index.php';