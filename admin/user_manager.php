<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
require_once "fungsi.php";
$act = $_REQUEST['act'];
$status = $_REQUEST['status'];
$key = $_REQUEST['key'];
$id = $_REQUEST['id'];
$aktif = $_REQUEST['aktif'];
if ($act == 'del') {
    mysql_query("delete from usermanager where id='$id'");
} elseif ($act == 'set') {
    if ($aktif == '0') {
        mysql_query("update usermanager set aktif='1' where id='$id'");
    } else {
        mysql_query("update usermanager set aktif='0' where id='$id'");
    }
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
            <a href="#">Setting</a>
        </li>
        <li class="active">User Managemen</li>
    </ul><!-- /.breadcrumb -->
</div>
<div class="page-content">
    <div class="page-header">
        <h1>
            User Managemen
        </h1>
    </div><!-- /.page-header -->
    <div class="row">
        <div class="col-xs-12">
            <div class="clearfix">
                <div class="pull-left tableTools-container">
                </div>
            </div>
            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                <form name="cari_guru" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" name="status" value="<?php echo $status; ?>">
                    <tr> 
                        <td>Cari Berdasarkan Username:</td>
                        <td><input type="text" name="key" class="inputlogin" size="30" value="<?php echo $key; ?>">
                                <button name="Submit" type="submit" class="btn btn-grey"><i class="fa fa-search"></i> Cari</button></td>
                    </tr>
                </form>
            </table>

            <?php
            if ($act == 'tambah') {
                tambah_user($status);
            } elseif ($act == 'edit') {
                edit_user($status, $key, $id);
            } else {
                ?>
                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                    <!--DWLayoutTable-->
                    <tr> 
                    <form name="frm_jurusan" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input type="hidden" name="key" value="<?php echo $key; ?>">
                        <td>Status</td>
                        <td valign="middle"> <select NAME="status" onChange="submit();" class="inputlogin">
                                <option value="1" <?php if ($status == '1') echo "SELECTED"; ?>>ADMINISTRATOR</option>
                                <option value="2" <?php if ($status == '2') echo "SELECTED"; ?>>SISWA</option>
                                <option value="3" <?php if ($status == '3') echo "SELECTED"; ?>>GURU</option>
                            </select></td>
                    </form>
                    <td>
                        <a href="?act=tambah&status=<?php echo $status; ?>" class="btn btn-primary"><i class="fa fa-plus-square"></i> Tambah</a>
                    </td>

                    <br/>
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        <thead> 
                        <th align="center">USERNAME</th>
                        <th align="center">AKTIF</th>
                        <th align="center">LOGIN TERAKHIR</th>
                        <th>AKSI</th>
                        </tr>
                        <?php user_manager($status, $key, $kategori, $perlihat); ?>
                    </table>
                    <?php
                }
                ?>
        </div>
    </div>
</div>