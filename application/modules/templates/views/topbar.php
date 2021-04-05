<body class="hold-transition skin-purple sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="<?= base_url('assets/'); ?>index2.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>RMT</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>SI</b>EKID</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="<?= base_url('assets/'); ?>#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Notifications: style can be found in dropdown.less -->

                        <!-- Tasks: style can be found in dropdown.less -->
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-chevron-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Profile
                                                </h3>
                                            </a>
                                        </li>
                                        <!-- end task item -->
                                        <li>
                                            <!-- Task item -->
                                            <a href="<?= base_url('auth/Login/logout'); ?>">
                                                <h3>
                                                    Log Out
                                                </h3>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                        </li>

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="<?= base_url('assets/'); ?>#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?= base_url('assets/'); ?>img/users/default.jpg" class="user-image"
                                    alt="User Image">
                                <span class="hidden-xs"><?php
                                                        if ($user_session['level'] == "admin") {
                                                            echo $user_session['username'];
                                                        } elseif ($user_session['level'] == "BPM") {
                                                            echo $user_session['username'];
                                                        } elseif ($user_session['level'] == "prodi") {
                                                            echo $user_session['username'];
                                                        } elseif ($user_session['level'] == "dosen") {
                                                            echo $user_session['username'];
                                                        } elseif ($user_session['level'] == "mahasiswa") {
                                                            echo $user_session['username'];
                                                        } else
                                                            echo 'Tidak terdaftaar';
                                                        ?>
                                </span>
                            </a>

                        </li>
                    </ul>
                </div>
            </nav>
        </header>