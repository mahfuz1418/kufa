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
                            <th scope="col">Service Title</th>
                            <th scope="col">Service Description</th>
                            <th scope="col">Service Icon</th>
                            <th scope="col">Service Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $service_list_query = "SELECT * FROM services ";
                        $service_list_query_db = mysqli_query($db_connect, $service_list_query);
                        $serial = 1;
                        foreach ($service_list_query_db as  $service) : ?>
                            <tr>
                                <th scope="row"><?= $serial++ ?></th>
                                <td><?= $service['service_title'] ?></td>
                                <td><?= $service['service_description'] ?></td>
                                <td class="text-center">
                                    <span class="badge badge-info p-3 ">
                                        <i  class="<?= $service['service_icon'] ?> fs-5"   aria-hidden="true">
                                        </i>
                                    </span>
                                </td>
                                <td> <span class="badge <?= ($service['service_status'] == 'active' ? 'badge-success' : 'badge-danger') ?>"><?= $service['service_status'] ?></span></td>
                                <td>
                                    <a href="./service_edit.php?id=<?= $service['id'] ?>" class="btn btn-warning">Edit</a>
                                    <a href="./service_delete.php?id=<?= $service['id'] ?>" class="btn btn-danger">Delete</a>
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