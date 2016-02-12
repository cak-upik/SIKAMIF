<?php
include "../global/cek_session_wali_kelas.php";
include "../global/config.php";
$kelas_id = $_REQUEST['kelas_id'];
$tahun_ajaran = $_REQUEST['tahun_ajaran'];
$hari = $_REQUEST['hari'];
?>
<html>
    <head>
        <title>Data Jadwal Pelajaran</title>
        <link rel="stylesheet" href="../global/style.css" type="text/css">
    </head>
    <body>
        <?php
        include "header_rpt.php";
        ?>
        <br><br>
        <table width="500" border="0" align="center" cellpadding="1" cellspacing="1">
            <tr> 
                <td align="center" class="master_title"> JADWAL PELAJARAN</td>
            </tr>
            <tr> 
                <td align="center" class="tdtitle"><div align="left">TAHUN AJARAN: <?php echo $tahun_ajaran; ?></div></td>
            </tr>
            <?php
            $hasil_guru = mysql_query("SELECT guru.NIP, guru.GLR_DEPAN, guru.NAMA, guru.GLR_BLK, kelas.RUANG
  FROM kelas INNER JOIN (guru INNER JOIN jadwal ON guru.ID = jadwal.ID_GURU) ON kelas.ID = jadwal.ID_KELAS and guru.NIP='0728176601' and kelas.ID='$kelas_id'");
            $row_guru = mysql_fetch_array($hasil_guru);
            $nama_pengajar = $row_guru[GLR_DEPAN] . " " . $row_guru[NAMA] . " " . $row_guru[GLR_BLK];
            ?>
            <tr> 
                <td align="center" class="tdtitle"><div align="left">KELAS: <?php echo $row_guru[RUANG]; ?></div></td>
            </tr>
            <tr> 
                <td align="center" class="tdtitle"><div align="left">NAMA PENGAJAR: <?php echo $nama_pengajar; ?></div></td>
            </tr>
        </table>
        <table width="540" border="1" align="center" cellpadding="0" cellspacing="0">
            <tr bgcolor="#999999"> 
                <td height="20" colspan="4" align="center" class="tdtitle"><u><font color="#FFFFFF">HARI: <?php echo $hari; ?>
                </font></u></td>
    </tr>
    <tr> 
        <td width="400" bgcolor="#EFEFEF" class="tdtitle" align="center">MATA PELAJARAN</td>
        <td width="60" bgcolor="#EFEFEF" class="tdtitle" align="center">WAKTU</td>
        <td width="80" bgcolor="#EFEFEF" class="tdtitle"> <div align="center">JAM</div></td>
    </tr>
    <?php
    $strsql = "SELECT jadwal.ID_JADWAL, guru.NIP, guru.GLR_DEPAN, guru.NAMA, guru.GLR_BLK, matpel.NAMA_MATPEL, jadwal.HARI, jadwal.JAM, jadwal.WAKTU, jadwal.TAHUN_AJARAN, kelas.ID
FROM kelas INNER JOIN (matpel INNER JOIN (guru INNER JOIN jadwal ON guru.ID = jadwal.ID_GURU) ON matpel.ID_MATPEL = jadwal.ID_MATPEL) ON kelas.ID = jadwal.ID_KELAS
where jadwal.TAHUN_AJARAN='$tahun_ajaran' and jadwal.HARI='$hari' and kelas.ID='$kelas_id' and guru.NIP='$_SESSION[username]'";
    $hasil = mysql_query($strsql);
    while ($row = mysql_fetch_array($hasil)) {
        ?>
        <tr> 
            <td class="text">&nbsp;<?php echo $row[NAMA_MATPEL]; ?></td>
            <td align="center" class="text"><?php echo $row[JAM]; ?> Jam</td>
            <td align="center" class="text"><?php echo $row[WAKTU]; ?></td>
        </tr>
        <?php
    }
    mysql_free_result($hasil);
    ?>
</table>
</body>
</html>
