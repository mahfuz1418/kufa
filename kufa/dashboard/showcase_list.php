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
                            <th scope="col">Showcase Title</th>
                            <th scope="col">Showcase Heading</th>
                            <th scope="col">Showcase Description</th>
                            <th scope="col">Showcase Image</th>
                            <th scope="col">Showcase Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $showcase_list_query = "SELECT * FROM showcases ";
                        $showcase_list_query_db = mysqli_query($db_connect, $showcase_list_query);
                        $serial = 1;
                        foreach ($showcase_list_query_db as  $showcase) : ?>
                            <tr>
                                <th scope="row"><?= $serial++ ?></th>
                                <td><?= $showcase['showcase_title'] ?></td>
                                <td><?= $showcase['showcase_heading'] ?></td>
                                <td><?= $showcase['showcase_description'] ?></td>
                                <td><img style="height: 70px; ; width: 70px; ;" src="./upload/showcase/<?= $showcase['showcase_image'] ?>" alt=""></td>
                                <td> <span class="badge <?= ($showcase['showcase_status'] == 'active' ? 'badge-success' : 'badge-danger') ?>"><?= $showcase['showcase_status'] ?></span></td>
                                <td>
                                    <a href="./showcase_edit.php?id=<?= $showcase['id'] ?>" class="btn btn-warning">Edit</a>
                                    <a href="./showcase_delete.php?id=<?= $showcase['id'] ?>" class="btn btn-danger">Delete</a>
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