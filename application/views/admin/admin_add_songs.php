<style type="text/css">
    .ui-progressbar {
        position: relative;
    }
    .progress-label {
        position: absolute;
        left: 50%;
        top: 4px;
        font-weight: bold;
        text-shadow: 1px 1px 0 #fff;
    }
    .ui-widget-header {
        background-color: #4cd964;
        border-color: #4cd964;
    }
</style>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!--overview start-->

        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="icon_headphones"></i> Songs</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?php echo base_url(); ?>myadminkw">Home</a></li>
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
            $song_id = (!empty($song['id'])) ? $song['id'] : '';
            $title = (!empty($song['title'])) ? $song['title'] : '';
            $lyric = (!empty($song['lyric'])) ? $song['lyric'] : '';
            $artist = (!empty($song['artist'])) ? $song['artist'] : '';
            $release_date = (!empty($song['release_date'])) ? date('Y-m-d',$song['release_date']) : '';
            $cover = (!empty($song['song_cover_path'])) ? "background-image:url('/".$song['song_cover_path']."')" : '';
        ?>

        <div class="row">
            <!-- CKEditor -->
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Add Song
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            <form action="<?php echo base_url(); ?>myadminkw/Songs/add" id ="uploadSong" class="form-horizontal"
                                  method="post" enctype="multipart/form-data">
                                <div class="form-group form-song">

                                    <div class="row">
                                        <div class="col-md-2 clearfix preview-cover" style="width: 13.6667%;">
                                            <div id="cover-image-holder" class="song-cover" style="<?php echo $cover; ?>"></div>
                                            <input id="upload-cover" type="file" name="song_cover" />
                                            <a href="" id="upload-cover-link" class="edit-cover">Edit</a>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="title" required
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
                                            <input type="file" id="song-file" class="form-control" name="song">
                                        </div>
                                    </div>

                                    <div class="row" style="margin-top:5px;">
                                        <div class="col-md-2" style="width: 13.6667%; padding-right:5px;">
                                            <label class="pull-right upload-song">Lyric :</label>
                                        </div>
                                        <div class="col-md-6">
                                            <textarea class="form-control editor-2" name="lyric" rows="2"><?php echo $lyric; ?></textarea>
                                            <div class="row" style="margin-top:20px; margin-left: 0px; width: 100%">
                                                <div id="progressbar">
                                                    <div class="progress-label"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" style="margin-top:5px;">
                                        <div class="col-md-8" style="width: 63.66667%">
                                        <span class="pull-right" style="margin-top:20px;">
                                            <button type="submit" class="btn btn-primary">
                                                Save
                                            </button>
                                            <a class="btn btn-danger" title="Cancel"
                                               href="<?php echo base_url(); ?>myadminkw/Songs">Cancel
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
<script type="text/javascript">
    $('#uploadSong').submit(function(e) {
        $(".btn-primary").attr("disabled","disabled");
        $(".btn-danger").attr("disabled","disabled");
        var formData = new FormData(this);
        $.ajax({
            type:'POST',
            url: "<?php echo base_url(); ?>myadminkw/Songs/add",
            data:formData,
            xhr: function() {
                var myXhr = $.ajaxSettings.xhr();
                if(myXhr.upload){
                    if($("#song-file").val() != "") {
                        myXhr.upload.addEventListener('progress',progress, false);
                    }
                }
                return myXhr;
            },
            cache:false,
            contentType: false,
            processData: false,

            success:function(data){
                window.setTimeout(redirect,2000)
            },

            error: function(data){
                console.log(data);
            }
        });

        e.preventDefault();

    });

    function progress(e){

        if(e.lengthComputable){
            var max = e.total;
            var current = e.loaded;

            var Percentage = (current * 100)/max;

            $( "#progressbar" ).progressbar({
              value: Percentage,
              change: function() {
                $( ".progress-label" ).text( Math.ceil(Percentage) + "%" );
              }
            });


            if(Percentage >= 100)
            {
                $( ".progress-label" ).text( Math.ceil(Percentage) + "%" );
            }
        }  
     }

     function redirect(){
        window.location.href = '/myadminkw/Songs';
     }
</script>