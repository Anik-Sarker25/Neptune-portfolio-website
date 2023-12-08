
<?php include('./extends/header.php');
include('../config/db_connection.php');
$select_all = "SELECT * FROM service_list";
$services = mysqli_query($db_connect, $select_all);
$single_service = mysqli_fetch_assoc($services);


$list_id = 0;

?>
<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Service List</h1>
        </div>
    </div>
</div>

<div class="row">


    <div class="card-body">
        <table class="table">
        <thead class="table-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Icon</th>
            <th scope="col">title</th>
            <th scope="col">Description</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            <?php if($single_service) : ?>
            <?php foreach($services as $service) : ?>
            <tr>
                <th scope="row"><?= ++$list_id; ?></th>
                <td>
                    <i class="<?= $service['icon'] ?>"></i>
                </td>
                <td><?= $service['title'] ?></td>
                <td>
                    <textarea name="" disabled id="" class="bg-white" cols="30" rows="3"><?= $service['description'] ?></textarea>
                </td>
                <td>
                    <?php if($service['status'] == 'active') : ?>
                    <a href="service-post.php?change_status=<?= $service['id'] ?>" class="btn btn-success"><?= $service['status'] ?></a>
                    <?php else : ?>
                    <a href="service-post.php?change_status=<?= $service['id'] ?>" class="btn btn-danger"><?= $service['status'] ?></a>
                    
                    <?php endif; ?>
                </td>
                <td>
                    <a href="service-edit.php?edit_id=<?= $service['id'] ?>" class="btn btn-success">Edit</a>
                    <a href="service-post.php?delete_id=<?= $service['id'] ?>" class="btn btn-danger">Delete</a>
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