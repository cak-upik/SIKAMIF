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
<html>
    <head>
        <title>Data Siswa</title>
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
                        <?php
                        if ($act == 'tambah') {
                            tambah_siswa($nis, $nama_lengkap, $nama_panggilan, $alamat, $telp_rumah, $telp_hp, $tempat_lahir, $tgl_lahir, $sex, $agama, $nomor_induk, $anak_ke, $status, $jenis_ijazah, $tahun_ijazah, $nomor_ijazah, $nama_ayah, $pekerjaan_ayah, $alamat_ayah, $telp_rumah_ayah, $telp_hp_ayah, $nama_ibu, $pekerjaan_ibu, $alamat_ibu, $telp_rumah_ibu, $telp_hp_ibu, $nama_wali, $pekerjaan_wali, $alamat_wali, $telp_rumah_wali, $telp_hp_wali, $catatan_lain, $foto, $aktif, $tahun, $bulan, $tgl);
                        } elseif ($act == 'edit') {
                            edit_siswa($nis, $perlihat);
                        } else {
                            ?>
                            <img src="images/user.png" width="48" height="48" border="1">
                            <a href="<?php echo $_SERVER['PHP_SELF']; ?>?act=tambah" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i>Tambah</a>
                        </div>

                        <br/>
                        <form name="cari_guru" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <table class="table-bordered">
                                <tr> 
                                    <td>Cari Berdasarkan :</td>
                                    <td><select name="kategori"
                                                <option value="NIS" <?php if ($kategori == 'NIS') echo "SELECTED"; ?>>NIS</option>
                                            <option value="NAMA" <?php if ($kategori == 'NAMA') echo "SELECTED"; ?>>NAMA</option>
                                        </select></td>
                                    <td>Masukkan Kata :</td>
                                    <td><input type="text" name="key" class="inputlogin" size="30" value="<?php echo $key; ?>">
                                        <input name="Submit" type="image" value="Submit" src="images/cari.gif" alt="klik disini untuk melakukan Pencarian Siswa"></td>
                                </tr>
                            </table>
                        </form>
                        <table class="table-bordered">
                            <thead> 
                            <th>NIS</th>
                            <th>NAMA</th>
				<th>KELAS</th>
                            <th colspan="2">AKSI</th>
                            </tr>
                            <?php
                            data_siswa($key, $kelas, $kategori, $perlihat);
                            ?>
                        </table>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <!-- end content -->
            <!-- Footer -->
            <?php include_once './footer.php'; ?>
            <!-- end left -->
        </div>

    </body>
</html>
