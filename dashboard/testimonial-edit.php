
<?php 
include('./extends/header.php');
include('../config/db_connection.php');
$this_id = $_GET['edit_id'];
$collect_data = "SELECT * FROM testimonials WHERE id='$this_id'";
$connect_data = mysqli_query($db_connect, $collect_data);
$single_data = mysqli_fetch_assoc($connect_data);



?>
<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Testimonial Edit id > <?= $single_data['id'] ?></h1>
        </div>
    </div>
</div>


<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            <form action="testimonial-post.php" method="post" enctype="multipart/form-data">
                <label for="porttitle" class="form-label">Testimonial Name</label>
                <input type="text" name="edit_name" class="form-control" id="porttitle" value="<?= $single_data['name'] ?>">

                <input type="text" name="transport_id" hidden value="<?= $single_data['id'] ?>">

                    
                <label for="subtitle" class="form-label">Testimonial Post</label>
                <input type="text" name="edit_post" class="form-control" id="subtitle" value="<?= $single_data['post'] ?>">


                
                <label for="text-area" class="form-label mt-3">Testimonial Message</label>
                <textarea class="form-control" name="edit_message" id="text-area" rows="4" ><?= $single_data['message'] ?></textarea>
                <br>
                <img src="../images/testimonial/<?= $single_data['image'] ?>" alt="" width="120px">
                <br>

                <label for="image_value" class="form-label mt-3">Testimonial image</label>
                <input type="file" name="edit_user_image" class="form-control" id="image_value">



                
                
                <button class="btn btn-success mt-4" name="edit_testimonial" type="submit">Edit</button>
            </form>

            </div>
        </div>
    </div>

</div>



<?php include('./extends/footer.php') ?>