<?php
/**
 * @var $pdo
 */
//$user = checkUser($pdo);

$articleId = (int)$_GET['id'] ?? null;
$articleRes = $pdo->prepare("SELECT * from article where id=:articleId");
$articleRes->execute([$articleId]);
$article = $articleRes->fetch();

$articleComment = $pdo->prepare("SELECT c.*, u.* from comment c LEFT JOIN user u ON u.Id = c.userId where c.articleId= ? AND c.isActive=1");
$articleComment->execute([$articleId]);
//$comments = $articleComment->fetch();


if(count($_POST)){
    $comment = $_POST['comment'];
    $user = getUser($pdo);
    $userId = $user['id'] ?? null;
    $isActive = $userId ? 1 : 0;
    $stmt = $pdo->prepare("INSERT INTO comment SET userId=?, articleId = ?, content = ?, isActive = ?, createdAt = NOW() ");

    $stmt->execute([$userId, $articleId, $comment, $isActive]);
//    var_dump($comment);
//    var_dump($user);
//    exit;
    redirect("/?act=view&id=".$articleId);
}
require_once 'templates/view.php';