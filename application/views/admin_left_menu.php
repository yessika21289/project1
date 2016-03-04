<!--sidebar start-->
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
            <li <?php if($menu_active == 'dashboard') echo 'class="active"'; ?> >
                <a class="" href="<?php echo base_url(); ?>Admin">
                    <i class="icon_house_alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li <?php if($menu_active == 'about_us') echo 'class="active"'; ?> >
                <a class="" href="<?php echo base_url(); ?>AboutUs">
                    <i class="icon_group"></i>
                    <span>About Us</span>
                </a>
            </li>

            <li class="sub-menu <?php if(in_array($menu_active, array('add_news', 'news'))) echo 'active'; ?>">
                <a href="javascript:" class="">
                    <i class="icon_document_alt"></i>
                    <span>News</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li class="<?php if($menu_active == 'add_news') echo 'active'; ?>">
                        <a class="" href="<?php echo base_url(); ?>News/add">Add News</a>
                    </li>
                    <li class="<?php if($menu_active == 'news') echo 'active'; ?>">
                        <a class="" href="<?php echo base_url(); ?>News">See All News</a>
                    </li>
                </ul>
            </li>

            <li class="sub-menu <?php if(in_array($menu_active, array('add_songs', 'songs'))) echo 'active'; ?>">
                <a href="javascript:" class="">
                    <i class="icon_document_alt"></i>
                    <span>Songs</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li class="<?php if($menu_active == 'add_songs') echo 'active'; ?>">
                        <a class="" href="<?php echo base_url(); ?>Songs/add">Add Songs</a>
                    </li>
                    <li class="<?php if($menu_active == 'songs') echo 'active'; ?>">
                        <a class="" href="<?php echo base_url(); ?>Songs">See All Songs</a>
                    </li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_document_alt"></i>
                    <span>Forms</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="<?php echo base_url(); ?>Admin/to/form_component">Form Elements</a></li>
                    <li><a class="" href="<?php echo base_url(); ?>Admin/to/form_validation">Form Validation</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_table"></i>
                    <span>Tables</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="<?php echo base_url(); ?>Admin/to/basic_table">Basic Table</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_documents_alt"></i>
                    <span>Pages</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="<?php echo base_url(); ?>Admin/to/profile">Profile</a></li>
                    <li><a class="" href="<?php echo base_url(); ?>Admin/to/login"><span>Login Page</span></a></li>
                    <li><a class="" href="<?php echo base_url(); ?>Admin/to/basic_table/blank">Blank Page</a></li>
                    <li><a class="" href="<?php echo base_url(); ?>Admin/to/404">404 Error</a></li>
                </ul>
            </li>

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->