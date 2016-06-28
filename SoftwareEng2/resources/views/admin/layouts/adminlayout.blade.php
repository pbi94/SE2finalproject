<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Xenon Boostrap Admin Panel" />
    <meta name="author" content="" />

    <title>Dashboard</title>

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Arimo:400,700,400italic">
    <link rel="stylesheet" href="{{ url('assets') }}/css/fonts/linecons/css/linecons.css">
    <link rel="stylesheet" href="{{ url('assets') }}/css/fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ url('assets') }}/css/bootstrap.css">
    <link rel="stylesheet" href="{{ url('assets') }}/css/xenon-core.css">
    <link rel="stylesheet" href="{{ url('assets') }}/css/xenon-forms.css">
    <link rel="stylesheet" href="{{ url('assets') }}/css/xenon-components.css">
    <link rel="stylesheet" href="{{ url('assets') }}/css/xenon-skins.css">
    <link rel="stylesheet" href="{{ url('assets') }}/css/custom.css">

    <script src="{{ url('assets') }}/js/jquery-1.11.1.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body class="page-body">

<div class="settings-pane">

    <a href="#" data-toggle="settings-pane" data-animate="true">
        &times;
    </a>

    <div class="settings-pane-inner">

        <div class="row">
            <div class="col-md-4">

                <div class="user-info">

                    <div class="user-image">
                        <!-- TODO: User Setting Page Link -->
                        <a href="extra-profile.html">
                            <!-- TODO: UserProfile Image -->
                            <img src="{{ url('assets') }}/images/user-2.png" class="img-responsive img-circle" />
                        </a>
                    </div>

                    <div class="user-details">

                        <h3>
                            <!-- TODO: User Setting Page Link -->
                            <a href="extra-profile.html">@yield('Username')</a>

                            <!-- Available statuses: is-online, is-idle, is-busy and is-offline -->
                            <span class="user-status is-online"></span>
                        </h3>

                        <p class="user-title">@yield('Email')</p>

                        <div class="user-links">
                            <!-- TODO: User Setting Page Link -->
                            <a href="extra-profile.html" class="btn btn-primary">Edit Profile</a>
                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>

</div>

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

    <!-- Add "fixed" class to make the sidebar fixed always to the browser viewport. -->
    <!-- Adding class "toggle-others" will keep only one menu item open at a time. -->
    <!-- Adding class "collapsed" collapse sidebar root elements and show only icons. -->
    <div class="sidebar-menu toggle-others fixed">

        <div class="sidebar-menu-inner">

            <header class="logo-env">

                <!-- logo -->
                <div class="logo">
                    <a href="#" class="logo-expanded">
                        <img src="{{ url('assets') }}/images/icon.png" width="80" alt="" />
                    </a>

                    <a href="#" class="logo-collapsed">
                        <img src="{{ url('assets') }}/images/icon.png" width="40" alt="" />
                    </a>
                </div>

                <!-- This will toggle the mobile menu and will be visible only on mobile devices -->
                <div class="mobile-menu-toggle visible-xs">
                    <a href="#" data-toggle="user-info-menu">
                        <i class="fa-bell-o"></i>
                        <span class="badge badge-success">7</span>
                    </a>

                    <a href="#" data-toggle="mobile-menu">
                        <i class="fa-bars"></i>
                    </a>
                </div>

                <!-- This will open the popup with user profile settings, you can use for any purpose, just be creative -->
                <div class="settings-icon">
                    <a href="#" data-toggle="settings-pane" data-animate="true">
                        <i class="linecons-cog"></i>
                    </a>
                </div>


            </header>



            <ul id="main-menu" class="main-menu">
                <!-- add class "multiple-expanded" to allow multiple submenus to open -->
                <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
                <!-- begin: Reports -->
                <li>
                    <!-- TODO: Link Setting -->
                    <a href="ui-panels.html">
                        <i class="linecons-note"></i>
                        <span class="title">Reports</span>
                        <span class="label label-success pull-right"> @yield('EventNum') </span>
                    </a>
                    <ul>
                        <li>
                            <!-- TODO: Link Setting -->
                            <a href="ui-panels.html">
                                <span class="title">By Time</span>
                            </a>
                        </li>
                        <li>
                            <!-- TODO: Link Setting -->
                            <a href="ui-buttons.html">
                                <span class="title">By Driver</span>
                            </a>
                        </li>
                        <li>
                            <!-- TODO: Link Setting -->
                            <a href="ui-tabs-accordions.html">
                                <span class="title">By Score </span>
                            </a>
                        </li>
                        <li>
                            <!-- TODO: Link Setting -->
                            <a href="ui-modals.html">
                                <span class="title">Advance</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- end: Reports -->
                <!-- begin: Driver Management -->
                <li>
                    <a href="/admin/Drivers/view">
                        <i class="fa-car"></i>
                        <span class="title">Driver Management</span>

                    </a>
                    <ul>
                        <li>
                            <a href="{{ url('admin') }}/addDriver">
                                <span class="title">Add Driver</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/Drivers/view">
                                <span class="title">View Drivers</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- end: Driver Management -->
            </ul>

        </div>

    </div>

    <div class="main-content">

        <!-- User Info, Notifications and Menu Bar -->
        <nav class="navbar user-info-navbar" role="navigation">

            <!-- Left links for user info navbar -->
            <ul class="user-info-menu left-links list-inline list-unstyled">

                <li class="hidden-sm hidden-xs">
                    <a href="#" data-toggle="sidebar">
                        <i class="fa-bars"></i>
                    </a>
                </li>
            </ul>


        </nav>

        @yield('Content')
        <!-- Main Footer -->
        <!-- Choose between footer styles: "footer-type-1" or "footer-type-2" -->
        <!-- Add class "sticky" to  always stick the footer to the end of page (if page contents is small) -->
        <!-- Or class "fixed" to  always fix the footer to the end of page -->
        <footer class="main-footer sticky footer-type-1">

            <div class="footer-inner">

                <!-- Add your copyright text here -->
                <div class="footer-text">
                    &copy; 2016
                    <strong>TaxiBan</strong>
                    Powerd by ZGH , M , Samira H , @</a>
                </div>


                <!-- Go to Top Link, just add rel="go-top" to any link to add this functionality -->
                <div class="go-up">

                    <a href="#" rel="go-top">
                        <i class="fa-angle-up"></i>
                    </a>

                </div>

            </div>

        </footer>
    </div>

</div>


<!-- class="page-loading-overlay">
    <div class="loader-2"></div>
</div-->


@yield('BottomScript')



</body>
</html>