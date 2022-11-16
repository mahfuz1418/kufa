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
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Message</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $contact_list_query = "SELECT * FROM contacts ";
                        $contact_list_query_db = mysqli_query($db_connect, $contact_list_query);
                        $serial = 1;
                        foreach ($contact_list_query_db as  $contacts) : ?>
                            <tr>
                                <th scope="row"><?= $serial++ ?></th>
                                <td><?= $contacts['name'] ?></td>
                                <td><?= $contacts['email'] ?></td>
                                <td><?= $contacts['message'] ?></td>
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