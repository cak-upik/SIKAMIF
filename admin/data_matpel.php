<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
require_once "fungsi.php";
$kelas = $_REQUEST['kelas'];
$matpel_id = $_REQUEST['matpel_id'];
$skm = $_REQUEST['skm'];
$nama_matpel = $_REQUEST['nama_matpel'];
$act = $_REQUEST['act'];
$tahun_ajaran = $_REQUEST['tahun_ajaran'];
if ($act == 'del') {
    mysql_query("delete from matpel where id_matpel='$matpel_id'");
//hapus tabel jadwal
    mysql_query("delete from jadwal where id_matpel='$id_matpel'");
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
        <li class="active">Input SKBM</li>
    </ul><!-- /.breadcrumb -->
</div>
<div class="page-content">
    <div class="page-header">
        <h1>
            Input SKBM
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
                tambah_matpel($nama_matpel, $skm, $kelas, $tahun_ajaran);
            } elseif ($act == 'edit') {
                edit_matpel($matpel_id, $kelas, $tahun_ajaran);
            } else {
                ?>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        <thead>
                        <th colspan="4">Input SKBM</th>
                        </thead>
                        <input type="hidden" name="kelas" value="<?php echo $kelas; ?>">
                        <tr>
                            <td>Tahun Ajaran</td>
                            <td><select NAME="tahun_ajaran" onChange="submit();" class="input-medium">
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
                        </tr>
                        <input type="hidden" name="tahun_ajaran" value="<?php echo $tahun_ajaran; ?>">
                        <tr>
                            <td>Kelas </td>
                            <td><select name="kelas" class="input-medium" onChange="submit();">
                                    <option value="1" <?php if ($kelas == '1') echo "SELECTED"; ?>>I (Satu)</option>
                                    <option value="2" <?php if ($kelas == '2') echo "SELECTED"; ?>>II (Dua)</option>
                                    <option value="3-IPS" <?php if ($kelas == '3-IPS') echo "SELECTED"; ?>>III 
                                        (Tiga) IPS</option>
                                    <option value="3-IPA" <?php if ($kelas == '3-IPA') echo "SELECTED"; ?>>III 
                                        (Tiga) IPA</option>
                                    <option value="3-BAHASA" <?php if ($kelas == '3-BAHASA') echo "SELECTED"; ?>>III 
                                        (Tiga) Bahasa</option>
                                </select>
                            </td> 
                        </tr>                                   
                        <tr>
                            <td colspan="4"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?act=tambah&kelas=<?php echo $kelas; ?>&tahun_ajaran=<?php echo $tahun_ajaran; ?>"class="btn btn-primary"><i class="fa fa-plus-square"></i> Tambah</a>
                        </tr>
                    </table>
                    <br>
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        <thead> 
                        <th>MATA PELAJARAN</th>
                        <th>SKBM</th>
                        <th colspan="2">Aksi</th>
                        <?php data_matpel($kelas, $tahun_ajaran); ?>                                    
                        </thead>
                        <tr>
                            <td colspan="4"><a href="rpt_matpel.php?kelas=<?php echo $kelas; ?>&tahun_ajaran=<?php echo $tahun_ajaran; ?>" target="_blank" class="btn btn-inverse"><i class="fa fa-print"></i> Cetak</a></td>
                        </tr>
                    </table>
                </form>
                <?php
            }
            ?>
        </div>
    </div>
</div>