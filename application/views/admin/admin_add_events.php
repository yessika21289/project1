<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!--overview start-->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="icon_calendar"></i> Events</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?php echo base_url(); ?>admin">Home</a></li>
                    <li><i class="icon_calendar"></i>Events</li>
                </ol>
            </div>
        </div>

        <?php
        $event_id = (!empty($event[0]->id)) ? $event[0]->id : '';
        $title = (!empty($event[0]->title)) ? $event[0]->title : '';
        $content = (!empty($event[0]->content)) ? $event[0]->content : '';
        $start_date = (!empty($event[0]->start_date)) ? date('Y-m-d', $event[0]->start_date) : '';
        $end_date = (!empty($event[0]->end_date)) ? date('Y-m-d', $event[0]->end_date) : '';
        ?>

        <div class="row">
            <!-- CKEditor -->
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Add Event
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            <form action="<?php echo base_url(); ?>myadminkw/Events/add" class="form-horizontal"
                                  method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <label class="col-md-1 control-label">Start Date</label>
                                    <div class="col-md-3">
                                        <input type="date" class="form-control" name="start_date" value="<?php echo $start_date; ?>">
                                    </div>
                                    <label class="col-md-1 control-label">End Date</label>
                                    <div class="col-md-3">
                                        <input type="date" class="form-control" name="end_date" value="<?php echo $end_date; ?>">
                                    </div>
                                </div>

                                <br/>

                                <div class="row">
                                    <label class="col-md-1 control-label">Title</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="title" value="<?php echo $title; ?>">
                                    </div>
                                </div>

                                <br/>

                                <div class="row">
                                    <label class="control-label col-md-1">Content:</label>
                                    <div class="col-md-7">
                                        <textarea class="form-control editor" name="content" rows="6"><?php echo $content; ?></textarea>
                                        <input type="hidden" name="event_id" value="<?php echo $event_id; ?>">
                                        <span class="pull-right" style="margin-top:20px;">
                                            <button type="submit" class="btn btn-primary">
                                                Save
                                            </button>
                                            <a class="btn btn-danger" title="Cancel"
                                               href="<?php echo base_url(); ?>myadminkw/Events">Cancel
                                            </a>
                                        </span>
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