<?php
/**
 * @var $mysqli
 */
$user = checkUser($mysqli);

$articleId = $_GET['id'] ?? null;
if(!$articleId){
    header('Location: /?act=articles');
    die();
}

//$articleRes = $mysqli->query("SELECT * from article where id='" . $articleId . "' AND userId='" . $user['id'] . "'");
//$article = $articleRes->fetch_assoc();
$article = getUserArticle($mysqli, $articleId, $user['id']);
//if(!$article){
//    header('Location: /?act=articles');
//    die();
//}
@unlink($_SERVER['DOCUMENT_ROOT'].'/images/'.$article['img']);
$resDelete = $mysqli->query("DELETE FROM article WHERE id = " . $articleId . " AND userId = '" . $user['id'] . "'");
if(!$resDelete){
    var_dump('delete = ', $resDelete);
    die();
}




header('Location: /?act=articles');