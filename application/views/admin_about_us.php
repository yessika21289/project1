<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!--overview start-->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="icon_group"></i> About Us</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?php echo base_url(); ?>MyAdmin">Home</a></li>
                    <li><i class="icon_group"></i>About Us</li>
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
                    <strong>Success!</strong> About us has been updated.
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
                        <strong>Success!</strong> About us has been added.
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="row">
            <!-- CKEditor -->
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        About Us
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            <form action="<?php echo base_url(); ?>AboutUs/update" class="form-horizontal" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="control-label col-sm-1">About us:</label>
                                    <div class="col-sm-11">
                                        <textarea class="form-control ckeditor" name="about_us" rows="6">
                                            <?php
                                                if(!empty($about_us)):
                                                    echo $about_us;
                                            ?>
                                        </textarea>
                                        <input type="hidden" name="id_about_us" value="<?php echo $id_about_us; ?>">
                                        <?php endif; ?>
                                        <span class="pull-right">
                                            <button style="margin-top:20px;" type="submit" class="btn btn-primary">
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