<?php
session_start();
include "../global/config.php";
$nis = $_REQUEST['nis'];

$strsql = "select nis,nama_lengkap,nama_panggilan,alamat,telp_rumah,telp_hp,tempat_lahir,tgl_lahir,sex,agama,anak_ke,status,
jenis_ijazah,tahun_ijazah,nomor_ijazah,nama_ayah,pekerjaan_ayah,alamat_ayah,telp_rumah_ayah,telp_hp_ayah,nama_ibu,pekerjaan_ibu,
alamat_ibu,telp_rumah_ibu,telp_hp_ibu,nama_wali,pekerjaan_wali,alamat_wali,telp_rumah_wali,telp_hp_wali,catatan_lain,aktif,foto 
from siswa where nis='$nis'";
$hasil = mysql_query($strsql);
$row = mysql_fetch_array($hasil);
?>
<html>
    <head>
        <title>Detail Siswa</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link href="../bootstrap/css/bootstrap.css" rel="stylesheet"/>
        <link href="../bootstrap/css/bootstrap-responsive.css" rel="stylesheet"/>
        <link href="../bootstrap/css/style.css" rel="stylesheet"/>
        <script src="../bootstrap/js/jquery-1.7.2.min.js"></script>
        <script src="../bootstrap/js/bootstrap-dropdown.js"></script>
        <script language="JavaScript"  src="../global/jscript.js" type="text/javascript"></script>
        <script language="JavaScript"  src="../global/jscript_pop.js" type="text/javascript"></script>
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
            function closeWin()
            {
                this.close();
            }
        </script>
    </head>

    <body>
        <!-- Header -->        
        <?php //include_once './header.php'; ?>        
        <!-- End Header -->

        <div class="container-fluid">
            <div class="row-fluid">
                <!-- Left -->
                <?php //include_once './left.php'; ?>
                <!-- end left -->

                <!-- Content -->  
                <div class="span9">
                    <h3>DATA SISWA</h3>
                    <table class="table-bordered">
                        <thead> 
                        <th colspan="3">DETIL DATA SISWA</th>
                        </thead>
                        <tr>  
                            <td>NIS</td>
                            <td>:</td>
                            <td><?php echo $nis; ?></td>
                        </tr>
                        <tr> 
                            <td>NAMA LENGKAP</td>
                            <td>:</td>
                            <td><?php echo $row[nama_lengkap]; ?></td>
                        </tr>
                        <tr> 
                            <td>NAMA PANGGILAN</td>
                            <td>:</td>
                            <td><?php echo $row[nama_panggilan]; ?></td>
                        </tr>
                        <tr> 
                            <td>ALAMAT</td>
                            <td>:</td>
                            <td><?php echo $row[alamat]; ?></td>
                        </tr>
                        <tr> 
                            <td>TELP. RUMAH</td>
                            <td>:</td>
                            <td><?php echo $row[telp_rumah]; ?></td>
                        </tr>
                        <tr> 
                            <td>TELP. HP</td>
                            <td>:</td>
                            <td><?php echo $row[telp_hp]; ?></td>
                        </tr>
                        <tr> 
                            <td>TEMPAT LAHIR</td>
                            <td>:</td>
                            <td><?php echo $row[tempat_lahir]; ?></td>
                        </tr>
                        <tr> 
                            <td>TGL. LAHIR</td>
                            <td>:</td>
                            <td> 
                                <?php
                                echo $row[tgl_lahir];
                                ?>
                                &nbsp;<i>( tahun / bulan / tgl. )</i></td>
                        </tr>
                        <tr> 
                            <td>JENIS KELAMIN</td>
                            <td>:</td>
                            <td> 
                                <?php
                                echo $row[sex];
                                ?>
                            </td>
                        </tr>
                        <tr> 
                            <td>AGAMA</td>
                            <td>:</td>
                            <td><?php echo $row[agama]; ?></td>
                        </tr>
                        <tr> 
                            <td>ANAK KE </td>
                            <td>:</td>
                            <td><?php echo $row[anak_ke]; ?></td>
                        </tr>
                        <tr> 
                            <td>STATUS KELUARGA</td>
                            <td>:</td>
                            <td><?php echo $row[status]; ?></td>
                        </tr>
                        <tr> 
                            <td>JENIS IJAZAH 
                                MASUK</td>
                            <td>:</td>
                            <td><?php echo $row[jenis_ijazah]; ?></td>
                        </tr>
                        <tr> 
                            <td>TAHUN IJAZAH</td>
                            <td>:</td>
                            <td><?php echo $row[tahun_ijazah]; ?></td>
                        </tr>
                        <tr> 
                            <td>NOMOR IJAZAH</td>
                            <td>:</td>
                            <td><?php echo $row[nomor_ijazah]; ?></td>
                        </tr>
                        <tr> 
                            <td>CATATAN LAIN</td>
                            <td>:</td>
                            <td><?php echo $row[catatan_lain]; ?></td>
                        </tr>
                        <tr> 
                            <td>FOTO</td>
                            <td>:</td>
                            <td> 
                                <?php
                                if ($row[foto] <> '')
                                    echo "<img src='foto/$row[foto]' width='120' height='110'>";
                                ?>
                        </tr>
                        <tr> 
                            <td>AKTIF</td>
                            <td>:</td>
                            <td>
                                <?php
                                if ($row[aktif] == '1') {
                                    echo "Ya";
                                } else {
                                    echo "Tidak";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                        <thead> 
                        <th colspan="3">DATA AYAH</th>
                        </thead>
                        </tr>
                        <tr> 
                            <td>NAMA AYAH </td>
                            <td>:</td>
                            <td><?php echo $row[nama_ayah]; ?></td>
                        </tr>
                        <tr> 
                            <td>PEKERJAAN</td>
                            <td>:</td>
                            <td><?php echo $row[pekerjaan_ayah]; ?></td>
                        </tr>
                        <tr> 
                            <td>ALAMAT</td>
                            <td>:</td>
                            <td><?php echo $row[alamat_ayah]; ?></td>
                        </tr>
                        <tr> 
                            <td>TELP. RUMAH</td>
                            <td>:</td>
                            <td><?php echo $row[telp_rumah_ayah]; ?></td>
                        </tr>
                        <tr> 
                            <td>TELP. HP</td>
                            <td>:</td>
                            <td><?php echo $row[telp_hp_ayah]; ?></td>
                        </tr>
                        <thead> 
                        <th colspan="3">DATA IBU</th>
                        </thead>
                        <tr> 
                            <td>NAMA IBU</td>
                            <td>:</td>
                            <td><?php echo $row[nama_ibu]; ?></td>
                        </tr>
                        <tr> 
                            <td>PEKERJAAN</td>
                            <td>:</td>
                            <td><?php echo $row[pekerjaan_ibu]; ?></td>
                        </tr>
                        <tr> 
                            <td>ALAMAT</td>
                            <td>:</td>
                            <td><?php echo $row[alamat_ibu]; ?></td>
                        </tr>
                        <tr> 
                            <td>TELP. RUMAH</td>
                            <td>:</td>
                            <td><?php echo $row[telp_rumah_ibu]; ?></td>
                        </tr>
                        <tr> 
                            <td>TELP. HP</td>
                            <td>:</td>
                            <td><?php echo $row[telp_hp_ibu]; ?></td>
                        </tr>
                        <thead> 
                        <th colspan="3">DATA WALI</th>
                        </thead>
                        <tr> 
                            <td>NAMA WALI</td>
                            <td>:</td>
                            <td><?php echo $row[nama_wali]; ?></td>
                        </tr>
                        <tr> 
                            <td>PEKERJAAN</td>
                            <td>:</td>
                            <td><?php echo $row[pekerjaan_wali]; ?></td>
                        </tr>
                        <tr> 
                            <td>ALAMAT</td>
                            <td>:</td>
                            <td><?php echo $row[alamat_wali]; ?></td>
                        </tr>
                        <tr> 
                            <td>TELP. RUMAH</td>
                            <td>:</td>
                            <td><?php echo $row[telp_rumah_wali]; ?></td>
                        </tr>
                        <tr> 
                            <td>TELP. HP</td>
                            <td>:</td>
                            <td><?php echo $row[telp_hp_wali]; ?></td>
                        </tr>
                    </table>
                    <button class="btn btn-inverse" onClick="closeWin();">Close</button>
                </div>
            </div>
            <!-- end content -->
            <!-- Footer -->
            <?php include_once './footer.php'; ?>
            <!-- end left -->
        </div>

    </body>
</html>
