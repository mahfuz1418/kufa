<?php
require_once('./includes/dashboard_header.php');
?>


<div class="row justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Add Customer Quotes</h5>
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
                ?>
                <form action="./testimonial_add_data.php" method="post" enctype="multipart/form-data">
                    <div class="example-container">
                        <div class="example-content">
                            <label for="testi_image">Customer Image</label>
                            <input type="file" class="form-control form-control-rounded m-b-sm" name="testi_image" id="testi_image">

                        </div>
                        <div class="example-content">
                            <label for="testi_commnet">Customer Quotes</label>
                            <textarea class="form-control form-control-rounded m-b-sm" name="testi_commnet" id="testi_commnet" cols="30" rows="4"></textarea>    
                        </div>
                        <div class="example-content">
                            <label for="testi_name">Customer Name</label>
                            <input type="text" class="form-control form-control-rounded m-b-sm" id="testi_name" name="testi_name">
                        </div>

                        <div class="example-content">
                            <label for="testi_title">Customer Title</label>
                            <input type="text" class="form-control form-control-rounded m-b-sm" id="testi_title" name="testi_title">
                        </div>
                        
                        <div class="example-content">
                            <label for="testi_status">Showcase Status</label>
                            <select class="form-control form-control-rounded m-b-sm" name="testi_status" id="testi_status">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="example-content ">

                            <button class="btn btn-primary ">Add Showcase</button>

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