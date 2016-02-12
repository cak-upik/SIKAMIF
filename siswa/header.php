<?php
session_start();
include ".../global/cek_session_siswa.php";

$strsql = "select * from profil";
$hasil = mysql_query($strsql);
$rows = mysql_fetch_array($hasil);
?>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <img src="../bootstrap/img/logo.png" class="brand pull-left">
            <a href="./index.php" class="brand">Sistem Informasi Akademik <?php echo $rows['NAMA']; ?></a>
            <p class="brand"><?php
                echo $rows['ALAMAT'];
                echo "  " . $rows['KABUPATEN'];
                echo "  " . $rows['PROPINSI'];
                ?></p>
            <div class="nav-collapse collapse">
                <ul class="nav pull-right">
                    <li class="dropdown right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <?php
                            echo 'Logged as ' . $_SESSION['username'];
                            ?><b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="../global/logout.php">LogOut</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
