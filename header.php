<?php
include_once "./global/config.php";

$strsql = "select * from profil";
$hasil = mysql_query($strsql);
$row = mysql_fetch_array($hasil);
?>
<div class="masthead">
    <img src="bootstrap/img/Logo bangkalan.JPG" width="100" height="100" style="float:left; clear: left; margin-right: 30px; margin-top: -10px;">
    <h2 class="muted brand font"><a href="./index.php" class="muted">Sistem Informasi Akademik <?php echo $row['NAMA']; ?></a></h2>
    <h4 class="brand font"><?php
        echo $row['ALAMAT'];
        echo "  " . $row['KABUPATEN'];
        echo "  " . $row['PROPINSI'];
        ?></h4>
        <h5 class="muted brand font"><?php
        echo "WEBSITE :" . $row['WEBSITE'];
        echo "&nbsp;&nbsp;&nbsp;  EMAIL :" . $row['EMAIL'];
        ?></h5>
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container">
                <ul class="nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="visi-misi.php">Visi Misi</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </div>
        </div>
    </div><!-- /.navbar -->
</div>