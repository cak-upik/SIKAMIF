<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
require_once "../admin/fungsi_lanjutan.php";
require_once "../admin/fungsi_nilai.php";
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
<script type="text/javascript" src="show-hide.js"></script>
<script type="text/javascript" src="calculateNilai.js"></script>
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
        <li class="active">Input Nilai</li>
    </ul><!-- /.breadcrumb -->
</div>
<div class="page-content">
    <div class="page-header">
        <h1>
            Input Nilai
        </h1>
    </div><!-- /.page-header -->
    <div class="row">
        <div class="col-xs-12">
            <div class="clearfix">
                <div class="pull-left tableTools-container">
                </div>
            </div>
            <?php
            if ($act == 'isi') {
                isi_nilai($tahun_ajaran, $kelas_id, $id, $key, $kategori);
            } elseif ($act == 'detil_isi') {
                isi_nilai3($tahun_ajaran, $kelas_id, $id, $key, $kategori, $semester);
            } else {
                ?>

                <form name="frm_tahun_ajaran" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        <!--DWLayoutTable-->
                        <tr>
                        <input type="hidden" name="kelas_id" value="<?php echo $kelas_id; ?>">
                        <input type="hidden" name="semester" value="<?php echo $semester; ?>">
                        <input type="hidden" name="key" value="<?php echo $key; ?>">
                        <input type="hidden" name="kategori" value="<?php echo $kategori; ?>">
                        <td>Tahun Ajaran</td>
                        <td colspan="2"> <select name="tahun_ajaran" onChange="submit();" class="input-medium">
                                <?php
                                $strsqls = "SELECT tahun_ajaran FROM tahun_ajaran order by tahun_ajaran desc";
                                $results = mysql_query($strsqls);
                                $num_result = mysql_num_rows($results);
                                for ($i = 0; $i < $num_result; $i++) {
                                    $row_tahun = mysql_fetch_array($results);
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
                <tr>
                <form name="frm_tahun_ajaran" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" name="kelas_id" value="<?php echo $kelas_id; ?>">
                    <input type="hidden" name="tahun_ajaran" value="<?php echo $tahun_ajaran; ?>">
                    <input type="hidden" name="key" value="<?php echo $key; ?>">
                    <input type="hidden" name="kategori" value="<?php echo $kategori; ?>">
                    <td>Semester</td>
                    <td><select name="semester" class="input-medium" onChange="submit();">
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
                    <td><select NAME="kelas_id" onChange="submit();" class="input-mini">
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
                    <?php
                    if (!empty($_GET['tahun_ajaran']) && !empty($_GET['semester']) && !empty($_GET['kelas_id'])) {
                        $thn = $_GET['tahun_ajaran'];
                        $smt = $_GET['semester'];
                        $kls = $_GET['kelas_id'];
                    } else {
                        $thn = $_POST['tahun_ajaran'];
                        $smt = $_POST['semester'];
                        $kls = $_POST['kelas_id'];
                    }
                    ?>
                </form>
                </tr>
                </table>

                <div class="shownAfter">
                    <form name="frm_semester" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input type="hidden" name="kelas_id2" value="<?php echo $kelas_id; ?>">
                    </form>
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="hidden" name="tahun_ajaran" value="<?php echo $tahun_ajaran; ?>">
                            <input type="hidden" name="kelas_id" value="<?php echo $kelas_id; ?>">
                            <input type="hidden" name="semester" value="<?php echo $semester; ?>">
                            <tr> 
                                <td>Cari Berdasarkan :</td>
                                <td><select name="kategori" class="input-small" onChange="submit();">
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
                            <td><input type="text" name="key" class="input-medium" value="<?php echo $key; ?>" maxlength="24">
                                <button name="Submit" type="submit" class="btn btn-grey"><i class="fa fa-search"></i> Cari</button>
                                <br/><font color="#FF0000">
                                <?php
                                if ($kategori == 'NIS') {
                                    echo "Maksimal 8 Angka";
                                } else {
                                    echo "Maksimal 24 Karakter";
                                }
                                ?>
                                </font></td>                            
                        </form>
                    </table>
                    <br>
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        <thead> 
                        <th align="center">NO.</th>
                        <th align="center">NIS</th>
                        <th align="center">NAMA SISWA</th>
                        <th colspan="2">AKSI</th>
                        </thead>
                        <?php
                        input_nilai($tahun_ajaran, $kelas_id, $key, $kategori, $semester);
                        ?>
                    </table>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>

    <?php
    if (isset($_GET['valid']) && $_GET['valid'] == "1") {
        echo "<script language=JavaScript>$('.shownAfter').show(); alert('berhasil');</script>";
    }
    ?>
