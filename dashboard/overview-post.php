<?php
session_start();
include('../config/db_connection.php');

if(isset($_POST['insert_overview'])) {
    $title = $_POST['title'];
    $number = $_POST['number'];
    $icon = $_POST['icon'];

    if($title) {
        $_SESSION['title_value'] = $title;
    }else {
        $_SESSION['title_error'] = 'Title is required!';
        header('location: ./overview.php');

    }

    if($number) {
        $_SESSION['number_value'] = $number;
    }else {
        $_SESSION['number_error'] = 'Number is required!';
        header('location: ./overview.php');

    }

    if($icon) {
        $_SESSION['icon_value'] = $icon;
    }else {
        $_SESSION['icon_error'] = 'Icon is required!';
        header('location: ./overview.php');

    }

    if($title && $number && $icon) {
        $select = "INSERT INTO overview_list(title,number,icon) VALUES('$title','$number','$icon')";
        mysqli_query($db_connect, $select);
        header('location: ./overview-list.php');
    }else {
        header('location: ./overview.php');
    }
}
if(isset($_GET['delete_id'])) {
    $service_id = $_GET['delete_id'];
    $delete = "DELETE FROM overview_list WHERE id='$service_id'";
    mysqli_query($db_connect, $delete);
    header('location: overview-list.php');
}
if(isset($_POST['edit_overview'])) {
    $edit_title = $_POST['edit_title'];
    $edit_number = $_POST['edit_number'];
    $edit_icon = $_POST['edit_icon'];
    $id = $_POST['overview_id'];

    if($edit_title && $edit_number && $edit_icon) {
        $select = "UPDATE overview_list SET title='$edit_title',number='$edit_number',icon='$edit_icon' WHERE id='$id'";
        mysqli_query($db_connect, $select);
        header('location: overview-list.php');
    }else {
        header('location: overview-edit.php');
    }
}
if(isset($_GET['change_status'])) {
    $status_id = $_GET['change_status'];
    $select_status = "SELECT * FROM overview_list WHERE id='$status_id'";
    $connect = mysqli_query($db_connect, $select_status);
    $overview = mysqli_fetch_assoc($connect);
    if($overview['status'] == 'active') {
        $status_query = "UPDATE overview_list SET status='deactive' WHERE id='$status_id'";
        mysqli_query($db_connect, $status_query);
        header('location: overview-list.php');
    }else {
        $status_query = "UPDATE overview_list SET status='active' WHERE id='$status_id'";
        mysqli_query($db_connect, $status_query);
        header('location: overview-list.php');
    }
}












?>