<?php
session_start();
include('../config/db_connection.php');

// Username update part start form here.
if(isset($_POST['name_update'])) {
    $user_name = $_POST['user_name'];
    if($user_name) {
        $_SESSION['name_value'] = $user_name;
        $this_id = $_SESSION['user_id'];
        $update_name = "UPDATE users SET name='$user_name' WHERE id='$this_id'";
        mysqli_query($db_connect, $update_name);
        $_SESSION['user_name'] = $user_name;
        $_SESSION['name_update_success'] = "Username updated successfully";
        header('location: profile.php');
    }else {
        $_SESSION['name_error'] = "Name field is required!";
        header('location: ./profile.php');
    }
}
// Username update part ends here.

// tagline update part start form here.
if(isset($_POST['update_tagline'])) {
    $tagline = $_POST['tagline'];
    if($tagline) {
        $_SESSION['tagline_value'] = $tagline;
        $this_id = $_SESSION['user_id'];
        $update_tagline = "UPDATE users SET tagline='$tagline' WHERE id='$this_id'";
        mysqli_query($db_connect, $update_tagline);
        $_SESSION['tagline_update_success'] = "Tagline updated successfully";
        header('location: ./profile.php');
    }else {
        $_SESSION['tagline_error'] = "Tagline is required!";
        header('location: ./profile.php');
    }
}
// tagline update part ends here.

// Password update part start form here.
if(isset($_POST['update_password'])) {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if($current_password) {
        $_SESSION['current_password_value'] = $current_password;
    }else {
        $_SESSION['current_password_error'] = "Current password is required!";
        header('location: ./profile.php');
    }

    if($new_password) {
        if(preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/',$new_password)) {
            if($current_password !== $new_password) {
                $_SESSION['new_password_value'] = $new_password;
            }else {
                $_SESSION['new_password_error'] = "The new password cannot be the same!";
                header('location: ./profile.php');
            }
        }else {
            $_SESSION['new_password_error'] = "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
            header('location: ./profile.php');
        }
    }else {
        $_SESSION['new_password_error'] = "New password is required!";
        header('location: ./profile.php');
    }

    if($confirm_password) {
        if($new_password == $confirm_password) {
            $_SESSION['confirm_password_value'] = $confirm_password;
        }else {
            $_SESSION['confirm_password_error'] = "Confirm password dosen't match!";
            header('location: ./profile.php');
        }
    }else {
        $_SESSION['confirm_password_error'] = "Confirm password is required!";
        header('location: ./profile.php');
    }
    if($current_password && $new_password && $confirm_password) {
        $this_id = $_SESSION['user_id'];
        $encrypt = sha1($current_password);
        $grab_password = "SELECT COUNT(*) AS password_check FROM users WHERE password='$encrypt' AND id='$this_id'";
        $connect_password = mysqli_query($db_connect, $grab_password);
        if(mysqli_fetch_assoc($connect_password)['password_check'] == 1) {
            $new_encrypt = sha1($new_password);
            $update_password = "UPDATE users SET password='$new_encrypt' WHERE id='$this_id'";
            mysqli_query($db_connect, $update_password);
            $_SESSION['password_update_success'] = "Password updated successfully";
            header('location: ./profile.php');
        }else {
            $_SESSION['current_password_error'] = "This password is not correct!";
            header('location: ./profile.php');
        }
    }else {
        header('location: ./profile.php');
    }
}
// password update part ends here.

// image update part start form here.
if(isset($_POST['update_image'])) {
    $image = $_FILES['image']['name'];
    $tmp_image = $_FILES['image']['tmp_name'];
    $explode = explode('.',$image);
    $extension = end($explode);
    $name = $_SESSION['user_name'];
    $new_name = $name."-".date('s-i-h')."_".date('d-m-Y').".".$extension;
    $file_path = "../images/profile/".$new_name;
    $define_extension = array(
        'jpeg',
        'jpg',
        'png',
        'gif',
        'tiff'
    );
    $user_image = $_SESSION['user_image'];
    $unlink_path = "../images/profile/".$user_image;
    if($image) {
        if(in_array($extension, $define_extension)) {
            if(move_uploaded_file($tmp_image, $file_path)) {
                unlink($unlink_path);
                $this_id = $_SESSION['user_id'];
                $update_image = "UPDATE users SET image='$new_name' WHERE id='$this_id'";
                mysqli_query($db_connect, $update_image);
                $_SESSION['user_image'] = $new_name;

                $_SESSION['image_update_success'] = "Image updated successfully";
                header('location: ./profile.php');
            }else {
                $_SESSION['image_error'] = "File upload failed!";
                header('location: ./profile.php');
            }
        }else {
            $_SESSION['image_error'] = "image file extension should be jpeg, jpg, png, gif, tiff!";
            header('location: ./profile.php');
        }
    }else {
        $_SESSION['image_error'] = "Image is required!";
        header('location: ./profile.php');
    }
}
// image update part ends here.

?>