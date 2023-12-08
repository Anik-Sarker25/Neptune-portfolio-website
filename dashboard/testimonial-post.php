<?php
session_start();
include('../config/db_connection.php');

if(isset($_POST['insert_testimonial'])) {

    $name = $_POST['name'];
    $post = $_POST['post'];
    $message = $_POST['message'];


    if($name) {
        $_SESSION['name_value'] = $name;
    }else {
        
        $_SESSION['name_error'] =  "Name is required!";
        header('location: ./testimonial.php');
    }


    if($post) {
        $_SESSION['post_value'] = $post;
    }else {
        
        $_SESSION['post_error'] =  "Post is required!";
        header('location: ./testimonial.php');
    }


    if($message) {
        $_SESSION['message_value'] = $message;
    }else {
        
        $_SESSION['message_error'] =  "Message is required!";
        header('location: ./testimonial.php');
    }

    $image = $_FILES['user_image']['name'];
    $tmp_image = $_FILES['user_image']['tmp_name'];

    $explode = explode('.',$image);
    $extension = end($explode);
    $new_name = $name.'-'.date('s-i-h').'-'.date('d-m-Y').'.'.$extension;
    $file_path = "../images/testimonial/".$new_name;
    $define_extension = array(
        'jpeg',
        'jpg',
        'png',
        'gif',
        'tiff'
    );
    if($name && $post  && $message && $image) {
        if(in_array($extension, $define_extension)) {
            if(move_uploaded_file($tmp_image,$file_path)) {
                if($name && $post  && $message && $image) {
                    $insert_query = "INSERT INTO testimonials (name,post,message,image) VALUES('$name','$post','$message','$new_name')";
                    $connect = mysqli_query($db_connect,$insert_query);
                    header('location: testimonial-list.php');
                }
            }else {
                header('location: testimonial.php');
            }
        }else {
            $_SESSION['image_error'] = "image file extension should be jpeg, jpg, png, gif, tiff!";
            header('location: ./testimonial.php');
        }

    }else {
        $_SESSION['image_error'] = "Image is required!";
        header('location: ./testimonial.php');

    }


}


if(isset($_POST['edit_testimonial'])) {

    $id = $_POST['transport_id'];
    $edit_name = $_POST['edit_name'];
    $edit_post = $_POST['edit_post'];
    $edit_message = $_POST['edit_message'];
    $image = $_FILES['edit_user_image']['name'];
    $tmp_image = $_FILES['edit_user_image']['tmp_name'];
    $explode = explode('.',$image);
    $extension = end($explode);
    $new_name = $title.'-'.date('s-i-h').'-'.date('d-m-Y').'.'.$extension;
    $file_path = "../images/testimonial/".$new_name;

    if($edit_name && $edit_post  && $edit_message) {
        $update_query = "UPDATE testimonials SET name='$edit_name',post='$edit_post',message='$edit_message' WHERE id='$id'";
        mysqli_query($db_connect, $update_query);
        header('location: testimonial-list.php');

    }

    $collect_image = "SELECT * FROM testimonials WHERE id='$id'";
    $conn = mysqli_query($db_connect,$collect_image);
    $single_value = mysqli_fetch_assoc($conn);
    $update_file_path = "../images/testimonial/".$single_value['image'];

    if($edit_name && $edit_post  && $edit_message && $image) {
        if(move_uploaded_file($tmp_image,$file_path)) {
            unlink($update_file_path);
            $update_query = "UPDATE testimonials SET image='$new_name' WHERE id='$id'";
            mysqli_query($db_connect, $update_query);
            header('location: testimonial-list.php');
        }
    }


}


if(isset($_GET['change_status'])) {
    $status_id = $_GET['change_status'];
    $select_status = "SELECT * FROM testimonials WHERE id='$status_id'";
    $connect_stat = mysqli_query($db_connect,$select_status);
    $testimonial = mysqli_fetch_assoc($connect_stat);
    if($testimonial['status'] == 'active') {
        $update_query = "UPDATE testimonials SET status='deactive' WHERE id='$status_id'";
        mysqli_query($db_connect, $update_query);
        header('location: testimonial-list.php');
    }else {
        $update_query = "UPDATE testimonials SET status='active' WHERE id='$status_id'";
        mysqli_query($db_connect, $update_query);
        header('location: testimonial-list.php');

    }
}


if(isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    $collect_image = "SELECT * FROM testimonials WHERE id='$delete_id'";
    $conn = mysqli_query($db_connect,$collect_image);
    $single_value = mysqli_fetch_assoc($conn);
    $update_file_path = "../images/testimonial/".$single_value['image'];

    unlink($update_file_path);


    $select_status = "DELETE FROM testimonials WHERE id='$delete_id'";
    $connect_del = mysqli_query($db_connect ,$select_status);
    header('location: testimonial-list.php');


}












?>










