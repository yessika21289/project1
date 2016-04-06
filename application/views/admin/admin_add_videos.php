<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!--overview start-->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-video-camera"></i> Videos</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?php echo base_url(); ?>myadminkw">Home</a></li>
                    <li><i class="fa fa-video-camera"></i>Videos</li>
                </ol>
            </div>
        </div>

        <?php
        $video_id = (!empty($video[0]->id)) ? $video[0]->id : '';
        $title = (!empty($video[0]->title)) ? $video[0]->title : '';
        $link = (!empty($video[0]->link)) ? $video[0]->link : '';
        $description = (!empty($video[0]->description)) ? $video[0]->description : '';
        ?>

        <div class="row">
            <!-- CKEditor -->
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Add Videos
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            <form action="<?php echo base_url(); ?>myadminkw/Videos/add" class="form-horizontal"
                                  method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <label class="col-md-2 control-label" style="width: 10%;">Title</label>

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="title"
                                               value="<?php echo $title; ?>">
                                    </div>
                                </div>
                                <br/>

                                <div class="row">
                                    <label class="control-label col-md-2" style="width: 10%;">Youtube ID</label>

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="youtube_id"
                                               value="<?php echo $link; ?>">
                                    </div>
                                </div>
                                <br/>

                                <div class="row">
                                    <label class="control-label col-md-2" style="width: 10%;">Description</label>

                                    <div class="col-md-6">
                                        <input type="text" class="form-control"
                                               name="description" value="<?php echo $description; ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2" style="width: 10%;"></div>
                                    <div class="col-md-6">
                                        <input type="hidden" name="video_id" value="<?php echo $video_id; ?>">
                                        <span class="pull-right" style="margin-top:20px;">
                                            <button type="submit" class="btn btn-primary">
                                                Save
                                            </button>
                                            <a class="btn btn-danger" title="Cancel"
                                               href="<?php echo base_url(); ?>myadminkw/Videos">Cancel
                                            </a>
                                        </span>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!--/.row-->

    </section>
</section>
<!--main content end-->
</section>
<!-- container section start -->