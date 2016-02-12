<?php
//error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
require_once "fungsi2.php";
$tahun_ajaran = $_REQUEST['tahun_ajaran'];
$jurusan = $_REQUEST['jurusan'];
$kategori = $_REQUEST['kategori'];
$key = $_REQUEST['key'];
$act = $_REQUEST['act'];
$nis = $_REQUEST['nis'];
$uan = $_REQUEST['uan'];
$motto = $_REQUEST['motto'];

if ($act == 'del') {
    mysql_query("delete from alumni where nis='$nis'");
    mysql_query("update siswa set aktif='1' where nis='$nis'");
}
?>
<html>
    <head>
        <title>Alumi</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link href="../bootstrap/css/bootstrap.css" rel="stylesheet"/>
        <link href="../bootstrap/css/bootstrap-responsive.css" rel="stylesheet"/>
        <link href="../bootstrap/css/style.css" rel="stylesheet"/>
        <script src="../bootstrap/js/jquery-1.7.2.min.js"></script>
        <script src="../bootstrap/js/bootstrap-dropdown.js"></script>
        <script language="JavaScript"  src="../global/jscript.js" type="text/javascript"></script>
        <script language="JavaScript"  src="../global/jscript_pop.js" type="text/javascript"></script>
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
                <div class="span9">
                    <table width="auto" border="0" cellspacing="0" cellpadding="0">
                        <tr> 
                            <td width="48"><div align="center"><img src="images/alumni.gif" width="48" height="48" border="1"></div></td>
                            <td width="187" class="master_title">&nbsp;&nbsp;&nbsp;Alumni</td>
                        </tr>
                    </table>
                    <br>

                    <form name="cari_guru" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input type="hidden" name="tahun_ajaran" value="<?php echo $tahun_ajaran; ?>">
                        <input type="hidden" name="jurusan" value="<?php echo $jurusan; ?>">
                        <table width="auto" border="0" cellspacing="0" cellpadding="0" class="text_login">
                            <tr> 
                                <td width="113">Cari Berdasarkan :</td>
                                <td width="80"><select name="kategori" class="inputlogin">
                                        <option value="NIS" <?php if ($kategori == 'NIS') echo "SELECTED"; ?>>NIS</option>
                                        <option value="NAMA" <?php if ($kategori == 'NAMA') echo "SELECTED"; ?>>NAMA</option>
                                    </select>
                                </td></tr>
                            <tr>
                                <td width="102">Masukkan Kata :</td>
                                <td width="190"><input type="text" name="key" class="inputlogin" size="30" value="<?php echo $key; ?>"></td>
                                <td width="77"><input name="Submit" type="image" value="Submit" src="images/cari.gif" alt="klik disini untuk melakukan Pencarian Siswa"></td>
                            </tr>
                        </table>
                    </form>
                    <?php
                    if ($act == 'tambah') {
                        tambah_alumni($tahun_ajaran, $jurusan, $kategori, $key, $nis, $uan, $motto);
                    } elseif ($act == 'edit') {
                        edit_alumni($tahun_ajaran, $jurusan, $kategori, $key, $nis, $uan, $motto);
                    } else {
                        ?>
                        <table width="auto" border="0" cellpadding="0" cellspacing="0" class="text_login">
                            <!--DWLayoutTable-->
                            <tr> 
                            <form name="frm_tahun_ajaran" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <input type="hidden" name="kelas_id" value="<?php echo $kelas_id; ?>">
                                <input type="hidden" name="hari" value="<?php echo $hari; ?>">
                                <td width="96" height="30">Tahun Ajaran</td>
                                <td width="10"><div align="center">:</div></td>
                                <td colspan="4"> <select NAME="tahun_ajaran" onChange="submit();" class="inputlogin">
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
                                    </select> </td>
                            </form>
                            </tr>
                            <tr> 
                            <form name="frm_jurusan" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <input type="hidden" name="tahun_ajaran" value="<?php echo $tahun_ajaran; ?>">
                                <td height="30">Jurusan</td>
                                <td><div align="center">:</div></td>
                                <td width="141" valign="middle"> <select NAME="jurusan" onChange="submit();" class="inputlogin">
                                        <option value="BAHASA" <?php if ($jurusan == 'BAHASA') echo "SELECTED"; ?>>BAHASA</option>
                                        <option value="IPA" <?php if ($jurusan == 'IPA') echo "SELECTED"; ?>>IPA</option>
                                        <option value="IPS" <?php if ($jurusan == 'IPS') echo "SELECTED"; ?>>IPS</option>
                                    </select> &nbsp; </td>
                            </form>
                            <form name="frm_semester" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <input type="hidden" name="tahun_ajaran" value="<?php echo $tahun_ajaran; ?>">
                                <td width="51"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                <td width="1" valign="middle"><!--DWLayoutEmptyCell-->&nbsp;</td>
                                <td width="169"><table border="0" align="right" cellpadding="0" cellspacing="0">
                                        <tr> 
                                            <td align="center"><a href="?act=tambah&tahun_ajaran=<?php echo $tahun_ajaran; ?>&jurusan=<?php echo $jurusan; ?>"><img src="images/new.gif" width="32" height="32" border="0" alt="klik disini untuk Tambah Data Alumni"></a></td>
                                        </tr>
                                    </table></td>
                            </form>
                            </tr>
                        </table>
                        <br>
                        <table width="auto" border="0" cellspacing="2" cellpadding="2"  class="box2_000000">
                            <tr bgcolor="CEDB4A" class="tdtitle"> 
                                <td width="50" align="center">NO.</td>
                                <td height="25" width="80" align="center">NIS</td>
                                <td width="200" align="center">NAMA</td>
                                <td height="25" width="80" align="center">NILAI UAN</td>
                                <td width="60" colspan="2">&nbsp;</td>
                                <?php data_alumni($tahun_ajaran, $jurusan, $kategori, $key); ?>
                            </tr>
                        </table>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <!-- end content -->
        </div>
    </div>
    <!-- Footer -->
    <?php include_once './footer.php'; ?>
    <!-- end left -->
</body>
</html>