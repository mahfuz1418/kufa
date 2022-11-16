<?php
require_once('./includes/dashboard_header.php');
?>


<div class="row justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Add Brands</h5>
            </div>
            <div class="card-body">
                <?php
                if (isset($_SESSION['brand_success'])) { ?>
                    <div class="alert alert-success text-center">
                        <strong><?= $_SESSION['brand_success'] ?></strong>
                    </div>
                <?php
                }
                unset($_SESSION['brand_success']);
                ?>
                <?php
                if (isset($_SESSION['size_error'])) { ?>
                    <div class="alert alert-danger text-center">
                        <strong><?= $_SESSION['size_error'] ?></strong>
                    </div>
                <?php
                }
                unset($_SESSION['size_error']);
                ?>
                <?php
                if (isset($_SESSION['ext_error'])) { ?>
                    <div class="alert alert-danger text-center">
                        <strong><?= $_SESSION['ext_error'] ?></strong>
                    </div>
                <?php
                }
                unset($_SESSION['ext_error']);
                ?>
                <?php
                if (isset($_SESSION['required'])) { ?>
                    <div class="alert alert-danger text-center">
                        <strong><?= $_SESSION['required'] ?></strong>
                    </div>
                <?php
                }
                unset($_SESSION['required']);
                ?>
                <form action="./brands_data.php" method="post" enctype="multipart/form-data">
                    <div class="example-container">
                        <div class="example-content">
                            <label for="brand_name">Brands Name</label>
                            <input type="text" class="form-control form-control-rounded m-b-sm" name="brand_name" id="brand_name" placeholder="Brands Name">

                        </div>

                        <div class="example-content">
                            <label for="brand_image">Brands Image</label>
                            <input type="file" class="form-control form-control-rounded m-b-sm" name="brand_image" id="brand_image">
                        </div>

                        <div class="example-content ">
                            <button class="btn btn-primary" name="add_brands">Add Brand</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
<hr><br>


<!-- BRNDS LIST AREA  -->
<section id="list">
    <div class="row justify-content-center">
        <div class="card col-8">
            <div class="card-header">
                <h5 class="card-title">Brands list</h5>
            </div>
            <div class="card-body">
                <div class="example-container">
                    <div class="example-content">
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Serial</th>
                                    <th scope="col">Brands Name</th>
                                    <th scope="col">Brands Image</th>
                                    <th scope="col">Brands Delate</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $brand_list_query = "SELECT * FROM brands ";
                                $brand_list_query_db = mysqli_query($db_connect, $brand_list_query);
                                $serial = 1;
                                foreach ($brand_list_query_db as  $brand) : ?>
                                    <tr>
                                        <th scope="row"><?= $serial++ ?></th>
                                        <td><?= $brand['brand_name'] ?></td>

                                        <td><img style="height: 70px; ; width: 70px; ;" src="./upload/brands/<?= $brand['brand_logo'] ?>" alt=""></td>

                                        <td>

                                            <a href="./brand_delete.php?id=<?= $brand['id'] ?>" class="btn btn-danger">Delete</a>
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
    </div>

</section>













<?php
require_once('./includes/dashboard_footer.php');

?>