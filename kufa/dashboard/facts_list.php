<?php
require_once('./includes/dashboard_header.php');
require_once('../db_connect.php');

?>

<div class="card">
    <div class="card-header">
        <h5 class="card-title">Facts List</h5>
    </div>
    <div class="card-body">
        <div class="example-container">
            <div class="example-content">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Serial</th>
                            <th scope="col">Facts Icon</th>
                            <th scope="col">Facts Count</th>
                            <th scope="col">Facts Title</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $facts_list_query = "SELECT * FROM facts ";
                        $facts_list_query_db = mysqli_query($db_connect, $facts_list_query);
                        $serial = 1;
                        foreach ($facts_list_query_db as  $fact) : ?>
                            <tr>
                                <th scope="row"><?= $serial++ ?></th>
                                <td class="text-center">
                                    <span class="badge badge-info p-3 ">
                                        <i class="<?= $fact['fact_icon'] ?> fs-5" aria-hidden="true">
                                        </i>
                                    </span>
                                </td>
                                <td><?= $fact['fact_count'] ?></td>
                                <td><?= $fact['fact_title'] ?></td>

                                <td>
                                    <a href="./facts_edit.php?id=<?= $fact['id'] ?>" class="btn btn-warning">Edit</a>
                                    <a href="./facts_delete.php?id=<?= $fact['id'] ?>" class="btn btn-danger">Delete</a>
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