
<?php 
include('./extends/header.php');

?>
<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Testimonial Insert</h1>
        </div>
    </div>
</div>


<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            <form action="testimonial-post.php" method="post" enctype="multipart/form-data">
                <label for="porttitle" class="form-label">Testimonial Name</label>
                <input type="text" name="name" class="form-control" id="porttitle" value="<?php 
                    if(isset($_SESSION['name_value'])) {
                        echo $_SESSION['name_value'];
                    }unset($_SESSION['name_value']);
                ?>">
                <?php if(isset($_SESSION['name_error'])) : ?>
                    <div class="form-text m-b-md text-danger text-center"> <?= $_SESSION['name_error'];?></div>
                <?php endif; unset($_SESSION['name_error']); ?>
                    
                <label for="subtitle" class="form-label">Testimonial Post</label>
                <input type="text" name="post" class="form-control" id="subtitle" value="<?php 
                    if(isset($_SESSION['post_value'])) {
                        echo $_SESSION['post_value'];
                    }unset($_SESSION['post_value']);
                ?>">
                <?php if(isset($_SESSION['post_error'])) : ?>
                    <div class="form-text m-b-md text-danger text-center"> <?= $_SESSION['post_error'];?></div>
                <?php endif; unset($_SESSION['post_error']); ?>

                
                <label for="text-area" class="form-label mt-3">Testimonial Message</label>
                <textarea class="form-control" name="message" id="text-area" rows="4" ><?php 
                    if(isset($_SESSION['message_value'])) {
                        echo $_SESSION['message_value'];
                    }unset($_SESSION['message_value']);
                ?></textarea>
                <?php if(isset($_SESSION['message_error'])) : ?>
                    <div class="form-text m-b-md text-danger text-center"> <?= $_SESSION['message_error'];?></div>
                <?php endif; unset($_SESSION['message_error']); ?>

                <label for="image_value" class="form-label mt-3">Testimonial user image</label>
                <input type="file" name="user_image" class="form-control" id="image_value">

                <?php if(isset($_SESSION['image_error'])) : ?>
                    <div class="form-text m-b-md text-danger text-center"> <?= $_SESSION['image_error'];?></div>
                <?php endif; unset($_SESSION['image_error']); ?>

                
                
                <button class="btn btn-success mt-4" name="insert_testimonial" type="submit">Insert</button>
            </form>

            </div>
        </div>
    </div>

</div>



<?php include('./extends/footer.php') ?>