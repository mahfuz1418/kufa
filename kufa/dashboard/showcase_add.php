<?php
require_once('./includes/dashboard_header.php');
?>


<div class="row justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Add Your Showcase</h5>
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
                <form action="./showcase_add_data.php" method="post" enctype="multipart/form-data">
                    <div class="example-container">
                        <div class="example-content">
                            <label for="showcase_title">Showcase Title</label>
                            <input type="text" class="form-control form-control-rounded m-b-sm" id="showcase_title" placeholder="Service Title" name="showcase_title">
                        </div>
                        <div class="example-content">
                            <label for="showcase_heading">Showcase Heading</label>
                            <input type="text" class="form-control form-control-rounded m-b-sm" id="showcase_heading" placeholder="Service Heading" name="showcase_heading">
                        </div>
                      
                        <div class="example-content">
                            <label for="showcase_description">Showcase Description</label>
                            <textarea class="form-control form-control-rounded m-b-sm" name="showcase_description" id="showcase_description" cols="30" rows="4"></textarea>    
                        </div>
                        <div class="example-content">
                            <label for="showcase_image">Showcase Image</label>
                            <input type="file" class="form-control form-control-rounded m-b-sm" name="showcase_image" id="showcase_image">
                           
                        </div>
                        <div class="example-content">
                            <label for="showcase_status">Showcase Status</label>
                            <select class="form-control form-control-rounded m-b-sm" name="showcase_status" id="showcase_status">
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


