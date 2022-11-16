<?php

session_start();
if (!isset($_SESSION['auth_id'])) {
    header('location:dashboard/../opps.php');
}
require_once('../db_connect.php');
$explode = explode('/', $_SERVER['PHP_SELF']);
$page_name = end($explode);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Neptune - Responsive Admin Dashboard Template</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="./assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="./assets/plugins/pace/pace.css" rel="stylesheet">

    <!-- FORN AWESOME 5  -->
    <script src="https://kit.fontawesome.com/af8acfa6da.js" crossorigin="anonymous"></script>
    <!-- FONT AWESOME 4 CDN  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Theme Styles -->
    <link href="./assets/css/main.min.css" rel="stylesheet">
    <link href="./assets/css/custom.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="./assets/images/neptune.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/neptune.png" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="app align-content-stretch d-flex flex-wrap">
        <div class="app-sidebar">
            <div class="logo">
                <a href="home.php" class="logo-icon"><span class="logo-text">Neptune</span></a>
                <div class="sidebar-user-switcher user-activity-online">
                    <a href="#">

                        <?php
                        $id = $_SESSION['auth_id'];
                        $demo_pic_query = "SELECT profile_pic FROM admins WHERE id=$id ";
                        $demo_pic_connect_db = mysqli_query($db_connect, $demo_pic_query);
                        $demo_pic_name = mysqli_fetch_assoc($demo_pic_connect_db)['profile_pic'];
                        ?>
                        <img src="./upload/profile/<?= $demo_pic_name ?>">

                        <span class="user-info-text">
                            <button class="btn" onclick="myFunction()"><?= $_SESSION['auth_name'] ?></button> <br>

                        </span>


                    </a>
                    <div id="myDIV" class="mt-3">
                        <span class="user-state-info "><?= $_SESSION['auth_mail'] ?></span>
                    </div>

                </div>
            </div>
            <!-- Js  -->
            <script>
                function myFunction() {
                    var x = document.getElementById("myDIV");
                    if (x.style.display === "none") {
                        x.style.display = "block";
                    } else {
                        x.style.display = "none";
                    }
                }
            </script>
            <div class="app-menu">
                <ul class="accordion-menu">
                    <li class="sidebar-title">
                        Apps
                    </li>
                    <li class="<?= ($page_name == 'home.php') ? 'active-page' : '' ?>">
                        <a href="../dashboard/home.php" class="active"><i class="material-icons-two-tone">dashboard</i>Dashboard</a>
                    </li>
                    <li class="<?= ($page_name == 'profile.php') ? 'active-page' : '' ?>">
                        <a href="../dashboard/profile.php"><i class="material-icons-two-tone">face</i>Profile</a>
                    </li>
                    <li class="<?= ($page_name == 'social.php') ? 'active-page' : '' ?>">
                        <a href="../dashboard/social.php"><i class="material-icons-two-tone">link</i>Social Link</a>
                    </li>
                    <li class="<?= ($page_name == 'about_add.php') || ($page_name == 'about_list.php')  ? 'active-page' : '' ?>">
                        <a href=""><i class="material-icons-two-tone">person</i>Abouts<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a class="<?= ($page_name == 'about_add.php') ? 'active' : '' ?>" href="../dashboard/about_add.php">About Add</a>
                            </li>
                            <li>
                                <a class="<?= ($page_name == 'about_list.php') ? 'active' : '' ?>" href="../dashboard/about_list.php">About List</a>
                            </li>
                        </ul>
                    </li>

                    <li class="<?= ($page_name == 'service_add.php') || ($page_name == 'service_list.php')  ? 'active-page' : '' ?>">
                        <a href=""><i class="material-icons-two-tone">manage_accounts</i>Services<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a class="<?= ($page_name == 'service_add.php') ? 'active' : '' ?>" href="../dashboard/service_add.php">Service Add</a>
                            </li>
                            <li>
                                <a class="<?= ($page_name == 'service_list.php') ? 'active' : '' ?>" href="../dashboard/service_list.php">Service List</a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?= ($page_name == 'facts_add.php') || ($page_name == 'facts_list.php')  ? 'active-page' : '' ?>">
                        <a href=""><i class="material-icons-two-tone">fact_check</i>Facts<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a class="<?= ($page_name == 'facts_add.php') ? 'active' : '' ?>" href="../dashboard/facts_add.php">Facts Add</a>
                            </li>
                            <li>
                                <a class="<?= ($page_name == 'facts_list.php') ? 'active' : '' ?>" href="../dashboard/facts_list.php">Facts List</a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?= ($page_name == 'showcase_add.php') || ($page_name == 'showcase_list.php')  ? 'active-page' : '' ?>">
                        <a href=""><i class="material-icons-two-tone">preview</i>Showcase<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a class="<?= ($page_name == 'showcase_add.php') ? 'active' : '' ?>" href="../dashboard/showcase_add.php">Facts Add</a>
                            </li>
                            <li>
                                <a class="<?= ($page_name == 'showcase_list.php') ? 'active' : '' ?>" href="../dashboard/showcase_list.php">Facts List</a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?= ($page_name == 'testimonial_add.php') || ($page_name == 'testimonial_list.php')  ? 'active-page' : '' ?>">
                        <a href=""><i class="material-icons-two-tone">comment</i>Testimonial<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a class="<?= ($page_name == 'testimonial_add.php') ? 'active' : '' ?>" href="../dashboard/testimonial_add.php">Add Testimonial</a>
                            </li>
                            <li>
                                <a class="<?= ($page_name == 'testimonial_list.php') ? 'active' : '' ?>" href="../dashboard/testimonial_list.php">Testimonial List</a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?= ($page_name == 'brands.php') ? 'active-page' : '' ?>">
                        <a href="../dashboard/brands.php"><i class="material-icons-two-tone">branding_watermark</i>Brands</a>
                    </li>
                    <li class="<?= ($page_name == 'contact_list.php') ? 'active-page' : '' ?>">
                        <a href="../dashboard/contact_list.php"><i class="material-icons-two-tone">mail</i>Message</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="app-container">
            <div class="search">
                <form>
                    <input class="form-control" type="text" placeholder="Type here..." aria-label="Search">
                </form>
                <a href="#" class="toggle-search"><i class="material-icons">close</i></a>
            </div>
            <div class="app-header">
                <nav class="navbar navbar-light navbar-expand-lg">
                    <div class="container-fluid">
                        <div class="navbar-nav" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link hide-sidebar-toggle-button" href="#"><i class="material-icons">first_page</i></a>
                                </li>
                                <li class="nav-item dropdown hidden-on-mobile">
                                    <a class="nav-link dropdown-toggle" href="#" id="addDropdownLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="material-icons">add</i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="addDropdownLink">
                                        <li><a class="dropdown-item" href="#">New Workspace</a></li>
                                        <li><a class="dropdown-item" href="#">New Board</a></li>
                                        <li><a class="dropdown-item" href="#">Create Project</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown hidden-on-mobile">
                                    <a class="nav-link dropdown-toggle" href="#" id="exploreDropdownLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="material-icons-outlined">explore</i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-lg large-items-menu" aria-labelledby="exploreDropdownLink">
                                        <li>
                                            <h6 class="dropdown-header">Repositories</h6>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <h5 class="dropdown-item-title">
                                                    Neptune iOS
                                                    <span class="badge badge-warning">1.0.2</span>
                                                    <span class="hidden-helper-text">switch<i class="material-icons">keyboard_arrow_right</i></span>
                                                </h5>
                                                <span class="dropdown-item-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <h5 class="dropdown-item-title">
                                                    Neptune Android
                                                    <span class="badge badge-info">dev</span>
                                                    <span class="hidden-helper-text">switch<i class="material-icons">keyboard_arrow_right</i></span>
                                                </h5>
                                                <span class="dropdown-item-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
                                            </a>
                                        </li>
                                        <li class="dropdown-btn-item d-grid">
                                            <button class="btn btn-primary">Create new repository</button>
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                        </div>
                        <div class="d-flex">
                            <ul class="navbar-nav">
                                <li class="nav-item hidden-on-mobile">
                                    <a class="nav-link btn btn btn-info text-light btn-sm" href="../frontend/index.php" target="blank">Visit Site</a>
                                </li>
                                <li class="nav-item hidden-on-mobile">
                                    <a class="nav-link btn btn btn-danger text-light btn-sm" href="dashboard/../auth/signout.php">Sign Out</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="app-content">
                <div class="content-wrapper">