<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!--overview start-->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="icon_images"></i> Galleries</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?php echo base_url(); ?>myadminkw">Home</a></li>
                    <li><i class="icon_images"></i>Galleries</li>
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
                        <strong>Success!</strong> New gallery has been added.
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
                        <strong>Success!</strong> Gallery has been updated.
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
                        <strong>Success!</strong> Gallery has been <?php echo $set_active; ?>.
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
                        <strong>Success!</strong> Gallery has been deleted.
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="row" style="margin: 0 0 15px 0;">
            <a class="btn btn-primary" href="<?php echo base_url(); ?>myadminkw/Galleries/add" title="Add Gallery">
                <span class="fa fa-plus"></span> Add Gallery
            </a>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <?php
                    if(empty($albums)):
                        ?>
                        <header class="panel-heading">
                            -No data stored-
                        </header>
                    <?php else: ?>

                        <header class="panel-heading">
                            All Galleries
                        </header>

                        <table class="table table-striped table-advance table-hover">
                            <tbody>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Updated Date</th>
                                <th>Updated By</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            $no = 0;
                            foreach($albums as $album):
                                $no++;
                                $album_changed = '';
                                $label = '';
                                if($album->id == $added_id || $album->id == $updated_id) $album_changed = 'success';
                                if($album->id == $set_active_id && $set_active == 'published') $album_changed = 'success';
                                if($album->id == $set_active_id && $set_active == 'unpublished') $album_changed = 'warning';
                                ?>
                                <tr class="<?php  echo $album_changed; ?>">
                                    <td><?php echo $no; ?></td>
                                    <td>
                                        <span class="title"><?php echo $album->title; ?></span>
                                        <?php if($album->is_active == 0): ?>
                                            <br/><span class="label label-warning">-not published-</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo date('d-m-Y', $album->album_date); ?></td>
                                    <td><?php echo date('d-m-Y | H:i:s', $album->updated_at); ?></td>
                                    <td><?php echo $album->updated_by; ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-primary" title="Edit"
                                               href="<?php echo base_url() ?>myadminkw/Galleries/edit/<?php echo $album->id; ?>">
                                                <i class="icon_pencil-edit"></i></a>
                                            <?php if($album->is_active == 0): ?>
                                                <a class="btn btn-success" title="Publish"
                                                   href="<?php echo base_url() ?>myadminkw/Galleries/add?id=<?php echo $album->id; ?>&is_active=1">
                                                    <i class="icon_cloud-upload_alt"></i></a>
                                            <?php else: ?>
                                                <a class="btn btn-warning" title="Unpublish"
                                                   href="<?php echo base_url() ?>myadminkw/Galleries/add?id=<?php echo $album->id; ?>&is_active=0" >
                                                    <i class="icon_cloud"></i></a>
                                            <?php endif; ?>
                                            <a class="btn btn-danger" title="Delete"
                                               onclick="return confirm('Are you sure?');"
                                               href="<?php echo base_url() ?>myadminkw/Galleries/delete/<?php echo $album->id; ?>">
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
