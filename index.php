<?php
include_once "./global/config.php";

$strsql = "select * from profil";
$hasil = mysql_query($strsql);
$row = mysql_fetch_array($hasil);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Sistem Informasi Akademik <?php echo $row['NAMA']; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="bootstrap/css/default.css" rel="stylesheet">
        <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
        <link rel="stylesheet" href="bootstrap/css/themes/default/default.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="bootstrap/css/nivo-slider.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="bootstrap/css/styles.css" type="text/css" media="screen" />
        <script type="text/javascript" src="bootstrap/js/jquery-1.9.1.min.js"></script> 
    </head>


    <body>
        <div class="container">

            <?php include './header.php'; ?>

            <!-- Jumbotron -->
            <div class="span20">
                <div class="slider-wrapper theme-default">
                    <div id="slider" class="nivoSlider">
                        <img src="bootstrap/img/1.JPG" data-thumb="bootstrap/img/1.JPG" alt="" width="300px" height="300px"/>
                        <img src="bootstrap/img/2.JPG" data-thumb="bootstrap/img/2.JPG" alt="" data-transition="slideInLeft" />
                        <img src="bootstrap/img/3.JPG" data-thumb="bootstrap/img/3.JPG" alt=""/>
                        <img src="bootstrap/img/4.JPG" data-thumb="bootstrap/img/4.JPG" alt="" />
                        <img src="bootstrap/img/5.JPG" data-thumb="bootstrap/img/5.JPG" alt="" />
                    </div>
                </div>
            </div>
            <hr>

            <!-- Example row of columns -->
            <div class="row-fluid">
                <?php include './content.php'; ?>
            </div>

            <?php include './admin/footer.php'; ?>
        </div>
        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <!--<script src="bootstrap/js/jquery.js"></script>-->
        <script src="bootstrap/js/bootstrap-dropdown.js"></script>
        <script type="text/javascript" src="bootstrap/js/jquery-1.9.0.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/jquery.nivo.slider.js"></script>
        <script type="text/javascript">
            $(window).load(function() {
                $('#slider').nivoSlider();
            });
        </script>
    </body>
</html>
