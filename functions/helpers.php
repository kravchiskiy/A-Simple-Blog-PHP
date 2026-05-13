<?php
function redirect(string $uri): void
{
    header('Location: ' . $uri);
    die();
}

function checkUser($pdo): array
{

    if (empty($_SESSION['userId'])) {
        header('Location: /?act=login');
        die();
    }
    $userId = (int)$_SESSION['userId'];
    $result = $pdo->prepare("SELECT * from user where id=:user_id LIMIT 1");
    $result->execute([$userId]);
    $user = $result->fetch();

    if (!$user) {
        header('Location: /?act=login');
        die();
    }
    return $user;
}
function getUser($pdo): array
{

//    if (empty($_SESSION['userId'])) {
//        header('Location: /?act=login');
//        die();
//    }

    $userId = (int)($_SESSION['userId'] ?? null);
    if(!$userId){
        return [];
    }
    $result = $pdo->prepare("SELECT * from user where id=:user_id LIMIT 1");
    $result->execute([$userId]);
    $user = $result->fetch();

    if (!$user) {
        return [];
    }
    return $user;
}
function checkAdminUser($pdo): array
{
    $user = checkuser($pdo);
    if($user['isAdmin'] != 1){
        redirect('/?act=login');
    }
    return $user;
}
function getUserArticle($pdo, int $articleId, array $user): array
{
    if($user['isAdmin']===1){
        $articleRes = $pdo->prepare("SELECT * from article where id=:article_id ");
        $articleRes->execute([$articleId]);
    } else{
        $articleRes = $pdo->prepare("SELECT * from article where id=:article_id AND userId=:user_id");
        $articleRes->execute([$articleId, $user['id']]);
    }

    $article = $articleRes->fetch();
    if (!$article) {
        header('Location: /?act=articles');
        die();
    }
    return $article;
}

function upload(): string
{
    $img = $_FILES['file']['tmp_name'];
    $size_img = getimagesize($img);
    $width = $size_img[0];
    $height = $size_img[1];
    $mime = $size_img['mime'];
    switch ($size_img['mime']) {
        case 'image/jpeg':
            $src = imagecreatefromjpeg($img);
            $ext = 'jpg';
            break;
        case 'image/png':
            $src = imagecreatefrompng($img);
            $ext = 'png';
            break;
        case 'image/gif':
            $src = imagecreatefromgif($img);
            $ext = 'gif';
            break;
        default:
            $fname = false;
            return false;
    }
    $wNew = 348;
    $hNew = floor($height / ($width / $wNew));
    $dest = imagecreatetruecolor($wNew, $hNew);

    imagecopyresampled($dest, $src, 0, 0, 0, 0, $wNew, $hNew, $width, $height);
//    imagecopy($dest, $src, 0, 0, 0, 0, $width, $height);
    $filename = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME) . "-" . time() . "." . $ext;
    $fullFilename = $_SERVER['DOCUMENT_ROOT'] . "/images/" . $filename;
//    var_dump($filename);

    switch ($mime) {
        case 'image/jpeg':
            imagejpeg($dest, $fullFilename, 100);
            break;
        case 'image/png':
            imagepng($dest, $fullFilename, 9);
            break;
        case 'image/gif':
            imagegif($dest, $fullFilename);
            break;
    }
    return $filename;
}