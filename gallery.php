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
        <script type="text/javascript" src="bootstrap/js/html5gallery/html5gallery.js"></script>
    </head>


    <body>
        <div class="container">

            <?php include './header.php'; ?>

            <!-- Jumbotron -->
            <div style="text-align:center; margin: 5px auto -55px;">
                <div style="display:none;margin:0 auto;" class="html5gallery" data-skin="gallery" data-width="850" data-height="472" data-resizemode="fill">
                    <a href="bootstrap/img/1.JPG"><img src="bootstrap/img/1.JPG" alt=""/></a>
                    <a href="bootstrap/img/2.JPG"><img src="bootstrap/img/2.JPG" alt=""/></a>
                    <a href="bootstrap/img/3.JPG"><img src="bootstrap/img/3.JPG" alt=""/></a>
                    <a href="bootstrap/img/4.JPG"><img src="bootstrap/img/4.JPG" alt=""/></a>
                    <a href="bootstrap/img/5.JPG"><img src="bootstrap/img/5.JPG" alt=""/></a>
                    <a href="bootstrap/img/6.JPG"><img src="bootstrap/img/6.JPG" alt=""/></a>
                    <a href="bootstrap/img/7.JPG"><img src="bootstrap/img/7.JPG" alt=""/></a>
                    <a href="bootstrap/img/8.JPG"><img src="bootstrap/img/8.JPG" alt=""/></a>
                    <a href="bootstrap/img/9.JPG"><img src="bootstrap/img/9.JPG" alt=""/></a>
                    <a href="bootstrap/img/10.JPG"><img src="bootstrap/img/10.JPG" alt=""/></a>
                </div>
            </div>
            <?php include './admin/footer.php'; ?>
        </div>
        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <!--<script src="bootstrap/js/jquery.js"></script>-->
        <script src="bootstrap/js/bootstrap-dropdown.js"></script>
    </body>
</html>
