<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!--overview start-->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="icon_group"></i> News</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?php echo base_url(); ?>admin">Home</a></li>
                    <li><i class="icon_group"></i>News</li>
                </ol>
            </div>
        </div>

        <?php
            $songs_id = (!empty($songs[0]->id)) ? $songs[0]->id : '';
            $title = (!empty($songs[0]->title)) ? $songs[0]->title : '';
            $content = (!empty($songs[0]->content)) ? $songs[0]->content : '';
            $lyric = (!empty($songs[0]->lyric)) ? $songs[0]->lyric : '';
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
                                            <div id="cover-image-holder" class="song-cover"></div>
                                            <input id="upload-cover" type="file" name="song_cover" />
                                            <a href="" id="upload-cover-link" class="edit-cover">Edit</a>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="title"
                                               placeholder="Song title..." value="<?php //echo $title; ?>">
                                            <input type="text" class="form-control" name="author"
                                                   placeholder="Author..." value="<?php //echo $title; ?>">
                                            <input type="date" class="form-control" name="release_date"
                                                   placeholder="Release Date..." value="<?php //echo $title; ?>">
<!--                                            <div class="input-append date">-->
<!--                                                <input type="text" class="span2">-->
<!--                                                    <span class="add-on"><i class="icon-th"></i></span>-->
<!--                                            </div>-->
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
                                            <?php //echo $lyric; ?>
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