<?php 

session_start();
include('../config/db_connection.php');


// insert section starts form here
if(isset($_POST['insert_intro'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    if($title) {
        $_SESSION['title_value'] = $title;
    }else {
        $_SESSION['title_error'] = "Title is required!";
        header('location: ./introduction.php');
    }

    if($description) {
        $_SESSION['description_value'] = $description;
    }else {
        $_SESSION['description_error'] = "Description is required!";
        header('location: ./introduction.php');
    }

    if($title && $description) {

        $insert_intro = "INSERT INTO introduction(title,description) VALUES('$title','$description')";
        mysqli_query($db_connect, $insert_intro);

        $_SESSION['intro_update_success'] = "Title and description inserted successfully";
        header('location: ./introduction-list.php');
        
    }
}

if(isset($_POST['insert_education'])) {

    $edu_title = $_POST['edu_title'];
    $year = $_POST['year'];
    $value = $_POST['value'];
    if($edu_title) {
        $_SESSION['edu_title_value'] = $edu_title;
    }else {
        $_SESSION['edu_title_error'] = "Title is required!";
        header('location: ./introduction.php');
    }

    if($year) {
        $_SESSION['year_value'] = $year;
    }else {
        $_SESSION['year_error'] = "Please select an year!";
        header('location: ./introduction.php');
    }

    if($value) {
        $_SESSION['value_value'] = $value;
    }else {
        $_SESSION['value_error'] = "Please select a value!";
        header('location: ./introduction.php');
    }
    if($edu_title && $year && $value) {
        $insert_education = "INSERT INTO education(title,year,value) VALUES('$edu_title','$year','$value')";
        mysqli_query($db_connect, $insert_education);

        $_SESSION['education_update_success'] = "Education details inserted successfully";
        header('location: ./introduction-list.php');
    }

}

// insert section ends form here.

// status section starts form here.

if(isset($_GET['change_status'])) {
    $status_id = $_GET['change_status'];
    $select_stat = "SELECT * FROM introduction WHERE id='$status_id'";
    $connect_stat = mysqli_query($db_connect, $select_stat);
    $introduction = mysqli_fetch_assoc($connect_stat);
    if($introduction['status'] == 'active') {
        $update  = "UPDATE introduction SET status='deactive' WHERE id='$status_id'";
        mysqli_query($db_connect, $update);
        header('location: ./introduction-list.php');
    }else {
        $update  = "UPDATE introduction SET status='active' WHERE id='$status_id'";
        mysqli_query($db_connect, $update);
        header('location: ./introduction-list.php');

    }

}

if(isset($_GET['change_status'])) {
    $status_id = $_GET['change_status'];
    $select_stat = "SELECT * FROM education WHERE id='$status_id'";
    $connect_stat = mysqli_query($db_connect, $select_stat);
    $education = mysqli_fetch_assoc($connect_stat);
    if($education['status'] == 'active') {
        $update  = "UPDATE education SET status='deactive' WHERE id='$status_id'";
        mysqli_query($db_connect, $update);
        header('location: ./introduction-list.php');
    }else {
        $update  = "UPDATE education SET status='active' WHERE id='$status_id'";
        mysqli_query($db_connect, $update);
        header('location: ./introduction-list.php');

    }

}



// status section ends form here.
// edit section starts form here.
if(isset($_POST['edit_intro'])) {
    $edit_title = $_POST['edit_title'];
    $edit_description = $_POST['edit_description'];
    $up_id = $_POST['service_id'];
    // if($edit_title) {
    //     $_SESSION['edit_title_value'] = $edit_title;
    // }else {
    //     $_SESSION['edit_title_error'] = "Title is required!";
    //     header('location: ./introduction-edit.php');
    // }
    // if($edit_description) {
    //     $_SESSION['edit_description_value'] = $edit_description;
    // }else {
    //     $_SESSION['edit_description_error'] = "Description is required!";
    //     header('location: ./introduction-edit.php');
    // }
    if($edit_title && $edit_description) {
        $update_intro = "UPDATE `introduction` SET `title`='$edit_title',`description`='$edit_description' WHERE id='$up_id'";
        mysqli_query($db_connect, $update_intro);
        header('location: ./introduction-list.php');
    }else {
        header('location: ./introduction-edit.php');
    }

}


if(isset($_POST['edit_education'])) {
    $edit_edu_title = $_POST['edit_edu_title'];
    $edit_year = $_POST['edit_year'];
    $edit_value = $_POST['edit_value'];
    $up_id = $_POST['service_id'];
    // if($edit_edu_title) {
    //     $_SESSION['edit_edu_title_value'] = $edit_edu_title;
    // }else {
    //     $_SESSION['edit_edu_title_error'] = "Title is required!";
    //     header('location: ./introduction-edu-edit.php');
    // }
    // if($edit_year) {
    //     $_SESSION['edit_year_value'] = $edit_year;
    // }else {
    //     $_SESSION['edit_year_error'] = "Year is required!";
    //     header('location: ./introduction-edu-edit.php');
    // }
    // if($edit_value) {
    //     $_SESSION['edit_value_value'] = $edit_value;
    // }else {
    //     $_SESSION['edit_value_error'] = "Value is required!";
    //     header('location: ./introduction-edu-edit.php');
    // }
    if($edit_edu_title && $edit_year && $edit_value) {
        $update_edu = "UPDATE `education` SET `title`='$edit_edu_title',`year`='$edit_year',value='$edit_value' WHERE id='$up_id'";
        mysqli_query($db_connect, $update_edu);
        header('location: ./introduction-list.php');
    }else {
        header('location: ./introduction-edu-edit.php');
    }

}
// edit section ends form here.


// delete section starts form here.

if(isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_query = "DELETE FROM `introduction` WHERE id='$delete_id'";
    mysqli_query($db_connect, $delete_query);
    header('location: ./introduction-list.php');
}
if(isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_query = "DELETE FROM `education` WHERE id='$delete_id'";
    mysqli_query($db_connect, $delete_query);
    header('location: ./introduction-list.php');
}
// delete section ends form here.











?>