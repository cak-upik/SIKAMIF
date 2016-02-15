<?php
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
require_once "fungsi.php";
$key = $_REQUEST['key'];
$kategori = $_REQUEST['kategori'];
$act = $_REQUEST['act'];
$nis = $_REQUEST['nis'];
$nama_lengkap = $_REQUEST['nama_lengkap'];
$nama_panggilan = $_REQUEST['nama_panggilan'];
$alamat = $_REQUEST['alamat'];
$telp_rumah = $_REQUEST['telp_rumah'];
$telp_hp = $_REQUEST['telp_hp'];
$tempat_lahir = $_REQUEST['tempat_lahir'];
$tgl_lahir = $_REQUEST['tgl_lahir'];
$sex = $_REQUEST['sex'];
$agama = $_REQUEST['agama'];
$nomor_induk = $_REQUEST['nomor_induk'];
$anak_ke = $_REQUEST['anak_ke'];
$status = $_REQUEST['status'];
$jenis_ijazah = $_REQUEST['jenis_ijazah'];
$tahun_ijazah = $_REQUEST['tahun_ijazah'];
$nomor_ijazah = $_REQUEST['nomor_ijazah'];
$nama_ayah = $_REQUEST['nama_ayah'];
$pekerjaan_ayah = $_REQUEST['pekerjaan_ayah'];
$alamat_ayah = $_REQUEST['alamat_ayah'];
$telp_rumah_ayah = $_REQUEST['telp_rumah_ayah'];
$telp_hp_ayah = $_REQUEST['telp_hp_ayah'];
$nama_ibu = $_REQUEST['nama_ibu'];
$pekerjaan_ibu = $_REQUEST['pekerjaan_ibu'];
$alamat_ibu = $_REQUEST['alamat_ibu'];
$telp_rumah_ibu = $_REQUEST['telp_rumah_ibu'];
$telp_hp_ibu = $_REQUEST['telp_hp_ibu'];
$nama_wali = $_REQUEST['nama_wali'];
$pekerjaan_wali = $_REQUEST['pekerjaan_wali'];
$alamat_wali = $_REQUEST['alamat_wali'];
$telp_rumah_wali = $_REQUEST['telp_rumah_wali'];
$telp_hp_wali = $_REQUEST['telp_hp_wali'];
$catatan_lain = $_REQUEST['catatan_lain'];
$tahun = $_REQUEST['tahun'];
$bulan = $_REQUEST['bulan'];
$tgl = $_REQUEST['tgl'];
$perlihat = $_REQUEST['perlihat'];

if ($act == 'del') {
    mysql_query("delete from siswa where nis='$nis'");
//HAPUS TABEL NILAI
    mysql_query("delete from nilai where nis='$nis'");
//HAPUS TABEL USER MANAGER
    mysql_query("delete from usermanager where login='$nis'");
}
?>
<script language="JavaScript"  src="../global/jscript.js" type="text/javascript"></script>
<script language="JavaScript"  src="../global/jscript_pop.js" type="text/javascript"></script>
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
            <a href="#">Master</a>
        </li>
        <li class="active">Data Siswa</li>
    </ul><!-- /.breadcrumb -->
</div>
<div class="page-content">
    <div class="page-header">
        <h1>
            Data Siswa
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
                tambah_siswa($nis, $nama_lengkap, $nama_panggilan, $alamat, $telp_rumah, $telp_hp, $tempat_lahir, $tgl_lahir, $sex, $agama, $nomor_induk, $anak_ke, $status, $jenis_ijazah, $tahun_ijazah, $nomor_ijazah, $nama_ayah, $pekerjaan_ayah, $alamat_ayah, $telp_rumah_ayah, $telp_hp_ayah, $nama_ibu, $pekerjaan_ibu, $alamat_ibu, $telp_rumah_ibu, $telp_hp_ibu, $nama_wali, $pekerjaan_wali, $alamat_wali, $telp_rumah_wali, $telp_hp_wali, $catatan_lain, $foto, $aktif, $tahun, $bulan, $tgl);
            } elseif ($act == 'edit') {
                edit_siswa($nis, $perlihat);
            } else {
                ?>
                <a href="<?php echo $_SERVER['PHP_SELF']; ?>?act=tambah" class="btn btn-primary"><i class="fa fa-plus-square"></i> Tambah</a>
                <form name="cari_guru" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        <tr> 
                            <td>Cari Berdasarkan :</td>
                            <td><select name="kategori"
                                        <option value="NIS" <?php if ($kategori == 'NIS') echo "SELECTED"; ?>>NIS</option>
                                    <option value="NAMA" <?php if ($kategori == 'NAMA') echo "SELECTED"; ?>>NAMA</option>
                                </select></td>
                            <td>Masukkan Kata :</td>
                            <td><input type="text" name="key" class="inputlogin" size="30" value="<?php echo $key; ?>">
                                <button name="Submit" type="submit" class="btn btn-grey"><i class="fa fa-search"></i> Cari</button></td>
                        </tr>
                    </table>
                </form>
                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                    <thead> 
                    <th>NIS</th>
                    <th>NAMA</th>
                    <th>KELAS</th>
                    <th>AKSI</th>
                    </thead>
                    <?php
                    data_siswa($key, $kategori, $perlihat);
                    ?>
                </table>
                <?php
            }
            ?>
        </div>
    </div>
</div>