<style>
    .redd{
        background: #dd4b39;
        color: #fff !important;
    }
</style>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php
        if ($main_content != 'login') {
            foreach ($setting as $set) {
                
            }
            ?>
            <header class="main-header">
                
                    <nav class="navbar navbar-static-top">
                        <div class="container">
                        <div class="navbar-custom-menu pull-left"><ul class="nav navbar-nav"><li><a href="#" style="font-size:24px;"><?php echo $set->company_name; ?></a></li></ul></div>
                        <div class="navbar-custom-menu">
                            <ul class="nav navbar-nav">
                                <!-- Administrator -->
                                <li class="dropdown messages-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        Administrator
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="header"><a href="">Admision</a></li>
                                        <li class="header"><a href="">Front Office</a></li>
                                    </ul>
                                </li>
                                <!-- Administrator end -->
                                <!-- Setting -->
                                <li class="dropdown messages-menu">
                                    <?php
                                    $access_to = $this->session->userdata['logged_in']['access_to'];
                                    $username = $this->session->userdata['logged_in']['user'];
                                    $admin_username = $this->session->userdata['logged_in']['admin_user'];
                                    if (empty($username)) {
                                        $user = $admin_username;
                                        $type = "Admin";
                                        $link = "admin_logout";
                                    } else {
                                        $user = $username;
                                        $type = "User";
                                        $link = "logout";
                                    }
                                    ?>    
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-gears"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="header"><a href="<?php echo base_url(); ?>index.php/core/<?php echo $link ?>">Logout</a></li>

                                    </ul>

                                </li>
                                <!-- Setting end -->

                            </ul>
                        </div>
                        </div>
                    </nav>
                
            </header>
        <?php } ?>
        <!--  Main Menu -->
        <div class="menu-part">
            <ul>
                <li><a href=""><span class="fa fa-dashboard"></span>&nbsp;Dashboard</a></li>
                <li><a href=""><span class="fa fa-calendar"></span>&nbsp;Calender</a></li>
                <li><a href=""><span class="fa fa-user"></span>&nbsp;Classroom</a></li>
                <li><a href=""><span class="fa fa-table"></span>&nbsp;Timetable</a></li>
                <li><a href=""><span class="fa fa-commenting-o"></span>&nbsp;Communication</a></li>
                <li><a href=""><span class="fa fa-file-photo-o"></span>&nbsp;Gallery</a></li>
                <li><a href=""><span class="fa fa-user"></span>&nbsp;Administration</a></li>
                <li><a href=""><span class="fa fa-lock "></span>&nbsp;My Account</a></li>
            </ul>
        </div>
        <!-- Main Menu end -->
        <!-- Side Menu -->
        
        <!-- Side Menu end -->