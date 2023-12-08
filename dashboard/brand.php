
<?php include('./extends/header.php') ?>



<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Brand Insert</h1>
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
                <input type="file" name="image" id="brandimage" class="form-control mt-3">
                
                <?php if(isset($_SESSION['image_error'])) : ?>
                    <div class="form-text m-b-md text-danger text-center"> <?= $_SESSION['image_error'];?></div>
                <?php endif; unset($_SESSION['image_error']); ?>

                <button type="submit" name="insert_brand" class="btn btn-success mt-4">Insert</button>
            </form>
        </div>
    </div>
</div>




<?php include('./extends/footer.php') ?>