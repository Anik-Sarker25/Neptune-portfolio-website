
<?php include('./extends/header.php');
include('../config/db_connection.php');
$select_overview = "SELECT * FROM overview_list";
$overviews = mysqli_query($db_connect, $select_overview);
$single_overview = mysqli_fetch_assoc($overviews);


$list_id = 0;

?>
<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Overview List</h1>
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
            <th scope="col">Number</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            <?php if($single_overview) : ?>
            <?php foreach($overviews as $overview) : ?>
            <tr>
                <th scope="row"><?= ++$list_id; ?></th>
                <td>
                    <i class="<?= $overview['icon'] ?>"></i>
                </td>
                <td><?= $overview['title'] ?></td>
                <td><?= $overview['number'] ?></td>
                <td>
                    <?php if($overview['status'] == 'active') : ?>
                    <a href="overview-post.php?change_status=<?= $overview['id'] ?>" class="btn btn-success"><?= $overview['status'] ?></a>
                    <?php else : ?>
                    <a href="overview-post.php?change_status=<?= $overview['id'] ?>" class="btn btn-danger"><?= $overview['status'] ?></a>
                    
                    <?php endif; ?>
                </td>
                <td>
                    <a href="overview-edit.php?edit_id=<?= $overview['id'] ?>" class="btn btn-success">Edit</a>
                    <a href="overview-post.php?delete_id=<?= $overview['id'] ?>" class="btn btn-danger">Delete</a>
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