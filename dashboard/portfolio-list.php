
<?php 
include('./extends/header.php');
include('../config/db_connection.php');
$select_all = "SELECT * FROM portfolios";
$portfolios = mysqli_query($db_connect, $select_all);
$single_portfolio = mysqli_fetch_assoc($portfolios);


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
  <thead>
    <tr class='table-dark'>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Title</th>
      <th scope="col">Sub title</th>
      <th scope="col">Description</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php if($single_portfolio) : ?>
    <?php foreach($portfolios as $portfolio) : ?>
    <tr>
      <th scope="row"><?= ++$list_id ?></th>
      <td>
        <img src="../images/portfolio/<?= $portfolio['image'] ?>" width="100"  alt="">
      </td>
      <td><?= $portfolio['title'] ?></td>
      <td><?= $portfolio['sub_title'] ?></td>
      <td>
        <textarea name="" id="" class="bg-white" cols="30" disabled rows="3"><?= $portfolio['description'] ?></textarea>
      </td>
      <td>
        <?php if($portfolio['status'] == 'active') : ?>
        <a href="portfolio-post.php?change_status=<?= $portfolio['id'] ?>" class="btn btn-success"><?= $portfolio['status'] ?></a>
        <?php else : ?>
        <a href="portfolio-post.php?change_status=<?= $portfolio['id'] ?>" class="btn btn-danger"><?= $portfolio['status'] ?></a>
        <?php endif; ?>
      </td>
      <td>
        <a href="portfolio-edit.php?edit_id=<?= $portfolio['id'] ?>" class="btn btn-success">Edit</a>
        <a href="portfolio-post.php?delete_id=<?= $portfolio['id'] ?>" class="btn btn-danger">Delete</a>
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