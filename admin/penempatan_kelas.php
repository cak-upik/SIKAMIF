<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
require_once "fungsi_lanjutan.php";
$tahun_ajaran = $_REQUEST['tahun_ajaran'];
$kelas_id = $_REQUEST['kelas_id'];
$act = $_REQUEST['act'];
$nis = $_REQUEST['nis'];
$nama = $_REQUEST['nama'];
$id = $_REQUEST['id'];

if ($act == 'del') {
    mysql_query("delete from nilai where id='$id'");
//delete tabel nilai_detil
    mysql_query("delete from nilai_detil where id_nilai='$id'");
//delete tabel ekstra
    mysql_query("delete from ekstra_kurikuler where id_nilai='$id'");
}
?>
<html>
    <head>
        <title>Penempatan Kelas</title>
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

                        <img src="images/ruang.gif" width="48" height="49" border="0">

                        <br/>
                        <?php
                        if ($act == 'tambah') {
                            tambah_kelas_siswa($tahun_ajaran, $kelas_id, $nis, $nama);
                        } else {
                            ?>
                        <form name="frm_tahun_ajaran" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <table class="table-bordered">
                                <!--DWLayoutTable-->
                                <tr>
                                <input type="hidden" name="kelas_id" value="<?php echo $kelas_id; ?>">
                                <td>Tahun Ajaran</td>
                                <td colspan="2"><select NAME="tahun_ajaran" onChange="submit();" class="inputlogin">
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
                                    </select> </td>
                                </tr>
                        </form>
                        <form name="frm_jurusan" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <tr>
                            <input type="hidden" name="tahun_ajaran" value="<?php echo $tahun_ajaran; ?>">
                            <td>Kelas</td>
                            <td> <select NAME="kelas_id" onChange="submit();" class="inputlogin">
                                        <?php
                                        $strsql = "SELECT id,ruang,aktif FROM kelas where aktif='1' order by ruang";
                                        $result = mysql_query($strsql);
                                        $num_results = mysql_num_rows($result);
                                        for ($i = 0; $i < $num_results; $i++) {
                                            $row_tahun = mysql_fetch_array($result);
                                            $test2 = $row_tahun[id];
                                            $test = $row_tahun[ruang];
                                            if (isset($_POST['kelas_id'])) {
                                                $selected = (isset($_POST['kelas_id']) and
                                                                $_POST['kelas_id'] == $test2) ? ' selected' : '';
                                                echo "<option value='$test2' $selected>$test</option>\n";
                                            } else {
                                                $selected = (isset($_GET['kelas_id']) and
                                                                $_GET['kelas_id'] == $test2) ? ' selected' : '';
                                                echo "<option value='$test2' $selected>$test</option>\n";
                                            }
                                        }
                                        ?>
                                </select>
                            </td>
                            </tr>
                        </form>
                        </table>
                        <form name="frm_semester" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="hidden" name="kelas_id2" value="<?php echo $kelas_id; ?>">
                            <input type="hidden" name="tahun_ajaran" value="<?php echo $tahun_ajaran; ?>">
                                <a href="?act=tambah&tahun_ajaran=<?php echo $tahun_ajaran; ?>&kelas_id=<?php echo $kelas_id; ?>" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Tambah</a>
                                <a href="lap_kelas.php?tahun_ajaran=<?php echo $tahun_ajaran; ?>&kelas_id=<?php echo $kelas_id; ?>" class="btn btn-primary"><i class="icon-print icon-white"></i> Cetak</a>
                        </form>
                        <table class="table-bordered">
                            <thead>
                            <th align="center">NO.</th>
                            <th align="center">NIS</th>
                            <th align="center">NAMA SISWA</th>
                            <th colspan="3">AKSI</th>
                            </thead>
                                <?php
                                kelas_siswa($tahun_ajaran, $kelas_id);
                                ?>
                        </table>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <!-- end content -->
            </div><!-- Footer -->
            <?php include_once './footer.php'; ?>
            <!-- end left -->
        </div>

    </body>
</html>
