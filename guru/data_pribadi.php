<?php
session_start();
include "../global/cek_session_wali_kelas.php";
//$id = $_REQUEST['id'];

$sqls = "select * from guru where nip='$_SESSION[username]'";
$hasil = mysql_query($sqls);
$data = mysql_fetch_array($hasil);
?>
<html>
    <head>
        <title>Data Pribadi</title>
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
        <!-- Header -->        
        <?php include './header.php'; ?>        
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
                            <th colspan="3">DATA PRIBADI </th>
                            </thead>
                            <tr> 
                                <td>NIP</td>
                                <td>:</td>
                                <td><?php echo $data[NIP]; ?> </td>
                            </tr>
                            <tr> 
                                <td>NAMA</td>
                                <td>:</td>
                                <td><?php echo $data[GLR_DEPAN]; ?>&nbsp;<?php echo $data[NAMA]; ?>&nbsp;<?php echo $data[GLR_BLK]; ?></td>
                            </tr>
                            <tr> 
                                <td>TEMPAT LAHIR</td>
                                <td>:</td>
                                <td><?php echo $data[TEMPAT_LAHIR]; ?></td>
                            </tr>
                            <tr> 
                                <td>TGL. LAHIR</td>
                                <td>:</td>
                                <td><?php echo $data[TGL_LAHIR]; ?> &nbsp;<i>( tahun / bulan / 
                                        tgl. )</i></td>
                            </tr>
                            <tr> 
                                <td>JENIS KELAMIN</td>
                                <td>:</td>
                                <td><?php echo $data[SEX]; ?></td>
                            </tr>
                            <tr> 
                                <td>AGAMA</td>
                                <td>:</td>
                                <td><?php echo $data[AGAMA]; ?></td>
                            </tr>
                            <tr> 
                                <td>ALAMAT LENGKAP</td>
                                <td>:</td>
                                <td><?php echo $data[ALAMAT_SKR]; ?></td>
                            </tr>
                            <tr> 
                                <td>TELP. RUMAH</td>
                                <td>:</td>
                                <td><?php echo $data[TELP_RUMAH]; ?></td>
                            </tr>
                            <tr> 
                                <td>TELP. HP</td>
                                <td>:</td>
                                <td><?php echo $data[TELP_HP]; ?></td>
                            </tr>
                            <tr> 
                                <td>ALAMAT ASAL LENGKAP</td>
                                <td>:</td>
                                <td><?php echo $data[ALAMAT_ASAL]; ?></td>
                            </tr>
                            <tr> 
                                <td>NARASI</td>
                                <td>:</td>
                                <td><?php echo $data[NARASI]; ?></td>
                            </tr>
                            <tr> 
                                <td>AKTIF</td>
                                <td>:</td>
                                <td> 
                                    <?php
                                    if ($data[AKTIF] == '1') {
                                        echo "Ya";
                                    } else {
                                        echo "Tidak";
                                    }
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!-- end content -->

                </div>
            </div><!-- Footer -->
            <?php include_once './footer.php'; ?>
            <!-- end left -->
        </div>

    </body>
</html>