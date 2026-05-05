<?php
/**
 * @var $mysqli
 */
$error = '';
if (count($_POST) > 0) {

    $login = $_POST['login'] ?? null;
    $password = $_POST['password'] ?? null;

    $result = $mysqli->query("SELECT * from user where email='" . $login . "'");

    $user = $result->fetch_assoc();
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['userId'] = $user['id'];
        header('Location: /?act=profile');
        die();
    } else {
        $error = 'user is not found';
    }
//    var_dump($user);
//    die();
//    $mysqli->query("INSERT INTO users (name, password) VALUES ('$name', '$password')");
}

require_once 'templates/login.php';