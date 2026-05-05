<?php
/**
 * @var $mysqli
 */

$user = checkUser($mysqli);
$articles = $mysqli->query("SELECT * from article where userId='" . $user['id'] . "' ORDER BY id DESC");

require_once 'templates/articles.php';