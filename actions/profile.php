<?php
/**
 * @var $pdo
 */
$user = checkUser($pdo);


if(count($_POST)){
    $name = $_POST['name'] ?? null;
    $surname = $_POST['surname'] ?? null;
    $about = $_POST['about'] ?? null;
    $phone = $_POST['phone'] ?? null;
//    var_dump($_POST);
//    die();

//    $stmt = $pdo->prepare("UPDATE user SET name = '".$name."',surname = '".$surname."', phone ='".$phone."', about='".$about."' WHERE id='" . $user['id'] . "'");
    $stmt = $pdo->prepare("UPDATE user SET name = :name,surname = :surname, phone =:phone, about=:about WHERE id= :user_id");
    $stmt->execute([$name,$surname,$phone,$about, $user['id']]);
    $stmt->fetch();
//    header('Location: /?act=profile');
//    die();
    redirect('/?act=profile');
}
require_once 'templates/profile.php';