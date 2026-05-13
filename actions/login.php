<?php
/**
 * @var $pdo
 */
$error = '';
if (count($_POST) > 0) {

    $login = $_POST['login'] ?? null;
    $password = $_POST['password'] ?? null;

    $result = $pdo->prepare("SELECT * from user where email= :email");
    $result->execute([$login]);
    $user = $result->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['userId'] = $user['id'];
//        header('Location: /?act=profile');
//        die();
        if($user['isAdmin']==1){
            redirect('/admin');
        }else{
            redirect('/?act=articles');
        }

    } else {
        $error = 'user is not found';
    }
//    var_dump($user);
//    die();
//    $mysqli->query("INSERT INTO users (name, password) VALUES ('$name', '$password')");
}

require_once 'templates/login.php';