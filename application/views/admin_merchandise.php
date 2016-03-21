<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!--overview start-->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="icon_gift_alt"></i> Merchandise</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?php echo base_url(); ?>admin">Home</a></li>
                    <li><i class="icon_gift_alt"></i>Merchandise</li>
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
                        <strong>Success!</strong> Merchandise has been added.
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
                        <strong>Success!</strong> Merchandise has been updated.
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
                        <strong>Success!</strong> Merchandise has been <?php echo $set_active; ?>.
                    </div>
                </div>
            </div>
        <?php elseif(isset($delete_confirm)): ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong>Success!</strong> Merchandise has been deleted.
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="row" style="margin: 0 0 15px 0;">
            <a class="btn btn-primary" href="<?php echo base_url(); ?>admin/Merchandise/add" title="Add Members">
                <span class="fa fa-plus"></span> Add Merchandise
            </a>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <?php
                    if(empty($merchandise)):
                        ?>
                        <header class="panel-heading">
                            -No data stored-
                        </header>
                    <?php else: ?>
                        <header class="panel-heading">
                            All Merchandise
                        </header>

                        <table class="table table-striped table-advance table-hover">
                            <tbody>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Decription</th>
                                <th>Updated Date</th>
                                <th>Updated By</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            $no = 0;
                            foreach($merchandise as $row):
                                $item_image = (!empty($row->image)) ? $row->image : 'assets/img/default_merchandise.png';
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
                                        <img src="<?php echo base_url().$item_image; ?>" width="30">
                                    </td>

                                    <td>
                                        <span class="title"><?php echo $row->title; ?></span>
                                        <?php if($row->is_active == 0): ?>
                                            <br/><span class="label label-warning">-not published-</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo $row->price; ?></td>
                                    <td><?php echo word_limiter($row->description, 30); ?></td>
                                    <td><?php echo date('Y-m-d H:i:s', $row->updated_at); ?></td>
                                    <td><?php echo $row->updated_by; ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-primary" title="Edit"
                                               href="<?php echo base_url() ?>admin/Merchandise/add/<?php echo $row->id; ?>">
                                                <i class="icon_pencil-edit"></i></a>
                                            <?php if($row->is_active == 0): ?>
                                                <a class="btn btn-success" title="Publish"
                                                   href="<?php echo base_url() ?>admin/Merchandise/add?id=<?php echo $row->id; ?>&is_active=1">
                                                    <i class="icon_cloud-upload_alt"></i></a>
                                            <?php else: ?>
                                                <a class="btn btn-warning" title="Unpublish"
                                                   href="<?php echo base_url() ?>admin/Merchandise/add?id=<?php echo $row->id; ?>&is_active=0" >
                                                    <i class="icon_cloud"></i></a>
                                            <?php endif; ?>
                                            <a class="btn btn-danger" title="Delete"
                                               onclick="return confirm('Are you sure?');"
                                               href="<?php echo base_url() ?>admin/Merchandise/delete/<?php echo $row->id; ?>">
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
