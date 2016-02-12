<?php
//error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
require_once "fungsi.php";
$id = $_REQUEST['id'];
$act = $_REQUEST['act'];
$kelas = $_REQUEST['kelas'];

if ($act == 'del') {
    mysql_query("delete from kelas where id='$id'");
//hapus tabel wali_kelas
    mysql_query("delete from wali_kelas where id_kelas='$id'");
//hapus tabel jadwal
    mysql_query("delete from jadwal where id_kelas='$id'");
}
?>
<html>
    <head>
        <title>Data Kelas</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link href="../bootstrap/css/bootstrap.css" rel="stylesheet"/>
        <link href="../bootstrap/css/bootstrap-responsive.css" rel="stylesheet"/>
        <link href="../bootstrap/css/style.css" rel="stylesheet"/>
        <script src="../bootstrap/js/jquery-1.7.2.min.js"></script>
        <script src="../bootstrap/js/bootstrap-dropdown.js"></script>
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
                <div class="span8">
                    <div class="row-fluid">
                        <a href="<?php echo $_SERVER['PHP_SELF']; ?>?act=tambah" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i>Tambah</a>
                    </div>
                    <?php
                    if ($act == 'tambah') {
                        tambah_kelas($kelas);
                    } elseif ($act == 'edit') {
                        edit_kelas($id);
                    } else {
                        ?>
                        <br/>
                        <table class="table-bordered" style="width: 50%;">
                            <thead>
                            <th colspan="3">Data Kelas</th>
                            </thead>
                            <?php data_kelas(); ?>
                        </table>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <!-- end content -->
            <!-- Footer -->
            <?php include_once './footer.php'; ?>
            <!-- end left -->
        </div>

    </body>
</html>

