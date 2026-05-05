<?php
/**
 * @var $mysqli
 */
$user = checkUser($mysqli);
$error = null;

if (count($_POST)) {
    $title = $_POST['title'] ?? null;
    $content = $_POST['content'] ?? null;
    var_dump($_FILES);
    if (!$_FILES["file"]["size"]) {
        $error = 'Image not found';
    } elseif (!$title || !$content) {
        $error = 'Missing parameters content';
    } else {


        $filename = upload();

        $mysqli->query("INSERT INTO article SET img='" . $filename . "', userId = '" . $user['id'] . "', title = '" . $title . "',content = '" . $content . "', createdAt = NOW()");
        header('Location: /?act=articles');
        die();
    }
}

require_once 'templates/add.php';