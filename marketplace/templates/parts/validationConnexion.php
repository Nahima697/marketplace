<?php
include('../../utils/functions.php');
session_start();
$pdo = connectDB();


if (isset($_GET["login"])) {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = findByEmailAndPassword($pdo, $email, $password);
        if ($user['user_id']) {
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['password'] = $_POST['password'];
            $_SESSION['userId'] = $user['user_id'];
            $_SESSION['userName'] = $user['name'];
            header("Location: userprivateprofil.php?id=".$user['user_id']);
            exit();
        } else {
            header('Location: connection.php?error=0');
            exit();
        }
    } else {
        header('Location: connection.php?error=1');
        exit();
    }
} else if (isset($_GET["logout"])) {
    session_destroy();
    header("Location: http://localhost/marketplace/index.php");
    exit();
}
?>



