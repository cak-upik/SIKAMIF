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
        <li class="active">Data Kelas</li>
    </ul><!-- /.breadcrumb -->
</div>
<div class="page-content">
    <div class="page-header">
        <h1>
            Data Kelas
        </h1>
    </div><!-- /.page-header -->
    <div class="row">
        <div class="col-xs-12">
            <div class="clearfix">
                <div class="pull-left tableTools-container">
                    <a href="<?php echo $_SERVER['PHP_SELF']; ?>?act=tambah" class="btn btn-primary"><i class="fa fa-plus-square"></i> Tambah</a>
                </div>
            </div>
            <!-- div.table-responsive -->
            <!-- div.dataTables_borderWrap -->
            <div>
                <?php
                if ($act == 'tambah') {
                    tambah_kelas($kelas);
                } elseif ($act == 'edit') {
                    edit_kelas($id);
                } else {
                    ?>
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Data Kelas</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php data_kelas(); ?>
                        </tbody>
                    </table>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>