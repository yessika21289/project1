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
//        $songs_id = (!empty($songs[0]->id)) ? $songs[0]->id : '';
//        $title = (!empty($songs[0]->title)) ? $songs[0]->title : '';
//        $content = (!empty($songs[0]->content)) ? $songs[0]->content : '';
//        $lyric = (!empty($songs[0]->lyric)) ? $songs[0]->lyric : '';
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
                                        <div class="col-md-2 clearfix" style="width: 13.6667%;">
                                            <img class="song-cover" src="<?php echo base_url(); ?>img/default_cover.png">
                                            <input id="upload-cover" type="file"/>
                                            <a href="" id="upload-cover-link" class="edit-cover">Edit</a>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="title"
                                               placeholder="Song title..." value="<?php //echo $title; ?>">
                                            <input type="text" class="form-control" name="title"
                                                   placeholder="Author..." value="<?php //echo $title; ?>">
                                            <input type="date" class="form-control" name="title"
                                                   placeholder="Release Date..." value="<?php //echo $title; ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <textarea class="lyric" rows="20">
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

