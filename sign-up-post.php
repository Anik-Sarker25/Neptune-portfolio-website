<?php
session_start();
include('./config/db_connection.php');

if(isset($_POST['sign_up'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $create_password = $_POST['create_password'];
    $confirm_password = $_POST['confirm_password'];

    if($name) {
        $_SESSION['name_value'] = $name;
    }else {
        $_SESSION['name_error'] = "The name field is required!";
        header('location: sign-up.php');
    }

    if($email) {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['email_value'] = $email;
        }else {
            $_SESSION['email_error'] = "Please enter a valid email address";
            header('location: sign-up.php');
        }
    }else {
        $_SESSION['email_error'] = "The email field is required!";
        header('location: sign-up.php');
    }

    if($create_password) {
        if(preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/',$create_password)) {
            $_SESSION['create_password_value'] = $create_password;
        }else {
            $_SESSION['create_password_error'] = "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
            header('location: sign-up.php');
        }
    }else {
        $_SESSION['create_password_error'] = "The create_password field is required!";
        header('location: sign-up.php');
    }

    if($confirm_password) {
        $_SESSION['confirm_password_value'] = $confirm_password;
    }else {
        $_SESSION['confirm_password_error'] = "The confirm_password field is required!";
        header('location: sign-up.php');
    }

    if($name && $email && $create_password) {
        if($create_password == $confirm_password) {
            $select_email = "SELECT COUNT(*) AS email_check FROM users WHERE email='$email'";
            $connect_email = mysqli_query($db_connect, $select_email);
            if(mysqli_fetch_assoc($connect_email)['email_check'] == 0) {
                $encrypt = sha1($create_password);
                $insert_data = "INSERT INTO users(name,email,password) VALUES('$name','$email','$encrypt')";
                mysqli_query($db_connect, $insert_data);

                $_SESSION['user_name'] = $name;
                $_SESSION['user_email'] = $email;
                $_SESSION['user_password'] = $create_password;
                
                $_SESSION['success_msg'] = "Registration successful";
                header('location: sign-in.php');
            }else {
                $_SESSION['email_error_msg'] = "This email already exist!";
                header('location: sign-up.php');
            }
        }else {
            $_SESSION['confirm_password_error'] = "The confirm_password dosen't match!";
            header('location: sign-up.php');
        }
    }else {
        header('location: sign-up.php');
    }
}

?>