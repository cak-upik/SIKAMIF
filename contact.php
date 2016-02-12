<?php
include "./global/config.php";

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
    </head>

    <body>
        <div class="container">

            <?php include './header.php'; ?>

            <!-- Example row of columns -->
            <div class="row-fluid">
                <div class="span20">
                    <h2>Contact</h2>
                    <h4><?php echo $row['NAMA']; ?></h4>
                    <p><?php echo $row['ALAMAT']; ?></p>
                    <p>Kecamatan : <?php echo $row['KECAMATAN']; ?></p>
                    <p>Kabupaten : <?php echo $row['KABUPATEN']; ?></p>
                    <p>Propinsi : <?php echo $row['PROPINSI']; ?></p>
                    <p>Email : <a href="<?php echo $row[EMAIL]; ?>"><?php echo $row['EMAIL']; ?></a></p>
                    <p>Website : <?php echo $row['WEBSITE']; ?></p>
                </div>
            </div>

            <?php include './admin/footer.php'; ?>
        </div>
        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="bootstrap/js/jquery.js"></script>
        <!--<script src="bootstrap/js/bootstrap-dropdown.js"></script>-->

    </body>
</html>