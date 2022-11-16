<?php
require_once('./includes/dashboard_header.php');
?>


<div class="row justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Update Services</h5>
            </div>
            <div class="card-body">            
                <?php
                $id = $_GET['id'];
                $service_edit_query = "SELECT * FROM services WHERE id = '$id' ";
                $service_edit_db = mysqli_query($db_connect, $service_edit_query);
                $service_fetch = mysqli_fetch_assoc($service_edit_db);
                ?>
                <form action="./service_edit_data.php" method="post">
                    <div class="example-container">
                        <div class="example-content">
                            <label for="service_title">Service Title</label>
                            <input type="number" hidden name="id" value="<?= $service_fetch['id'] ?>">
                            <input type="text" class="form-control form-control-rounded m-b-sm" id="service_title" placeholder="Service Title" name="service_title" value="<?= $service_fetch['service_title'] ?>">
                            <?php
                            if (isset($_SESSION['title_error'])) { ?>
                                <p class="text-danger"><?= $_SESSION['title_error'] ?></p>
                            <?php
                            }
                            unset($_SESSION['title_error']);
                            ?>
                        </div>
                        <div class="example-content">
                            <label for="service_icon">Service Icon</label>
                            <div class="row">
                                <div class="col-10">
                                    <input readonly type="text" class="form-control form-control-rounded m-b-sm " id="icon_input" value="<?= $service_fetch['service_icon'] ?>" name="service_icon">
                                </div>
                                <div class="col-2">
                                    <span class="badge badge-info p-3">
                                        <i class="<?= $service_fetch['service_icon'] ?> fs-5" aria-hidden="true">
                                        </i>
                                    </span>

                                </div>
                            </div>


                            <?php
                            if (isset($_SESSION['icon_error'])) { ?>
                                <p class="text-danger"><?= $_SESSION['icon_error'] ?></p>
                            <?php
                            }
                            unset($_SESSION['icon_error']);
                            ?>
                        </div>
                        <div class="example-content">
                            <div class="card">
                                <div class="card-body" style="height:150px ; overflow-y:scroll; ">
                                    <?php
                                    require_once('./includes/icons.php');
                                    foreach ($fonts as  $font) : ?>
                                        <span><i style="cursor:pointer ; " class="<?= $font ?> fa-2x col-xl-1 col-md-1 col-sm-1 m-2 text-center click_icon" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='black'" id="<?= $font ?>" aria-hidden="true"></i></span>
                                    <?php
                                    endforeach

                                    ?>

                                </div>
                            </div>
                        </div>
                        <div class="example-content">
                            <label for="service_description">Service Description</label>
                            <textarea class="form-control form-control-rounded m-b-sm" name="service_description" id="service_description" cols="30" rows="4"><?= $service_fetch['service_description'] ?></textarea>
                            <?php
                            if (isset($_SESSION['description_error'])) { ?>
                                <p class="text-danger"><?= $_SESSION['description_error'] ?></p>
                            <?php
                            }
                            unset($_SESSION['description_error']);
                            ?>
                        </div>
                        <div class="example-content">
                            <label for="service_status">Service Status</label>
                            <select class="form-control form-control-rounded m-b-sm" name="service_status" id="service_status">
                                <option value="active" <?= ($service_fetch['service_status'] === 'active' ? 'selected' : '') ?>>Active</option>
                                <option value="inactive" <?= ($service_fetch['service_status'] === 'inactive' ? 'selected' : '') ?>>Inactive</option>
                            </select>
                        </div>
                        <div class="example-content ">

                            <button class="btn btn-primary ">Update Services</button>

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


<script>
    $(document).ready(function() {
        $('.click_icon').click(function() {
            $('#icon_input').val($(this).attr('id'));
        })
    })
</script>