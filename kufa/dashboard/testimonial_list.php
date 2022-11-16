<?php
require_once('./includes/dashboard_header.php');
require_once('../db_connect.php');

?>

<div class="card">
    <div class="card-header">
        <h5 class="card-title">Service List</h5>
    </div>
    <div class="card-body">
        <div class="example-container">
            <div class="example-content">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Serial</th>
                            <th scope="col">Testimonial Image</th>
                            <th scope="col">Testimonial Comment</th>
                            <th scope="col">Testimonial Name</th>
                            <th scope="col">Testimonial Title</th>
                            <th scope="col">Testimonial Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $testimonial_list_query = "SELECT * FROM testimonials ";
                        $testimonial_list_query_db = mysqli_query($db_connect, $testimonial_list_query);
                        $serial = 1;
                        foreach ($testimonial_list_query_db as  $testimonials) : ?>
                            <tr>
                                <th scope="row"><?= $serial++ ?></th>
                                <td>
                                    <img style="height: 70px; ; width: 70px; ;" src="./upload/testimonial/<?= $testimonials['image'] ?>" alt="">
                                </td>
                                <td><?= $testimonials['comment'] ?></td>
                                <td><?= $testimonials['name'] ?></td>
                                <td><?= $testimonials['title'] ?></td>

                                <td>
                                    <span class="badge <?= ($testimonials['status'] == 'active' ? 'badge-success' : 'badge-danger') ?>"><?= $testimonials['status'] ?></span>
                                </td>
                                <td>
                                    <a href="./testimonial_edit.php?id=<?= $testimonials['id'] ?>" class="btn btn-warning">Edit</a>
                                    <a href="./testimonial_delete.php?id=<?= $testimonials['id'] ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>







<?php
require_once('./includes/dashboard_footer.php');

?>