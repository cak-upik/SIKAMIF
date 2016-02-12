<?php
session_start();
include "../global/cek_session_admin.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
require_once "fungsi.php";
$act = $_REQUEST['act'];
$status = $_REQUEST['status'];
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
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
<html>
    <head>
        <title>User Manager</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link href="../bootstrap/css/bootstrap.css" rel="stylesheet"/>
        <link href="../bootstrap/css/bootstrap-responsive.css" rel="stylesheet"/>
        <link href="../bootstrap/css/style.css" rel="stylesheet"/>
        <link href="../bootstrap/css/SyntaxHighlighter.css" rel="stylesheet" type="text/css" />

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
                        <img src="images/user_manager.png" width="48" height="48" border="1">
                        </div>

                        <table class="table-bordered">
                            <form name="cari_guru" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <input type="hidden" name="status" value="<?php echo $status; ?>">
                                <tr> 
                                    <td>Cari Berdasarkan Username:</td>
                                    <td><input type="text" name="key" class="inputlogin" size="30" value="<?php echo $key; ?>">
                                        <input name="Submit" type="image" value="Submit" src="images/cari.gif" alt="klik disini untuk melakukan Pencarian User"></td>
                                </tr>
                            </form>
                        </table>

                        <?php
                        if ($act == 'tambah') {
                            tambah_user($status, $username, $password);
                        } elseif ($act == 'edit') {
                            edit_user($status, $key, $id);
                        } else {
                            ?>
                            <table class="table-bordered">
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
                                    <a href="?act=tambah&status=<?php echo $status; ?>" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i>Tambah</a>
                                </td>

                                <br/>
                                <table class="table-bordered">
                                    <thead> 
                                    <th align="center">USERNAME</th>
                                    <th align="center">AKTIF</th>
                                    <th align="center">LOGIN TERAKHIR</th>
                                    <th colspan="3">AKSI</th>
                                    </tr>
                                    <?php user_manager($status, $key, $kategori, $perlihat); ?>
                                </table>
                                <?php
                            }
                            ?>
                </div>
                <!-- end content -->
                
            </div><!-- Footer -->
            <?php include_once './footer.php'; ?>
            <!-- end left -->
        </div>
    </body>
</html>