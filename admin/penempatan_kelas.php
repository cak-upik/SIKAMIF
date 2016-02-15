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
<div class="breadcrumbs" id="breadcrumbs">
    <script type="text/javascript">
        try {
            ace.settings.check('breadcrumbs', 'fixed')
        } catch (e) {
        }
    </script>

    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Transaksi</a>
        </li>
        <li class="active">Input SKBM</li>
    </ul><!-- /.breadcrumb -->
</div>
<div class="page-content">
    <div class="page-header">
        <h1>
            Input SKBM
        </h1>
    </div><!-- /.page-header -->
    <div class="row">
        <div class="col-xs-12">
            <div class="clearfix">
                <div class="pull-left tableTools-container">
                </div>
            </div>
            <?php
            if ($act == 'tambah') {
                tambah_kelas_siswa($tahun_ajaran, $kelas_id, $nis, $nama);
            } else {
                ?>
                <form name="frm_tahun_ajaran" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
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
                    <a href="?act=tambah&tahun_ajaran=<?php echo $tahun_ajaran; ?>&kelas_id=<?php echo $kelas_id; ?>" class="btn btn-primary"><i class="fa fa-plus-square"></i> Tambah</a>
                    <a href="lap_kelas.php?tahun_ajaran=<?php echo $tahun_ajaran; ?>&kelas_id=<?php echo $kelas_id; ?>" class="btn btn-inverse"><i class="fa fa-print"></i> Cetak</a>
                </form>
                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
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
</div>