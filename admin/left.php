<?php
//session_start();
include "../global/connect.php";

$hasil_ta = mysql_query("select tahun_ajaran from tahun_ajaran order by tahun_ajaran desc limit 0,1");
$row_ta = mysql_fetch_array($hasil_ta);

$hasil_kelas = mysql_query("select id,ruang,aktif from kelas where aktif='1' order by ruang asc limit 0,1");
$row_kelas = mysql_fetch_array($hasil_kelas);

$hasil_ta2 = mysql_query("select tahun_ajaran from tahun_ajaran order by tahun_ajaran desc limit 1,1");
$row_ta2 = mysql_fetch_array($hasil_ta2);

$qry_matpel = mysql_query("select kelas,tahun_ajaran from matpel order by id_matpel desc limit 1,1");
$row_matpel = mysql_fetch_array($qry_matpel);
?>

<div id="sidebar" class="sidebar responsive">
    <script type="text/javascript">
        try {
            ace.settings.check('sidebar', 'fixed')
        } catch (e) {
        }
    </script>

    <ul class="nav nav-list">
        <li class="active">
            <a href="index.php">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Dashboard </span>
            </a>
            <b class="arrow"></b>
        </li>
        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-list"></i>
                <span class="menu-text"> Master </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="">
                    <a href="tahun_ajaran.php">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Data Tahun Ajaran
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="data_kelas.php">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Data Kelas
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="data_siswa.php">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Data Siswa
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="data_guru.php">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Data Guru
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="matpel.php?kelas=<?php echo $row_matpel[kelas]; ?>&tahun=<?php echo $row_matpel[tahun_ajaran]; ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Data Mata Pelajaran
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-pencil-square-o"></i>
                <span class="menu-text"> Transaksi </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="">
                    <a href="data_matpel.php?kelas=1&tahun_ajaran=<?php echo $row_ta[tahun_ajaran]; ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Input SKBM
                    </a>
                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="wali_kelas.php?tahun_ajaran=<?php echo $row_ta[tahun_ajaran]; ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Wali Kelas
                    </a>
                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="jadwal_pelajaran.php?tahun_ajaran=<?php echo $row_ta[tahun_ajaran]; ?>&hari=SENIN&kelas_id=<?php echo $row_kelas[id]; ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Jadwal Pelajaran
                    </a>
                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="penempatan_kelas.php?tahun_ajaran=<?php echo $row_ta[tahun_ajaran]; ?>&kelas_id=<?php echo $row_kelas[id]; ?>">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Penempatan Kelas
                    </a>
                    <b class="arrow"></b>
                </li>

                <li class="">
                    <a href="input_nilai.php?tahun_ajaran=<?php echo $row_ta[tahun_ajaran]; ?>&kelas_id=<?php echo $row_kelas[id]; ?>&semester=1">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Input Nilai
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-list-alt"></i>
                <span class="menu-text"> Laporan </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="">
                    <a href="laporan_nilai.php?tahun_ajaran=<?php echo $row_ta[tahun_ajaran]; ?>&kelas_id=<?php echo $row_kelas[id]; ?>&semester=1">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Laporan Nilai
                    </a>
                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="gallery.html">
                <i class="menu-icon fa fa-picture-o"></i>
                <span class="menu-text"> Gallery </span>
            </a>

            <b class="arrow"></b>
        </li>

        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-wrench"></i>
                <span class="menu-text"> Setting </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="">
                    <a href="user_manager.php?status=1">
                        <i class="menu-icon fa fa-caret-right"></i>
                        User Management
                    </a>

                    <b class="arrow"></b>
                </li>
                <li class="">
                    <a href="profil_sekolah.php">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Profile Website
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        <li class="">
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-question-circle"></i>

                <span class="menu-text">
                    Other
                </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="">
                    <a href="faq.html">
                        <i class="menu-icon fa fa-caret-right"></i>
                        FAQ
                    </a>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
    </ul><!-- /.nav-list -->

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
    <script type="text/javascript">
        try {
            ace.settings.check('sidebar', 'collapsed')
        } catch (e) {
        }
    </script>
</div>

<!--<div class="span2">
    <div class="well sidebar-nav">
        <ul class="nav nav-list">
            <li class="nav-header">Menu</li>
            <li class="active"><a href="profil_sekolah.php">Profil Sekolah</a></li>
            <li><a href="tahun_ajaran.php">Tahun Ajaran</a></li>                            
            <li><a href="data_kelas.php">Data Kelas</a></li>
            <li><a href="data_siswa.php">Data Siswa</a></li>
            <li><a href="data_guru.php">Data Guru</a></li>
            <li><a href="matpel.php?kelas=<?php echo $row_matpel[kelas]; ?>&tahun=<?php echo $row_matpel[tahun_ajaran]; ?>">Data Mata Pelajaran</a></li>
            <li><a href="manageMatpel.php?kelas=<?php echo $row_matpel[kelas]; ?>&tahun=<?php echo $row_matpel[tahun_ajaran]; ?>">Manajemen Guru Mata Pelajaran</a></li>
            <li><a href="data_matpel.php?kelas=1&tahun_ajaran=<?php echo $row_ta[tahun_ajaran]; ?>">Input SKBM</a></li>
            <li><a href="wali_kelas.php?tahun_ajaran=<?php echo $row_ta[tahun_ajaran]; ?>">Wali Kelas</a></li>
            <li><a href="jadwal_pelajaran.php?tahun_ajaran=<?php echo $row_ta[tahun_ajaran]; ?>&hari=SENIN&kelas_id=<?php echo $row_kelas[id]; ?>">Jadwal Pelajaran</a></li>
            <li><a href="penempatan_kelas.php?tahun_ajaran=<?php echo $row_ta[tahun_ajaran]; ?>&kelas_id=<?php echo $row_kelas[id]; ?>">Penempatan Kelas</a></li>
            <li><a href="input_nilai.php?tahun_ajaran=<?php echo $row_ta[tahun_ajaran]; ?>&kelas_id=<?php echo $row_kelas[id]; ?>&semester=1">Input Nilai</a></li>
            <li><a href="laporan_nilai.php?tahun_ajaran=<?php echo $row_ta[tahun_ajaran]; ?>&kelas_id=<?php echo $row_kelas[id]; ?>&semester=1">Laporan Nilai</a></li>
            <li><a href="user_manager.php?status=1">User Manager</a></li>
        </ul>
    </div>
</div>-->
