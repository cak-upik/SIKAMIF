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
<html>
    <head>
        <title>Data Guru</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<!--        <link href="../bootstrap/css/bootstrap.css" rel="stylesheet"/>
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
                        <img src="images/alumni.gif" width="48" height="48" border="1">
                        <a href="<?php echo $_SERVER['PHP_SELF']; ?>?act=tambah" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i>Tambah</a>
                    </div>

                    <form name="cari_guru" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <table>
                            <tr> 
                                <td>Cari Berdasarkan :</td>
                                <td><select name="kategori">
                                        <option value="NIP" <?php if ($kategori == 'NIP') echo "SELECTED"; ?>>NIP</option>
                                        <option value="NAMA" <?php if ($kategori == 'NAMA') echo "SELECTED"; ?>>NAMA</option>
                                    </select>
                                </td>
                                <td>Masukkan Kata :</td>
                                <td><input type="text" name="key" size="30" value="<?php echo $key; ?>"></td>
                                <td><input name="Submit" type="image" value="Submit" src="images/cari.gif" alt="klik disini untuk melakukan Pencarian Dosen"></td>
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
                        <table class="table-bordered">
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
