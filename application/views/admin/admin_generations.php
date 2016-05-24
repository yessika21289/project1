<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!--overview start-->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="icon_flowchart"></i> Generations</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?php echo base_url(); ?>myadminkw">Home</a></li>
                    <li><i class="icon_flowchart"></i>Generations</li>
                </ol>
            </div>
        </div>

        <?php if(isset($update_confirm) && $update_confirm == 1): ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong>Success!</strong> Generation has been updated.
                    </div>
                </div>
            </div>
        <?php elseif(isset($add_confirm) && $add_confirm == 1): ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong>Success!</strong> New generation has been added.
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="row">
            <!-- CKEditor -->
            <div class="col-md-12">
                <section class="panel">
                    <header class="panel-heading">
                        Generations
                    </header>
                    <div class="panel-body">

                        <div class="form">
                            <form action="<?php echo base_url(); ?>myadminkw/Generations/add" class="form-horizontal" method="post" enctype="multipart/form-data">
                                <div class="col-md-4 form-group">
                                    <?php $edit_field = !empty($generation_id) ? "edit-field" : ''; ?>

                                    <div class="col-md-10">
                                        <input placeholder="Type new generation..." class="form-control <?php echo $edit_field; ?>"
                                               type="text" name="generation_name"
                                               value="<?php echo (!empty($generation_name)) ? $generation_name : ''; ?>">
                                    </div>

                                    <?php if(!empty($generation_id)): ?>
                                        <div class="col-md-2">
                                            <input type="hidden" value="<?php echo $generation_id;  ?>" name="generation_id">
                                            <button type="submit" class="btn btn-success">
                                                Save change
                                            </button>
                                        </div>
                                    <?php else: ?>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-primary">
                                            Add
                                        </button>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </form>
                        </div>

                    </div>
                </section>

                <section class="panel">
                <?php
                if(empty($generations)):
                    ?>
                    <header class="panel-heading">
                        -No data stored-
                    </header>
                <?php else: ?>

                    <header class="panel-heading">
                        Generation List
                    </header>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <table class="table table-striped table-advance table-hover">
                                <tbody>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Updated Date</th>
                                    <th>Updated By</th>
                                    <th>Action</th>
                                </tr>
                                <?php
                                    $no = 0;
                                    foreach($generations as $generation):
                                        $no++;
                                        $row_changed = '';
                                        if((!empty($added_id) && $generation->id == $added_id) ||
                                            !empty($updated_id) && $generation->id == $updated_id) $row_changed = 'success';
                                ?>
                                <tr class="<?php echo $row_changed; ?>">
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $generation->name; ?></td>
                                    <td><?php echo $generation->updated_at; ?></td>
                                    <td><?php echo $generation->updated_by; ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-primary" title="Edit"
                                               href="<?php echo base_url() ?>myadminkw/Generations/edit/<?php echo $generation->id; ?>">
                                                <i class="icon_pencil-edit"></i></a>
<!--                                            --><?php //if($generation->is_active == 0): ?>
<!--                                                <a class="btn btn-success" title="Publish"-->
<!--                                                   href="--><?php //echo base_url() ?><!--myadminkw/Generations/add?id=--><?php //echo $generation->id; ?><!--&is_active=1">-->
<!--                                                    <i class="icon_cloud-upload_alt"></i></a>-->
<!--                                            --><?php //else: ?>
<!--                                                <a class="btn btn-warning" title="Unpublish"-->
<!--                                                   href="--><?php //echo base_url() ?><!--myadminkw/Generations/add?id=--><?php //echo $generation->id; ?><!--&is_active=0" >-->
<!--                                                    <i class="icon_cloud"></i></a>-->
<!--                                            --><?php //endif; ?>
                                            <a class="btn btn-danger" title="Delete"
                                               onclick="return confirm('Are you sure?');"
                                               href="<?php echo base_url() ?>myadminkw/Generations/delete/<?php echo $generation->id; ?>">
                                                <i class="icon_trash_alt"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>

                        </div>
                    </div>
                    <?php endif; ?>
                </section>

            </div>
        </div><!--/.row-->

    </section>
</section>
<!--main content end-->
</section>
<!-- container section start -->