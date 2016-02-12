<?php
include "../global/cek_session_wali_kelas.php";
include "../global/config.php";
require_once "fungsi_nilai.php";
$tahun_ajaran = $_REQUEST['tahun_ajaran'];
$kelas_id = $_REQUEST['kelas_id'];
$act = $_REQUEST['act'];
$nis = $_REQUEST['nis'];
$nama = $_REQUEST['nama'];
$id = $_REQUEST['id'];
$kategori = $_REQUEST['kategori'];
$key = $_REQUEST['key'];
$semester = $_REQUEST['semester'];
?>
<html>
    <head>
        <title>Input Nilai</title>
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
                <div class="span9">
                    <div class="row-fluid">
                        <img src="../admin/images/nilai_matkul.png" width="48" height="48" border="1">
                        <br>
                        <?php
                        if ($act == 'detil_isi') {
                            isi_nilai2($tahun_ajaran, $kelas_id, $id, $key, $kategori, $semester);
                        } else {
                            ?>
                            <table class="table-bordered">
                                <!--DWLayoutTable-->
                                <tr>
                                <form name="frm_tahun_ajaran" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <input type="hidden" name="kelas_id" value="<?php echo $kelas_id; ?>">
                                    <input type="hidden" name="semester" value="<?php echo $semester; ?>">
                                    <input type="hidden" name="key" value="<?php echo $key; ?>">
                                    <input type="hidden" name="kategori" value="<?php echo $kategori; ?>">
                                    <td width="96" height="30">Tahun Ajaran</td>
                                    <td width="10"><div align="center">:</div></td>
                                    <td colspan="2"> <select NAME="tahun_ajaran" onChange="submit();" class="input-medium">
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
                                </form>
                                </tr>
                                <tr>
                                <form name="frm_tahun_ajaran" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <input type="hidden" name="kelas_id" value="<?php echo $kelas_id; ?>">
                                    <input type="hidden" name="tahun_ajaran" value="<?php echo $tahun_ajaran; ?>">
                                    <input type="hidden" name="key" value="<?php echo $key; ?>">
                                    <input type="hidden" name="kategori" value="<?php echo $kategori; ?>">
                                    <td width="96" height="30">Semester</td>
                                    <td width="10"><div align="center">:</div></td>
                                    <td colspan="2"><select name="semester" class="input-medium" onChange="submit();">
                                            <option value="1" <?php if ($semester == '1') echo "SELECTED"; ?>>GANJIL</option>
                                            <option value="2" <?php if ($semester == '2') echo "SELECTED"; ?>>GENAP</option>
                                        </select> </td>
                                </form>
                                </tr>
                                <tr>
                                <form name="frm_jurusan" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <input type="hidden" name="tahun_ajaran" value="<?php echo $tahun_ajaran; ?>">
                                    <input type="hidden" name="semester" value="<?php echo $semester; ?>">
                                    <input type="hidden" name="key" value="<?php echo $key; ?>">
                                    <input type="hidden" name="kategori" value="<?php echo $kategori; ?>">
                                    <td height="30">Kelas</td>
                                    <td><div align="center">:</div></td>
                                    <td width="239" valign="middle"> <select NAME="kelas_id" onChange="submit();" class="input-mini">
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
                                </form>
                                <form name="frm_semester" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <input type="hidden" name="kelas_id2" value="<?php echo $kelas_id; ?>">
                                </form>
                                </tr>
                            </table>
                            <table class="table-bordered">
                                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <input type="hidden" name="tahun_ajaran" value="<?php echo $tahun_ajaran; ?>">
                                    <input type="hidden" name="kelas_id" value="<?php echo $kelas_id; ?>">
                                    <input type="hidden" name="semester" value="<?php echo $semester; ?>">
                                    <tr> 
                                        <td width="107">Cari Berdasarkan :</td>
                                        <td width="86"><select name="kategori" class="input-small" onChange="submit();">
                                                <option value="NIS" <?php if ($kategori == 'NIS') echo "SELECTED"; ?>>NIS</option>
                                                <option value="NAMA" <?php if ($kategori == 'NAMA') echo "SELECTED"; ?>>NAMA</option>
                                            </select></td>
                                </form>
                                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <input type="hidden" name="tahun_ajaran" value="<?php echo $tahun_ajaran; ?>">
                                    <input type="hidden" name="kelas_id" value="<?php echo $kelas_id; ?>">
                                    <input type="hidden" name="semester" value="<?php echo $semester; ?>">
                                    <input type="hidden" name="kategori" value="<?php echo $kategori; ?>">      
                                    <td width="95">Masukkan Kata :</td>
                                    <td width="180"><input type="text" name="key" class="input-xlarge" size="30" value="<?php echo $key; ?>"></td>
                                    <td width="94"><input name="Submit" type="image" value="Submit" src="../admin/images/cari.gif" alt="klik disini untuk melakukan Pencarian Siswa" width="70" height="23"></td>
                                    </tr>
                                    <tr> 
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td colspan="3"><font color="#FF0000">
                                            <?php
                                            if ($kategori == 'NIS') {
                                                echo "Maksimal 8 Angka";
                                            } else {
                                                echo "Maksimal 24 Karakter";
                                            }
                                            ?>
                                            </font></td>
                                    </tr>
                                </form>
                            </table>
                            <br>
                            <table class="table-bordered">
                                <thead>
                                    <th>NO.</th>
                                    <th>NIS</th>
                                    <th>NAMA SISWA</th>
                                    <th>AKSI</th>
                                </thead>
                                <?php
                                if ($kategori == 'NIS') {
                                    $strsql = "SELECT distinct nilai.ID, siswa.NIS, siswa.NAMA_LENGKAP, kelas.RUANG, guru.NIP
FROM (kelas INNER JOIN (siswa INNER JOIN nilai ON siswa.NIS = nilai.NIS) ON kelas.ID = nilai.ID_KELAS) INNER JOIN
(guru INNER JOIN wali_kelas ON guru.ID = wali_kelas.ID_GURU) ON kelas.ID = wali_kelas.ID_KELAS
WHERE (((nilai.TAHUN_AJARAN)='$tahun_ajaran') AND ((kelas.ID)='$kelas_id') AND guru.NIP='$_SESSION[username]' AND siswa.NIS like '%$key%')
ORDER BY siswa.NIS";
                                } elseif ($kategori == 'NAMA') {
                                    $strsql = "SELECT distinct nilai.ID, siswa.NIS, siswa.NAMA_LENGKAP, kelas.RUANG, guru.NIP
FROM (kelas INNER JOIN (siswa INNER JOIN nilai ON siswa.NIS = nilai.NIS) ON kelas.ID = nilai.ID_KELAS) INNER JOIN
(guru INNER JOIN wali_kelas ON guru.ID = wali_kelas.ID_GURU) ON kelas.ID = wali_kelas.ID_KELAS
WHERE (((nilai.TAHUN_AJARAN)='$tahun_ajaran') AND ((kelas.ID)='$kelas_id') AND guru.NIP='$_SESSION[username]' AND siswa.NAMA_LENGKAP like '%$key%')
ORDER BY siswa.NIS";
                                } else {
                                    $strsqlGuru = "SELECT matpel.ID_matpel, matpel.ID_GURU, guru.ID, guru.NIP FROM matpel INNER JOIN guru ON matpel.ID_GURU = guru.ID WHERE guru.NIP='$_SESSION[username]' ORDER BY guru.NIP";
                                    $resultGuru = mysql_query($strsqlGuru);
                                    $dataGuru = mysql_fetch_array($resultGuru);
                                    $matpel_id = $dataGuru['ID_matpel'];
                                    echo $matpel_id;
                                    $strsqlNilai = "SELECT nilai.ID, nilai_detil.ID_MATPEL, siswa.NIS, siswa.NAMA_LENGKAP, kelas.RUANG
FROM kelas INNER JOIN (siswa INNER JOIN (nilai INNER JOIN nilai_detil ON nilai_detil.ID_NILAI=nilai.ID) ON siswa.NIS = nilai.NIS) ON kelas.ID = nilai.ID_KELAS
where nilai.TAHUN_AJARAN='$tahun_ajaran' AND kelas.ID='$kelas_id' AND nilai_detil.ID_MATPEL='$matpel_id' order by siswa.NIS";

                                }

                                $hasil = mysql_query($strsqlNilai);
                                while ($row = mysql_fetch_array($hasil)) {
                                    $NO++;
                                    if ($NO % 2 == 1)
                                        $warna = "";
                                    else
                                        $warna = "";
                                    ?>
                                    <tr>
                                        <td><?php echo $NO . "."; ?></td>
                                        <td><?php echo $row[NIS]; ?></td>
                                        <td><?php echo $row[NAMA_LENGKAP]; ?></td>
                                        <td align="center" width="30"><a href="?act=detil_isi&id=<?php echo $row[ID]; ?>&tahun_ajaran=<?php echo $tahun_ajaran; ?>&kelas_id=<?php echo $kelas_id; ?>&key=<?php echo $key; ?>&kategori=<?php echo $kategori; ?>&semester=<?php echo $semester; ?>" class="btn btn-info"><i class="icon-print icon-white"></i>Cetak</a></td>
                                    </tr>
                                    <?php
                                }
                                mysql_free_result($hasil);
                                ?>
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
