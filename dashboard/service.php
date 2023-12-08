
<?php 
include('./extends/header.php');
include('./icons.php');

?>
<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Service Insert</h1>
        </div>
    </div>
</div>


<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            <form action="service-post.php" method="post">
                <label for="servicetitle" class="form-label">Service title</label>
                <input type="text" name="title" class="form-control" id="servicetitle" value="<?php 
                    if(isset($_SESSION['title_value'])) {
                        echo $_SESSION['title_value'];
                    }unset($_SESSION['title_value']);
                ?>">
                <?php if(isset($_SESSION['title_error'])) : ?>
                        <div class="form-text m-b-md text-danger text-center"> <?= $_SESSION['title_error'];?></div>
                    <?php endif; unset($_SESSION['title_error']); ?>

                <label for="text-area" class="form-label mt-3">Service description</label>
                <textarea class="form-control" name="description" id="text-area" rows="4" ><?php 
                    if(isset($_SESSION['description_value'])) {
                        echo $_SESSION['description_value'];
                    }unset($_SESSION['description_value']);
                ?></textarea>
                <?php if(isset($_SESSION['description_error'])) : ?>
                        <div class="form-text m-b-md text-danger text-center"> <?= $_SESSION['description_error'];?></div>
                    <?php endif; unset($_SESSION['description_error']); ?>

                <label for="icon-value" class="form-label mt-3">Servece icon</label>
                <div class="input-group">
                    <input type="text" name="icon"  class="form-control " id="icon-value" readonly value="<?php 
                        if(isset($_SESSION['icon_value'])) {
                            echo $_SESSION['icon_value'];
                        }unset($_SESSION['icon_value']);
                    ?>">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-secondary dropdown-toggle text-white bg-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Select
                    </button>
                </div>

                <?php if(isset($_SESSION['icon_error'])) : ?>
                    <div class="form-text m-b-md text-danger text-center"> <?= $_SESSION['icon_error'];?></div>
                <?php endif; unset($_SESSION['icon_error']); ?>

                <br>
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="card">
                                    <div class="card_body">
                                        <?php foreach($fonts as $font) : ?>
                                            
                                            <span class="fa-2x p-2 bg-dark text-white ">
                                                <i  style="width: 32px; border: 1px solid white; text-align: center; border-radius: 5px; " onclick="myfunction(event)" class="<?= $font; ?>"></i>
                                            </span>
                                        <?php endforeach; ?>
                                    </div>
                                
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Select</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <button class="btn btn-success mt-4" name="insert_service" type="submit">Insert</button>
            </form>

            </div>
        </div>
    </div>

</div>



<?php include('./extends/footer.php') ?>