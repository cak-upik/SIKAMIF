<?php
//session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
require_once "fungsi_lanjutan.php";
$tahun_ajaran = $_REQUEST['tahun_ajaran'];
$kelas_id = $_REQUEST['kelas_id'];
$hari = $_REQUEST['hari'];
$act = $_REQUEST['act'];
$id_jadwal = $_REQUEST['id_jadwal'];
$jam = $_REQUEST['jam'];
$id_guru = $_REQUEST['id_guru'];
$id_matpel = $_REQUEST['id_matpel'];
$nip = $_REQUEST['nip'];
$nama = $_REQUEST['nama'];
$matpel = $_REQUEST['matpel'];
$waktu1 = $_REQUEST['waktu1'];
$waktu2 = $_REQUEST['waktu2'];

if ($act == 'del') {
    mysql_query("delete from jadwal where id_jadwal='$id_jadwal'");
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
        <li class="active">Jadwal Pelajaran</li>
    </ul><!-- /.breadcrumb -->
</div>
<div class="page-content">
    <div class="page-header">
        <h1>
             Jadwal Pelajaran
        </h1>
    </div><!-- /.page-header -->
    <div class="row">
        <div class="col-xs-12">
            <div class="clearfix">
                <div class="pull-left tableTools-container">
                    <!--<a href="<?php echo $_SERVER['PHP_SELF']; ?>?act=tambah" class="btn btn-primary"><i class="fa fa-plus-square"></i> Tambah</a>-->
                </div>
            </div>
            <?php
            if ($act == 'tambah') {
                tambah_jadwal($tahun_ajaran, $kelas_id, $hari, $jam, $nip, $nama, $matpel, $id_guru, $id_matpel, $waktu1, $waktu2);
            } elseif ($act == 'edit') {
                edit_jadwal($tahun_ajaran, $kelas_id, $hari, $id_jadwal);
            } else {
                ?>
                <form name="frm_tahun_ajaran" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        <input type="hidden" name="kelas_id" value="<?php echo $kelas_id; ?>">
                        <input type="hidden" name="hari" value="<?php echo $hari; ?>">
                        <thead>
                            <tr>
                                <th colspan="5">Tahun Ajaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="5"> 
                                    <select NAME="tahun_ajaran" onChange="submit();" class="form-control">
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
                                </td>
                            </tr>
                            </form>
                        <form name="frm_jurusan" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="hidden" name="tahun_ajaran" value="<?php echo $tahun_ajaran; ?>">
                            <input type="hidden" name="hari" value="<?php echo $hari; ?>">
                            <tr>
                                <td>Kelas</td>
                                <td colspan="5"> 
                                    <select NAME="kelas_id" onChange="submit();" class="form-control">
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
                        <form name="frm_semester" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <tr>
                            <input type="hidden" name="kelas_id" value="<?php echo $kelas_id; ?>">
                            <input type="hidden" name="tahun_ajaran" value="<?php echo $tahun_ajaran; ?>">
                            <td>Hari</td>
                            <td> 
                                <select name="hari"  onChange="submit();" class="form-control">
                                    <option value="SENIN" <?php if ($hari == 'SENIN') echo "SELECTED"; ?>>SENIN</option>
                                    <option value="SELASA" <?php if ($hari == 'SELASA') echo "SELECTED"; ?>>SELASA</option>
                                    <option value="RABU" <?php if ($hari == 'RABU') echo "SELECTED"; ?>>RABU</option>
                                    <option value="KAMIS" <?php if ($hari == 'KAMIS') echo "SELECTED"; ?>>KAMIS</option>
                                    <option value="JUM`AT" <?php if ($hari == 'JUM`AT') echo "SELECTED"; ?>>JUM`AT</option>
                                    <option value="SABTU" <?php if ($hari == 'SABTU') echo "SELECTED"; ?>>SABTU</option>
                                </select> 
                            </td>
                            <td colspan="4">
                                <a href="?act=tambah&tahun_ajaran=<?php echo $tahun_ajaran; ?>&kelas_id=<?php echo $kelas_id; ?>&hari=<?php echo $hari; ?>" class="btn btn-primary"><i class="fa fa-plus-square"></i> Tambah</a>
                            </td>
                            </tr>
                        </form>

                        <?php
                        $hasil_wali = mysql_query("SELECT wali_kelas.ID, wali_kelas.TAHUN_AJARAN, guru.NIP, guru.GLR_DEPAN, guru.NAMA, guru.GLR_BLK, kelas.RUANG
FROM kelas INNER JOIN (guru INNER JOIN wali_kelas ON guru.ID = wali_kelas.ID_GURU) ON kelas.ID = wali_kelas.ID_KELAS
where wali_kelas.TAHUN_AJARAN='$tahun_ajaran' and kelas.ID='$kelas_id'");
                        $row_wali = mysql_fetch_array($hasil_wali);
                        ?>
                        <tr> 
                            <td>Wali Kelas</td>
                            <td colspan="5"><?php echo $row_wali[GLR_DEPAN] . " " . $row_wali[NAMA] . " " . $row_wali[GLR_BLK]; ?></td>
                        </tr>
                        <tr> 
                            <th align="center">NAMA PENGAJAR</th>
                            <th align="center">MATA PELAJARAN</th>
                            <th align="center">WAKTU</th>
                            <th align="center">JAM</th>
                            <th colspan="2" align="center">AKSI</th>
                        </tr>
                        <?php
                        jadwal_pelajaran($tahun_ajaran, $hari, $kelas_id);
                        ?>
                        <tr>
                            <td colspan="6"><a href="rpt_jadwal_pelajaran.php?tahun_ajaran=<?php echo $tahun_ajaran; ?>&kelas_id=<?php echo $kelas_id; ?>" target="_blank" class="btn btn-inverse"><i class="fa fa-print"></i> Cetak</a></td>
                        </tr>
                    </table>
                    <?php
                }
                ?>
        </div>
    </div>
</div>