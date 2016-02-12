<?php
//include "global/cek_session_admin.php";

include "../global/config.php";
$jurusan = $_REQUEST['jurusan'];
?>
<html>
    <head>
        <title>Siswa Jurusan</title>
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
        <!-- Content -->  
        <div class="span9">
            <div class="row-fluid">
                <table class="table-bordered">
                    <thead> 
                        <th>NIS</th>
                        <th>NAMA</th>
                    </thead>
                    <?php
                    $strsql = "SELECT siswa.nis, siswa.nama_lengkap, kelas.ruang
FROM kelas INNER JOIN (siswa INNER JOIN nilai ON siswa.nis = nilai.nis) ON kelas.id = nilai.id_kelas where RUANG like '%$jurusan%' 
AND siswa.aktif='1' order by nis asc";
                    $hasil = mysql_query($strsql);
                    while ($row = mysql_fetch_array($hasil)) {
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
                            <td><?php echo $row[nis]; ?></td>
                            <td><?php echo $row[nama_lengkap]; ?></td>
                        </tr>
                        <?php
                    }
                    mysql_free_result($hasil);
                    ?>
                </table>
            </div>
        </div>
        <!-- end content -->

    </body>
</html>
