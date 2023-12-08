<?php 
include('./extends/header.php');
include('../config/db_connection.php');
$this_id = (isset($_GET['edit_id']))? $_GET['edit_id']: '';
$select_intro_details = "SELECT * FROM introduction WHERE id='$this_id'";
$connection_intro = mysqli_query($db_connect, $select_intro_details);
$introduction = mysqli_fetch_assoc($connection_intro);

?>



<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Introduction</h1>
        </div>
    </div>
</div>

<!-- introduction section starts form here -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2>Edit Introduction</h2>
            </div>
            <div class="card-body">
                <form action="introduction-post.php" method="POST">
                    <label for="settitle" class="form-label mb-2">Title</label>
                    <input type="text" name="edit_title" class="form-control mb-3 <?= (isset($_SESSION['edit_title_error'])) ? 'is-invalid': ''; ?>" id="settitle" value="<?php echo (isset($introduction['title'])) ?  $introduction['title']: '';
                    if(isset($_SESSION['edit_title_value'])) {
                        echo $_SESSION['edit_title_value'];
                    } unset($_SESSION['edit_title_value']);
                     ?>">
                    <?php if(isset($_SESSION['edit_title_error'])) : ?>
                        <div id="emailHelp" class="form-text text-danger"><?php echo $_SESSION['edit_title_error']; ?></div>
                    <?php endif; unset($_SESSION['edit_title_error']); ?>

                    <input type="text" hidden name="service_id" value="<?= $introduction['id'] ?>">

                    <label for="setdescription" class="form-label mb-2">Description</label>
                    <textarea name="edit_description" class="form-control mb-3 <?= (isset($_SESSION['edit_description_error'])) ? 'is-invalid': ''; ?>" id="setdescription" cols="30" rows="3"><?php echo (isset($introduction['description'])) ?  $introduction['description']: '';
                    if(isset($_SESSION['edit_description_value'])) {
                        echo $_SESSION['edit_description_value'];
                    } unset($_SESSION['edit_description_value']);
                    ?></textarea>
                    <?php if(isset($_SESSION['edit_description_error'])) : ?>
                        <div id="emailHelp" class="form-text text-danger"><?php echo $_SESSION['edit_description_error']; ?></div>
                    <?php endif; unset($_SESSION['edit_description_error']); ?>
                    
                    <button type="submit" class="btn btn-success mt-4"  name="edit_intro">Edit</button>

                </form>
            </div>
        </div>
    </div>
</div>


<!-- introduction section ends form here -->

<?php include('./extends/footer.php') ?>

