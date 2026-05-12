<?php
/**
 * @var $pdo
 */
$user = checkUser($pdo);

$articleId = $_GET['id'] ?? null;
if (!$articleId) {
//    header('Location: /?act=articles');
//    die();
    redirect('/?act=articles');
}


if (count($_POST)) {
    $sql = '';
    $title = $_POST['title'] ?? null;
    $content = $_POST['content'] ?? null;

    if ($_FILES['file']['size']) {
        $filename = upload();
        $sql = "img='" . $filename . "', ";
        $article = getUserArticle($pdo, $articleId, $user);
        @unlink($_SERVER['DOCUMENT_ROOT'] . '/images/' . $article['img']);
    }
    if($user['isAdmin']===1){
        $stmt = $pdo->prepare("UPDATE article SET ".$sql." title = :title, content = :content WHERE id = :articleId ");
        $stmt->execute([$title, $content, $articleId]);
        redirect('/?act=adminArticles');
    }else{
        $stmt = $pdo->prepare("UPDATE article SET ".$sql." title = :title, content = :content WHERE id = :articleId AND userId = :user_id ");
        $stmt->execute([$title, $content, $articleId, $user['id']]);
//        $stmt->fetch();
        redirect('/?act=articles');
    }

//    $stmt->fetch();
//    var_dump($mysqli->query("UPDATE article SET ".$sql.", userId = '" . $user['id'] . "', title = '" . $title . "',content = '" . $content . "' WHERE id = '" . $articleId . "' AND userId = '" . $user['id'] . "'"));

//    header('Location: /?act=articles');
//    die();

}

if($user['isAdmin']){
    $articleRes = $pdo->prepare("SELECT * from article where id=:articleId LIMIT 1");
    $articleRes->execute([$articleId]);
}else{
    $articleRes = $pdo->prepare("SELECT * from article where id=:articleId AND userId = :user_id LIMIT 1");
    $articleRes->execute([$articleId, $user['id']]);
}

$article = $articleRes->fetch();
if (!$article) {
//    header('Location: /?act=articles');
//    die();
    redirect('/?act=articles');
}
require_once 'templates/edit.php';