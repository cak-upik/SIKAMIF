<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "fungsi.php";
$id = $_REQUEST['id'];
$act = $_REQUEST['act'];
$tahun_kurikulum1 = $_REQUEST['tahun_kurikulum1'];
$tahun_kurikulum2 = $_REQUEST['tahun_kurikulum2'];

if ($act == 'del') {
    mysql_query("delete from tahun_ajaran where id='$id'");
}
?>

<html>
    <head>
        <title>Tahun Ajaran</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<!--        <link href="../bootstrap/css/bootstrap.css" rel="stylesheet"/>
        <link href="../bootstrap/css/bootstrap-responsive.css" rel="stylesheet"/>
        <link href="../bootstrap/css/style.css" rel="stylesheet"/>
        <link href="../bootstrap/css/SyntaxHighlighter.css" rel="stylesheet" type="text/css" />
-->
<!--        <script src="../bootstrap/js/jquery-1.7.2.min.js"></script>
        <script src="../bootstrap/js/bootstrap-dropdown.js"></script> -->
        <script language="JavaScript"  src="../global/jscript.js" type="text/javascript"></script>
        <script language="JavaScript"  src="../global/jscript_pop.js" type="text/javascript"></script>
<!--        <script type="text/javascript" src="../bootstrap/js/jquery.js"></script>
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
        </script> -->
    </head>

    <body>
        <div class="container-fluid">
            <div class="row-fluid">
                <!-- Content -->  
                <div class="span9">
                    <div class="row-fluid">
                        <!--<img src="images/tahun_ajaran.gif" width="48" height="47"><br/>-->
                        <a href="<?php echo $_SERVER['PHP_SELF']; ?>?act=tambah" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i>Tambah</a>
                        <br/>
                        <?php
                        if ($act == 'tambah') {
                            tambah_tahun_ajaran($tahun_kurikulum1, $tahun_kurikulum2);
                        } elseif ($act == 'edit') {
                            edit_tahun_ajaran($id);
                        } else {
                            ?>
                        <br/>
                            <table class="table-bordered"  style="width: 50%;">
                                <thead>
                                <th colspan="3">Tahun Ajaran</th>
                                </thead>
                                <?php tahun_ajaran(); ?>
                            </table>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <!-- end content -->
        <!-- end left -->
        </div>
        
    </body>
</html>