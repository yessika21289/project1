<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!--overview start-->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="icon_id_alt"></i> Members</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?php echo base_url(); ?>myadminkw">Home</a></li>
                    <li><i class="icon_id_alt"></i>Members</li>
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
                        <strong>Success!</strong> Member has been added.
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
                        <strong>Success!</strong> Member has been updated.
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
                        <strong>Success!</strong> Member has been <?php echo $set_active; ?>.
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
                        <strong>Success!</strong> Member has been deleted.
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="row" style="margin: 0 0 15px 0;">
            <a class="btn btn-primary" href="<?php echo base_url(); ?>myadminkw/Members/add" title="Add Members">
                <span class="fa fa-plus"></span> Add Members
            </a>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <?php
                    if(empty($members)):
                        ?>
                        <header class="panel-heading">
                            -No data stored-
                        </header>
                    <?php else: ?>
                        <?php foreach($members as $member):
                            $avatar = !empty($member['avatar']) ? $member['avatar'] : 'assets/img/default_avatar.png';
                            $row_changed = '';
                            if($member['id'] == $added_id || $member['id'] == $updated_id) $row_changed = 'success';
                            if($member['id'] == $set_active_id && $set_active == 'published') $row_changed = 'success';
                            if($member['id'] == $set_active_id && $set_active == 'unpublished') $row_changed = 'warning';
                        ?>
                        <div class="panel-body <?php echo $row_changed; ?>">
                            <div class="col-md-3 clearfix" style="text-align:center">
                                <img src="<?php echo base_url().$avatar; ?>" class="view-avatar" />
                            </div>
                            <div class="col-md-9">
                                <h2 style="margin-top: 0;"><?php echo $member['name']; ?></h2>
                                <hr style="margin-top: 0px; margin-bottom: 10px; border-top: 1px solid #cccccc"/>
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="<?php echo base_url(); ?>assets/img/fb-icon.png" class="socmed-icon">
                                        <?php
                                            if(!empty($member['socmed']['facebook'])) echo $member['socmed']['facebook'];
                                            else echo '-';
                                        ?>
                                    </div>
                                    <div class="col-md-6">
                                        <img src="<?php echo base_url(); ?>assets/img/instagram-icon.png" class="socmed-icon">
                                        <?php
                                            if(!empty($member['socmed']['instagram'])) echo $member['socmed']['instagram'];
                                            else echo '-';
                                        ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="<?php echo base_url(); ?>assets/img/twitter-icon.png" class="socmed-icon">
                                        <?php
                                            if(!empty($member['socmed']['twitter'])) echo $member['socmed']['twitter'];
                                            else echo '-';
                                        ?>
                                    </div>

                                    <div class="col-md-6">
                                        <img src="<?php echo base_url(); ?>assets/img/web-icon.png" class="socmed-icon">
                                        <?php
                                            if(!empty($member['socmed']['web'])) echo $member['socmed']['web'];
                                            else echo '-';
                                        ?>
                                    </div>
                                </div>

                                <br/>

                                <div class="row">
                                    <div class="col-md-6">
                                        <a class="btn btn-primary" title="Edit"
                                           href="<?php echo base_url(); ?>myadminkw/Members/add/<?php echo $member['id']; ?>">
                                            <span class="icon_pencil-edit"></span> Edit
                                        </a>
                                        <?php if($member['is_active'] == 0): ?>
                                            <a class="btn btn-success" title="Publish"
                                               href="<?php echo base_url() ?>myadminkw/Members/add?id=<?php echo $member['id']; ?>&is_active=1">
                                                <span class="icon_cloud-upload_alt"></span>Publish</a>
                                        <?php else: ?>
                                            <a class="btn btn-warning" title="Unpublish"
                                               href="<?php echo base_url() ?>myadminkw/Members/add?id=<?php echo $member['id']; ?>&is_active=0" >
                                                <span class="icon_cloud"></span>Unpublish</a>
                                        <?php endif; ?>
                                        <a class="btn btn-danger" title="Delete"
                                           onclick="return confirm('Are you sure?');"
                                           href="<?php echo base_url(); ?>myadminkw/Members/delete/<?php echo $member['id']; ?>">
                                            <span class="icon_trash_alt"></span> Delete
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </section>
            </div>
        </div>

    </section>
</section>
<!--main content end-->
