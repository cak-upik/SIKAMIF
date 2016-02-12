<?php
include "../global/config.php";
$kelas = $_REQUEST['kelas'];
$tahun_ajaran = $_REQUEST['tahun_ajaran'];
?>
<html>
    <head>
        <title>Raport Mata Pelajaran</title>
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
        <div class="span20">
            <div class="row-fluid">
                <?php
                include "header_rpt.php";
                ?>
                
                <table class="table-bordered">
                    <thead> 
                    <th colspan="2">DATA MATA PELAJARAN BESERTA SKBM</th>
                    </tr>
                    <tr> 
                        <td>TAHUN AJARAN </td>
                        <td>: <?php echo $tahun_ajaran; ?></td>
                    </tr>
                    <tr> 
                        <td>KELAS</td>
                        <td>: <?php echo $kelas; ?></td>
                    </tr>
                </table>
                <br/>
                <table class="table-bordered">
                    <thead> 
                        <th>MATA PELAJARAN</th>
                        <th>SKBM</th>
                    </thead>
                    <?php
                    $strsql = "select nama_matpel,skm,kelas from matpel where kelas='$kelas' and tahun_ajaran='$tahun_ajaran'";
                    $hasil = mysql_query($strsql);
                    while ($row = mysql_fetch_array($hasil)) {
                        ?>
                        <tr> 
                            <td><?php echo $row[nama_matpel]; ?></td>
                            <td align="center"><?php echo $row[skm]; ?></td>
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

