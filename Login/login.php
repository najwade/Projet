<?php
session_start();
include_once('../BD/connection.php');

if (isset($_POST['login'])) {

    $username = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM `users` WHERE `email`='$username' AND `password`='$password'";
    $result = mysqli_query($conn, $sql);

    if (empty($_POST['email']) || empty($_POST['password'])) {
        $_SESSION['error'] = "Veuillez remplir à la fois le nom d'utilisateur et le mot de passe.";
    } else {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $name = $row['name'];
            $username = $row['email'];
            $password = $row['password'];
            $role = $row['role'];

            $_SESSION['name'] = $name;
            $_SESSION['email'] = $username;
            $_SESSION['password'] = $password;

            if ($role == 'admin') {
                header('location:../admin/admin.php');
                exit;
            } elseif ($role == 'user') {
                header('location:../user.php');
                exit;
            } else {
                $_SESSION['error'] = "utilisateur non valide.";
            }
        } else {
            $_SESSION['error'] = "Nom d'utilisateur ou mot de passe invalide.";
        }
    }

    header('location:../index.php');
    exit;
}
?>
