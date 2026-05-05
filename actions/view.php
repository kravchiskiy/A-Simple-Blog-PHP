<?php
/**
 * @var $mysqli
 */
//$user = checkUser($mysqli);

$articleId = $_GET['id'] ?? null;
$articleRes = $mysqli->query("SELECT * from article where id='" . $articleId . "'");
$article = $articleRes->fetch_assoc();

require_once 'templates/view.php';