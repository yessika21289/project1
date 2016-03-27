<?php //echo time();exit; ?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!--overview start-->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="icon_images"></i> Galleries</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?php echo base_url(); ?>admin">Home</a></li>
                    <li><i class="icon_images"></i><a href="<?php echo base_url(); ?>admin/Galleries">Galleries</a></li>
                    <li><i class="icon_pencil-edit"></i>Edit Gallery</li>
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
            print_r($album);
            print_r($photos);
            $title = (!empty($album[0]->title)) ? $album[0]->title : '';
            $album_date = (!empty($album[0]->album_date)) ? date('Y-m-d', $album[0]->album_date) : '';
        ?>

        <div class="row">
            <!-- CKEditor -->
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Edit Gallery
                    </header>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-1">Album</div>
                            <div class="col-md-2">
                                <input class="form-control" type="text" name="album_title" value="<?php echo $title; ?>">
                            </div>
                            <div class="col-md-2" style="width: 10%;">Album Date</div>
                            <div class="col-md-2">
                                <input class="form-control" type="date" name="album_title" value="<?php echo $album_date; ?>">
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

    </section>
</section>
<!--main content end-->
</section>
<!-- container section start -->