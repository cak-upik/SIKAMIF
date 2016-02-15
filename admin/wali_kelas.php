<?php
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
require_once "fungsi_lanjutan.php";
$tahun_ajaran = $_REQUEST['tahun_ajaran'];
$act = $_REQUEST['act'];
$id = $_REQUEST['id'];

if ($act == 'del') {
    $strsql = "delete from wali_kelas where id='$id'";
    $hasil = mysql_query($strsql);
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
        <li class="active">Wali Kelas</li>
    </ul><!-- /.breadcrumb -->
</div>
<div class="page-content">
    <div class="page-header">
        <h1>
            Data Wali Kelas
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
                tambah_wali($tahun_ajaran);
            } elseif ($act == 'edit') {
                edit_wali($tahun_ajaran, $id);
            } else {
                ?>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">        
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        <tr> 
                            <td>Tahun Ajaran</td>
                            <td>
                                <select NAME="tahun_ajaran" onChange="submit();" class="input-medium">
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

                                <a href="<?php echo $_SERVER['PHP_SELF']; ?>?act=tambah&tahun_ajaran=<?php echo $tahun_ajaran; ?>"class="btn btn-primary"><i class="fa fa-plus-square"></i> Tambah</a>
                            </td>
                        </tr>
                    </table>
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        <thead> 
                        <th align="center">NIP</th>
                        <th align="center">NAMA</th>
                        <th align="center">KELAS</th>
                        <th align="center" colspan="2" width="60">AKSI</th>
                        </thead>
                        <?php data_wali_kelas($tahun_ajaran); ?>                                
                        <tr>
                            <td colspan="5"><a href="rpt_walikelas.php?tahun_ajaran=<?php echo $tahun_ajaran; ?>" target="_blank" class="btn btn-inverse"><i class="fa fa-print"></i> Cetak</a></td>
                        </tr>
                    </table>
                    <?php
                }
                ?>
        </div>
    </div>
</div>