<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!--overview start-->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="icon_document_alt"></i> News</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?php echo base_url(); ?>myadminkw">Home</a></li>
                    <li><i class="icon_document_alt"></i>News</li>
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
                        <strong>Success!</strong> News has been added.
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
                        <strong>Success!</strong> News has been updated.
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
                        <strong>Success!</strong> News has been <?php echo $set_active; ?>.
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
                        <strong>Success!</strong> News has been deleted.
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="row" style="margin: 0 0 15px 0;">
        <a class="btn btn-primary" href="<?php echo base_url(); ?>myadminkw/News/add" title="Add News">
            <span class="fa fa-plus"></span> Add News
        </a>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <?php
                        if(empty($news)):
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
                                <th>Content</th>
                                <th>Updated Date</th>
                                <th>Updated By</th>
                                <th>Action</th>
                            </tr>
                            <?php
                                $no = 0;
                                foreach($news as $row):
                                    $no++;
                                    $row_changed = '';
                                    $label = '';
                                    if($row->id == $added_id || $row->id == $updated_id) $row_changed = 'success';
                                    if($row->id == $set_active_id && $set_active == 'published') $row_changed = 'success';
                                    if($row->id == $set_active_id && $set_active == 'unpublished') $row_changed = 'warning';
                            ?>
                            <tr class="<?php  echo $row_changed; ?>">
                                <td><?php echo $no; ?></td>
                                <td>
                                    <span class="title"><?php echo $row->title; ?></span>
                                    <?php if($row->is_active == 0): ?>
                                        <br/><span class="label label-warning">-not published-</span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo word_limiter($row->content, 30); ?></td>
                                <td><?php echo date('d-m-Y | H:i:s', $row->updated_at); ?></td>
                                <td><?php echo $row->updated_by; ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-primary" title="Edit"
                                           href="<?php echo base_url() ?>myadminkw/News/add/<?php echo $row->id; ?>">
                                            <i class="icon_pencil-edit"></i></a>
                                        <?php if($row->is_active == 0): ?>
                                        <a class="btn btn-success" title="Publish"
                                           href="<?php echo base_url() ?>myadminkw/News/add?id=<?php echo $row->id; ?>&is_active=1">
                                            <i class="icon_cloud-upload_alt"></i></a>
                                        <?php else: ?>
                                        <a class="btn btn-warning" title="Unpublish"
                                           href="<?php echo base_url() ?>myadminkw/News/add?id=<?php echo $row->id; ?>&is_active=0" >
                                            <i class="icon_cloud"></i></a>
                                        <?php endif; ?>
                                        <a class="btn btn-danger" title="Delete"
                                           onclick="return confirm('Are you sure?');"
                                           href="<?php echo base_url() ?>myadminkw/News/delete/<?php echo $row->id; ?>">
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
