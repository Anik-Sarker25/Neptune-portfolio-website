<?php 
include('./extends/header.php');
include('../config/db_connection.php');
$select_mails = "SELECT * FROM mails";
$mails = mysqli_query($db_connect, $select_mails);
$single_mail = mysqli_fetch_assoc($mails);


$mail_id = 0;


?>




<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Mail list</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="card">
        <div class="card-body">
            <?php if(isset($_SESSION['send_success'])) : ?>
                <div class="text-success text-center mt-4"><?= $_SESSION['send_success'] ?></div>
            <?php endif; unset($_SESSION['send_success']); ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="card-body">
        <table class="table">
        <thead>
            <tr class="table-dark">
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Message</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if($single_mail) : ?>
            <?php foreach($mails as $mail) : ?>
            <tr>
            <th scope="row"><?= ++$mail_id ?></th>
            <td><?= $mail['name'] ?></td>
            <td><?= $mail['email'] ?></td>
            <td>
                <textarea name="" id="" disabled class="bg-white" cols="30" rows="3"><?= $mail['message'] ?></textarea>
            </td>

            <td>
                <a href="mail-reply.php?edit_id=<?= $mail['id'] ?>" class="btn btn-success">Reply</a>
                <a href="../mail-submission.php?delete_id=<?= $mail['id'] ?>" class="btn btn-danger">Delete</a>
            </td>
            </tr>
            <?php endforeach; ?>
            <?php else : ?>
            <tr>
                <td colspan="6" class="text-danger text-center">DATA NOT FOUNT ?</td>
            </tr>
            <?php endif; ?>

        </tbody>
        </table>
    </div>
</div>





<?php include('./extends/footer.php') ?>