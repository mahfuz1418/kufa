<?php
require_once('./includes/dashboard_header.php');
require_once('../db_connect.php');
?>


<div class="row justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Edit Customer Quotes</h5>
            </div>
            <div class="card-body">
                <?php
                if (isset($_SESSION['success'])) { ?>
                    <div class="alert alert-success text-center">
                        <strong><?= $_SESSION['success'] ?></strong>
                    </div>
                <?php
                }
                unset($_SESSION['success']);
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
                if (isset($_SESSION['image_error'])) { ?>
                    <div class="alert alert-danger text-center">
                        <strong><?= $_SESSION['image_error'] ?></strong>
                    </div>
                <?php
                }
                unset($_SESSION['image_error']);
                $id = $_GET['id'];
                $testimonial_query = "SELECT * FROM testimonials WHERE id = $id";
                $testimonial_db = mysqli_query($db_connect, $testimonial_query);
                $testimonial_arr = mysqli_fetch_assoc($testimonial_db);
                ?>
                <form action="./testimonial_edit_data.php" method="post" enctype="multipart/form-data">
                    <input type="number" name="id" id="" hidden value="<?= $testimonial_arr['id'] ?>">
                    <div class="example-container">
                        <div class="example-content">
                            <label for="testi_image">Customer Image</label>
                            <input type="file" class="form-control form-control-rounded m-b-sm" name="testi_image" id="testi_image">

                        </div>
                        <div class="example-content">
                            <label for="testi_commnet">Customer Quotes</label>
                            <textarea class="form-control form-control-rounded m-b-sm" name="testi_commnet" id="testi_commnet" cols="30" rows="4"><?= $testimonial_arr['comment'] ?></textarea>    
                        </div>
                        <div class="example-content">
                            <label for="testi_name">Customer Name</label>
                            <input type="text" class="form-control form-control-rounded m-b-sm" id="testi_name" name="testi_name" value="<?= $testimonial_arr['name'] ?>">
                        </div>

                        <div class="example-content">
                            <label for="testi_title">Customer Title</label>
                            <input type="text" class="form-control form-control-rounded m-b-sm" id="testi_title" name="testi_title" value="<?= $testimonial_arr['title'] ?>">
                        </div>
                        
                        <div class="example-content">
                            <label for="testi_status">Showcase Status</label>
                            <select class="form-control form-control-rounded m-b-sm" name="testi_status" id="status">
                            <option value="active" <?= ($testimonial_arr['status'] === 'active' ? 'selected' : '') ?>>Active</option>
                                <option value="inactive" <?= ($testimonial_arr['status'] === 'inactive' ? 'selected' : '') ?>>Inactive</option>
                            </select>
                        </div>
                        <div class="example-content ">

                            <button class="btn btn-primary ">Edit Showcase</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>








<?php
require_once('./includes/dashboard_footer.php');

?>