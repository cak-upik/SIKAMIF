<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
require_once "fungsi_nilai.php";
$act = $_REQUEST['act'];
$id = $_REQUEST['id'];
$kls = $_REQUEST['kelas'];
$thn_ajaran = $_REQUEST['tahun'];

?>
<html>
    <head>
        <title>Mata Pelajaran</title>
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
                        <img src="images/matkul.gif" width="48" height="48" border="1">
                        <br/>
                        <span id="groupKelas">
                            <table class="table-bordered">
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
                            <a href="<?php echo $_SERVER['PHP_SELF']; ?>?act=tambah" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i>Tambah</a>
                            <br/>
                        </span>
                        <input type="hidden" name="kls_param" value="<? echo $kls ?>">
                        <input type="hidden" name="thnAjaran_param" value="<? echo $thn_ajaran ?>">
                        <?php
                        if ($act == 'tambah') {
                            tambah_master_matpel($_REQUEST['kls_param'], $_REQUEST['thnAjaran_param']);
                        } elseif ($act == 'edit') {
                            edit_master_matpel($id);
                        }else if ($act == 'del') {
                            delete_master_matpel($id);
                        } else {
                            ?>
                        <br/>
                        <table class="table-bordered">
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
                <!-- end content -->
            </div><!-- Footer -->
            <?php include_once './footer.php'; ?>
            <!-- end left -->
        </div>

    </body>
</html>
