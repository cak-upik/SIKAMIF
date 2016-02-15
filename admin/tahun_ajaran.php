<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
error_reporting(E_ALL ^ E_DEPRECATED);
include "fungsi.php";
$id = $_REQUEST['id'];
$act = $_REQUEST['act'];
$tahun_kurikulum1 = $_REQUEST['tahun_kurikulum1'];
$tahun_kurikulum2 = $_REQUEST['tahun_kurikulum2'];
$act = "";
if ($act == 'del') {
    mysql_query("delete from tahun_ajaran where id='$id'");
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
        <li class="active">Data Tahun Ajaran</li>
    </ul><!-- /.breadcrumb -->
</div>
<div class="page-content">
    <div class="page-header">
        <h1>
            Tahun Ajaran
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
            <?php
            if ($act == 'tambah') {
                tambah_tahun_ajaran($tahun_kurikulum1, $tahun_kurikulum2);
            } elseif ($act == 'edit') {
                edit_tahun_ajaran($id);
            } else {
                ?>
                <div>
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Tahun Ajaran</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php tahun_ajaran(); ?>
                        </tbody>
                    </table>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>