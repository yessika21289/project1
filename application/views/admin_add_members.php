<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!--overview start-->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="icon_group"></i> Members</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?php echo base_url(); ?>admin">Home</a></li>
                    <li><i class="icon_group"></i>Members</li>
                </ol>
            </div>
        </div>

        <?php
            foreach($members as $member) {
                $member_id = (!empty($member['id'])) ? $member['id'] : '';
                $name = (!empty($member['name'])) ? $member['name'] : '';
                $avatar = (!empty($member['avatar'])) ? $member['avatar'] : '';
                $facebook = (!empty($member['facebook'])) ? $member['facebook'] : '';
                $twitter = (!empty($member['twitter'])) ? $member['twitter'] : '';
                $instagram = (!empty($member['instagram'])) ? $member['instagram'] : '';
                $path = (!empty($member['path'])) ? $member['path'] : '';
                $web = (!empty($member['web'])) ? $member['web'] : '';
            }

        ?>

        <div class="row">
            <!-- CKEditor -->
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Members
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