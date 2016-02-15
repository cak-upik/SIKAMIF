<?php
require_once "fungsi.php";
$id = $_REQUEST['id'];
$act = $_REQUEST['act'];
$strsql = "select * from profil";
$hasil = mysql_query($strsql);
$row = mysql_fetch_array($hasil);
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
        <li class="active">Profile Website</li>
    </ul><!-- /.breadcrumb -->
</div>
<div class="page-content">
    <div class="page-header">
        <h1>
            Profile Website
        </h1>
    </div><!-- /.page-header -->
    <div class="row">
        <div class="col-xs-12">
            <div class="clearfix">
                <div class="pull-left tableTools-container">
                </div>
            </div>
            <?php
            if ($act == 'edit') {
                edit_profil($id);
            } else {
                ?>
                <?php
                $strsql = "select * from profil";
                $hasil = mysql_query($strsql);
                $row = mysql_fetch_array($hasil);
                ?>

                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                    <thead>
                    <th colspan="3">PROFIL SEKOLAH</th>
                    </thead>
                    <tr> 
                        <td>NAMA SEKOLAH </td>
                        <td>:</td>
                        <td><?php echo strtoupper($row[NAMA]); ?></td>
                    </tr>
                    <tr> 
                        <td>STATUS</td>
                        <td>:</td>
                        <td><?php echo strtoupper($row[STATUS]); ?></td>
                    </tr>
                    <tr> 
                        <td>NSS</td>
                        <td>:</td>
                        <td><?php echo strtoupper($row[NSS]); ?></td>
                    </tr>
                    <tr> 
                        <td>NDS</td>
                        <td>:</td>
                        <td><?php echo strtoupper($row[NDS]); ?></td>
                    </tr>
                    <tr> 
                        <td>ALAMAT</td>
                        <td>:</td>
                        <td><?php echo strtoupper($row[ALAMAT]); ?></td>
                    </tr>
                    <tr> 
                        <td>KECAMATAN</td>
                        <td>:</td>
                        <td><?php echo strtoupper($row[KECAMATAN]); ?></td>
                    </tr>
                    <tr> 
                        <td>KABUPATEN</td>
                        <td>:</td>
                        <td><?php echo strtoupper($row[KABUPATEN]); ?></td>
                    </tr>
                    <tr> 
                        <td>PROPINSI</td>
                        <td>:</td>
                        <td><?php echo strtoupper($row[PROPINSI]); ?></td>
                    </tr>
                    <tr> 
                        <td>VISI</td>
                        <td>:</td>
                        <td><?php echo $row[VISI]; ?></td>
                    </tr>
                    <tr> 
                        <td>MISI</td>
                        <td>:</td>
                        <td><?php echo $row[MISI]; ?></td>
                    </tr>
                    <tr> 
                        <td>WEBSITE</td>
                        <td>:</td>
                        <td><?php echo $row[WEBSITE]; ?></td>
                    </tr>
                    <tr> 
                        <td>EMAIL</td>
                        <td>:</td>
                        <td><?php echo $row[EMAIL]; ?></td>
                    </tr>
                    <tr> 
                        <td>Tentang Sekolah</td>
                        <td>:</td>
                        <td><?php echo $row[ABOUT]; ?></td>
                    </tr>
                    <tr> 
                        <td colspan="3"><a href="?act=edit&id=<?php echo $row['ID']; ?>"><i class="fa fa-edit"></i> Edit</a></td>
                    </tr>
                </table>
                <?php
                mysql_free_result($hasil);
            }
            ?>
        </div>
    </div>
</div>