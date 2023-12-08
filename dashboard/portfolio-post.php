<?php
session_start();
include('../config/db_connection.php');

if(isset($_POST['insert_portfolio'])) {

    $title = $_POST['title'];
    $sub_title = $_POST['sub_title'];
    $description = $_POST['description'];


    if($title) {
        $_SESSION['title_value'] = $title;
    }else {
        
        $_SESSION['title_error'] =  "title is required!";
        header('location: portfolio.php');
    }


    if($sub_title) {
        $_SESSION['sub_title_value'] = $sub_title;
    }else {
        
        $_SESSION['sub_title_error'] =  "sub_title is required!";
        header('location: portfolio.php');
    }


    if($description) {
        $_SESSION['description_value'] = $description;
    }else {
        
        $_SESSION['description_error'] =  "description is required!";
        header('location: portfolio.php');
    }

    $image = $_FILES['image']['name'];
    $tmp_image = $_FILES['image']['tmp_name'];

    $explode = explode('.',$image);
    $extention = end($explode);
    $new_name = $title.'-'.date('s-i-h').'-'.date('d-m-Y').'.'.$extention;
    $file_path = "../images/portfolio/".$new_name;


    if($title && $sub_title  && $description && $image) {
        if(move_uploaded_file($tmp_image,$file_path)) {
            if($title && $sub_title  && $description && $image) {
                $insert_query = "INSERT INTO portfolios (title,sub_title,description,image) VALUES('$title','$sub_title','$description','$new_name')";
                $connect = mysqli_query($db_connect,$insert_query);
                header('location: portfolio-list.php');
            }
        }else {
            header('location: portfolio.php');
        }
    }else {
        $_SESSION['image_error'] = "Image is required!";
        header('location: ./portfolio.php');
    }
}


if(isset($_POST['edit_portfolio'])) {

    $id = $_POST['transport_id'];
    $title = $_POST['title'];
    $sub_title = $_POST['sub_title'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $tmp_image = $_FILES['image']['tmp_name'];
    $explode = explode('.',$image);
    $extension = end($explode);
    $new_name = $title.'-'.date('s-i-h').'-'.date('d-m-Y').'.'.$extension;
    $file_path = "../images/portfolio/".$new_name;

    if($title && $sub_title  && $description) {
        $update_query = "UPDATE portfolios SET title='$title',sub_title='$sub_title',description='$description' WHERE id='$id'";
        mysqli_query($db_connect, $update_query);
        header('location: portfolio-list.php');

    }

    $collect_image = "SELECT * FROM portfolios WHERE id='$id'";
    $conn = mysqli_query($db_connect,$collect_image);
    $single_value = mysqli_fetch_assoc($conn);
    $update_file_path = "../images/portfolio/".$single_value['image'];

    if($image) {
        if(move_uploaded_file($tmp_image,$file_path)) {
            unlink($update_file_path);
            $update_query = "UPDATE portfolios SET image='$new_name' WHERE id='$id'";
            mysqli_query($db_connect, $update_query);
            header('location: portfolio-list.php');
        }
    }else {
        $_SESSION['image_error'] = "Image is required!";
        header('location: ./portfolio-edit.php');
    }


}


if(isset($_GET['change_status'])) {
    $status_id = $_GET['change_status'];
    $select_status = "SELECT * FROM portfolios WHERE id='$status_id'";
    $connect_stat = mysqli_query($db_connect,$select_status);
    $portfolio = mysqli_fetch_assoc($connect_stat);
    if($portfolio['status'] == 'active') {
        $update_query = "UPDATE portfolios SET status='deactive' WHERE id='$status_id'";
        mysqli_query($db_connect, $update_query);
        header('location: portfolio-list.php');
    }else {
        $update_query = "UPDATE portfolios SET status='active' WHERE id='$status_id'";
        mysqli_query($db_connect, $update_query);
        header('location: portfolio-list.php');

    }
}


if(isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    $collect_image = "SELECT * FROM portfolios WHERE id='$delete_id'";
    $conn = mysqli_query($db_connect,$collect_image);
    $single_value = mysqli_fetch_assoc($conn);
    $update_file_path = "../images/portfolio/".$single_value['image'];

    unlink($update_file_path);


    $select_status = "DELETE FROM portfolios WHERE id='$delete_id'";
    $connect_del = mysqli_query($db_connect ,$select_status);
    header('location: portfolio-list.php');


}












?>










