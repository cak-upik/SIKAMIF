<?php
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
require_once "fungsi_lanjutan.php";
$tahun_ajaran = $_REQUEST['tahun_ajaran'];
$act = $_REQUEST['act'];
$id = $_REQUEST['id'];

if ($act == 'del') {
    $strsql = "delete from wali_kelas where id='$id'";
    $hasil = mysql_query($strsql);
}
?>
<html>
    <head>
        <title>Wali Kelas</title>
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
                <div class="span10">                    
                    <div class="row-fluid">
                        <img src="images/dosen_wali.png" width="48" height="48" border="1">

                        <?php
                        if ($act == 'tambah') {
                            tambah_wali($tahun_ajaran);
                        } elseif ($act == 'edit') {
                            edit_wali($tahun_ajaran, $id);
                        } else {
                            ?>
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <table class="table-bordered" style="width: 40%">
                                    <!--DWLayoutTable-->
                                    <tr> 
                                        <td>Tahun Ajaran</td>
                                        <td><select NAME="tahun_ajaran" onChange="submit();" class="input-medium">
                                                <?php
                                                $strsql = "SELECT tahun_ajaran FROM tahun_ajaran order by tahun_ajaran desc";
                                                $result = mysql_query($strsql);
                                                $num_results = mysql_num_rows($result);
                                                for ($i = 0; $i < $num_results; $i++) {
                                                    $row_tahun = mysql_fetch_array($result);
                                                    $test = $row_tahun[tahun_ajaran];
                                                    if (isset($_POST['tahun_ajaran'])) {
                                                        $selected = (isset($_POST['tahun_ajaran']) and
                                                                $_POST['tahun_ajaran'] == $test) ? ' selected' : '';
                                                        echo "<option value='$test' $selected>$test</option>\n";
                                                    } else {
                                                        $selected = (isset($_GET['tahun_ajaran']) and
                                                                $_GET['tahun_ajaran'] == $test) ? ' selected' : '';
                                                        echo "<option value='$test' $selected>$test</option>\n";
                                                    }
                                                }
                                                ?>
                                            </select>

                                            <a href="<?php echo $_SERVER['PHP_SELF']; ?>?act=tambah&tahun_ajaran=<?php echo $tahun_ajaran; ?>"class="btn btn-primary"><i class="icon-plus-sign icon-white"></i>Tambah</a>
                                        </td>
                                    </tr>
                                </table>
                                <br/>
                                <table class="table-bordered">
                                    <thead> 
                                    <th align="center">NIP</th>
                                    <th align="center">NAMA</th>
                                    <th align="center">KELAS</th>
                                    <th align="center" colspan="2" width="60">AKSI</th>
                                    </thead>
                                    <?php data_wali_kelas($tahun_ajaran); ?>                                
                                    <tr>
                                        <td colspan="5"><a href="rpt_walikelas.php?tahun_ajaran=<?php echo $tahun_ajaran; ?>" target="_blank"><img src="images/cetak.gif" alt="klik disini untuk Cetak Data Wali Kelas" border="0"></a></td>
                                    </tr>
                                </table>
                                <?php
                            }
                            ?>
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
