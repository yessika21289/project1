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

        <?php
            $merchandise_id = (!empty($merchandise[0]->id)) ? $merchandise[0]->id : '';
            $title = (!empty($merchandise[0]['title'])) ? $merchandise[0]['title'] : '';
            $desc = (!empty($merchandise[0]['desc'])) ? $merchandise[0]['desc'] : '';
            $price = (!empty($merchandise[0]['price'])) ? $merchandise[0]['price'] : '';
            $image = (!empty($merchandise[0]['image'])) ? $merchandise[0]['image'] : '';
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
                                            <div id="merchandise-image-holder" class="merchandise"
                                                <?php if(!empty($image)): ?>
                                                    style="background: url(<?php echo base_url().$image; ?>) no-repeat center;"
                                                <?php endif; ?>></div>
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
                                            <button style="margin-top:20px;" type="submit" class="btn btn-primary pull-right">
                                                Save
                                            </button>
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