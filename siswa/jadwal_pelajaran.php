<?php
session_start();
//require_once "fungsi_lanjutan.php";
include "../global/config.php";
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
?>
<html>
    <head>
        <title>Jadwal Pelajaran</title>
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
                        <img src="../admin/images/jadwal.gif" width="48" height="47">
                        <br>
                        <table class="table-bordered">
                            <!--DWLayoutTable-->
                            <tr> 
                            <form name="frm_tahun_ajaran" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <input type="hidden" name="kelas_id" value="<?php echo $kelas_id; ?>">
                                <input type="hidden" name="hari" value="<?php echo $hari; ?>">
                                <td>Tahun Ajaran</td>
                                <td>:</td>
                                <td colspan="4"> <select NAME="tahun_ajaran" onChange="submit();" class="input-medium">
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
                            <form name="frm_jurusan" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <input type="hidden" name="tahun_ajaran" value="<?php echo $tahun_ajaran; ?>">
                                <input type="hidden" name="hari" value="<?php echo $hari; ?>">
                                <td>Kelas</td>
                                <td>:</td>
                                <td> <select NAME="kelas_id" onChange="submit();" class="input-mini">
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
                                    </select></td>
                            </form>
                            <form name="frm_semester" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <input type="hidden" name="kelas_id" value="<?php echo $kelas_id; ?>">
                                <input type="hidden" name="tahun_ajaran" value="<?php echo $tahun_ajaran; ?>">
                                <td> Hari</td>
                                <td > <select name="hari" class="input-medium" onChange="submit();">
                                        <option value="SENIN" <?php if ($hari == 'SENIN') echo "SELECTED"; ?>>SENIN</option>
                                        <option value="SELASA" <?php if ($hari == 'SELASA') echo "SELECTED"; ?>>SELASA</option>
                                        <option value="RABU" <?php if ($hari == 'RABU') echo "SELECTED"; ?>>RABU</option>
                                        <option value="KAMIS" <?php if ($hari == 'KAMIS') echo "SELECTED"; ?>>KAMIS</option>
                                        <option value="JUM`AT" <?php if ($hari == 'JUM`AT') echo "SELECTED"; ?>>JUM`AT</option>
                                        <option value="SABTU" <?php if ($hari == 'SABTU') echo "SELECTED"; ?>>SABTU</option>
                                    </select> </td>
                            </form>
                            </tr>
                        </table>
                        <table class="table-bordered">
                            <?php
                            $hasil_wali = mysql_query("SELECT wali_kelas.ID, wali_kelas.TAHUN_AJARAN, guru.NIP, guru.GLR_DEPAN, guru.NAMA, guru.GLR_BLK, kelas.RUANG
FROM kelas INNER JOIN (guru INNER JOIN wali_kelas ON guru.ID = wali_kelas.ID_GURU) ON kelas.ID = wali_kelas.ID_KELAS
where wali_kelas.TAHUN_AJARAN='$tahun_ajaran' and kelas.ID='$kelas_id'");
                            $row_wali = mysql_fetch_array($hasil_wali);
                            ?>
                            <tr> 
                                <td>Wali Kelas : <?php echo $row_wali[GLR_DEPAN] . " " . $row_wali[NAMA] . " " . $row_wali[GLR_BLK]; ?></td>
                            </tr>
                        </table>
                        <table class="table-bordered">
                            <thead> 
                            <th>NAMA PENGAJAR</th>
                            <th>MATA PELAJARAN</th>
                            <th>WAKTU</th>
                            <th>JAM</th>
                            </thead>
                            <?php
                            $strsql = "SELECT jadwal.ID_JADWAL, guru.GLR_DEPAN, guru.NAMA, guru.GLR_BLK, matpel.NAMA_MATPEL, jadwal.HARI, jadwal.JAM, jadwal.WAKTU, jadwal.TAHUN_AJARAN, kelas.ID
FROM kelas INNER JOIN (matpel INNER JOIN (guru INNER JOIN jadwal ON guru.ID = jadwal.ID_GURU) ON matpel.ID_MATPEL = jadwal.ID_MATPEL) ON kelas.ID = jadwal.ID_KELAS
where jadwal.TAHUN_AJARAN='$tahun_ajaran' and jadwal.HARI='$hari' and kelas.ID='$kelas_id'";
                            $hasil = mysql_query($strsql);
                            while ($row = mysql_fetch_array($hasil)) {
                                $nama_guru = $row[GLR_DEPAN] . " " . $row[NAMA] . " " . $row[GLR_BLK];
                                $NO++;
                                if ($NO % 2 == 1)
                                    $warna = "";
                                else
                                    $warna = "";
                                ?>
                                <tr>
                                    <td><?php echo $nama_guru; ?></td>
                                    <td><?php echo $row[NAMA_MATPEL]; ?></td>
                                    <td align="center"><?php echo $row[JAM]; ?> Jam</td>
                                    <td align="center"><?php echo $row[WAKTU]; ?></td>
                                </tr>
                                <?php
                            }
                            mysql_free_result($hasil);
                            ?>
                        </table>
                        <table class="table-bordered">
                            <tr>
                                <td colspan="4"><a href="rpt_jadwal_pelajaran.php?tahun_ajaran=<?php echo $tahun_ajaran; ?>&kelas_id=<?php echo $kelas_id; ?>" target="_blank"><img src="../admin/images/cetak.gif" alt="klik disini untuk Cetak Data Jadwal Pelajaran" width="68" height="23" border="0"></a></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- end content -->
            </div>
            <!-- Footer -->
            <?php include_once '../admin/footer.php'; ?>
            <!-- end left -->
        </div>

    </body>
</html>
