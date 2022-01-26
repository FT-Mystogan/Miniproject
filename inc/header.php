
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="public/css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="public/css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="public/css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="public/css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="public/css/nav.css" media="screen" />
    <link href="public/css/table/demo_page.css" rel="stylesheet" type="text/css" />
    <!-- BEGIN: load jquery -->
    <script src="public/js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="public/js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="public/js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="public/js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="public/js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="public/js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <script src="public/js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
    <script src="public/js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
    <script src="public/js/table/jquery.dataTables.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->
    <script type="text/javascript" src="public/js/table/table.js"></script>
    <script src="public/js/setup.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            setupLeftMenu();
            setSidebarHeight();
        });
    </script>

</head>

<body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
                <div class="floatleft logo">
                    <img src="public/img/livelogo.png" alt="Logo" />
                </div>
                <div class="floatleft middle">

                </div>
                <div class="floatright">
                    <div class="floatleft">
                        <img src="public/img/img-profile.jpg" alt="Profile Pic" />
                    </div>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li><?php echo $_SESSION['fullname']?></li>
                            <li><a href="index.php?page=logout">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
        <div class="grid_12">
            <ul class="nav main">
                <li class="ic-dashboard"><a href="index.php"><span>Dashboard</span></a> </li>
                <li class="ic-form-style"><a href=""><span>User Profile</span></a></li>
                <li class="ic-typography"><a href="changepassword.php"><span>Change Password</span></a></li>

            </ul>
        </div>
        <div class="clear">
        </div>