<?php
require_once('./includes/dashboard_header.php');
require_once('../db_connect.php');
?>


<div class="row justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Edit Showcase</h5>
            </div>
            <div class="card-body">
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
                $showcase_query = "SELECT * FROM showcases WHERE id = $id";
                $showcase_db = mysqli_query($db_connect, $showcase_query);
                $showcase_arr = mysqli_fetch_assoc($showcase_db);
                ?>
                <form action="./showcase_edit_data.php" method="post" enctype="multipart/form-data">
                    <input type="number" hidden name="id" id="" value="<?= $id ?>"> 
                    <div class="example-container">
                        <div class="example-content">
                            <label for="showcase_title">Showcase Title</label>
                            <input type="text" class="form-control form-control-rounded m-b-sm" id="showcase_title" placeholder="Service Title" name="showcase_title" value="<?= $showcase_arr['showcase_title']?>">
                        </div>
                        <div class="example-content">
                            <label for="showcase_heading">Showcase Heading</label>
                            <input type="text" class="form-control form-control-rounded m-b-sm" id="showcase_heading" placeholder="Showcase Heading" name="showcase_heading" value="<?= $showcase_arr['showcase_heading']?>">
                            
                        </div>
                      
                        <div class="example-content">
                            <label for="showcase_description">Showcase Description</label>
                            <textarea class="form-control form-control-rounded m-b-sm" name="showcase_description" id="showcase_description" cols="30" rows="4"><?= $showcase_arr['showcase_description']?></textarea>
                            
                        </div>
                        <div class="example-content">
                            <label for="showcase_image">Showcase Image</label>
                            <img class="card" style="width:60px ; height: 60px ;" src="./upload/showcase/<?= $showcase_arr['showcase_image']?>" alt="">
                            <input type="file" class="form-control form-control-rounded m-b-sm" name="showcase_image" id="showcase_image" >
                           
                        </div>
                        <div class="example-content">
                            <label for="showcase_status">Showcase Status</label>
                            <select class="form-control form-control-rounded m-b-sm" name="showcase_status" id="showcase_status">
                            <option value="active" <?= ($showcase_arr['showcase_status'] === 'active' ? 'selected' : '') ?>>Active</option>
                                <option value="inactive" <?= ($showcase_arr['showcase_status'] === 'inactive' ? 'selected' : '') ?>>Inactive</option>
                            </select>
                        </div>
                        <div class="example-content ">

                            <button class="btn btn-primary ">Update Showcase</button>

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


