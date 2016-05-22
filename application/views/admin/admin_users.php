<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!--overview start-->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="icon_shield_alt"></i> Users</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?php echo base_url(); ?>myadminkw">Home</a></li>
                    <li><i class="icon_shield_alt"></i>Users</li>
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
                        <strong>Success!</strong> New user has been added.
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
                        <strong>Success!</strong> User has been <?php echo $set_active; ?>.
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
                        <strong>Success!</strong> User has been deleted.
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="row" style="margin: 0 0 15px 0;">
            <a class="btn btn-primary" href="<?php echo base_url(); ?>myadminkw/Users/add" title="Add User">
                <span class="fa fa-plus"></span> Add User
            </a>
        </div>

        <div class="row">
            <div class="col-md-5">
                <section class="panel">
                    <?php
                    if(empty($users)):
                        ?>
                        <header class="panel-heading">
                            -No data stored-
                        </header>
                    <?php else: ?>

                        <header class="panel-heading">
                            All Users
                        </header>

                        <table class="table table-striped table-advance table-hover">
                            <tbody>
                            <tr>
                                <th>No</th>
                                <th>User ID</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            $no = 0;
                            foreach($users as $row):
                                $row_changed = '';
                                $label = '';
                                if($row->id == $added_id || $row->id == $updated_id) $row_changed = 'success';
                                if($row->id == $set_active_id && $set_active == 'published') $row_changed = 'success';
                                if($row->id == $set_active_id && $set_active == 'unpublished') $row_changed = 'warning';
                                if($row->username != $name):
                                    $no++;
                            ?>
                                <tr class="<?php  echo $row_changed; ?>">
                                    <td><?php echo $no; ?></td>

                                    <td>
                                        <span class="title"><?php echo $row->username; ?></span>
                                    </td>

                                    <td>
                                        <div class="btn-group">
                                            <?php //if($row->is_authorized == 0): ?>
                                                <!-- <a class="btn btn-success" title="Pass superadmin status"
                                                   href="<?php echo base_url() ?>myadminkw/Users/add?id=<?php echo $row->id; ?>&is_authorized=1">
                                                    <i class="icon_key_alt"></i></a> -->
                                            <?php //endif; ?>
                                            <a class="btn btn-danger" title="Delete"
                                               onclick="return confirm('Are you sure?');"
                                               href="<?php echo base_url() ?>myadminkw/Users/delete/<?php echo $row->id; ?>">
                                                <i class="icon_trash_alt"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </section>
            </div>
        </div>

    </section>
</section>
<!--main content end-->
