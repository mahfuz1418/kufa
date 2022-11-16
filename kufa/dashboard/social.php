<?php
require_once('./includes/dashboard_header.php');
require_once('../db_connect.php');

?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="page-description">
                <h1>PROFIE</h1>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-2"></div>

        <div class="col-xl-8">
            <div class="card widget widget-list">
                <div class="card-header">
                    <h5 class="card-title">Update Your Social Link</h5>
                </div>
                <div class="card-body">


                    <?php
                    if (isset($_SESSION['link_success'])) { ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <h5 class="text-light mt-3"><?= $_SESSION['link_success'] ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                    <?php
                    }
                    unset($_SESSION['link_success']);
                    ?>

                    <?php
                    if (isset($_SESSION['link_error'])) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <h5 class="text-light mt-3"><?= $_SESSION['link_error'] ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                    <?php
                    }
                    unset($_SESSION['link_error']);
                    ?>

                    <form method="POST" action="./social_data.php" enctype="multipart/form-data">

                        <!-- Add Social link  -->
                        <?php
                        $id = $_SESSION['auth_id'];
                        $social_link_query = "SELECT * FROM admins WHERE id = $id";
                        $social_link_db = mysqli_query($db_connect, $social_link_query);
                        $social_link_fetch = mysqli_fetch_assoc($social_link_db);
                        ?>
                        <div class="row mb-3">
                            <label for="facebook" class="col-form-label">Facebook</label>
                            <div>
                                <input type="url" placeholder="Input Your Facebook Link" class="form-control" id="facebook" name="facebook_link" value="<?= $social_link_fetch['facebook']?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="twitter" class="col-form-label">Twitter</label>
                            <div>
                                <input type="url" placeholder="Input Your Twitter Link" class="form-control" id="twitter" name="twitter_link" value="<?= $social_link_fetch['twitter']?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="instagram" class="col-form-label">Instagram</label>
                            <div>
                                <input type="url" placeholder="Input Your Instagram Link" class="form-control" id="instagram" name="instagram_link" value="<?= $social_link_fetch['twitter']?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="linkedin" class="col-form-label">Linked in</label>
                            <div>
                                <input type="url" placeholder="Input Your Linked in Link" class="form-control" id="linkedin" name="linkedin_link" value="<?= $social_link_fetch['linkedin']?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary">Update Links</button>
                            </div>
                            <div class="col-2"></div>
                            <div class="col-6">
                                

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