<?php
session_start();
include "../global/cek_session_admin.php";

//include "../global/config.php";
$kelas_id = $_REQUEST['kelas_id'];
$tahun_ajaran = $_REQUEST['tahun_ajaran'];
?>
<html>
    <head>
        <title>Mata Pelajaran</title>
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
        <div class="span4">
            <div class="row-fluid">
                <table class="table-bordered">
                    <thead> 
                    <th>MATA PELAJARAN</th>
                    </thead>
                    <?php
                    $hasil_cek = mysql_query("select ID,RUANG,AKTIF from kelas where ID='$kelas_id'");
                    $row_cek = mysql_fetch_array($hasil_cek);
                    $temp = explode("-", $row_cek[RUANG]);
                    $str1 = $temp[0];
                    $str2 = $temp[1];
                    $str3 = $temp[2];

                    //BERI PENGECEKAN APAKAH KELAS 1 , 2 atau 3 [jurusan]
                    if ($str3 <> '') {
                        $strsql = "select ID_MATPEL,NAMA_MATPEL,KELAS,TAHUN_AJARAN from matpel where KELAS='$str1-$str2' and TAHUN_AJARAN='$tahun_ajaran'";
                    } else {
                        $strsql = "select ID_MATPEL,NAMA_MATPEL,KELAS,TAHUN_AJARAN from matpel where KELAS='$str1' and TAHUN_AJARAN='$tahun_ajaran'";
                    }

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
                    javascript:window.opener.document.forms[0].id_matpel.value = '<?php echo $row[ID_MATPEL]; ?>';
                    javascript:window.opener.document.forms[0].matpel.value = '<?php echo $row[NAMA_MATPEL]; ?>';"> 
                            <td><?php echo $row[NAMA_MATPEL]; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>

