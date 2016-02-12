<?php
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "../global/config.php";
$id = $_REQUEST['id'];

$strsql = "select NIP,GLR_DEPAN,NAMA,GLR_BLK,TEMPAT_LAHIR,TGL_LAHIR,ALAMAT_SKR,TELP_RUMAH,TELP_HP,ALAMAT_ASAL,NARASI,AGAMA,AKTIF,SEX from guru where id='$id'";
$hasil = mysql_query($strsql);
$row = mysql_fetch_array($hasil);
?>
<html>
    <head>
        <title>Detail Guru</title>
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
        <?php // include_once './header.php'; ?>        
        <!-- End Header -->

        <div class="container-fluid">
            <div class="row-fluid">
                <!-- Left -->
                <?php // include_once './left.php'; ?>
                <!-- end left -->

                <!-- Content -->  
                <div class="span12">
                    <table class="table-bordered">
                        <thead>
                        <th colspan="3">Detail Data Guru</th>
                        </thead>
                        <tr> 
                            <td>NIP</td>
                            <td>:</td>
                            <td><?php echo $row[NIP]; ?></td>
                        </tr>
                        <tr> 
                            <td>NAMA</td>
                            <td>:</td>
                            <td><?php echo $row[GLR_DEPAN]; ?> <?php echo $row[NAMA]; ?> <?php echo $row[GLR_BLK]; ?></td>
                        </tr>
                        <tr> 
                            <td>TEMPAT LAHIR</td>
                            <td>:</td>
                            <td><?php echo $row[TEMPAT_LAHIR]; ?></td>
                        </tr>
                        <tr> 
                            <td>TGL. LAHIR</td>
                            <td>:</td>
                            <td><?php echo $row[TGL_LAHIR]; ?> &nbsp;<i>( tahun / bulan / 
                                    tgl. )</i></td>
                        </tr>
                        <tr> 
                            <td>JENIS KELAMIN</td>
                            <td>:</td>
                            <td><?php echo $row[SEX]; ?></td>
                        </tr>
                        <tr> 
                            <td>AGAMA</td>
                            <td>:</td>
                            <td><?php echo $row[AGAMA]; ?></td>
                        </tr>
                        <tr> 
                            <td>ALAMAT LENGKAP</td>
                            <td>:</td>
                            <td><?php echo $row[ALAMAT_SKR]; ?></td>
                        </tr>
                        <tr> 
                            <td>TELP. RUMAH</td>
                            <td>:</td>
                            <td><?php echo $row[TELP_RUMAH]; ?></td>
                        </tr>
                        <tr> 
                            <td>TELP. HP</td>
                            <td>:</td>
                            <td><?php echo $row[TELP_HP]; ?></td>
                        </tr>
                        <tr> 
                            <td>ALAMAT ASAL LENGKAP</td>
                            <td>:</td>
                            <td><?php echo $row[ALAMAT_ASAL]; ?></td>
                        </tr>
                        <tr> 
                            <td>NARASI</td>
                            <td>:</td>
                            <td><?php echo $row[NARASI]; ?></td>
                        </tr>
                        <tr> 
                            <td>AKTIF</td>
                            <td>:</td>
                            <td> 
                                <?php
                                if ($row[AKTIF] == '1') {
                                    echo "Ya";
                                } else {
                                    echo "Tidak";
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <button class="btn btn-inverse" onClick="closeWin();">Close</button>
            </div>
            <!-- end content -->
            <!-- Footer -->
            <?php include_once './footer.php'; ?>
            <!-- end left -->
        </div>

    </body>
</html>