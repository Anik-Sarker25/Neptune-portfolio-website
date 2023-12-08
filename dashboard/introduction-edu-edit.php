<?php 
include('./extends/header.php');
include('../config/db_connection.php');
$this_id = (isset($_GET['edit_id']))? $_GET['edit_id']: '';
$select_edu_details = "SELECT * FROM education WHERE id='$this_id'";
$connection_edu = mysqli_query($db_connect, $select_edu_details);
$education = mysqli_fetch_assoc($connection_edu);

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
                <h2>Edit Education</h2>
            </div>
            <div class="card-body">
                <form action="introduction-post.php" method="POST">
                    <label for="settitle" class="form-label mb-2">Title (Degree name)</label>
                    <input type="text" name="edit_edu_title" class="form-control mb-3 text-uppercase <?= (isset($_SESSION['edit_edu_title_error'])) ? 'is-invalid': ''; ?>" id="settitle" value="<?php echo (isset($education['title'])) ?  $education['title']: '';
                    if(isset($_SESSION['edit_edu_title_value'])) {
                        echo $_SESSION['edit_edu_title_value'];
                    } unset($_SESSION['edit_edu_title_value']);
                     ?>">
                    <?php if(isset($_SESSION['edit_edu_title_error'])) : ?>
                        <div id="emailHelp" class="form-text text-danger"><?php echo $_SESSION['edit_edu_title_error']; ?></div>
                    <?php endif; unset($_SESSION['edit_edu_title_error']); ?>
                    
                    <input type="text" hidden name="service_id" value="<?= $education['id'] ?>">

                    <label for="setyear" class="form-label mb-2">Year (Degree Year)</label>
                    <input type="number" class="form-control mb-3 <?= (isset($_SESSION['edit_year_error'])) ? 'is-invalid': ''; ?>" id="setyear" name="edit_year" value="<?php echo (isset($education['year'])) ?  $education['year']: '';
                    if(isset($_SESSION['edit_year_value'])) {
                        echo $_SESSION['edit_year_value'];
                    } unset($_SESSION['edit_year_value']);
                     ?>">
                    <?php if(isset($_SESSION['edit_year_error'])) : ?>
                        <div id="emailHelp" class="form-text text-danger"><?php echo $_SESSION['edit_year_error']; ?></div>
                    <?php endif; unset($_SESSION['edit_year_error']); ?>

                    <label for="setvalue" class="form-label mb-2">value of %</label>
                    <input type="number" class="form-control mb-3 <?= (isset($_SESSION['edit_value_error'])) ? 'is-invalid': ''; ?>" id="setvalue" name="edit_value" value="<?php echo (isset($education['value'])) ?  $education['value']: '';
                    if(isset($_SESSION['edit_value_value'])) {
                        echo $_SESSION['edit_value_value'];
                    } unset($_SESSION['edit_value_value']);
                     ?>">
                    <?php if(isset($_SESSION['edit_value_error'])) : ?>
                        <div id="emailHelp" class="form-text text-danger"><?php echo $_SESSION['edit_value_error']; ?></div>
                    <?php endif; unset($_SESSION['edit_value_error']); ?>
                    
                    <button type="submit" class="btn btn-success mt-4"  name="edit_education">Edit</button>

                </form>
            </div>
        </div>
    </div>
</div>


<!-- introduction section ends form here -->

<?php include('./extends/footer.php') ?>

