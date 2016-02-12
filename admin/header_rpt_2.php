<?php
include "../global/config.php";

$strsql = "select ID,NAMA,STATUS,NSS,NDS,ALAMAT,KECAMATAN,KABUPATEN,PROPINSI from profil";
$hasil = mysql_query($strsql);
$row = mysql_fetch_array($hasil);
?>
<html>
<title></title>
<link rel="stylesheet" href="../global/style.css" type="text/css">

<body>
<center>
<table width="680" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td width="64" height="23"><div align="center"><img src="../bootstrap/img/Logo bangkalan.JPG" width="81" height="82"></div></td>
    <td width="616" class="title_rpt">Sistem Informasi Akademik <?php echo $row['NAMA']; ?></td>
  </tr>
  <tr> 
    <td colspan="2" height="10" valign="bottom"><img src="images/garis.jpg" width="680" height="1"></td>
  </tr>
  <tr> 
    <td colspan="2" height="5" valign="middle"><img src="../admin/images/garis.jpg" width="680" height="3"></td>
  </tr>
</table>
</center>
</body>
</html>