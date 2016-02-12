<?php
include "../global/config.php";
include "../global/cek_session_admin.php";
$tahun_ajaran = $_REQUEST['tahun_ajaran'];
?>
<html>
    <head>
        <title>Raport Wali Kelas</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link href="../bootstrap/css/bootstrap.css" rel="stylesheet"/>
        <link href="../bootstrap/css/bootstrap-responsive.css" rel="stylesheet"/>
        <link href="../bootstrap/css/style.css" rel="stylesheet"/>
        <link href="../bootstrap/css/flickr.css" rel="stylesheet"/>
        <script src="../bootstrap/js/jquery-1.7.2.min.js"></script>
        <script src="../bootstrap/js/bootstrap-dropdown.js"></script>
        <script type="text/javascript" src="../bootstrap/js/jquery.js"></script>
        <script type="text/javascript" src="../bootstrap/js/styletable.jquery.plugin.js"></script>
        <script language="JavaScript">
            $(document).ready(function() {
                $('table').styleTable({
                    th_bgcolor: '#3E83C9',
                    th_color: '#ffffff',
                    th_border_color: '#333333',
                    tr_odd_bgcolor: '#ECF6FC',
                    tr_even_bgcolor: '#ffffff',
                    tr_border_color: '#95BCE2',
                    tr_hover_bgcolor: '#BCD4EC'
                });
            });
        </script>
    </head>

    <body>
        <div class="span9">
            <div class="row-fluid">
                <?php
                include "header_rpt.php";
                ?>
                <br><br>
                <table class="table-bordered">
                    <thead> 
                    <th>DATA WALI KELAS</th>
                    </thead>
                    <tr> 
                        <td><div align="left">TAHUN AJARAN: <?php echo $tahun_ajaran; ?></div></td>
                    </tr>
                </table>
                <br/>
                <table class="table-bordered">
                    <thead>
                    <th>NIP</th>
                    <th>NAMA</th>
                    <th>KELAS</th>
                        </thead>
                        <?php
                        $strsql = "SELECT wali_kelas.ID, wali_kelas.TAHUN_AJARAN, guru.NIP, guru.GLR_DEPAN, guru.NAMA, guru.GLR_BLK, kelas.RUANG
FROM kelas INNER JOIN (guru INNER JOIN wali_kelas ON guru.ID = wali_kelas.ID_GURU) ON kelas.ID = wali_kelas.ID_KELAS
where wali_kelas.TAHUN_AJARAN='$tahun_ajaran' order by kelas.RUANG";
                        $hasil = mysql_query($strsql);
                        while ($row = mysql_fetch_array($hasil)) {
                            $nama_guru = $row[GLR_DEPAN] . " " . $row[NAMA] . " " . $row[GLR_BLK];
                            ?>
                            <tr>
                                <td align="center"><?php echo $row[NIP]; ?></td>
                                <td><?php echo $nama_guru; ?></td>
                                <td align="center"><?php echo $row[RUANG]; ?></td>
                            </tr>
                            <?php
                        }
                        mysql_free_result($hasil);
                        ?>
                </table>
            </div>
        </div>
    </body>
</html>
