<?php
require_once('./includes/dashboard_header.php');
?>


<div class="row justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Add About</h5>
            </div>
            <div class="card-body">
                <?php
                if (isset($_SESSION['about_success'])) { ?>
                    <div class="alert alert-success text-center">
                        <strong><?= $_SESSION['about_success'] ?></strong>
                    </div>
                <?php
                }
                unset($_SESSION['about_success']);
                ?>
                <?php
                if (isset($_SESSION['about_error'])) { ?>
                    <div class="alert alert-danger text-center">
                        <strong><?= $_SESSION['about_error'] ?></strong>
                    </div>
                <?php
                }
                unset($_SESSION['about_error']);
                ?>
                <form action="./about_data.php" method="post">
                    <div class="example-container">

                        <div class="example-content">
                            <label for="about_me">About Me</label>

                            <textarea class="form-control form-control-rounded m-b-sm" name="about_me" id="about_me" cols="30" rows="4"></textarea>
                        </div>

                        <div class="example-content">
                            <label for="skil_icon">Skill Icon</label>

                            <input readonly type="text" class="form-control form-control-rounded m-b-sm " id="skil_icon" name="skil_icon">
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
                                <div class="card-body" style="height:130px ; ">
                                    <?php
                                    $fonts = array(
                                        'fab fa-html5',
                                        'fab fa-css3-alt',
                                        'fab fa-js-square',
                                        'fab fa-php',
                                        'fab fa-wordpress',
                                        'fab fa-python',
                                        'fab fa-bootstrap',
                                        'fab fa-laravel',
                                        'fab fa-java',
                                        'fab fa-node',
                                    );

                                    foreach ($fonts as  $font) : ?>
                                        <span><i style="cursor:pointer ; " class="<?= $font ?> fa-2x col-xl-1 col-md-1 col-sm-1 m-2 text-center click_icon" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='black'" id="<?= $font ?>" aria-hidden="true"></i></span>
                                    <?php
                                    endforeach

                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="example-content">
                            <label for="skill_title">Skill Title</label>
                            <input type="text" class="form-control form-control-rounded m-b-sm" id="skill_title" placeholder="Education Title" name="skill_title">
                        </div>
                        <div class="example-content">
                            <label for="skill_persent">Skill Persentage</label>
                            <input type="number" class="form-control form-control-rounded m-b-sm" id="skill_persent" placeholder="Achive Years" name="skill_persent">
                        </div>
                        <div class="example-content ">
                            <button class="btn btn-primary " name="add_skill">Add skills</button>
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
            $('#skil_icon').val($(this).attr('id'));
        })
    })
</script>