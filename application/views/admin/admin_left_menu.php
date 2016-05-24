<!--sidebar start-->
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
            <li <?php if($menu_active == 'about_us') echo 'class="active"'; ?> >
                <a class="" href="<?php echo base_url(); ?>myadminkw/AboutUs">
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
                        <a class="" href="<?php echo base_url(); ?>myadminkw/News/add">Add News</a>
                    </li>
                    <li class="<?php if($menu_active == 'news') echo 'active'; ?>">
                        <a class="" href="<?php echo base_url(); ?>myadminkw/News">See All News</a>
                    </li>
                </ul>
            </li>

            <li class="sub-menu <?php if(in_array($menu_active, array('add_events', 'events'))) echo 'active'; ?>">
                <a href="javascript:" class="">
                    <i class="icon_calendar"></i>
                    <span>Events</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li class="<?php if($menu_active == 'add_events') echo 'active'; ?>">
                        <a class="" href="<?php echo base_url(); ?>myadminkw/Events/add">Add Event</a>
                    </li>
                    <li class="<?php if($menu_active == 'events') echo 'active'; ?>">
                        <a class="" href="<?php echo base_url(); ?>myadminkw/Events">See All Events</a>
                    </li>
                </ul>
            </li>

            <li class="sub-menu <?php if(in_array($menu_active, array('add_songs', 'songs'))) echo 'active'; ?>">
                <a href="javascript:" class="">
                    <i class="icon_headphones"></i>
                    <span>Songs</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li class="<?php if($menu_active == 'add_songs') echo 'active'; ?>">
                        <a class="" href="<?php echo base_url(); ?>myadminkw/Songs/add">Add Song</a>
                    </li>
                    <li class="<?php if($menu_active == 'songs') echo 'active'; ?>">
                        <a class="" href="<?php echo base_url(); ?>myadminkw/Songs">See All Songs</a>
                    </li>
                </ul>
            </li>

            <li class="sub-menu <?php if(in_array($menu_active, array('add_videos', 'videos'))) echo 'active'; ?>">
                <a href="javascript:" class="">
                    <i class="fa fa-video-camera"></i>
                    <span>Videos</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li class="<?php if($menu_active == 'add_songs') echo 'active'; ?>">
                        <a class="" href="<?php echo base_url(); ?>myadminkw/Videos/add">Add Video</a>
                    </li>
                    <li class="<?php if($menu_active == 'songs') echo 'active'; ?>">
                        <a class="" href="<?php echo base_url(); ?>myadminkw/Videos">See All Videos</a>
                    </li>
                </ul>
            </li>

            <li class="sub-menu <?php if(in_array($menu_active, array('add_galleries', 'galleries', 'edit_galleries'))) echo 'active'; ?>">
                <a href="javascript:" class="">
                    <i class="icon_images"></i>
                    <span>Galleries</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li class="<?php if($menu_active == 'add_galleries') echo 'active'; ?>">
                        <a class="" href="<?php echo base_url(); ?>myadminkw/Galleries/add">Add Gallery</a>
                    </li>
<!--                    <li class="--><?php //if($menu_active == 'edit_galleries') echo 'active'; ?><!--">-->
<!--                        <a class="" href="--><?php //echo base_url(); ?><!--myadminkw/Galleries/edit">Edit Gallery</a>-->
<!--                    </li>-->
                    <li class="<?php if($menu_active == 'galleries') echo 'active'; ?>">
                        <a class="" href="<?php echo base_url(); ?>myadminkw/Galleries">See All Galleries</a>
                    </li>
                </ul>
            </li>

            <li <?php if($menu_active == 'generations') echo 'class="active"'; ?> >
                <a class="" href="<?php echo base_url(); ?>myadminkw/Generations">
                    <i class="icon_flowchart"></i>
                    <span>Generations</span>
                </a>
            </li>

            <li class="sub-menu <?php if(in_array($menu_active, array('add_members', 'members'))) echo 'active'; ?>">
                <a href="javascript:" class="">
                    <i class="icon_id_alt"></i>
                    <span>Members</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li class="<?php if($menu_active == 'add_members') echo 'active'; ?>">
                        <a class="" href="<?php echo base_url(); ?>myadminkw/Members/add">Add Member</a>
                    </li>
                    <li class="<?php if($menu_active == 'members') echo 'active'; ?>">
                        <a class="" href="<?php echo base_url(); ?>myadminkw/Members">See All Members</a>
                    </li>
                </ul>
            </li>

            <li class="sub-menu <?php if(in_array($menu_active, array('add_merchandise', 'merchandise', 'howtobuy'))) echo 'active'; ?>">
                <a href="javascript:" class="">
                    <i class="icon_gift_alt"></i>
                    <span>Merchandise</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li class="<?php if($menu_active == 'add_merchandise') echo 'active'; ?>">
                        <a class="" href="<?php echo base_url(); ?>myadminkw/Merchandise/add">Add Merchandise</a>
                    </li>
                    <li class="<?php if($menu_active == 'merchandise') echo 'active'; ?>">
                        <a class="" href="<?php echo base_url(); ?>myadminkw/Merchandise">See All Merchandise</a>
                    </li>
                    <li class="<?php if($menu_active == 'howtobuy') echo 'active'; ?>">
                        <a class="" href="<?php echo base_url(); ?>myadminkw/Merchandise/howtobuy">How to Buy</a>
                    </li>
                </ul>
            </li>

            <?php if($is_authorized == 1): ?>
                <li class="sub-menu <?php if(in_array($menu_active, array('add_users', 'users'))) echo 'active'; ?>">
                    <a href="javascript:" class="">
                        <i class="icon_shield_alt"></i>
                        <span>Users</span>
                        <span class="menu-arrow arrow_carrot-right"></span>
                    </a>
                    <ul class="sub">
                        <li class="<?php if($menu_active == 'add_users') echo 'active'; ?>">
                            <a class="" href="<?php echo base_url(); ?>myadminkw/Users/add">Add User</a>
                        </li>
                        <li class="<?php if($menu_active == 'users') echo 'active'; ?>">
                            <a class="" href="<?php echo base_url(); ?>myadminkw/Users">See All Users</a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
