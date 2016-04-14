<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!--overview start-->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-laptop"></i> Home</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i>Home</li>
                </ol>
            </div>
        </div>
        <?php if(isset($user_updated)): ?>
        <div class="row">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong>Success!</strong> <?php echo $user_updated; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <h1>
            Welcome, <?php echo $name; ?>!
        </h1>


    </section>
    <!--main content end-->
</section>
<!-- container section start -->