
<?php 
include('./extends/header.php');
include('../config/db_connection.php');
$select_testimonials = "SELECT * FROM testimonials";
$testimonials = mysqli_query($db_connect, $select_testimonials);
$single_testimonial = mysqli_fetch_assoc($testimonials);


$list_id = 0;

?>
<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Testimonial List</h1>
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
      <th scope="col">Name</th>
      <th scope="col">Post</th>
      <th scope="col">Message</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php if($single_testimonial) : ?>
    <?php foreach($testimonials as $testimonial) : ?>
    <tr>
      <th scope="row"><?= ++$list_id ?></th>
      <td>
        <img src="../images/testimonial/<?= $testimonial['image'] ?>" width="100"  alt="">
      </td>
      <td><?= $testimonial['name'] ?></td>
      <td><?= $testimonial['post'] ?></td>
      <td>
        <textarea name="" id="" class="bg-white" cols="30" disabled rows="3"><?= $testimonial['message'] ?></textarea>
      </td>
      <td>
        <?php if($testimonial['status'] == 'active') : ?>
        <a href="testimonial-post.php?change_status=<?= $testimonial['id'] ?>" class="btn btn-success"><?= $testimonial['status'] ?></a>
        <?php else : ?>
        <a href="testimonial-post.php?change_status=<?= $testimonial['id'] ?>" class="btn btn-danger"><?= $testimonial['status'] ?></a>
        <?php endif; ?>
      </td>
      <td>
        <a href="testimonial-edit.php?edit_id=<?= $testimonial['id'] ?>" class="btn btn-success">Edit</a>
        <a href="testimonial-post.php?delete_id=<?= $testimonial['id'] ?>" class="btn btn-danger">Delete</a>
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