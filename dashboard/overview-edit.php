
<?php 
include('./extends/header.php');
include('icons.php');
include('../config/db_connection.php');
$this_id = $_GET['edit_id'];
$select = "SELECT * FROM overview_list WHERE id='$this_id'";
$connection = mysqli_query($db_connect, $select);
$overview = mysqli_fetch_assoc($connection);

?>
<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Overview edit</h1>
        </div>
    </div>
</div>


<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            <form action="overview-post.php" method="post">
                <label for="servicetitle" class="form-label">Overview title</label>
                <input type="text" name="edit_title" class="form-control" id="servicetitle" value="<?= $overview['title'] ?>">
                <input type="text" hidden name="overview_id" value="<?= $overview['id'] ?>">

                <label for="text-area" class="form-label mt-3">Overview number</label>
                <input type="text" class="form-control" name="edit_number" id="text-area" value="<?= $overview['number'] ?>">


                <label for="icon-value" class="form-label mt-3">Overview icon</label>
                <div class="input-group">
                    <input type="text" name="edit_icon" readonly class="form-control " id="icon-value" value="<?= $overview['icon'] ?>">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-secondary dropdown-toggle text-white bg-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Select
                    </button>
                </div>

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
                
                <button class="btn btn-success mt-4" name="edit_overview" type="submit">Edit overview</button>
            </form>

            </div>
        </div>
    </div>

</div>



<?php include('./extends/footer.php') ?>