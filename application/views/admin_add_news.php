<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!--overview start-->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="icon_document_alt"></i> News</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?php echo base_url(); ?>admin">Home</a></li>
                    <li><i class="icon_document_alt"></i>News</li>
                </ol>
            </div>
        </div>

        <?php
            $news_id = (!empty($news[0]->id)) ? $news[0]->id : '';
            $title = (!empty($news[0]->title)) ? $news[0]->title : '';
            $content = (!empty($news[0]->content)) ? $news[0]->content : '';
        ?>

        <div class="row">
            <!-- CKEditor -->
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        News
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            <form action="<?php echo base_url(); ?>admin/News/add" class="form-horizontal"
                                  method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">Title</label>
                                    <div class="col-sm-11">
                                        <input type="text" class="form-control" name="title" value="<?php echo $title; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-1">Content:</label>
                                    <div class="col-sm-11">
                                        <textarea class="form-control ckeditor" name="content" rows="6">
                                            <?php echo $content; ?>
                                        </textarea>
                                        <input type="hidden" name="news_id" value="<?php echo $news_id; ?>">
                                        <span class="pull-right" style="margin-top:20px;">
                                            <button type="submit" class="btn btn-primary">
                                                Save
                                            </button>
                                            <a class="btn btn-danger" title="Cancel"
                                               href="<?php echo base_url(); ?>admin/News">Cancel
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