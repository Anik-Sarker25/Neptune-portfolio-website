<?php include('./extends/header.php') ?>



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
                <h2>Insert Introduction</h2>
            </div>
            <div class="card-body">
                <form action="introduction-post.php" method="POST">
                    <label for="settitle" class="form-label mb-2">Title</label>
                    <input type="text" name="title" class="form-control mb-3 <?= (isset($_SESSION['title_error'])) ? 'is-invalid': ''; ?>" id="settitle" value="<?php 
                    if(isset($_SESSION['title_value'])) {
                        echo $_SESSION['title_value'];
                    } unset($_SESSION['title_value']);
                     ?>">
                    <?php if(isset($_SESSION['title_error'])) : ?>
                        <div id="emailHelp" class="form-text text-danger"><?php echo $_SESSION['title_error']; ?></div>
                    <?php endif; unset($_SESSION['title_error']); ?>

                    <label for="setdescription" class="form-label mb-2">Description</label>
                    <textarea name="description" class="form-control mb-3 <?= (isset($_SESSION['description_error'])) ? 'is-invalid': ''; ?>" id="setdescription" cols="30" rows="3"><?php 
                    if(isset($_SESSION['description_value'])) {
                        echo $_SESSION['description_value'];
                    } unset($_SESSION['description_value']);
                    ?></textarea>
                    <?php if(isset($_SESSION['description_error'])) : ?>
                        <div id="emailHelp" class="form-text text-danger"><?php echo $_SESSION['description_error']; ?></div>
                    <?php endif; unset($_SESSION['description_error']); ?>
                    
                    <button type="submit" class="btn btn-success mt-4"  name="insert_intro">Insert</button>

                </form>
            </div>
        </div>
    </div>
</div>


<!-- introduction section ends form here -->

<!-- education section starts form here -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2>Insert Education</h2>
            </div>
            <div class="card-body">
                <form action="introduction-post.php" method="POST">
                    <label for="settitle" class="form-label mb-2">Title (Degree name)</label>
                    <input type="text" name="edu_title" class="form-control mb-3 text-uppercase <?= (isset($_SESSION['edu_title_error'])) ? 'is-invalid': ''; ?>" id="settitle" value="<?php 
                    if(isset($_SESSION['edu_title_value'])) {
                        echo $_SESSION['edu_title_value'];
                    } unset($_SESSION['edu_title_value']);
                     ?>">
                    <?php if(isset($_SESSION['edu_title_error'])) : ?>
                        <div id="emailHelp" class="form-text text-danger"><?php echo $_SESSION['edu_title_error']; ?></div>
                    <?php endif; unset($_SESSION['edu_title_error']); ?>

                    <label for="setyear" class="form-label mb-2">Year (Degree Year)</label>
                    <input type="number" class="form-control mb-3 <?= (isset($_SESSION['year_error'])) ? 'is-invalid': ''; ?>" id="setyear" name="year" value="<?php 
                    if(isset($_SESSION['year_value'])) {
                        echo $_SESSION['year_value'];
                    } unset($_SESSION['year_value']);
                     ?>">
                    <?php if(isset($_SESSION['year_error'])) : ?>
                        <div id="emailHelp" class="form-text text-danger"><?php echo $_SESSION['year_error']; ?></div>
                    <?php endif; unset($_SESSION['year_error']); ?>

                    <label for="setvalue" class="form-label mb-2">value of %</label>
                    <input type="number" class="form-control mb-3 <?= (isset($_SESSION['value_error'])) ? 'is-invalid': ''; ?>" id="setvalue" name="value" value="<?php 
                    if(isset($_SESSION['value_value'])) {
                        echo $_SESSION['value_value'];
                    } unset($_SESSION['value_value']);
                     ?>">
                    <?php if(isset($_SESSION['value_error'])) : ?>
                        <div id="emailHelp" class="form-text text-danger"><?php echo $_SESSION['value_error']; ?></div>
                    <?php endif; unset($_SESSION['value_error']); ?>
                    
                    <button type="submit" class="btn btn-success mt-4"  name="insert_education">Insert</button>

                </form>
            </div>
        </div>
    </div>
</div>


<!-- education section ends form here -->


                    
<?php include('./extends/footer.php') ?>