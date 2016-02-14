<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
require_once "fungsi.php";
$kelas = $_REQUEST['kelas'];
$matpel_id = $_REQUEST['matpel_id'];
$skm = $_REQUEST['skm'];
$nama_matpel = $_REQUEST['nama_matpel'];
$act = $_REQUEST['act'];
$tahun_ajaran = $_REQUEST['tahun_ajaran'];
if ($act == 'del') {
    mysql_query("delete from matpel where id_matpel='$matpel_id'");
//hapus tabel jadwal
    mysql_query("delete from jadwal where id_matpel='$id_matpel'");
}
?>
<html>
    <head>
        <title>Data Mata Pelajaran</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<!--    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet"/>
        <link href="../bootstrap/css/bootstrap-responsive.css" rel="stylesheet"/>
        <link href="../bootstrap/css/style.css" rel="stylesheet"/>
        <script src="../bootstrap/js/jquery-1.7.2.min.js"></script>
        <script src="../bootstrap/js/bootstrap-dropdown.js"></script> -->
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
        </script> -->
    </head>

    <body>
        <div class="container-fluid">
            <div class="row-fluid">
                <!-- Content -->  
                <div class="span10">
                    <div class="row-fluid">
                        <img src="images/nilai_matkul.png" width="48" height="48" border="1">
                        <?php
                        if ($act == 'tambah') {
                            tambah_matpel($nama_matpel, $skm, $kelas, $tahun_ajaran);
                        } elseif ($act == 'edit') {
                            edit_matpel($matpel_id, $kelas, $tahun_ajaran);
                        } else {
                            ?>
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <table class="table-bordered">
                                    <thead>
                                    <th colspan="4">Input SKBM</th>
                                    </thead>
                                    <input type="hidden" name="kelas" value="<?php echo $kelas; ?>">
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
                                    </tr>
                                    <input type="hidden" name="tahun_ajaran" value="<?php echo $tahun_ajaran; ?>">
                                    <tr>
                                        <td>Kelas </td>
                                        <td><select name="kelas" class="input-medium" onChange="submit();">
                                                <option value="1" <?php if ($kelas == '1') echo "SELECTED"; ?>>I (Satu)</option>
                                                <option value="2" <?php if ($kelas == '2') echo "SELECTED"; ?>>II (Dua)</option>
                                                <option value="3-IPS" <?php if ($kelas == '3-IPS') echo "SELECTED"; ?>>III 
                                                    (Tiga) IPS</option>
                                                <option value="3-IPA" <?php if ($kelas == '3-IPA') echo "SELECTED"; ?>>III 
                                                    (Tiga) IPA</option>
                                                <option value="3-BAHASA" <?php if ($kelas == '3-BAHASA') echo "SELECTED"; ?>>III 
                                                    (Tiga) Bahasa</option>
                                            </select>
                                        </td> 
                                    </tr>                                   
                                    <tr>
                                        <td colspan="4"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?act=tambah&kelas=<?php echo $kelas; ?>&tahun_ajaran=<?php echo $tahun_ajaran; ?>"class="btn btn-primary"><i class="icon-plus-sign icon-white"></i>Tambah</a>
                                    </tr>
                                </table>
                                <br>
                                <table class="table-bordered">
                                    <thead> 
                                    <th>MATA PELAJARAN</th>
                                    <th>SKBM</th>
                                    <th colspan="2">Aksi</th>
                                    <?php data_matpel($kelas, $tahun_ajaran); ?>                                    
                                    </thead>
                                    <tr>
                                        <td colspan="4"><a href="rpt_matpel.php?kelas=<?php echo $kelas; ?>&tahun_ajaran=<?php echo $tahun_ajaran; ?>" target="_blank"><img src="images/cetak.gif" alt="klik disini untuk Cetak Data Mata Pelajaran" border="0"></a></td>
                                    </tr>
                                </table>
                            </form>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <!-- end content -->
            </div>
        </div>

    </body>
</html>