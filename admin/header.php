<?php
include_once "../global/connect.php";

$strsql = "select ID,NAMA,STATUS,NSS,NDS,ALAMAT,KECAMATAN,KABUPATEN,PROPINSI from profil";
$hasil = mysql_query($strsql);
$row = mysql_fetch_array($hasil);
?>
<div class="navbar-container" id="navbar-container">
    <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
        <span class="sr-only">Toggle sidebar</span>

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>
    </button>

    <div class="navbar-header pull-left">
        <a href="index.php?p=0" class="navbar-brand">
            <small>
                <i class="fa fa-building"></i>
                Sistem Informasi Akademik <?php echo $row['NAMA']; ?>
            </small>
        </a>
    </div>

    <div class="navbar-buttons navbar-header pull-right" role="navigation">
        <ul class="nav ace-nav">
            <li class="light-blue">
                <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                    <img class="nav-user-photo" src="../assets/avatars/user.jpg" alt="Jason's Photo" />
                    <span class="user-info">
                        <small>Welcome,</small>
                        <?php echo $_SESSION['username'];?>
                    </span>
                    <i class="ace-icon fa fa-caret-down"></i>
                </a>

                <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                    <li>
                        <a href="#">
                            <i class="ace-icon fa fa-cog"></i>
                            Settings
                        </a>
                    </li>

                    <li>
                        <a href="profile.html">
                            <i class="ace-icon fa fa-user"></i>
                            Profile
                        </a>
                    </li>

                    <li class="divider"></li>

                    <li>
                        <a href="../global/logout.php">
                            <i class="ace-icon fa fa-power-off"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div><!-- /.navbar-container -->