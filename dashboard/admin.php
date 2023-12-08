<?php include('./extends/header.php') ?>

<!-- this section will appears only onetime after registration for the first time -->
<?php if(isset($_SESSION['login_success'])) : ?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="alert alert-custom" role="alert">
                <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                <div class="alert-content">
                    <span class="alert-title">Welcome,</span>
                    <span class="alert-text"><?= $_SESSION['login_success'] ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['login_success']); ?>
<!-- welcome section for registration ends here -->

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Dashboard</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <?php
            echo "id : ".$_SESSION['user_id']."<br>";
            echo "name : ".$_SESSION['user_name']."<br>";
            echo "email : ".$_SESSION['user_email']."<br>";
        
        ?>
    </div>
</div>
                    
<?php include('./extends/footer.php') ?>