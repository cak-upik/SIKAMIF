<?php
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
require_once "fungsi.php";
$id = $_REQUEST['id'];
$act = $_REQUEST['act'];
$nip = $_REQUEST['nip'];
$glr_depan = $_REQUEST['glr_depan'];
$nama = $_REQUEST['nama'];
$glr_blk = $_REQUEST['glr_blk'];
$tempat_lahir = $_REQUEST['tempat_lahir'];
$tahun = $_REQUEST['tahun'];
$bulan = $_REQUEST['bulan'];
$tgl = $_REQUEST['tgl'];
$agama = $_REQUEST['agama'];
$alamat_lengkap = $_REQUEST['alamat_lengkap'];
$telp_rumah = $_REQUEST['telp_rumah'];
$telp_hp = $_REQUEST['telp_hp'];
$alamat_asal = $_REQUEST['alamat_asal'];
$narasi = $_REQUEST['narasi'];
$aktif = $_REQUEST['aktif'];
$key = $_REQUEST['key'];
$kategori = $_REQUEST['kategori'];
$jenis_kelamin = $_REQUEST['jenis_kelamin'];

if ($act == 'del') {
    mysql_query("delete from guru where id='$id'");
//hapus tabel wali_kelas
    mysql_query("delete from guru where id_guru='$id'");
//hapus tabel jadwal
    mysql_query("delete from jadwal where id_guru='$id'");
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
        <li class="active">Data Guru</li>
    </ul><!-- /.breadcrumb -->
</div>
<div class="page-content">
    <div class="page-header">
        <h1>
            Data Guru
        </h1>
    </div><!-- /.page-header -->
    <div class="row">
        <div class="col-xs-12">
            <div class="clearfix">
                <div class="pull-left tableTools-container">
                    <a href="<?php echo $_SERVER['PHP_SELF']; ?>?act=tambah" class="btn btn-primary"><i class="fa fa-plus-square"></i> Tambah</a>
                </div>
            </div>

            <form name="cari_guru" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                    <tr> 
                        <td>Cari Berdasarkan :</td>
                        <td><select name="kategori" class="form-control">
                                <option value="NIP" <?php if ($kategori == 'NIP') echo "SELECTED"; ?>>NIP</option>
                                <option value="NAMA" <?php if ($kategori == 'NAMA') echo "SELECTED"; ?>>NAMA</option>
                            </select>
                        </td>
                        <td>Masukkan Kata :</td>
                        <td><input type="text" name="key" size="30" value="<?php echo $key; ?>">
                                <button name="Submit" type="submit" class="btn btn-grey"><i class="fa fa-search"></i> Cari</button></td>
                    </tr>
                </table>
            </form>
            <?php
            if ($act == 'tambah') {
                tambah_guru($nip, $glr_depan, $nama, $glr_blk, $tempat_lahir, $tahun, $bulan, $tgl, $agama, $alamat_lengkap, $telp_rumah, $telp_hp, $alamat_asal, $narasi, $aktif);
            } elseif ($act == 'edit') {
                edit_guru($id);
            } else {
                ?>
                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                    <tr> 
                    <thead>
                    <th align="center">NIP</th>
                    <th align="center">NAMA</th>
                    <th colspan="2" align="center">Aksi</th>
                    </thead>
                    <?php
                    data_guru($key, $kategori);
                    ?>
                </table>
                <?php
            }
            ?>
        </div>
    </div>
    <!-- end content -->
    <!-- end left -->
</div>

</body>
</html>
