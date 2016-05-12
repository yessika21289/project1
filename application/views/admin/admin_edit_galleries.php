<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!--overview start-->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="icon_images"></i> Galleries</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?php echo base_url(); ?>myadminkw">Home</a></li>
                    <li><i class="icon_images"></i><a href="<?php echo base_url(); ?>myadminkw/Galleries">Galleries</a></li>
                    <li><i class="icon_pencil-edit"></i>Edit Gallery</li>
                </ol>
            </div>
        </div>

        <?php if (isset($error_upload)): ?>
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
            $album_id = (!empty($album[0]->id)) ? $album[0]->id : '';
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

                        <form action="<?php echo base_url(); ?>myadminkw/Galleries/edit_album" class="form-horizontal"
                              method="post" enctype="multipart/form-data" id="form-new-gallery" role="form">

                            <div class="row">
                                <div class="col-md-2">Album</div>
                                <div class="col-md-4">
<!--                                    <input type="hidden" name="old_album_title" value="--><?php //echo $title; ?><!--">-->
                                    <input class="form-control" type="text" name="album_title"
                                       value="<?php echo $title; ?>" readonly>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-2">Album Date</div>
                                <div class="col-md-4">
                                    <input class="form-control" type="date" name="album_date"
                                       value="<?php echo $album_date; ?>" readonly>
                                    <input type="hidden" id="album_id" name="album_id" value="<?php echo $album_id; ?>">
                                </div>
                            </div>

                            <br/>

                            <div class="row" style="padding-left: 15px;" id="images_preview">
                                <?php foreach ($photos as $photo): ?>
                                    <div class="img-preview-label col-md-3">
                                        <a class="img-preview-remove"
                                           href="<?php echo base_url() ?>myadminkw/Galleries/del_photo/<?php echo $photo->id; ?>">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                        <span class="img-preview-label">
                                            <span class="img-preview-title">
                                                <?php echo substr($photo->photo, strrpos($photo->photo, '/') + 1); ?>
                                            </span>
                                            <img class="MultiFile-preview" style="max-height: 150px; max-width: 150px;"
                                                 src="<?php echo base_url() . $photo->photo; ?>">
                                        </span>
                                    </div>
                                <?php endforeach; ?>

                            </div>
                            <br/>

                            <div class="row">
                                <div class="col-md-12">
                                    <label><strong>Add more photos</strong></label>
                                    <input type="file" multiple name="photos[]" id="photos"/>
                                </div>
                                <div class="uploading">
                                    <label>&nbsp;</label>
                                    <img src="<?php echo base_url().'assets/img/uploading.gif';?>"/>
                                </div>
                            </div>

                            <br/>

                            <div class="row">
                                <div class="col-md-12 ">
                                    <span class="pull-left">
                                        <button type="submit" class="btn btn-primary">
                                            Save
                                        </button>
                                        <a class="btn btn-danger" title="Cancel"
                                           href="<?php echo base_url(); ?>myadminkw/Galleries">Cancel
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>

    </section>
</section>
<!--main content end-->
</section>
<!-- container section start -->