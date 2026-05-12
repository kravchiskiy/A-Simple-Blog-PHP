<?php
/**
 * @var $pdo
 */
$user = checkUser($pdo);
$error = null;

if (count($_POST)) {
    var_dump($_POST);
    $title = $_POST['title'] ?? null;
    $content = $_POST['content'] ?? null;
//    var_dump($_FILES);
    if (!$_FILES["file"]["size"]) {
        $error = 'Image not found';
    } elseif (!$title || !$content) {
        $error = 'Missing parameters content';
    } else {
        var_dump('else');

        $filename = upload();

        $stmt = $pdo->prepare("INSERT INTO article SET img=:filename, userId = :user_id, title = :title,content = :content, createdAt = NOW()");
        $stmt->execute([$filename, $user['id'], $title, $content]);
        redirect('/?act=articles');
//        header('Location: /?act=articles');
//        die();
    }
}

require_once 'templates/add.php';