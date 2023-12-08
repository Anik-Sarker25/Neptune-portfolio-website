<?php 
include('./extends/header.php');
include('../config/db_connection.php');
$select_brands = "SELECT * FROM brands";
$brands = mysqli_query($db_connect, $select_brands);
$single_brand = mysqli_fetch_assoc($brands);


$list_id = 0;


?>




<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Brand list</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="card-body">
        <table class="table">
        <thead>
            <tr class="table-dark">
            <th scope="col">#</th>
            <th scope="col">image</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if($single_brand) : ?>
            <?php foreach($brands as $brand) : ?>
            <tr>
            <th scope="row"><?= ++$list_id ?></th>
            <td><img style="width: 100px;" src="../images/brand/<?= $brand['image'] ?>" alt="image"></td>
            <td>
                <?php if($brand['status'] == 'active') : ?>
                <a href="brand-post.php?change_status=<?= $brand['id'] ?>" class="btn btn-success"><?= $brand['status'] ?></a>
                <?php else : ?>
                <a href="brand-post.php?change_status=<?= $brand['id'] ?>" class="btn btn-danger"><?= $brand['status'] ?></a>
                <?php endif; ?>
            </td>
            <td>
                <a href="brand-edit.php?edit_id=<?= $brand['id'] ?>" class="btn btn-success">Edit</a>
                <a href="brand-post.php?delete_id=<?= $brand['id'] ?>" class="btn btn-danger">Delete</a>
            </td>
            </tr>
            <?php endforeach; ?>
            <?php else : ?>
            <tr>
                <td colspan="6" class="text-danger text-center">DATA NOT FOUNT ?</td>
            </tr>
            <?php endif; ?>

        </tbody>
        </table>
    </div>
</div>





<?php include('./extends/footer.php') ?>