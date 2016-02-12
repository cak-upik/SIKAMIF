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
            function cetak() {
                win = window.open('print.php', 'win', 'width=1500, height=750, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0');
            }
        </script>
    </head>

    <body>
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
                        <form class="form-search">
                            <input type="text" class="span4 search-query" name="search" placeholder="pencarian berdasarkan nama siswa"/><button type="submit" class="btn"><i class="icon-search"></i>Cari</button>
                        </form>
                        <?php
                        //halaman
                        if (isset($_GET['halaman'])) {
                            $halaman = $_GET['halaman'];
                        }

                        //batas menampilkan data
                        $batas = 15;
                        if (empty($halaman)) {
                            $posisi = 0;
                            $halaman = 1;
                        } else {
                            $posisi = ($halaman - 1) * $batas;
                        }

                        //query
                        $tampil = "SELECT siswa.NIS, siswa.NAMA_LENGKAP, bk.kelas, bk.id_bk, COUNT(bk.pelanggaran) AS total FROM siswa INNER JOIN bk on siswa.NIS = bk.NIS AND bk.pelanggaran <> ''
                            group by siswa.NIS ORDER BY total DESC LIMIT $posisi,$batas";
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
                                if($data[total] >= 6){
                                    $warna = '#e9322d';
                                }elseif ($data[total] <= 6) {
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

                            //tampil halaman
                            $page = mysql_query("SELECT * FROM bk");
                            $jmldata = mysql_num_rows($page);
                            $jmlhal = ceil($jmldata / $batas);
//                            echo "<div class='paging'>";
//
//                            if ($halaman > 1) {
//                                $prev = $halaman - 1;
//                                echo "<span class='prevnext'><a href='$_SERVER[PHP_SELF]?halaman=$prev'> Prev </a></span>";
//                            } else {
//                                echo "<span class='disabled'> Prev </span>";
//                            }
//
//                            for ($i = 1; $i <= $jmlhal; $i++)
//                                if ($i != $halaman) {
//                                    echo "<a href='$_SERVER[PHP_SELF]?halaman=$i'>$i</a>";
//                                } else {
//                                    echo "<span class=current>$i</span>";
//                                }
//
//                            if ($halaman < $jmlhal) {
//                                $next = $halaman + 1;
//                                echo "<span class='prevnext'><a href='$_SERVER[PHP_SELF]?halaman=$next'> Next</a></span>";
//                            } else {
//                                echo "<span class='disabled'> Next</span>";
//                            }
//                            echo "</div>";
                            echo "<div class = 'pagination'><ul>";
                            for ($i = 1; $i <= $jmlhal; $i++) {
                                echo "<li><a href='$_SERVER[PHP_SELF]?halaman=$i'> $i</a></li>";
                            }
                            echo "</ul></div>";
                            ?>                        
                    </div>
                </div>

                <!-- end content -->
            </div>
            <button onclick="cetak();" class="btn btn-info"><i class="icon-file icon-white"></i>Cetak</button>
            <button onclick="document.location = './bimbingan_konseling.php';"class="btn btn-danger"><i class="icon-arrow-left icon-white"></i>Kembali</button>
        </div>

        <!-- Footer -->
        <?php include_once './footer.php'; ?>
        <!-- end left -->
    </body>
</html>
