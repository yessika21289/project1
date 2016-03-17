<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!--overview start-->

        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="icon_headphones"></i> Songs</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?php echo base_url(); ?>admin">Home</a></li>
                    <li><i class="icon_headphones"></i>Songs</li>
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
            $song_id = (!empty($songs[0]->id)) ? $songs[0]->id : '';
            $title = (!empty($songs[0]->title)) ? $songs[0]->title : '';
            $lyric = (!empty($songs[0]->lyric)) ? $songs[0]->lyric : '';
            $artist = (!empty($songs[0]->artist)) ? $songs[0]->artist : '';
            $release_date = (!empty($songs[0]->release_date)) ? $songs[0]->release_date : '';
            $song_cover_path = (!empty($songs[0]->song_cover_path)) ? $songs[0]->song_cover_path : '';
            $song_path = (!empty($songs[0]->song_path)) ? $songs[0]->song_path : '';
        ?>

        <div class="row">
            <!-- CKEditor -->
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Songs
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            <form action="<?php echo base_url(); ?>admin/Songs/add" class="form-horizontal"
                                  method="post" enctype="multipart/form-data">
                                <div class="form-group form-song">

                                    <div class="row">
                                        <div class="col-md-2 clearfix preview-cover" style="width: 13.6667%;">
                                            <div id="cover-image-holder" class="song-cover"
                                                <?php if(!empty($song_cover_path)): ?>
                                                style="background: url(<?php echo base_url().$song_cover_path; ?>) no-repeat center;"
                                                 <?php endif; ?>
                                            ></div>
                                            <input id="upload-cover" type="file" name="song_cover" />
                                            <a href="" id="upload-cover-link" class="edit-cover">Edit</a>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="title"
                                               placeholder="Song title..." value="<?php echo $title; ?>">
                                            <input type="text" class="form-control" name="artist"
                                                   placeholder="Artist..." value="<?php echo $artist; ?>">
                                            <input type="date" class="form-control" name="release_date"
                                                   placehodlder="Release Date..." value="<?php echo $release_date; ?>">
                                            <input type="hidden" class="form-control" name="song_id" value="<?php echo $song_id; ?>">
                                        </div>
                                    </div>

                                    <div class="row" style="margin-top:5px;">
                                        <div class="col-md-2" style="width: 13.6667%; padding-right:5px;">
                                            <label class="pull-right upload-song">Upload song :</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="file" class="form-control" name="song">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <textarea name="lyric" class="lyric" rows="20">
                                            <?php echo $lyric; ?>
                                        </textarea>

                                    <div class="lyric">
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