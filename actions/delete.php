<?php
/**
 * @var $pdo
 */
$user = checkUser($pdo);

$articleId = $_GET['id'] ?? null;
if(!$articleId){
    redirect('/?act=articles');
//    header('Location: /?act=articles');
//    die();
}

//$articleRes = $mysqli->query("SELECT * from article where id='" . $articleId . "' AND userId='" . $user['id'] . "'");
//$article = $articleRes->fetch_assoc();
$article = getUserArticle($pdo, $articleId, $user);
//if(!$article){
//    header('Location: /?act=articles');
//    die();
//}
@unlink($_SERVER['DOCUMENT_ROOT'].'/images/'.$article['img']);
if($user['isAdmin']===1){
    $stmt = $pdo->prepare("DELETE FROM article WHERE id = :articleId ");
    $stmt->execute([$articleId]);
    redirect('/?act=adminArticles');
}else{
    $stmt = $pdo->prepare("DELETE FROM article WHERE id = :articleId AND userId = :user_id");
    $stmt->execute([$articleId,$user['id']]);
//    $resDelete = $stmt->fetch();
    redirect('/?act=articles');
}


if(!$resDelete){
    var_dump('delete = ', $resDelete);
    die();
}




//header('Location: /?act=articles');
//redirect('/?act=articles');