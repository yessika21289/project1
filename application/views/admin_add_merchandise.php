<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!--overview start-->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="icon_gift_alt"></i> Merchandise</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?php echo base_url(); ?>admin">Home</a></li>
                    <li><i class="icon_gift_alt"></i>Merchandise</li>
                </ol>
            </div>
        </div>
        <?php if(isset($error_upload)): ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong>Error!</strong> <?php echo $error_upload; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php
            $merchandise_id = (!empty($merchandise['id'])) ? $merchandise['id'] : '';
            $title = (!empty($merchandise['title'])) ? $merchandise['title'] : '';
            $desc = (!empty($merchandise['desc'])) ? $merchandise['desc'] : '';
            $price = (!empty($merchandise['price'])) ? $merchandise['price'] : '';
        ?>

        <div class="row">
            <!-- CKEditor -->
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Add Merchandise
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            <form action="<?php echo base_url(); ?>admin/Merchandise/add" class="form-horizontal"
                                  method="post" enctype="multipart/form-data">
                                <div class="form-group form-song">

                                    <div class="row">
                                        <div class="col-md-2 clearfix preview-merchandise" style="width: 13.6667%;">
                                            <div id="merchandise-image-holder" class="merchandise"></div>
                                            <input id="upload-merchandise" type="file" name="merchandise" />
                                            <a href="" id="upload-merchandise-link" class="edit-merchandise">Edit</a>
                                        </div>

                                        <div class="col-md-6">
                                            <input type="number" class="form-control" name="price"
                                                   placeholder="Price..." value="<?php echo $price; ?>">

                                            <input type="text" class="form-control" name="title"
                                                   placeholder="Title..." value="<?php echo $title; ?>">
                                        </div>

                                        <div class="col-md-6">
                                            <h3 style="margin-top: 0;">Description:</h3>
                                            <textarea name="desc" class="ckeditor" rows="6">
                                                <?php echo $desc; ?>
                                            </textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="lyric">
                                            <input type="hidden" name="merchandise_id" value="<?php echo $merchandise_id; ?>">
                                            <span class="pull-right" style="margin-top:20px;">
                                                <button type="submit" class="btn btn-primary">
                                                    Save
                                                </button>
                                                <a class="btn btn-danger" title="Cancel"
                                                   href="<?php echo base_url(); ?>admin/Merchandise">Cancel
                                                </a>
                                            </span>
                                        </div>
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