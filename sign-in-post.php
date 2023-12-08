<?php
session_start();
include('./config/db_connection.php');

if(isset($_POST['login'])) {
    $login_email = $_POST['login_email'];
    $login_password = $_POST['login_password'];

    if($login_email) {
        $_SESSION['login_email_value'] = $login_email;
    }else {
        $_SESSION['login_email_error'] = "Email address is required!";
        header('location: sign-in.php');
    }
    if($login_password) {
        $_SESSION['login_password_value'] = $login_password;
    }else {
        $_SESSION['login_password_error'] = "Password is required!";
        header('location: sign-in.php');
    }
    if($login_email && $login_password) {
        $encrypted = sha1($login_password);
        $select_data = "SELECT COUNT(*) AS data_check FROM users WHERE email='$login_email' AND password='$encrypted'";
        $connect_data = mysqli_query($db_connect, $select_data);
        if(mysqli_fetch_assoc($connect_data)['data_check'] == 1) {
                $select_user = "SELECT * FROM users WHERE email='$login_email'";
                $connect_user = mysqli_query($db_connect, $select_user);
                $user = mysqli_fetch_assoc($connect_user);
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_image'] = $user['image'];

            $_SESSION['login_success'] = "Welcome to the dashboard";
            header('location: ./dashboard/admin.php');
        }else {
            $_SESSION['login_failed'] = "Incorrect email or password!";
            header('location: sign-in.php');
        }
    }else {
        header('location: sign-in.php');
    }
}

?>