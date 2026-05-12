<?php
/**
 * @var $pdo
 */
if (count($_POST) > 0) {
//    var_dump('POST',$_POST);
//    exit;
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;
    $password2 = $_POST['password2'] ?? null;
    $password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO user SET email = :email, password = :password");
    $stmt->execute([$email, $password]);
    $stmt->fetch();

    redirect('/?act=login');
//    $mysqli->query("INSERT INTO users (name, password) VALUES ('$name', '$password')");
}

require_once 'templates/register.php';