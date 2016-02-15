<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "../global/config.php";
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
            <a href="#">Laporan</a>
        </li>
        <li class="active">Laporan Nilai</li>
    </ul><!-- /.breadcrumb -->
</div>
<div class="page-content">
    <div class="page-header">
        <h1>
            Laporan Nilai
        </h1>
    </div><!-- /.page-header -->
    <div class="row">
        <div class="col-xs-12">
            <div class="clearfix">
                <div class="pull-left tableTools-container">
                </div>
            </div>
            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                <!--DWLayoutTable-->
                <tr> 
                <form name="frm_tahun_ajaran" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" name="kelas_id" value="<?php echo $kelas_id; ?>">
                    <input type="hidden" name="semester" value="<?php echo $semester; ?>">
                    <input type="hidden" name="key" value="<?php echo $key; ?>">
                    <input type="hidden" name="kategori" value="<?php echo $kategori; ?>">
                    <td>Tahun Ajaran</td>
                    <td colspan="2"> <select NAME="tahun_ajaran" onChange="submit();" class="inputlogin">
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
                </form>
                </tr>
                <tr> 
                <form name="frm_tahun_ajaran" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" name="kelas_id" value="<?php echo $kelas_id; ?>">
                    <input type="hidden" name="tahun_ajaran" value="<?php echo $tahun_ajaran; ?>">
                    <input type="hidden" name="key" value="<?php echo $key; ?>">
                    <input type="hidden" name="kategori" value="<?php echo $kategori; ?>">
                    <td>Semester</td>
                    <td colspan="2"><select name="semester" class="inputlogin" onChange="submit();">
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
                    <td>Kelas</td>
                    <td valign="middle"> <select NAME="kelas_id" onChange="submit();" class="inputlogin">
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
                        </select> </td>
                </form>
                <form name="frm_semester" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" name="kelas_id2" value="<?php echo $kelas_id; ?>">
                </form>
                </tr>
            </table>
            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" name="tahun_ajaran" value="<?php echo $tahun_ajaran; ?>">
                    <input type="hidden" name="kelas_id" value="<?php echo $kelas_id; ?>">
                    <input type="hidden" name="semester" value="<?php echo $semester; ?>">
                    <tr> 
                        <td >Cari Berdasarkan :</td>
                        <td><select name="kategori" class="inputlogin" onChange="submit();">
                                <option value="NIS" <?php if ($kategori == 'NIS') echo "SELECTED"; ?>>NIS</option>
                                <option value="NAMA" <?php if ($kategori == 'NAMA') echo "SELECTED"; ?>>NAMA</option>
                            </select></td>
                </form>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" name="tahun_ajaran" value="<?php echo $tahun_ajaran; ?>">
                    <input type="hidden" name="kelas_id" value="<?php echo $kelas_id; ?>">
                    <input type="hidden" name="semester" value="<?php echo $semester; ?>">
                    <input type="hidden" name="kategori" value="<?php echo $kategori; ?>">      
                    <td>Masukkan Kata :</td>
                    <td><input type="text" name="key" class="inputlogin" size="30" value="<?php echo $key; ?>">
                                <button name="Submit" type="submit" class="btn btn-grey"><i class="fa fa-search"></i> Cari</button></td>
                    </tr>
                    <tr> 
                        <td colspan="4" align="middle">
                            <font color="#FF0000">
                            <?php
                            if ($kategori == 'NIS') {
                                echo "Maksimal 8 Angka";
                            } else {
                                echo "Maksimal 24 Karakter";
                            }
                            ?>
                            </font>
                        </td>
                    </tr>
                </form>
            </table>
            <br>
            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                <thead> 
                <th align="center">NO.</td>
                <th align="center">NIS</th>
                <th align="center">NAMA SISWA</th>
                <th colspan="2">AKSI</th>
                </thead>
                <?php
                if ($kategori == 'NIS') {
                    $strsql = "SELECT nilai.ID, siswa.NIS, siswa.NAMA_LENGKAP, kelas.RUANG
FROM kelas INNER JOIN (siswa INNER JOIN nilai ON siswa.NIS = nilai.NIS) ON kelas.ID = nilai.ID_KELAS 
where nilai.TAHUN_AJARAN='$tahun_ajaran' AND kelas.ID='$kelas_id' AND siswa.NIS like '%$key%' order by siswa.NIS";
                } elseif ($kategori == 'NAMA') {
                    $strsql = "SELECT nilai.ID, siswa.NIS, siswa.NAMA_LENGKAP, kelas.RUANG
FROM kelas INNER JOIN (siswa INNER JOIN nilai ON siswa.NIS = nilai.NIS) ON kelas.ID = nilai.ID_KELAS 
where nilai.TAHUN_AJARAN='$tahun_ajaran' AND kelas.ID='$kelas_id' AND siswa.NAMA_LENGKAP like '%$key%' order by siswa.NIS";
                } else {
                    $strsql = "SELECT nilai.ID, siswa.NIS, siswa.NAMA_LENGKAP, kelas.RUANG
FROM kelas INNER JOIN (siswa INNER JOIN nilai ON siswa.NIS = nilai.NIS) ON kelas.ID = nilai.ID_KELAS 
where nilai.TAHUN_AJARAN='$tahun_ajaran' AND kelas.ID='$kelas_id' order by siswa.NIS";
                }
                $hasil = mysql_query($strsql);
                while ($row = mysql_fetch_array($hasil)) {
                    $NO++;
                    if ($NO % 2 == 1)
                        $warna = "";
                    else
                        $warna = "";
                    ?>
                    <tr bgcolor="<?php echo $warna; ?>" class="text"> 
                        <td width="50" height="25" align="center"><?php echo $NO . "."; ?></td>
                        <td width="50" align="center"><?php echo $row[NIS]; ?></td>
                        <td width="200" align="left"><?php echo $row[NAMA_LENGKAP]; ?></td>
                        <td width="10"align="center"><a href="lap_rapot.php?tahun_ajaran=<?php echo $tahun_ajaran; ?>&semester=<?php echo $semester; ?>&kelas_id=<?php echo $kelas_id; ?>&id=<?php echo $row[ID]; ?>&nis=<?php echo $row[NIS]; ?>&nama=<?php echo $row[NAMA_LENGKAP]; ?>&ruang=<?php echo $row[RUANG]; ?>" target="_blank" class="btn btn-info"><i class="icon-print icon-white"></i>Cetak</a></td>
                    </tr>
                    <?php
                }
                mysql_free_result($hasil);
                ?>
            </table>
        </div>
    </div>
</div>