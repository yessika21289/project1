<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!--overview start-->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="icon_group"></i> How to Buy</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?php echo base_url(); ?>myadminkw">Home</a></li>
                    <li><i class="icon_group"></i>How to Buy</li>
                </ol>
            </div>
        </div>

        <?php if(isset($update_confirm) && $update_confirm == 1): ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong>Success!</strong> "How to Buy" has been updated.
                    </div>
                </div>
            </div>
        <?php elseif(isset($add_confirm) && $add_confirm == 1): ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong>Success!</strong> "How to Buy" has been added.
                    </div>
                </div>
            </div>
        <?php elseif(isset($delete_confirm) && $delete_confirm == 1): ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong>Clear!</strong>
                    </div>
                </div>
            </div>

        <?php endif; ?>

        <div class="row">
            <!-- CKEditor -->
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        How to Buy
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            <form action="<?php echo base_url(); ?>myadminkw/Merchandise/howtobuy" class="form-horizontal" method="post">
                                <div class="form-group">
                                    <label class="control-label col-sm-1">How to buy:</label>
                                    <div class="col-sm-11">
                                        <textarea class="form-control editor" name="howtobuy" rows="6">
                                            <?php if(!empty($howtobuy)) echo $howtobuy; ?>
                                        </textarea>
                                        <span class="pull-right">
                                            <button style="margin-top:20px;" class="btn btn-primary"
                                                type="submit" name="save" value="1">
                                                Save
                                            </button>
                                        </span>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div><!--/.row-->

    </section>
</section>
<!--main content end-->
</section>
<!-- container section start -->