<?php 

include('./extends/header.php');
include('../config/db_connection.php');
$select_introduction = "SELECT * FROM `introduction`";
$connect_introduction = mysqli_query($db_connect, $select_introduction);
$single_introduction_details = mysqli_fetch_assoc($connect_introduction);

$select_education = "SELECT * FROM `education`";
$connect_education = mysqli_query($db_connect, $select_education);
$single_education_details = mysqli_fetch_assoc($connect_education);


$introduction_serial = 0;
$education_serial = 0;
?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Introduction list</h1>
        </div>
    </div>
</div>

<?php if(isset($_SESSION['intro_update_success'])) : ?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="alert alert-custom" role="alert">
                <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                <div class="alert-content">
                    <span class="alert-title">Welcome,</span>
                    <span class="alert-text"><?= $_SESSION['intro_update_success'] ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['intro_update_success']); ?>

<!-- introduction section starts form here -->
<div class="row">
    <div class="card">
        <div class="card-body">
            <table class="table caption-top">
                <caption class="fw-bold mb-4">List of Introduction Details</caption>
                <thead>
                    <tr class="table-dark">
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($single_introduction_details) : ?>
                        <?php foreach($connect_introduction as $introduction) : ?>
                        <tr>
                            <th scope="row"><?= ++$introduction_serial ?></th>
                            <td><?= $introduction['title'] ?></td>
                            <td>
                                <textarea name="" class="bg-white" id="" cols="30" disabled  rows="2"><?= $introduction['description'] ?></textarea>
                            </td>
                            <td>
                                <?php if($introduction['status'] == 'active') : ?>
                                <a href="introduction-post.php?change_status=<?= $introduction['id'] ?>" class="btn btn-success"><?= $introduction['status'] ?></a>
                                <?php else : ?>
                                <a href="introduction-post.php?change_status=<?= $introduction['id'] ?>" class="btn btn-danger"><?= $introduction['status'] ?></a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="introduction-edit.php?edit_id=<?= $introduction['id'] ?>" class="btn btn-success">Edit</a>
                                <a href="introduction-post.php?delete_id=<?= $introduction['id'] ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="5" class="text-center text-danger">DATA NOT FOUND!</td>
                        </tr>
                    <?php endif; ?>    
                </tbody>
            </table>
        </div>
    </div>
</div>



<!-- introduction section ends form here -->

<?php if(isset($_SESSION['education_update_success'])) : ?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="alert alert-custom" role="alert">
                <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                <div class="alert-content">
                    <span class="alert-title">Welcome,</span>
                    <span class="alert-text"><?= $_SESSION['education_update_success'] ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['education_update_success']); ?>
<!-- education section starts form here -->
<div class="row">
    <div class="card">
        <div class="card-body">
            <table class="table caption-top">
                <caption class="fw-bold mb-4">List of Education Details</caption>
                <thead>
                    <tr class="table-dark">
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Year</th>
                    <th scope="col">%</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($single_education_details) : ?>
                        <?php foreach($connect_education as $education) : ?>
                        <tr>
                            <th scope="row"><?= ++$education_serial ?></th>
                            <td>
                                <textarea name="" id="" class="bg-white" disabled cols="30" rows="2"><?= $education['title'] ?></textarea>
                            </td>
                            <td><?= $education['year'] ?></td>
                            <td><?= $education['value'] ?></td>
                            <td>
                            <?php if($education['status'] == 'active') : ?>
                                <a href="introduction-post.php?change_status=<?= $education['id'] ?>" class="btn btn-success"><?= $education['status'] ?></a>
                                <?php else : ?>
                                    <a href="introduction-post.php?change_status=<?= $education['id'] ?>" class="btn btn-danger"><?= $education['status'] ?></a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="introduction-edu-edit.php?edit_id=<?= $education['id'] ?>" class="btn btn-success">Edit</a>
                                <a href="introduction-post.php?delete_id=<?= $education['id'] ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="5" class="text-center text-danger">DATA NOT FOUND!</td>
                        </tr>
                    <?php endif; ?>    
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- education section ends form here -->
                    
<?php include('./extends/footer.php') ?>