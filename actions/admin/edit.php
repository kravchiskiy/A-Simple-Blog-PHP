<?php
/**
 * @var $pdo
 * @var $user array
 */
//$user = checkUser($pdo);

$articleId = $_GET['id'] ?? null;
if (!$articleId) {
//    header('Location: /?act=articles');
//    die();
    redirect('/admin');
}


if (count($_POST)) {
    $sql = '';
    $title = $_POST['title'] ?? null;
    $content = $_POST['content'] ?? null;
    $categoryId = (int)$_POST['categoryId'];
    $categoryId = $categoryId ?: null;
    $isPublished = $_POST['isPublished'] ?? 0;
//    var_dump($_POST);
//    exit();
    if ($_FILES['file']['size']) {
        $filename = upload();
        $sql = "img='" . $filename . "', ";
        $article = getUserArticle($pdo, $articleId, $user);
        @unlink($_SERVER['DOCUMENT_ROOT'] . '/images/' . $article['img']);
    }

    $stmt = $pdo->prepare("UPDATE article SET " . $sql . " title = :title, content = :content, categoryId=:categoryId, isPublished= :isPublished WHERE id = :articleId ");
    $stmt->execute([$title, $content, $categoryId, $isPublished, $articleId,]);
    redirect('/admin');

}

$articleCategory = $pdo->prepare("SELECT * from category ORDER BY name");
$articleCategory->execute();

$articleRes = $pdo->prepare("SELECT * from article where id=:articleId LIMIT 1");
$articleRes->execute([$articleId]);

$article = $articleRes->fetch();
if (!$article) {
//    header('Location: /?act=articles');
//    die();
    redirect('/admin');
}
require_once $_SERVER['DOCUMENT_ROOT'] . '/templates/admin/edit.php';