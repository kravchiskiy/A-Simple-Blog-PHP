<?php
/**
 * @var $pdo ;
 * @var $user ;
 */
$perPage = 5;
$countAtricles = $pdo->prepare("SELECT COUNT(*) from article ");
$countAtricles->execute();
$count = $countAtricles->fetchColumn();
$pages = ceil($count / $perPage);
$offset = 0;
$currentPage = (int)($_REQUEST['page'] ?? null);
$currentPage = $currentPage > 1 ? $currentPage - 1 : 0;
$offset = $perPage * $currentPage;
//var_dump($pages);
//exit;
$articles = $pdo->prepare("SELECT * from article ORDER BY id DESC LIMIT ?, ?");
$articles->execute([$offset, $perPage]);
include_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/index.php';