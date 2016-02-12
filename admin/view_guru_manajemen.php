<?php
//include "global/cek_session_admin.php";

include "../global/config.php";
$kategori = $_REQUEST['kategori'];
$key = $_REQUEST['key'];
?>
<html>
    <head>
        <title>LookUp Guru</title>
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
                                    <option value="NIP" <?php if ($kategori == 'NIP') echo "SELECTED"; ?>>NIP</option>
                                    <option value="NAMA" <?php if ($kategori == 'NAMA') echo "SELECTED"; ?>>NAMA</option>
                                </select></td>
                        </tr>
                        <tr> 
                            <td>Masukkan Kata &nbsp;&nbsp;&nbsp;&nbsp;:</td>
                            <td><input type="text" name="key" size="15" value="<?php echo $key; ?>">
                                <input name="Submit" type="image" value="Submit" src="images/cari.gif" alt="klik disini untuk melakukan Pencarian guru"></td>
                        </tr>
                    </form>
                </table>
                <table class="table-bordered">
                    <thead> 
                        <th>NIP</th>
                        <th>NAMA</th>
                    </thead>
                    <?php
                    if ($kategori AND $key) {
                        if ($kategori == 'NIP')
                            $strsql = "select id,nip,glr_depan,nama,glr_blk,aktif from guru where nip like '%$key%' and aktif='1' order by nip asc";
                        else
                            $strsql = "select id,nip,glr_depan,nama,glr_blk,aktif from guru where nama like '%$key%' and aktif='1' order by nip asc";
                        $hasil = mysql_query($strsql);
                        while ($row = mysql_fetch_array($hasil)) {
                            $NO++;
                            if ($NO % 2 == 1)
                                $warna = "";
                            else
                                $warna = "";
                            $nama_guru = $row[glr_depan] . " " . $row[nama] . " " . $row[glr_blk];
                            ?>
                            <tr bgcolor="<?php echo $warna; ?>" onmouseover="this.className = 'rowover';" onmouseout="this.className = 'rowselected-even';"
                                onClick="window.close();
                                    javascript:window.opener.document.getElementsById('nip').value = '<?php echo $row[nip]; ?>';
                                    javascript:window.opener.document.getElementsById('nama').value = '<?php echo $nama_guru; ?>';
                                    javascript:window.opener.document.getElementsById('id_guru').value = '<?php echo $row[id]; ?>'">
                                <td><?php echo $row[nip]; ?></td>
                                <td><?php echo $nama_guru; ?></td>
                            </tr>
                            <?php
                        }
                    }
                    else {
                        ?>
                        <?php
                        $strsql = "select id,nip,glr_depan,nama,glr_blk,aktif from guru where aktif='1' order by nip asc";
                        $hasil = mysql_query($strsql);
                        while ($row = mysql_fetch_array($hasil)) {
                            $NO++;
                            if ($NO % 2 == 1)
                                $warna = "";
                            else
                                $warna = "";
                            $nama_guru = $row[glr_depan] . " " . $row[nama] . " " . $row[glr_blk];
                            ?>
                            <tr bgcolor="<?php echo $warna; ?>" onmouseover="this.className = 'rowover';" onmouseout="this.className = 'rowselected-even';"
                                onClick="window.close();
                                    javascript:window.opener.document.getElementById('nip').value = '<?php echo $row[nip]; ?>';
                                    javascript:window.opener.document.getElementById('nama').value = '<?php echo $nama_guru; ?>';
                                    javascript:window.opener.document.getElementById('id_guru').value = '<?php echo $row[id]; ?>'">
                                <td><?php echo $row[nip]; ?></td>
                                <td><?php echo $nama_guru; ?></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>

