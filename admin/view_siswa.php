<?php
//include "global/cek_session_admin.php";

include "../global/config.php";
$kategori = $_REQUEST['kategori'];
$key = $_REQUEST['key'];
$perlihat = $_REQUEST['perlihat'];
?>
<html>
    <head>
        <title>Siswa</title>
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
        <div class="span9">
            <div class="row-fluid">
                <table class="table-bordered">
                    <form method="post" name="frm_cari_mhs" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <!--DWLayoutTable-->
                        <tr> 
                            <td>Cari Berdasarkan :</td>
                            <td><select name="kategori">
                                    <option value="NIS" <?php if ($kategori == 'NIS') echo "SELECTED"; ?>>NIS</option>
                                    <option value="NAMA" <?php if ($kategori == 'NAMA') echo "SELECTED"; ?>>NAMA</option>
                                </select></td>
                        </tr>
                        <tr> 
                            <td>Masukkan Kata :</td>
                            <td><input type="text" name="key" size="15" value="<?php echo $key; ?>">
                                <input name="Submit" type="image" value="Submit" src="images/cari.gif" alt="klik disini untuk melakukan Pencarian siswa"></td>
                        </tr>
                    </form>
                </table>
                <table class="table-bordered">
                    <thead> 
                        <th>NIS</th>
                        <th>NAMA</th>
                    </thead>
                    <?php
                    if ($kategori AND $key) {
                        if ($kategori == 'NIS')
                            $strsql = "select nis,nama_lengkap from siswa where nis like '%$key%' and aktif='1' order by nis asc";
                        else
                            $strsql = "select nis,nama_lengkap from siswa where nama_lengkap like '%$key%' and aktif='1' order by nis asc";
                        $lihat = mysql_query($strsql);
                        $baris = mysql_num_rows($lihat);
                        if ($perlihat > 1) {
                            $ada = 15 * ($perlihat - 1);
                            $i = $perlihat * 15;
                            for ($i = 1; $i <= $ada; $i++) {
                                $data = mysql_fetch_array($lihat);
                            }
                        } else {
                            $perlihat = 1;
                            $i = $perlihat;
                        }
                        for (; $i <= $perlihat * 15 && $i <= $baris; $i++) {
                            $row = mysql_fetch_array($lihat);
                            $NO++;
                            if ($NO % 2 == 1)
                                $warna = "EFEB94";
                            else
                                $warna = "F7F38C";
                            ?>
                            <tr bgcolor="<?php echo $warna; ?>" onmouseover="this.className = 'rowover';" onmouseout="this.className = 'rowselected-even';"
                                onClick="window.close();
                                            javascript:window.opener.document.forms[0].nis.value = '<?php echo $row[nis]; ?>';
                                            javascript:window.opener.document.forms[0].nama.value = '<?php echo $row[nama_lengkap]; ?>'">
                                <td class="text"><?php echo $row[nis]; ?></td>
                                <td class="text"><?php echo $row[nama_lengkap]; ?></td>
                            </tr>
                            <?php
                        }
                        mysql_free_result($lihat);
                        ?>
                        <td>
                        <tr>
                       <table class="table-bordered">
                            <tr>
                                <td>
                                    <a >Halaman ke : </a>
                                    <?php
                                    if ($perlihat > 1) {
                                        $belakang = $perlihat - 1;
                                    }$baris1 = $baris - $perlihat * 15;
                                    $lin = (int) ($baris / 15);
                                    if ($baris % 15 > 0) {
                                        $lin = $lin + 1;
                                    }
                                    if ($lin > 1) {
                                        for ($i = 1; $i <= $lin; $i++) {
                                            if ($i != $perlihat) {
                                                ?>			
                                                &nbsp;<a href="<?php echo "?perlihat=$i&key=$key&kategori=$kategori"; ?>" class="link_halaman"><?php echo $i; ?></a>&nbsp;
                                                <?php
                                            } else {
                                                ?>
                                                &nbsp;<?php echo "<a >$i</a>"; ?>&nbsp;
                                                <?php
                                            }
                                        }
                                    }
                                    if ($baris1 > 0) {
                                        $perlihat = $perlihat + 1;
                                    }
//end function
                                    echo "</a></td></tr></table></tr></td>";
                                    ?>
                                    <?php
                                } else {
                                    ?>
                                    <?php
                                    $strsql = "select nis,nama_lengkap from siswa where aktif='1' order by nis asc";
                                    $lihat = mysql_query($strsql);
                                    $baris = mysql_num_rows($lihat);
                                    if ($perlihat > 1) {
                                        $ada = 15 * ($perlihat - 1);
                                        $i = $perlihat * 15;
                                        for ($i = 1; $i <= $ada; $i++) {
                                            $data = mysql_fetch_array($lihat);
                                        }
                                    } else {
                                        $perlihat = 1;
                                        $i = $perlihat;
                                    }
                                    for (; $i <= $perlihat * 15 && $i <= $baris; $i++) {
                                        $row = mysql_fetch_array($lihat);
                                        $NO++;
                                        if ($NO % 2 == 1)
                                            $warna = "";
                                        else
                                            $warna = "";
                                        ?>
                                <tr bgcolor="<?php echo $warna; ?>" onmouseover="this.className = 'rowover';" onmouseout="this.className = 'rowselected-even';"
                                    onClick="window.close();
                                            javascript:window.opener.document.forms[0].nis.value = '<?php echo $row[nis]; ?>';
                                            javascript:window.opener.document.forms[0].nama.value = '<?php echo $row[nama_lengkap]; ?>'">
                                    <td class="text"><?php echo $row[nis]; ?></td>
                                    <td class="text"><?php echo $row[nama_lengkap]; ?></td>
                                </tr>
                                <?php
                            }
                            mysql_free_result($lihat);
                            ?>
                            <td>
                            <tr>
                            <table class="table-bordered">
                                <tr>
                                    <td>
                                        <a >Halaman ke : </a>
                                        <?php
                                        if ($perlihat > 1) {
                                            $belakang = $perlihat - 1;
                                        }$baris1 = $baris - $perlihat * 15;
                                        $lin = (int) ($baris / 15);
                                        if ($baris % 15 > 0) {
                                            $lin = $lin + 1;
                                        }
                                        if ($lin > 1) {
                                            for ($i = 1; $i <= $lin; $i++) {
                                                if ($i != $perlihat) {
                                                    ?>			
                                                    &nbsp;<a href="<?php echo "?perlihat=$i&key=$key&kategori=$kategori"; ?>" class="link_halaman"><?php echo $i; ?></a>&nbsp;
                                                    <?php
                                                } else {
                                                    ?>
                                                    &nbsp;<?php echo "<a >$i</a>"; ?>&nbsp;
                                                    <?php
                                                }
                                            }
                                        }
                                        if ($baris1 > 0) {
                                            $perlihat = $perlihat + 1;
                                        }
//end function
                                        echo "</a></td></tr></table></tr></td>";
                                        ?>
                                        <?php
                                    }
                                    ?>
                        </table>
                        </div>
                        </div
                        </body>
                        </html>

