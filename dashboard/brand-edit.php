<?php 
include('./extends/header.php');

include('../config/db_connection.php');
$this_id = $_GET['edit_id'];
$collect_brands = "SELECT * FROM brands WHERE id='$this_id'";
$connect_brand = mysqli_query($db_connect, $collect_brands);
$single_brand = mysqli_fetch_assoc($connect_brand);


?>



<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Brand Edit</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="card">
        <div class="card-header">
            <h2>Brand Image</h2>
        </div>
        <div class="card-body">
            <form action="brand-post.php" method="post" enctype="multipart/form-data">
                <label for="brandimage" class="form-label">Insert Brand Image</label>
                <input type="file" name="edit_image" id="brandimage" class="form-control mt-3">

                <input type="text" hidden name="transport_id" value="<?= $single_brand['id'] ?>">
                
                <?php if(isset($_SESSION['image_error'])) : ?>
                    <div class="form-text m-b-md text-danger text-center"> <?= $_SESSION['image_error'];?></div>
                <?php endif; unset($_SESSION['image_error']); ?>

                <button type="submit" name="edit_brand" class="btn btn-success mt-4">Edit</button>
            </form>
        </div>
    </div>
</div>




<?php include('./extends/footer.php') ?>