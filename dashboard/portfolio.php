
<?php 
include('./extends/header.php');

?>
<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Portfolio Insert</h1>
        </div>
    </div>
</div>


<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            <form action="portfolio-post.php" method="post" enctype="multipart/form-data">
                <label for="porttitle" class="form-label">Portfolio title</label>
                <input type="text" name="title" class="form-control" id="porttitle" value="<?php 
                    if(isset($_SESSION['title_value'])) {
                        echo $_SESSION['title_value'];
                    }unset($_SESSION['title_value']);
                ?>">
                <?php if(isset($_SESSION['title_error'])) : ?>
                    <div class="form-text m-b-md text-danger text-center"> <?= $_SESSION['title_error'];?></div>
                <?php endif; unset($_SESSION['title_error']); ?>
                    
                <label for="subtitle" class="form-label">Sub title</label>
                <input type="text" name="sub_title" class="form-control" id="subtitle" value="<?php 
                    if(isset($_SESSION['sub_title_value'])) {
                        echo $_SESSION['sub_title_value'];
                    }unset($_SESSION['sub_title_value']);
                ?>">
                <?php if(isset($_SESSION['sub_title_error'])) : ?>
                    <div class="form-text m-b-md text-danger text-center"> <?= $_SESSION['sub_title_error'];?></div>
                <?php endif; unset($_SESSION['sub_title_error']); ?>

                
                <label for="text-area" class="form-label mt-3">Portfolio description</label>
                <textarea class="form-control" name="description" id="text-area" rows="4" ><?php 
                    if(isset($_SESSION['description_value'])) {
                        echo $_SESSION['description_value'];
                    }unset($_SESSION['description_value']);
                ?></textarea>
                <?php if(isset($_SESSION['description_error'])) : ?>
                    <div class="form-text m-b-md text-danger text-center"> <?= $_SESSION['description_error'];?></div>
                <?php endif; unset($_SESSION['description_error']); ?>

                <label for="image_value" class="form-label mt-3">Portfolio image</label>
                <input type="file" name="image" class="form-control" id="image_value">

                <?php if(isset($_SESSION['image_error'])) : ?>
                    <div class="form-text m-b-md text-danger text-center"> <?= $_SESSION['image_error'];?></div>
                <?php endif; unset($_SESSION['image_error']); ?>

                
                
                <button class="btn btn-success mt-4" name="insert_portfolio" type="submit">Insert</button>
            </form>

            </div>
        </div>
    </div>

</div>



<?php include('./extends/footer.php') ?>