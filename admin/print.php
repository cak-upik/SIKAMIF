<?php
session_start();
include "../global/cek_session_admin.php";
?>
<html>
    <head>
        <title>Bimbingan Konseling</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link href="../bootstrap/css/bootstrap.css" rel="stylesheet"/>
        <link href="../bootstrap/css/bootstrap-responsive.css" rel="stylesheet"/>
        <link href="../bootstrap/css/style.css" rel="stylesheet"/>
        <link href="../bootstrap/css/flickr.css" rel="stylesheet"/>
        <script src="../bootstrap/js/jquery-1.7.2.min.js"></script>
        <script src="../bootstrap/js/bootstrap-dropdown.js"></script>
        <script type="text/javascript" src="../bootstrap/js/jquery.js"></script>
        <script type="text/javascript" src="../bootstrap/js/styletable.jquery.plugin.js"></script>
        <script type="text/javascript">
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

    <body onLoad="window.print();" onFocus="window.close();">
        <!-- Header -->        
        <?php include './header.php'; ?>        
        <!-- End Header -->

        <div class="container-fluid">
            <div class="row-fluid">
                <!-- Left -->
                <?php // include_once './left.php'; ?>
                <!-- end left -->

                <!-- Content -->  
                <div class="span9">
                    <div class="row-fluid">
                        <?php
                        $posisi = 0;
                        //query
                        $tampil = "SELECT siswa.NIS, siswa.NAMA_LENGKAP, bk.kelas, bk.id_bk, COUNT(bk.pelanggaran) AS total FROM siswa INNER JOIN bk on siswa.NIS = bk.NIS AND bk.pelanggaran <> ''
                            group by siswa.NIS ORDER BY total DESC";
                        $hasil = mysql_query($tampil);

                        //pemberian nomor
                        $no = $posisi + 1;
                        ?>
                        <!--menampilkan data-->
                        <table class="table-bordered" style="width: 135%;">
                            <thead>
                            <th>NO.</th>
                            <th>KELAS</th>
                            <th>NIS</th>
                            <th>NAMA SISWA</th>
                            <th>Total Pelanggaran</th>
                            </thead>
                            <?php
                            while ($data = mysql_fetch_array($hasil)) {
                                if ($data[total] >= 6) {
                                    $warna = '#e9322d';
                                } elseif ($data[total] <= 6) {
                                    $warna = '';
                                }
                                echo "<tr>
                                <td align='center' bgcolor='$warna'>$no.</td>
                                    <td bgcolor='$warna'>$data[kelas]</td>
                                        <td bgcolor='$warna'>$data[NIS]</td>
                                        <td bgcolor='$warna'>$data[NAMA_LENGKAP]</td>
                                            <td align='center' bgcolor='$warna'>$data[total]</td>
                                    </tr>";
                                $no++;
                            }

                            echo "</table>";
                            ?>                        
                    </div>
                </div>

                <!-- end content -->
            </div>
        </div>

        <!-- Footer -->
        <?php  //include_once './footer.php'; ?>
        <!-- end left -->
    </body>
</html>

