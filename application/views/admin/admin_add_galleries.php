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

                        <div class="row">
                            <div class="col-md-7">
                                <div class="col-md-12">
                                    <a class="btn btn-primary" id="add-album" title="Add"
                                       href="#" onclick="addAlbum()">
                                        <span class="fa fa-plus"></span> Add Album
                                    </a>
                                </div>
                            </div>
                        </div>

                        <br/>

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
                                        <button class="btn btn-primary pull-right" type="submit">Save</button>
                                    </div>
                                </div>

                            </form>
                        </div>

                        <br/>

                        <div class="form">
                            <form action="<?php echo base_url(); ?>myadminkw/Galleries/add" class="form-horizontal"
                                  method="post" enctype="multipart/form-data">
                                <?php if(!empty($albums)): ?>
                                <div class="row">
                                    <div class="col-md-7">
                                        <label class="col-md-1 control-label">Album</label>
                                        <div class="col-md-4">
                                            <select name="album_id" class="form-control">
                                                <?php foreach($albums as $album): ?>
                                                <option value="<?php echo $album->id; ?>">
                                                    <?php echo $album->title.' ('.date('d-m-Y', $album->album_date).')'; ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <br/>

                                <div class="row" style="margin-left: 0px;">
                                    <div class="col-md-12">
                                        <input type="file" multiple class="multi with-preview" name="photos[]"/>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="col-md-12 ">
                                        <span class="pull-left" style="margin-top:20px;">
                                            <button type="submit" class="btn btn-primary">
                                                Save
                                            </button>
                                            <a class="btn btn-danger" title="Cancel"
                                               href="<?php echo base_url(); ?>myadminkw/Galleries">Cancel
                                            </a>
                                        </span>
                                        </div>
                                    </div>
                                </div>

                                <?php endif; ?>

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