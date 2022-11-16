<?php
require_once('./includes/dashboard_header.php');
require_once('../db_connect.php');


?>

<div class="card">
    <div class="card-header">
        <h5 class="card-title">About List</h5>
    </div>
    <div class="card-body">
        <div class="example-container">
            <div class="example-content">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Serial</th>
                            <th scope="col">About me</th>
                            <th scope="col">Skill Icon</th>
                            <th scope="col">Skill Title</th>
                            <th scope="col">Skill Percent</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $about_list_query = "SELECT * FROM abouts ";
                        $about_list_query_db = mysqli_query($db_connect, $about_list_query);
                        $serial = 1;
                        foreach ($about_list_query_db as  $about) : ?>
                            <tr>
                                <th scope="row"><?= $serial++ ?></th>
                                <td><?= $about['about_me'] ?></td>
                                <td class="text-center">
                                    <span class="badge badge-info p-3 ">
                                        <i class="<?= $about['skill_icon'] ?> fs-5" aria-hidden="true">
                                        </i>
                                    </span>
                                </td>
                                <td><?= $about['skill_title'] ?></td>
                                <td><?= $about['skill_percent'] ?></td>

                                <td>
                                    <a href="./about_edit.php?id=<?= $about['id'] ?>" class="btn btn-warning">Edit</a>
                                    <a href="./about_delete.php?id=<?= $about['id'] ?>" class="btn btn-danger">Delete</a>
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