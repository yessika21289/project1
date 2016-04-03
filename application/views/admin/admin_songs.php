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

        <?php if(isset($added_id)): ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong>Success!</strong> Song has been added.
                    </div>
                </div>
            </div>
        <?php elseif(isset($updated_id)): ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong>Success!</strong> Song has been updated.
                    </div>
                </div>
            </div>
        <?php elseif(isset($set_active)): ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="alert
                     <?php
                    if($set_active == 'published') echo "alert-success";
                    else echo "alert-warning";
                    ?>
                    alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong>Success!</strong> Song has been <?php echo $set_active; ?>.
                    </div>
                </div>
            </div>
        <?php elseif(isset($delete_confirm)): ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong>Success!</strong> Song has been deleted.
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="row" style="margin: 0 0 15px 0;">
            <a class="btn btn-primary" href="<?php echo base_url(); ?>myadminkw/Songs/add" title="Add Songs">
                <span class="fa fa-plus"></span> Add Songs
            </a>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <?php
                        if(empty($songs)):
                    ?>
                        <header class="panel-heading">
                            -No data stored-
                        </header>
                    <?php else: ?>

                    <header class="panel-heading">
                        All Songs
                    </header>

                    <table class="table table-striped table-advance table-hover">
                        <tbody>
                        <tr>
                            <th>No</th>
                            <th></th>
                            <th>Title</th>
                            <th>Lyric</th>
                            <th>Artist</th>
                            <th>Release Date</th>
                            <th>Updated Date</th>
                            <th>Updated By</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        $no = 0;
                        foreach($songs as $song):
                            $song_cover_path = (!empty($song->song_cover_path)) ? $song->song_cover_path : 'assets/img/default_cover.png';
                            $no++;
                            $song_changed = '';
                            $label = '';
                            if($song->id == $added_id || $song->id == $updated_id) $song_changed = 'success';
                            if($song->id == $set_active_id && $set_active == 'published') $song_changed = 'success';
                            if($song->id == $set_active_id && $set_active == 'unpublished') $song_changed = 'warning';
                            ?>
                            <tr class="<?php  echo $song_changed; ?>">
                                <td><?php echo $no; ?></td>
                                <td>
                                    <img src="<?php echo base_url().$song_cover_path; ?>" width="30">
                                </td>
                                <td>
                                    <?php echo $song->title; ?>
                                    <?php if($song->is_active == 0): ?>
                                        <br/><span class="label label-warning">-not published-</span>
                                    <?php endif; ?>
                                </td>

                                <td><?php echo nl2br(substr($song->lyric, 0, 100)); ?></td>
                                <td><?php echo $song->artist; ?></td>
                                <td><?php echo date('d-m-Y', $song->release_date); ?></td>
                                <td><?php echo date('d-m-Y | H:i:s', $song->updated_at); ?></td>
                                <td><?php echo $song->updated_by; ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-primary" title="Edit"
                                           href="<?php echo base_url() ?>myadminkw/Songs/add/<?php echo $song->id; ?>">
                                            <i class="icon_pencil-edit"></i></a>
                                        <?php if($song->is_active == 0): ?>
                                            <a class="btn btn-success" title="Publish"
                                               href="<?php echo base_url() ?>myadminkw/Songs/add?id=<?php echo $song->id; ?>&is_active=1">
                                                <i class="icon_cloud-upload_alt"></i></a>
                                        <?php else: ?>
                                            <a class="btn btn-warning" title="Unpublish"
                                               href="<?php echo base_url() ?>myadminkw/Songs/add?id=<?php echo $song->id; ?>&is_active=0" >
                                                <i class="icon_cloud"></i></a>
                                        <?php endif; ?>
                                        <a class="btn btn-danger" title="Delete"
                                           onclick="return confirm('Are you sure?');"
                                           href="<?php echo base_url() ?>myadminkw/Songs/delete/<?php echo $song->id; ?>">
                                            <i class="icon_trash_alt"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php endif; ?>
                </section>
            </div>
        </div>

    </section>
</section>
<!--main content end-->
