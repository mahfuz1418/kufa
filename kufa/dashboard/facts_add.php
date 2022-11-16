<?php
require_once('./includes/dashboard_header.php');
?>


<div class="row justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Add Your Facts</h5>
            </div>
            <div class="card-body">
                <?php
                if (isset($_SESSION['facts_success'])) { ?>
                    <div class="alert alert-success text-center">
                        <strong><?= $_SESSION['facts_success'] ?></strong>
                    </div>
                <?php
                }
                unset($_SESSION['facts_success']);
                ?>
                <?php
                if (isset($_SESSION['facts_error'])) { ?>
                    <div class="alert alert-danger text-center">
                        <strong><?= $_SESSION['facts_error'] ?></strong>
                    </div>
                <?php
                }
                unset($_SESSION['facts_error']);
                ?>
                <form action="./facts_add_data.php" method="post">
                    <div class="example-container">
                        <div class="example-content">
                            <label for="facts_icon">Facts Icon</label>
                            <input readonly type="text" class="form-control form-control-rounded m-b-sm " id="facts_icon" name="facts_icon">
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
                            <label for="facts_count">Facts Count</label>
                            <input type="number" class="form-control form-control-rounded m-b-sm" id="facts_count" placeholder="Facts Count" name="facts_count">
                        </div>
                        <div class="example-content">
                            <label for="facts_title">Facts Title</label>
                            <input type="text" class="form-control form-control-rounded m-b-sm" id="facts_title" placeholder="Facts Title" name="facts_title">
                        </div>
                        <div class="example-content ">
                            <button class="btn btn-primary ">Add Facts</button>
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
            $('#facts_icon').val($(this).attr('id'));
        })
    })
</script>