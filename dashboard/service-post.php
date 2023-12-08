<?php
session_start();
include('../config/db_connection.php');

if(isset($_POST['insert_service'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $icon = $_POST['icon'];

    if($title) {
        $_SESSION['title_value'] = $title;
    }else {
        $_SESSION['title_error'] = 'Title is required!';
        header('location: service.php');

    }

    if($description) {
        $_SESSION['description_value'] = $description;
    }else {
        $_SESSION['description_error'] = 'Description is required!';
        header('location: service.php');

    }

    if($icon) {
        $_SESSION['icon_value'] = $icon;
    }else {
        $_SESSION['icon_error'] = 'Icon is required!';
        header('location: service.php');

    }

    if($title && $description && $icon) {
        $select = "INSERT INTO service_list(title,description,icon) VALUES('$title','$description','$icon')";
        mysqli_query($db_connect, $select);
        header('location: service-list.php');
    }else {
        header('location: service.php');
    }
}
if(isset($_GET['delete_id'])) {
    $service_id = $_GET['delete_id'];
    $delete = "DELETE FROM service_list WHERE id='$service_id'";
    mysqli_query($db_connect, $delete);
    header('location: service-list.php');
}
if(isset($_POST['edit_service'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $icon = $_POST['icon'];
    $id = $_POST['service_id'];

    if($title && $description && $icon) {
        $select = "UPDATE service_list SET title='$title',description='$description',icon='$icon' WHERE id='$id'";
        mysqli_query($db_connect, $select);
        header('location: service-list.php');
    }else {
        header('location: service-edit.php');
    }
}
if(isset($_GET['change_status'])) {
    $status_id = $_GET['change_status'];
    $select_status = "SELECT * FROM service_list WHERE id='$status_id'";
    $connect = mysqli_query($db_connect, $select_status);
    $service = mysqli_fetch_assoc($connect);
    if($service['status'] == 'active') {
        $status_query = "UPDATE service_list SET status='deactive' WHERE id='$status_id'";
        mysqli_query($db_connect, $status_query);
        header('location: service-list.php');
    }else {
        $status_query = "UPDATE service_list SET status='active' WHERE id='$status_id'";
        mysqli_query($db_connect, $status_query);
        header('location: service-list.php');
    }
}












?>