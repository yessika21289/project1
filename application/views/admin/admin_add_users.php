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

        <?php if(!empty($error)): ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong>Error!</strong> <?php echo $error; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php
        $user_id = (!empty($users[0]->id)) ? $users[0]->id : '';
        $username = (!empty($users[0]->username)) ? $users[0]->username : '';
        $password = (!empty($users[0]->password)) ? $users[0]->password : '';
        ?>

        <div class="row">
            <!-- CKEditor -->
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Add User
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            <form action="<?php echo base_url(); ?>myadminkw/Users/add" class="form-horizontal"
                                  method="post" enctype="multipart/form-data" id="user_form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="col-md-3 control-label">
                                            User ID<span class="required">*</span>
                                        </label>

                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="username"
                                                   value="<?php echo $username; ?>" <?php if (!empty($user_id)) echo 'disabled'; ?> >
                                        </div>
                                    </div>
                                </div>
                                <br/>

                                <?php if (!empty($user_id)): ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="col-md-3 control-label">
                                                Old Password<span class="required">*</span>
                                            </label>

                                            <div class="col-md-9">
                                                <input type="password" class="form-control" name="old_password"
                                                       placeholder="Type your old password...">
                                                <input type="hidden" class="form-control" name="user_id"
                                                       value="<?php echo $user_id; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <br/>
                                <?php endif; ?>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="col-md-3 control-label">
                                            New Password<span class="required">*</span>
                                        </label>

                                        <div class="col-md-9">
                                            <input type="password" class="form-control" name="password" id="password"
                                                   placeholder="Type your new password...">
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 5px;">
                                    <div class="col-md-6">
                                        <label class="col-md-3 control-label"></label>

                                        <div class="col-md-9">
                                            <input type="password" class="form-control" name="confirm_password"
                                                   id="confirm_password"
                                                   placeholder="Confirm your password...">

                                            <span class="pull-right" style="margin-top:20px;">
                                                <button type="submit" class="btn btn-primary">
                                                    Save
                                                </button>
                                                <a class="btn btn-danger" title="Cancel"
                                                   href="<?php echo base_url(); ?>myadminkw/Users">Cancel
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
        </div>
        <!--/.row-->

    </section>
</section>
<!--main content end-->
</section>
<!-- container section start -->