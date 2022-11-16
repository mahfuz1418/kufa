<?php
require_once('./includes/dashboard_header.php');
?>


<div class="row justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Add Your Services</h5>
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
                if (isset($_SESSION['service_error'])) { ?>
                    <div class="alert alert-danger text-center">
                        <strong><?= $_SESSION['service_error'] ?></strong>
                    </div>
                <?php
                }
                unset($_SESSION['service_error']);
                ?>
                <form action="./service_data.php" method="post">
                    <div class="example-container">
                        <div class="example-content">
                            <label for="service_title">Service Title</label>
                            <input type="text" class="form-control form-control-rounded m-b-sm" id="service_title" placeholder="Service Title" name="service_title">
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
                            <input readonly type="text" class="form-control form-control-rounded m-b-sm "   id="icon_input" name="service_icon">
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
                                    <span><i style="cursor:pointer ; " class="<?=$font?> fa-2x col-xl-1 col-md-1 col-sm-1 m-2 text-center click_icon" onMouseOver="this.style.color='red'"
                                     onMouseOut="this.style.color='black'" id="<?=$font?>" aria-hidden="true"></i></span>
                                    <?php
                                    endforeach

                                    ?>

                                </div>
                            </div>
                        </div>
                        <div class="example-content">
                            <label for="service_description">Service Description</label>
                            <textarea class="form-control form-control-rounded m-b-sm" name="service_description" id="service_description" cols="30" rows="4"></textarea>
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
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="example-content ">

                            <button class="btn btn-primary ">Add Services</button>

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
    $(document).ready(function(){
        $('.click_icon').click(function(){
            $('#icon_input').val($(this).attr('id'));
        })
    })
</script>