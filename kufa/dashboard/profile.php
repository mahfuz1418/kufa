<?php
require_once('./includes/dashboard_header.php');


$user_query = "SELECT id,name,email FROM admins ORDER BY name LIMIT 8";
$user_query_db = mysqli_query($db_connect, $user_query);

$total_user = "SELECT COUNT(*) AS 'total' FROM admins";
$total_user_db = mysqli_query($db_connect, $total_user);
$total_user_result = mysqli_fetch_assoc($total_user_db);


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
                    <h5 class="card-title">Update Your Profile</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="./auth/profile_data.php" enctype="multipart/form-data">

                        <!-- change name field  -->
                        <h5 class="text-center bg-info text-white p-2">Change Your Name</h5>
                        <div class="row mb-3">
                            <label for="name" class="col-form-label">Name</label>
                            <div>
                                <input type="text" class="form-control" id="name" name="user_name" value="<?= $_SESSION['auth_name'] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary" name="update_name">Update Name</button>
                            </div>
                            <div class="col-2"></div>
                            <div class="col-6">
                                <?php
                                if (isset($_SESSION['name_error'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['name_error'] ?></p>
                                <?php
                                }
                                unset($_SESSION['name_error']);
                                ?>
                                <?php
                                if (isset($_SESSION['name_updated'])) { ?>
                                    <h5 class="text-dark mt-3"><?= $_SESSION['name_updated'] ?></h5>
                                <?php
                                }
                                unset($_SESSION['name_updated']);
                                ?>
                            </div>
                        </div>
                        <hr>

                        <!-- change password field  -->
                        <h5 class="text-center bg-info text-white p-2">Change Password</h5>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-form-label">Curennt Password</label>
                            <div>
                                <input type="password" class="form-control" id="inputPassword3" name="current_password">
                            </div>
                            <?php
                            if (isset($_SESSION['current_pass_error'])) { ?>
                                <p class="text-danger"><?= $_SESSION['current_pass_error'] ?></p>
                            <?php
                            }
                            unset($_SESSION['current_pass_error']);
                            ?>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword4" class="col-form-label">New Password</label>
                            <div>
                                <input type="password" class="form-control" id="inputPassword4" name="new_password">
                            </div>
                            <?php
                            if (isset($_SESSION['new_pass_error'])) { ?>
                                <p class="text-danger"><?= $_SESSION['new_pass_error'] ?></p>
                            <?php
                            }
                            unset($_SESSION['new_pass_error']);
                            ?>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword5" class="col-form-label">Confirm Password</label>
                            <div>
                                <input type="password" class="form-control" id="inputPassword5" name="confirm_password">
                            </div>
                            <?php
                            if (isset($_SESSION['con_pass_error'])) { ?>
                                <p class="text-danger"><?= $_SESSION['con_pass_error'] ?></p>
                            <?php
                            }
                            unset($_SESSION['con_pass_error']);
                            ?>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary" name="update_pass">Change Password</button>
                            </div>
                            <div class="col-2"></div>
                            <div class="col-6">
                                <?php
                                if (isset($_SESSION['pass_updated'])) { ?>
                                    <h5 class="text-dark mt-3 "><?= $_SESSION['pass_updated'] ?></h5>
                                <?php
                                }
                                unset($_SESSION['pass_updated']);
                                ?>
                            </div>
                        </div>
                        <hr>


                        <!-- upload profile part  -->
                        <h5 class="text-center bg-info text-white p-2">Upload Your Profile Picture</h5>
                        <div class="row mb-3">
                            <label for="name" class="col-form-label">Upload Your Profile</label>
                            <div class="col-8">
                                <div>
                                    <input type="file" class="form-control" id="name" name="profile_pic" value="<?= $_SESSION['auth_name'] ?>">
                                </div>
                                <?php
                                if (isset($_SESSION['profile_updated_error'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['profile_updated_error'] ?></p>
                                <?php
                                }
                                unset($_SESSION['profile_updated_error']);
                                ?>
                            </div>
                            <div class="col-4 text-center">
                                <button type="submit" class="btn btn-primary" name="update_profile">Upload Photo</button>
                            </div>
                            <div>
                                <?php
                                if (isset($_SESSION['profile_updated'])) { ?>
                                    <h5 class="text-dark mt-3 text-center"><?= $_SESSION['profile_updated'] ?></h5>
                                <?php
                                }
                                unset($_SESSION['profile_updated']);
                                ?>
                            </div>
                        </div>
                        <hr>


                        <!-- update phone number field  -->
                        <h5 class="text-center bg-info text-white p-2">Upload Your Phone Number</h5>
                        <div class="row mb-3">
                            <label for="number" class="col-form-label">Input Your Phone Number</label>
                            <div class="col-8">
                                <div>
                                    <input type="tel" class="form-control" id="number" name="phone_number" value="">
                                </div>
                                <?php
                                if (isset($_SESSION['number_error'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['number_error'] ?></p>
                                <?php
                                }
                                unset($_SESSION['number_error']);
                                ?>
                            </div>
                            <div class="col-4">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary " name="update_phone_number">Add Number</button>
                                </div>
                            </div>
                            <?php
                            if (isset($_SESSION['number_updated'])) { ?>
                                <h5 class="text-dark mt-3 text-center"><?= $_SESSION['number_updated'] ?></h5>
                            <?php
                            }
                            unset($_SESSION['number_updated']);
                            ?>

                        </div>
                        <hr>
                        <!-- UPDATE ADDRESS PART  -->
                        <h5 class="text-center bg-info text-white p-2">Update Your Address</h5>
                        <div class="row mb-3" >
                            <label for="address" class="col-form-label">Address</label>

                            <div>
                                <input type="text" class="form-control" id="address" name="address" value="">
                            </div>
                            <br>
                            <?php
                            if (isset($_SESSION['address_error'])) { ?>
                                <p class="text-danger"><?= $_SESSION['address_error'] ?></p>
                            <?php
                            }
                            unset($_SESSION['address_error']);
                            ?>
                            

                        </div>
                        <div class="row mb-3">
                        <div>
                                <button type="submit" class="btn btn-primary " name="update_address">Add Address</button>
                            </div>
                            <?php
                            if (isset($_SESSION['address_updated'])) { ?>
                                <h5 class="text-dark mt-3 text-center"><?= $_SESSION['address_updated'] ?></h5>
                            <?php
                            }
                            unset($_SESSION['address_updated']);
                            ?>
                        </div>



                    </form>
                </div>
            </div>
        </div>


    </div>

    <?php
    require_once('./includes/dashboard_footer.php');

    ?>