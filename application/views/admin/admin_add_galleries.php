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
                    <li><i class="fa fa-plus"></i>Add Gallery</li>
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
//            $video_id = (!empty($video[0]->id)) ? $video[0]->id : '';
//            $title = (!empty($album[0]->title)) ? $album[0]->title : '';
//            $link = (!empty($video[0]->link)) ? $video[0]->link : '';
        ?>

        <div class="row">
            <!-- CKEditor -->
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Add Gallery
                    </header>
                    <div class="panel-body">

                        <div id="add-album-form" class="row form">
                            <form action="<?php echo base_url(); ?>myadminkw/Galleries/add_album" class="form-horizontal"
                                  method="post" enctype="multipart/form-data">

                                <div class="row">
                                    <label class="col-md-3 control-label">Album</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" name="album_title">
                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <label class="col-md-3 control-label">Date</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="date" name="album_date">
                                    </div>
                                </div>

                                <br/>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pull-right">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                            <a class="btn btn-danger" title="Cancel"
                                               href="<?php echo base_url(); ?>myadminkw/Galleries">Cancel
                                            </a>
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