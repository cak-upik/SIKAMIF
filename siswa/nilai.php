<?php
session_start();
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
<html>
    <head>
        <title>Nilai Siswa</title>
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
                <div class="span9">
                    <div class="row-fluid">
                        <img src="../admin/images/rapot.png" width="48" height="48" border="1">
                        Laporan Nilai Hasil Belajar

                        <table class="table-bordered">
                            <!--DWLayoutTable-->
                            <tr> 
                            <form name="frm_tahun_ajaran" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <input type="hidden" name="kelas_id" value="<?php echo $kelas_id; ?>">
                                <input type="hidden" name="semester" value="<?php echo $semester; ?>">
                                <input type="hidden" name="key" value="<?php echo $key; ?>">
                                <input type="hidden" name="kategori" value="<?php echo $kategori; ?>">
                                <td>Tahun Ajaran</td>
                                <td>:</td>
                                <td> <select NAME="tahun_ajaran" onChange="submit();" class="input-medium">
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
                                <td>Semester</td>
                                <td>:</td>
                                <td colspan="2"><select name="semester" class="input-small" onChange="submit();">
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
                                    </select> &nbsp; </td>
                            </form>
                            <form name="frm_semester" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <input type="hidden" name="kelas_id2" value="<?php echo $kelas_id; ?>">
                            </form>
                            </tr>
                        </table>
                        <table class="table-bordered">
                            <tr> 
                                <td><a href="lap_rapot.php?tahun_ajaran=<?php echo $tahun_ajaran; ?>&semester=<?php echo $semester; ?>&kelas_id=<?php echo $kelas_id; ?>&id=<?php echo $row[ID]; ?>&nis=<?php echo $row[NIS]; ?>&nama=<?php echo $row[NAMA_LENGKAP]; ?>&ruang=<?php echo $row[RUANG]; ?>" target="_blank"><img src="../admin/images/cetak.gif" alt="klik disini untuk Cetak Data Jadwal Pelajaran" border="0"></a></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <?php include_once '../admin/footer.php'; ?>
            <!-- end left -->
        </div>
    </body>
</html>
