<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!--overview start-->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="icon_id_alt"></i> Members</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?php echo base_url(); ?>admin">Home</a></li>
                    <li><i class="icon_id_alt"></i>Members</li>
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
            $member_id = (!empty($members['id'])) ? $member['id'] : '';
            $name = (!empty($member['name'])) ? $member['name'] : '';
            $facebook = (!empty($member['socmed']['facebook'])) ? $member['socmed']['facebook'] : '';
            $twitter = (!empty($member['socmed']['twitter'])) ? $member['socmed']['twitter'] : '';
            $instagram = (!empty($member['socmed']['instagram'])) ? $member['socmed']['instagram'] : '';
            $path = (!empty($member['socmed']['path'])) ? $member['socmed']['path'] : '';
            $web = (!empty($member['socmed']['web'])) ? $member['socmed']['web'] : '';
        ?>

        <div class="row">
            <!-- CKEditor -->
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Add Member
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            <form action="<?php echo base_url(); ?>admin/Members/add" class="form-horizontal"
                                  method="post" enctype="multipart/form-data">
                                <div class="form-group form-song">

                                    <div class="row">
                                        <div class="col-md-2 clearfix preview-avatar" style="width: 13.6667%;">
                                            <div id="avatar-image-holder" class="avatar"></div>
                                            <input id="upload-avatar" type="file" name="avatar" />
                                            <a href="" id="upload-avatar-link" class="edit-avatar">Edit</a>
                                        </div>

                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="name"
                                                   placeholder="Name" value="<?php echo $name; ?>">

                                            <span class="col-md-1 socmed-add-icon">
                                                <img src="<?php echo base_url(); ?>assets/img/fb-icon.png">
                                            </span>
                                            <input type="text" class="form-control col-md-10 socmed-add-textfield" name="facebook"
                                               placeholder="Facebook ID" value="<?php echo $facebook; ?>">

                                            <span class="col-md-1 socmed-add-icon">
                                                <img src="<?php echo base_url(); ?>assets/img/twitter-icon.png">
                                            </span>
                                            <input type="text" class="form-control col-md-10 socmed-add-textfield" name="twitter"
                                                   placeholder="Twitter ID" value="<?php echo $twitter; ?>">

                                            <span class="col-md-1 socmed-add-icon">
                                                <img src="<?php echo base_url(); ?>assets/img/instagram-icon.png">
                                            </span>
                                            <input type="text" class="form-control col-md-10 socmed-add-textfield" name="instagram"
                                                   placeholder="Instagram ID" value="<?php echo $instagram; ?>">

                                            <span class="col-md-1 socmed-add-icon">
                                                <img src="<?php echo base_url(); ?>assets/img/path-icon.png">
                                            </span>
                                            <input type="text" class="form-control col-md-10 socmed-add-textfield" name="path"
                                                   placeholder="Path ID" value="<?php echo $path; ?>">

                                            <span class="col-md-1 socmed-add-icon">
                                                <img src="<?php echo base_url(); ?>assets/img/web-icon.png">
                                            </span>
                                            <input type="text" class="form-control col-md-10 socmed-add-textfield" name="web"
                                                   placeholder="http://..." value="<?php echo $web; ?>">

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="lyric">
                                            <input type="hidden" name="member_id" value="<?php echo $member_id; ?>">
                                            <span class="pull-right" style="margin-top:20px;">
                                                <button type="submit" class="btn btn-primary">
                                                    Save
                                                </button>
                                                <a class="btn btn-danger" title="Cancel"
                                                   href="<?php echo base_url(); ?>admin/Members">Cancel
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