<?php
require_once "fungsi.php";
$id = $_REQUEST['id'];
$act = $_REQUEST['act'];
$strsql = "select * from profil";
$hasil = mysql_query($strsql);
$row = mysql_fetch_array($hasil);
?>
<html>
    <head>
        <title>Profil <?php echo $row['NAMA']; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<!--        <link href="../bootstrap/css/bootstrap.css" rel="stylesheet"/>
        <link href="../bootstrap/css/bootstrap-responsive.css" rel="stylesheet"/>
        <link href="../bootstrap/css/style.css" rel="stylesheet"/>
        <link href="../bootstrap/css/SyntaxHighlighter.css" rel="stylesheet" type="text/css" />
        <script src="../bootstrap/js/jquery-1.7.2.min.js"></script>
        <script src="../bootstrap/js/bootstrap-dropdown.js"></script>
-->
        <script language="JavaScript"  src="../global/jscript.js" type="text/javascript"></script>
        <script language="JavaScript"  src="../global/jscript_pop.js" type="text/javascript"></script>
<!--        <script type="text/javascript" src="../bootstrap/js/jquery.js"></script>
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
        </script>  -->
    </head>

    <body>
        <div class="container-fluid">
            <div class="row-fluid">
                <!-- Content -->  
                <div class="span10">
                    <div class="row-fluid">
                        <img src="images/front_simpeg.gif" width="72" height="50" border="1">
                    </div>
                    <?php
                    if ($act == 'edit') {
                        edit_profil($id);
                    } else {
                        ?>
                        <?php
                        $strsql = "select * from profil";
                        $hasil = mysql_query($strsql);
                        $row = mysql_fetch_array($hasil);
                        ?>
                        <table class="table-bordered">
                            <thead>
                            <th colspan="3">PROFIL SEKOLAH</th>
                            </thead>
                            <tr> 
                                <td>NAMA SEKOLAH </td>
                                <td>:</td>
                                <td><?php echo strtoupper($row[NAMA]); ?></td>
                            </tr>
                            <tr> 
                                <td>STATUS</td>
                                <td>:</td>
                                <td><?php echo strtoupper($row[STATUS]); ?></td>
                            </tr>
                            <tr> 
                                <td>NSS</td>
                                <td>:</td>
                                <td><?php echo strtoupper($row[NSS]); ?></td>
                            </tr>
                            <tr> 
                                <td>NDS</td>
                                <td>:</td>
                                <td><?php echo strtoupper($row[NDS]); ?></td>
                            </tr>
                            <tr> 
                                <td>ALAMAT</td>
                                <td>:</td>
                                <td><?php echo strtoupper($row[ALAMAT]); ?></td>
                            </tr>
                            <tr> 
                                <td>KECAMATAN</td>
                                <td>:</td>
                                <td><?php echo strtoupper($row[KECAMATAN]); ?></td>
                            </tr>
                            <tr> 
                                <td>KABUPATEN</td>
                                <td>:</td>
                                <td><?php echo strtoupper($row[KABUPATEN]); ?></td>
                            </tr>
                            <tr> 
                                <td>PROPINSI</td>
                                <td>:</td>
                                <td><?php echo strtoupper($row[PROPINSI]); ?></td>
                            </tr>
                            <tr> 
                                <td>VISI</td>
                                <td>:</td>
                                <td><?php echo $row[VISI]; ?></td>
                            </tr>
                            <tr> 
                                <td>MISI</td>
                                <td>:</td>
                                <td><?php echo $row[MISI]; ?></td>
                            </tr>
                            <tr> 
                                <td>WEBSITE</td>
                                <td>:</td>
                                <td><?php echo $row[WEBSITE]; ?></td>
                            </tr>
                            <tr> 
                                <td>EMAIL</td>
                                <td>:</td>
                                <td><?php echo $row[EMAIL]; ?></td>
                            </tr>
<tr> 
                                <td>Tentang Sekolah</td>
                                <td>:</td>
                                <td><?php echo $row[ABOUT]; ?></td>
                            </tr>
                            <tr> 
                                <td colspan="3"><a href="?act=edit&id=<?php echo $row[ID]; ?>"><img src="images/edit.gif" border="0" alt="klik disini untuk Edit Data Profil Sekolah"></a></td>
                            </tr>
                        </table>
                        <?php
                        mysql_free_result($hasil);
                    }
                    ?>
                </div>
            </div>
            <!-- end content -->
        </div>

    </body>
</html>
