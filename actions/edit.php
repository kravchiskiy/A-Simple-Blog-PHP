<?php
/**
 * @var $mysqli
 */
$user = checkUser($mysqli);

$articleId = $_GET['id'] ?? null;
if (!$articleId) {
    header('Location: /?act=articles');
    die();
}


if (count($_POST)) {
    $sql = '';
    $title = $_POST['title'] ?? null;
    $content = $_POST['content'] ?? null;

    if ($_FILES['file']['size']) {
        $filename = upload();
        $sql = "img='" . $filename . "', ";
        $article = getUserArticle($mysqli, $articleId, $user['id']);
        @unlink($_SERVER['DOCUMENT_ROOT'] . '/images/' . $article['img']);
//        var_dump($sql);
//        var_dump($filename);
//        exit;
    }
    $mysqli->query("UPDATE article SET ".$sql." userId = '" . $user['id'] . "', title = '" . $title . "',content = '" . $content . "' WHERE id = '" . $articleId . "' AND userId = '" . $user['id'] . "'");
//    var_dump($mysqli->query("UPDATE article SET ".$sql.", userId = '" . $user['id'] . "', title = '" . $title . "',content = '" . $content . "' WHERE id = '" . $articleId . "' AND userId = '" . $user['id'] . "'"));

    header('Location: /?act=articles');
    die();
}
$articleRes = $mysqli->query("SELECT * from article where id='" . $articleId . "' AND userId = '" . $user['id'] . "' LIMIT 1");
$article = $articleRes->fetch_assoc();
if (!$article) {
    header('Location: /?act=articles');
    die();
}
require_once 'templates/edit.php';