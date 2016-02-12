<?php
session_start();
include '../global/cek_session_siswa.php';

//$strsql = "select * from SISWA where NIS='$_SESSION[username]'";
$query = mysql_query("SELECT * FROM siswa WHERE NIS = '$_SESSION[username]'");
$data = mysql_fetch_array($query);

?>
<html>
    <head>
        <title>Data Pribadi</title>
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
        </script>
    </head>

    <body>
        <!-- Header -->        
        <?php include_once './header.php'; ?>        
        <!-- End Header -->

        <div class="container-fluid">
            <div class="row-fluid">
                <!-- Left -->
                <?php include_once './left.php'; ?>
                <!-- end left -->

                <!-- Content -->  
                <div class="span9">
                    <div class="row-fluid">
                        <table class="table-bordered">
                            <thead> 
                            <th colspan="3">DATA PRIBADI SISWA</th>
                            </thead>
                            <tr> 
                                <td>NIS</td>
                                <td>:</td>
                                <td><?php echo $data['NIS']; ?></td>
                            </tr>
                            <tr> 
                                <td>NAMA LENGKAP</td>
                                <td>:</td>
                                <td><?php echo $data['NAMA_LENGKAP']; ?></td>
                            </tr>
                            <tr> 
                                <td>NAMA PANGGILAN</td>
                                <td>:</td>
                                <td><?php echo $data['NAMA_PANGGILAN']; ?></td>
                            </tr>
                            <tr> 
                                <td>ALAMAT</td>
                                <td>:</td>
                                <td><?php echo $data['ALAMAT']; ?></td>
                            </tr>
                            <tr> 
                                <td>TELP. RUMAH</td>
                                <td>:</td>
                                <td><?php echo $data['TELP_RUMAH']; ?></td>
                            </tr>
                            <tr> 
                                <td>TELP. HP</td>
                                <td>:</td>
                                <td><?php echo $data['TELP_HP']; ?></td>
                            </tr>
                            <tr> 
                                <td>TEMPAT LAHIR</td>
                                <td>:</td>
                                <td><?php echo $data['TEMPAT_LAHIR']; ?></td>
                            </tr>
                            <tr> 
                                <td>TGL. LAHIR</td>
                                <td>:</td>
                                <td> 
                                    <?php
                                    echo $data['TGL_LAHIR'];
                                    ?>
                                    <i>( tahun / bulan / tgl. )</i></td>
                            </tr>
                            <tr> 
                                <td>JENIS KELAMIN</td>
                                <td>:</td>
                                <td> 
                                    <?php
                                    echo $data['SEX'];
                                    ?>
                                </td>
                            </tr>
                            <tr> 
                                <td>AGAMA</td>
                                <td>:</td>
                                <td><?php echo $data['AGAMA']; ?></td>
                            </tr>
                            <tr> 
                                <td>ANAK KE </td>
                                <td>:</td>
                                <td><?php echo $data['ANAK_KE']; ?></td>
                            </tr>
                            <tr> 
                                <td>STATUS KELUARGA</td>
                                <td>:</td>
                                <td><?php echo $data['STATUS']; ?></td>
                            </tr>
                            <tr> 
                                <td>JENIS IJAZAH 
                                    MASUK</td>
                                <td>:</td>
                                <td><?php echo $data['JENIS_IJAZAH']; ?></td>
                            </tr>
                            <tr> 
                                <td>TAHUN IJAZAH</td>
                                <td>:</td>
                                <td><?php echo $data['TAHUN_IJAZAH']; ?></td>
                            </tr>
                            <tr> 
                                <td>NOMOR IJAZAH</td>
                                <td>:</td>
                                <td><?php echo $data['NOMOR_IJAZAH']; ?></td>
                            </tr>
                            <tr> 
                                <td>CATATAN LAIN</td>
                                <td>:</td>
                                <td><?php echo $data['CATATAN_LAIN']; ?></td>
                            </tr>
                            <tr> 
                                <td>FOTO</td>
                                <td>:</td>
                                <td> 
                                    <?php
                                    if ($data[FOTO] <> '')
                                        echo "<img src='../admin/FOTO/$data[FOTO]' width='120' height='150'>";
                                    ?>
                            </tr>
                            <tr> 
                                <td>AKTIF</td>
                                <td>:</td>
                                <td>
                                    <?php
                                    if ($data[aktif] == '1') {
                                        echo "Ya";
                                    } else {
                                        echo "Tidak";
                                    }
                                    ?>
                                </td>
                            </tr>
                            <thead> 
                            <th colspan="3">DATA AYAH</th>
                            </thead>
                            <tr> 
                                <td>NAMA AYAH </td>
                                <td>:</td>
                                <td><?php echo $data['NAMA_AYAH']; ?></td>
                            </tr>
                            <tr> 
                                <td>PEKERJAAN</td>
                                <td>:</td>
                                <td><?php echo $data['PEKERJAAN_AYAH']; ?></td>
                            </tr>
                            <tr> 
                                <td>ALAMAT</td>
                                <td>:</td>
                                <td><?php echo $data['ALAMAT_ayah']; ?></td>
                            </tr>
                            <tr> 
                                <td>TELP. RUMAH</td>
                                <td>:</td>
                                <td><?php echo $data['TELP_RUMAH_AYAH']; ?></td>
                            </tr>
                            <tr> 
                                <td>TELP. HP</td>
                                <td>:</td>
                                <td><?php echo $data['TELP_HP_AYAH']; ?></td>
                            </tr>
                            <thead> 
                            <th colspan="3">IBU</th>
                            </thead>
                            <tr> 
                                <td>NAMA IBU</td>
                                <td>:</td>
                                <td><?php echo $data['NAMA_IBU']; ?></td>
                            </tr>
                            <tr> 
                                <td>PEKERJAAN</td>
                                <td>:</td>
                                <td><?php echo $data['PEKERJAAN_IBU']; ?></td>
                            </tr>
                            <tr> 
                                <td>ALAMAT</td>
                                <td>:</td>
                                <td><?php echo $data['ALAMAT_IBU']; ?></td>
                            </tr>
                            <tr> 
                                <td>TELP. RUMAH</td>
                                <td>:</td>
                                <td><?php echo $data['TELP_RUMAH_IBU']; ?></td>
                            </tr>
                            <tr> 
                                <td>TELP. HP</td>
                                <td>:</td>
                                <td><?php echo $data['TELP_HP_IBU']; ?></td>
                            </tr>
                            <thead> 
                            <th colspan="3">WALI</th>
                            </thead>
                            <tr> 
                                <td>NAMA WALI</td>
                                <td>:</td>
                                <td><?php echo $data['NAMA_WALI']; ?></td>
                            </tr>
                            <tr> 
                                <td>PEKERJAAN</td>
                                <td>:</td>
                                <td><?php echo $data['PEKERJAAN_WALI']; ?></td>
                            </tr>
                            <tr> 
                                <td>ALAMAT</td>
                                <td>:</td>
                                <td><?php echo $data['ALAMAT_WALI']; ?></td>
                            </tr>
                            <tr> 
                                <td>TELP. RUMAH</td>
                                <td>:</td>
                                <td><?php echo $data['TELP_RUMAH_WALI']; ?></td>
                            </tr>
                            <tr> 
                                <td>TELP. HP</td>
                                <td>:</td>
                                <td><?php echo $data['TELP_HP_WALI']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- end content -->
            </div>
            <!-- Footer -->
            <?php include_once './footer.php'; ?>
            <!-- end left -->
        </div>

    </body>
</html>
