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

        <?php if(isset($added_id)): ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong>Success!</strong> Video has been added.
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
                        <strong>Success!</strong> Video has been updated.
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
                        <strong>Success!</strong> Video has been <?php echo $set_active; ?>.
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
                        <strong>Success!</strong> Video has been deleted.
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="row" style="margin: 0 0 15px 0;">
            <a class="btn btn-primary" href="<?php echo base_url(); ?>myadminkw/Videos/add" title="Add Videos">
                <span class="fa fa-plus"></span> Add Video
            </a>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <?php
                    if(empty($videos)):
                        ?>
                        <header class="panel-heading">
                            -No data stored-
                        </header>
                    <?php else: ?>

                        <header class="panel-heading">
                            All News
                        </header>

                        <table class="table table-striped table-advance table-hover">
                            <tbody>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Youtube ID</th>
                                <th>Description</th>
                                <th>Updated Date</th>
                                <th>Updated By</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            $no = 0;
                            foreach($videos as $video):
                                $no++;
                                $video_changed = '';
                                $label = '';
                                if($video->id == $added_id || $video->id == $updated_id) $video_changed = 'success';
                                if($video->id == $set_active_id && $set_active == 'published') $video_changed = 'success';
                                if($video->id == $set_active_id && $set_active == 'unpublished') $video_changed = 'warning';
                                ?>
                                <tr class="<?php  echo $video_changed; ?>">
                                    <td><?php echo $no; ?></td>
                                    <td>
                                        <span class="title"><?php echo $video->title; ?></span>
                                        <?php if($video->is_active == 0): ?>
                                            <br/><span class="label label-warning">-not published-</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo $video->link; ?></td>
                                    <td><?php echo $video->description; ?></td>
                                    <td><?php echo date('d-m-Y | H:i:s', $video->updated_at); ?></td>
                                    <td><?php echo $video->updated_by; ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-primary" title="Edit"
                                               href="<?php echo base_url() ?>myadminkw/Videos/add/<?php echo $video->id; ?>">
                                                <i class="icon_pencil-edit"></i></a>
                                            <?php if($video->is_active == 0): ?>
                                                <a class="btn btn-success" title="Publish"
                                                   href="<?php echo base_url() ?>myadminkw/Videos/add?id=<?php echo $video->id; ?>&is_active=1">
                                                    <i class="icon_cloud-upload_alt"></i></a>
                                            <?php else: ?>
                                                <a class="btn btn-warning" title="Unpublish"
                                                   href="<?php echo base_url() ?>myadminkw/Videos/add?id=<?php echo $video->id; ?>&is_active=0" >
                                                    <i class="icon_cloud"></i></a>
                                            <?php endif; ?>
                                            <a class="btn btn-danger" title="Delete"
                                               onclick="return confirm('Are you sure?');"
                                               href="<?php echo base_url() ?>myadminkw/Videos/delete/<?php echo $video->id; ?>">
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
