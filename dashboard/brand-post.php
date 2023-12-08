<?php 

session_start();

include('../config/db_connection.php');

if(isset($_POST['insert_brand'])) {
    $image = $_FILES['image']['name'];
    $tmp_image = $_FILES['image']['tmp_name'];

    $explode = explode('.',$image);
    $extension = end($explode);
    $new_name = date('s-i-h').'-'.date('d-m-Y').'.'.$extension;
    $file_path = "../images/brand/".$new_name;


    if($image) {
        if(move_uploaded_file($tmp_image,$file_path)) {
                $insert_query = "INSERT INTO brands (image) VALUES('$new_name')";
                $connect = mysqli_query($db_connect,$insert_query);
                header('location: brand-list.php');
        }else {
            $_SESSION['image_error'] = "Maybe filepath is broken!";
            header('location: ./brand.php');
        }
    }else {
        $_SESSION['image_error'] = "Image is required!";
        header('location: ./brand.php');
    }
}
 
if(isset($_POST['edit_brand'])) {

    $id = $_POST['transport_id'];
    $image = $_FILES['edit_image']['name'];
    $tmp_image = $_FILES['edit_image']['tmp_name'];
    $explode = explode('.',$image);
    $extension = end($explode);
    $new_name = date('s-i-h').'-'.date('d-m-Y').'.'.$extension;
    $file_path = "../images/brand/".$new_name;

    $collect_image = "SELECT * FROM brands WHERE id='$id'";
    $conn = mysqli_query($db_connect,$collect_image);
    $single_value = mysqli_fetch_assoc($conn);
    $update_file_path = "../images/brand/".$single_value['image'];

    if($image) {
        if(move_uploaded_file($tmp_image,$file_path)) {
            unlink($update_file_path);
            $update_query = "UPDATE brands SET image='$new_name' WHERE id='$id'";
            mysqli_query($db_connect, $update_query);
            header('location: brand-list.php');
        }
    }else {
        $_SESSION['image_error'] = "Image is required!";
        header('location: ./brand-edit.php');
    }


}



if(isset($_GET['change_status'])) {
    $status_id = $_GET['change_status'];
    $select_status = "SELECT * FROM brands WHERE id='$status_id'";
    $connect_stat = mysqli_query($db_connect,$select_status);
    $portfolio = mysqli_fetch_assoc($connect_stat);
    if($portfolio['status'] == 'active') {
        $update_query = "UPDATE brands SET status='deactive' WHERE id='$status_id'";
        mysqli_query($db_connect, $update_query);
        header('location: brand-list.php');
    }else {
        $update_query = "UPDATE brands SET status='active' WHERE id='$status_id'";
        mysqli_query($db_connect, $update_query);
        header('location: brand-list.php');

    }
}


if(isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    $brand_image = "SELECT * FROM brands WHERE id='$delete_id'";
    $connect = mysqli_query($db_connect, $brand_image);
    $single_brand = mysqli_fetch_assoc($connect);
    $update_file_path = "../images/brand/".$single_brand['image'];

    unlink($update_file_path);


    $delete_image = "DELETE FROM brands WHERE id='$delete_id'";
    $connect_del = mysqli_query($db_connect ,$delete_image);
    header('location: brand-list.php');

}


?>