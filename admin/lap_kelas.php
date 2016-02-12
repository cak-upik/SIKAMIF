<?php
include "../global/config.php";
$kelas_id=$_REQUEST['kelas_id'];
$tahun_ajaran=$_REQUEST['tahun_ajaran'];
?>
<html>
    <head>
        <title>Data Laporan Siswa Kelas</title>
        <link rel="stylesheet" href="../global/style.css" type="text/css">
    </head>
    <body>
        <?php
        include "header_rpt_2.php";
        require_once "../global/global_fungsi.php";
        $strsql = "SELECT nilai.ID, siswa.NIS, siswa.NAMA_LENGKAP, kelas.RUANG
FROM kelas INNER JOIN (siswa INNER JOIN nilai ON siswa.NIS = nilai.NIS) ON kelas.ID = nilai.ID_KELAS
where nilai.TAHUN_AJARAN='$tahun_ajaran' AND kelas.ID='$kelas_id'
order by siswa.NIS";
        $hasil=mysql_query($strsql);
        $row=mysql_fetch_array($hasil);
        ?>
        <table width="620" border="0" align="center" cellpadding="2" cellspacing="2">
            <tr>
                <td colspan="6" class="master_title" align="center">DAFTAR SISWA PER KELAS</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td width="100" class="tdtitle2">Tahun Ajaran</td>
                <td width="10" class="tdtitle2" align="center">:</td>
                <td width="200" class="text"><?php echo $tahun_ajaran; ?></td>
                <td width="100" class="tdtitle2">Kelas</td>
                <td width="10" class="tdtitle2" align="center">:</td>
                <td width="200" class="text"><?php echo $row[RUANG]; ?></td>
            </tr>
        </table>
        <table border="1" cellspacing="0" cellpadding="0" width="680" align="center">
            <tr bgcolor="#EFEFEF" class="tdtitle">
                <td width="30" height="20" rowspan="1" align="center" bgcolor="#EFEFEF">NO.</td>
                <td width="150" height="20" rowspan="1" align="center">NIS</td>
                <td width="300" height="20" rowspan="1" align="center" bgcolor="#EFEFEF">Nama Siswa</td>
            </tr>
            <?php
            $hasil_nilai=mysql_query($strsql);
            while($row_nilai=mysql_fetch_array($hasil_nilai)) {
                $NO++;
                ?>
            <tr class="text">
                <td width="30" height="20" rowspan="1" align="center"><?php echo $NO."."; ?></td>
                <td width="30" height="20" rowspan="1" align="center" bgcolor="<?php echo $warna; ?>">&nbsp;<?php echo $row_nilai[NIS]; ?></td>
                <td width="30" height="20" rowspan="1" align="center"><?php echo $row_nilai[NAMA_LENGKAP]; ?></td>
            </tr>
    <?php
            }
            mysql_free_result($hasil_nilai);
            ?>
        </table>
    </body>
</html>
