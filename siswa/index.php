<?php
session_start();
include "../global/cek_session_siswa.php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link href="../bootstrap/css/bootstrap.css" rel="stylesheet"/>
        <link href="../bootstrap/css/bootstrap-responsive.css" rel="stylesheet"/>
        <style type="text/css">
            body {
                padding-top: 115px;
                padding-bottom: 40px;
            }
            .sidebar-nav {
                padding: 9px 0;
            }

            @media (max-width: 980px) {
                /* Enable use of floated navbar text */
                .navbar-text.pull-right {
                    float: none;
                    padding-left: 5px;
                    padding-right: 5px;
                }
            }
        </style>
        <script src="../bootstrap/js/jquery-1.7.2.min.js"></script>
        <script src="../bootstrap/js/bootstrap-dropdown.js"></script>
    </head>
    <body>
        <?php include './header.php'; ?>
        <div class="container-fluid">
            <div class="row-fluid">
                <!-- Left -->

                <?php include_once './left.php'; ?>

                <!-- end left -->

                <!-- Content -->
                <?php include_once './main.php'; ?>
                <!-- end content -->

            </div> 
            <!-- Footer -->
            <?php include_once '../admin/footer.php'; ?>
            <!-- end left -->
        </div>

    </body>
</html>