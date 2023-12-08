<?php 
include('./extends/header.php');

include('../config/db_connection.php');
$id = $_GET['edit_id'];
$select_mails = "SELECT * FROM mails WHERE id='$id'";
$mails = mysqli_query($db_connect, $select_mails);
$single_mail = mysqli_fetch_assoc($mails);

?>



<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Mail Reply</h1>
        </div>
    </div>
</div>


<div class="row">
    <div class="card">
        <div class="card-header">
            <h2>Reply mail</h2>
        </div>
        <div class="card-body">
            <form action="../mail-submission.php" method="POST">

            <label for="replymessage" class="form-label mb-3">Enter Reply Message</label>
            <textarea name="reply_message" id="replymessage" class="form-control" placeholder="Enter Your Reply...." cols="30" rows="4"></textarea>
            <?php if(isset($_SESSION['message_error'])) : ?>
                <div class="text-danger"><?= $_SESSION['message_error'] ?></div>
            <?php endif; unset($_SESSION['message_error']); ?>

            <input type="text" hidden name="id" value="<?= $single_mail['id'] ?>">
            <input type="text" hidden name="email" value="<?= $single_mail['email'] ?>">

            <button type="submit" name="reply" class="btn btn-primary mt-4">Send</button>
            </form>
        </div>
    </div>
</div>



<?php include('./extends/footer.php') ?>

