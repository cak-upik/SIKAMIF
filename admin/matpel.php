<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
require_once "fungsi_nilai.php";
$act = $_REQUEST['act'];
$id = $_REQUEST['id'];
$kls = $_REQUEST['kelas'];
$thn_ajaran = $_REQUEST['tahun'];
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
            <a href="#">Master</a>
        </li>
        <li class="active">Data Mata Pelajaran</li>
    </ul><!-- /.breadcrumb -->
</div>
<div class="page-content">
    <div class="page-header">
        <h1>
            Data Mata Pelajaran
        </h1>
    </div><!-- /.page-header -->
    <div class="row">
        <div class="col-xs-12">
            <div class="clearfix">
                <div class="pull-left tableTools-container">
                </div>
            </div>
            <span id="groupKelas">
                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                    <form name="frm_kelas" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <tr>
                            <td>Kelas</td>
                            <td colspan="2"><select name="kelas" onchange="submit();" class="input-mini">
                                    <?php
                                    $strsql = "SELECT DISTINCT kelas FROM matpel order by id_matpel asc";
                                    $result = mysql_query($strsql);
                                    $num_results = mysql_num_rows($result);
                                    for ($i = 0; $i < $num_results; $i++) {
                                        $row_kelas = mysql_fetch_array($result);
                                        $dataKls = $row_kelas[kelas];
                                        if (isset($_POST['kelas'])) {
                                            $selected = (isset($_POST['kelas']) and
                                                    $_POST['kelas'] == $dataKls) ? ' selected' : '';
                                            echo "<option value='$dataKls' $selected>$dataKls</option>\n";
                                        } else {
                                            $selected = (isset($_GET['kelas']) and
                                                    $_GET['kelas'] == $dataKls) ? ' selected' : '';
                                            echo "<option value='$dataKls' $selected>$dataKls</option>\n";
                                        }
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <form name="frm_matpel" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <tr>
                                <td>Tahun Ajaran</td>
                                <td colspan="2"><select name="tahun" onchange="submit();" class="input-medium">
                                        <?php
                                        $strsql = "SELECT DISTINCT tahun_ajaran FROM matpel order by id_matpel desc";
                                        $result = mysql_query($strsql);
                                        $num_results = mysql_num_rows($result);
                                        for ($i = 0; $i < $num_results; $i++) {
                                            $row_kelas = mysql_fetch_array($result);
                                            $dataKls = $row_kelas[tahun_ajaran];
                                            if (isset($_POST['tahun'])) {
                                                $selected = (isset($_POST['tahun']) and
                                                        $_POST['tahun'] == $dataKls) ? ' selected' : '';
                                                echo "<option value='$dataKls' $selected>$dataKls</option>\n";
                                            } else {
                                                $selected = (isset($_GET['tahun']) and
                                                        $_GET['tahun'] == $dataKls) ? ' selected' : '';
                                                echo "<option value='$dataKls' $selected>$dataKls</option>\n";
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                        </form>
                    </form>
                </table>
                <br>
                <a href="<?php echo $_SERVER['PHP_SELF']; ?>?act=tambah" class="btn btn-primary"><i class="fa fa-plus-square"></i> Tambah</a>
                <br/>
            </span>
            <input type="hidden" name="kls_param" value="<? echo $kls ?>">
            <input type="hidden" name="thnAjaran_param" value="<? echo $thn_ajaran ?>">
            <?php
            if ($act == 'tambah') {
                tambah_master_matpel($_REQUEST['kls_param'], $_REQUEST['thnAjaran_param']);
            } elseif ($act == 'edit') {
                edit_master_matpel($id);
            } else if ($act == 'del') {
                delete_master_matpel($id);
            } else {
                ?>
                <br/>
                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                    <thead>
                    <th colspan="4">Mata Pelajaran</th>
                    </thead>
                    <?php
                    master_matpel($kls, $thn_ajaran);
                    ?>
                </table>
                <?php
            }
            ?>
        </div>
    </div>
</div>