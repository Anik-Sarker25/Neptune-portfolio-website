<?php include('./extends/header.php') ?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Profile</h1>
        </div>
    </div>
</div>

<?php if(isset($_SESSION['name_update_success'])) : ?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="alert alert-custom" role="alert">
                <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                <div class="alert-content">
                    <span class="alert-title">Welcome,</span>
                    <span class="alert-text"><?= $_SESSION['name_update_success'] ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['name_update_success']); ?>

<?php if(isset($_SESSION['password_update_success'])) : ?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="alert alert-custom" role="alert">
                <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                <div class="alert-content">
                    <span class="alert-title">Welcome,</span>
                    <span class="alert-text"><?= $_SESSION['password_update_success'] ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['password_update_success']); ?>

<?php if(isset($_SESSION['image_update_success'])) : ?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="alert alert-custom" role="alert">
                <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                <div class="alert-content">
                    <span class="alert-title">Welcome,</span>
                    <span class="alert-text"><?= $_SESSION['image_update_success'] ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['image_update_success']); ?>

<?php if(isset($_SESSION['tagline_update_success'])) : ?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="alert alert-custom" role="alert">
                <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                <div class="alert-content">
                    <span class="alert-title">Welcome,</span>
                    <span class="alert-text"><?= $_SESSION['tagline_update_success'] ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['tagline_update_success']); ?>
<!-- The password update section starts from here -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2>Username update</h2>
            </div>
            <div class="card-body">
            <form action="profile-post.php" method="POST">
                <label for="exampleusername" class="form-label">Username :</label>
                <input type="text" name="user_name" class="form-control mt-2 <?= (isset($_SESSION['name_error'])) ? 'is-invalid': ''; ?>" id="exampleusername" value="<?php
                if(isset($_SESSION['name_value'])) {
                    echo $_SESSION['name_value'];
                } unset($_SESSION['name_value']);
                ?>">
                <?php if(isset($_SESSION['name_error'])) : ?>
                    <div id="emailHelp" class="form-text text-danger"><?php echo $_SESSION['name_error']; ?></div>
                <?php endif; unset($_SESSION['name_error']); ?>

                <button class="btn btn-success mt-4" name="name_update" type="submit">Update</button>
            </form>
            </div>
        </div>
    </div>
</div>
<!-- The username update section ends from here -->

<!-- The tagline update section starts from here -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2>Update tagline</h2>
            </div>
            <div class="card-body">
                <form action="profile-post.php" method="POST">
                    <label for="changetagline" class="form-label mb-2">Your tagline</label>
                    <textarea name="tagline" class="form-control <?= (isset($_SESSION['tagline_error'])) ? 'is-invalid': ''; ?> " id="changetagline" rows="3"><?php 
                    if(isset($_SESSION['tagline_value'])) {
                        echo $_SESSION['tagline_value'];
                    } unset($_SESSION['tagline_value']);
                    ?></textarea>
                    <?php if(isset($_SESSION['tagline_error'])) : ?>
                        <div id="emailHelp" class="form-text text-danger"><?php echo $_SESSION['tagline_error']; ?></div>
                    <?php endif; unset($_SESSION['tagline_error']); ?>
                    <button type="submit" name="update_tagline" class="btn btn-success mt-4">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- The tagline update section ends from here -->

<!-- The password update section starts from here -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2>Password update</h2>
            </div>
            <div class="card-body">
                <form action="profile-post.php" method="POST">
                    <label for="changeCurrentPassword" class="form-label">Current password</label>
                    <input type="password" class="form-control mt-2 <?= (isset($_SESSION['current_password_error'])) ? 'is-invalid': ''; ?>" id="changeCurrentPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" name="current_password" value="<?php 
                    if(isset($_SESSION['current_password_value'])) {
                        echo $_SESSION['current_password_value'];
                    } unset($_SESSION['current_password_value']);
                     ?>">
                    <?php if(isset($_SESSION['current_password_error'])) : ?>
                        <div class="form-text m-b-md text-danger"><?= $_SESSION['current_password_error']; ?></div>
                    <?php endif; unset($_SESSION['current_password_error']) ?>

                    <label for="changeNewPassword" class="form-label mt-3">New password</label>
                    <input type="password" class="form-control mt-2 <?= (isset($_SESSION['new_password_error'])) ? 'is-invalid': ''; ?>" id="changeNewPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" name="new_password" value="<?php 
                    if(isset($_SESSION['new_password_value'])) {
                        echo $_SESSION['new_password_value'];
                    } unset($_SESSION['new_password_value']);
                     ?>">
                    <?php if(isset($_SESSION['new_password_error'])) : ?>
                        <div class="form-text m-b-md text-danger"><?= $_SESSION['new_password_error']; ?></div>
                    <?php endif; unset($_SESSION['new_password_error']) ?>

                    <label for="changeConfirmPassword" class="form-label mt-3">Confirm password</label>
                    <input type="password" class="form-control mt-2 <?= (isset($_SESSION['confirm_password_error'])) ? 'is-invalid': ''; ?>" id="changeConfirmPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" name="confirm_password" value="<?php 
                    if(isset($_SESSION['confirm_password_value'])) {
                        echo $_SESSION['confirm_password_value'];
                    } unset($_SESSION['confirm_password_value']);
                     ?>">
                    <?php if(isset($_SESSION['confirm_password_error'])) : ?>
                        <div class="form-text m-b-md text-danger"><?= $_SESSION['confirm_password_error']; ?></div>
                    <?php endif; unset($_SESSION['confirm_password_error']) ?>

                    <button type="submit" class="btn btn-success mt-4" name="update_password">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- The password update section ends from here -->

<!-- The image update section starts from here -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2>Image update</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="center" style="width: 200px; ">
                        <img style="width: 100%; border-radius: 10px;" class="size" src="../images/profile/<?= $_SESSION['user_image'] ?>" alt="image">
                    </div>
                </div>
                <form action="profile-post.php" method="POST" enctype="multipart/form-data">
                    <label for="changeimage" class="form-label">Choose image</label>
                    <input type="file" name="image" class="form-control mt-3" id="changeimage">
                    <?php if(isset($_SESSION['image_error'])) : ?>
                        <div class="form-text m-b-md text-danger"><?= $_SESSION['image_error']; ?></div>
                    <?php endif; unset($_SESSION['image_error']) ?>

                    <button type="submit" name="update_image" class="btn btn-success mt-4">Update</button>
                    
                </form>
            </div>
        </div>
    </div>
</div>
<!-- The image update section ends from here -->

<?php include('./extends/footer.php') ?>