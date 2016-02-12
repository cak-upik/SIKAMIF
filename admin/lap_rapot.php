<?php
include "../global/config.php";
$kelas_id=$_REQUEST['kelas_id'];
$tahun_ajaran=$_REQUEST['tahun_ajaran'];
$kategori=$_REQUEST['kategori'];
$key=$_REQUEST['key'];
$semester=$_REQUEST['semester'];
$id=$_REQUEST['id'];
$nama=$_REQUEST['nama'];
$nis=$_REQUEST['nis'];
$ruang=$_REQUEST['ruang'];
?>
<html>
<head>
<title>Data Laporan Hasil Nilai Belajar</title>
<link rel="stylesheet" href="../global/style.css" type="text/css">
</head>
<body>
<?php
include "header_rpt_2.php";
require_once "../global/global_fungsi.php";
$strsql="SELECT siswa.NIS, siswa.NAMA_LENGKAP, kelas.RUANG, nilai_detil.SEMESTER, nilai.TAHUN_AJARAN, matpel.NAMA_MATPEL, matpel.SKM, nilai_detil.nilai_rata2, nilai_detil.nilai_raport, nilai_detil.keterangan, nilai.ID
FROM (kelas INNER JOIN (nilai INNER JOIN siswa ON nilai.NIS = siswa.NIS) ON kelas.ID = nilai.ID_KELAS) INNER JOIN (matpel INNER JOIN nilai_detil ON matpel.ID_MATPEL = nilai_detil.ID_MATPEL) ON nilai.ID = nilai_detil.ID_NILAI
WHERE (((nilai_detil.SEMESTER)='$semester') AND ((nilai.TAHUN_AJARAN)='$tahun_ajaran') AND matpel.TAHUN_AJARAN='$tahun_ajaran' AND ((nilai.ID)='$id'))";
$hasil=mysql_query($strsql);
$row=mysql_fetch_array($hasil);
?>
<table width="620" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr> 
    <td colspan="6" class="master_title" align="center">DAFTAR NILAI HASIL BELAJAR 
    </td>
  </tr>
  <tr> 
    <td width="100" class="tdtitle2">Nama Siswa</td>
    <td width="10" class="tdtitle2" align="center">:</td>
    <td width="200" class="text"><?php echo $nama; ?></td>
    <td width="100" class="tdtitle2">Semester</td>
    <td width="10" class="tdtitle2" align="center">:</td>
    <td width="200" class="text"><?php 
	if ($semester=='1')
	echo "GANJIL";
	else
	echo "GENAP";
	?></td>
  </tr>
  <tr> 
    <td class="tdtitle2">Nomor Induk</td>
    <td class="tdtitle2"><div align="center">:</div></td>
    <td class="text"><?php echo $nis; ?></td>
    <td class="tdtitle">Tahun Pelajaran</td>
    <td class="tdtitle"><div align="center">:</div></td>
    <td class="text"><?php echo $tahun_ajaran; ?></td>
  </tr>
  <tr> 
    <td class="tdtitle">Kelas</td>
    <td class="tdtitle"><div align="center">:</div></td>
    <td class="text"><?php echo $ruang; ?></td>
    <td class="tdtitle"><!--Wali Kelas--></td>
    <td class="tdtitle"><!--<div align="center">:</div>--></td>
    <td class="text"><?php //echo $row_wali[GLR_DEPAN]." ".$row_wali[NAMA]." ".$row_wali[GLR_BLK]; ?></td>
  </tr>
</table>
<table border="1" cellspacing="0" cellpadding="0" width="680" align="center">
  <tr bgcolor="#EFEFEF" class="tdtitle"> 
    <td width="30" rowspan="3" align="center" bgcolor="#EFEFEF">NO.</td>
    <td width="300" rowspan="3" align="center">MATA PELAJARAN</td>
    <td width="50" rowspan="3" align="center" bgcolor="#EFEFEF">KKM</td>
    <td width="300" height="25" colspan="3" align="center">NILAI HASIL BELAJAR</td>
  </tr>
  <tr class="tdtitle"> 
    <td width="100" align="center" bgcolor="#EFEFEF">PEMAHAMAN KONSEP</td>
    <td width="100" align="center" bgcolor="#EFEFEF">PRAKTIK</td>
    <td width="100" align="center" bgcolor="#EFEFEF">SIKAP</td>
  </tr>
  <tr class="tdtitle"> 
    <td height="25" align="center" bgcolor="#EFEFEF">NILAI</td>
    <td align="center" bgcolor="#EFEFEF">NILAI</td>
    <td align="center" bgcolor="#EFEFEF">PREDIKAT</td>
  </tr>
  <?php
 $hasil_nilai=mysql_query($strsql);
 while($row_nilai=mysql_fetch_array($hasil_nilai))
 {
 $NO++;
  ?>
  <tr class="text"> 
    <td align="center"><?php echo $NO."."; ?></td>
    <td bgcolor="<?php echo $warna; ?>">&nbsp;<?php echo $row_nilai[NAMA_MATPEL]; ?></td>
    <td align="center"><?php echo $row_nilai[SKM]; ?></td>
    <td height="20" align="center"><?php echo $row_nilai[nilai_rata2]; ?></td>
    <td align="center"> 
      <?php if ($row_nilai[NILAI_PRAKTIK]=='0') echo "&nbsp;"; else echo $row_nilai[nilai_raport]; ?>
    </td>
    <td align="center"><?php echo strtoupper($row_nilai[keterangan]); ?></td>
  </tr>
  <?php
  $jumlah_skm=$jumlah_skm+$row_nilai[SKM];
  $jumlah_nilai=$jumlah_nilai+$row_nilai[NILAI_TEORI];
}
mysql_free_result($hasil_nilai);
?>
  <tr class="text"> 
    <td colspan="2" align="center">Jumlah</td>
    <td align="center" class="text_login">&nbsp;<?php echo $jumlah_skm; ?></td>
    <td height="20" align="center" class="text_login">&nbsp;<?php echo $jumlah_nilai; ?></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  	<?php
	if ($NO<>'')
	{
	$rata_rata=$jumlah_nilai/$NO;
	$rata_skm=$jumlah_skm/$NO;
	}
	?>
  <tr class="text"> 
    <td colspan="2" align="center">Rata - rata</td>
    <td align="center" class="text_login"><?php null($rata_skm); ?></td>
    <td height="20" align="center" class="text_login"><?php null($rata_rata); ?></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
</table>
<?php
mysql_free_result($hasil);
?>
<table width="680" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr> 
    <td class="tdtitle">KEGIATAN EKSTRA KURIKULER</td>
  </tr>
</table>
<table width="680" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr bgcolor="#EFEFEF" class="tdtitle2"> 
    <td width="30" height="25" align="center">NO.</td>
    <td width="170" align="center">JENIS KEGIATAN</td>
    <td width="100" align="center">PREDIKAT</td>
    <td width="380" align="center">KETERANGAN</td>
  </tr>
  <?php
$nilai_ekstra=mysql_query("SELECT ekstra_kurikuler.ID as ID_EKSTRA, ekstra_kurikuler.JENIS_EKSTRA, ekstra_kurikuler.NILAI, ekstra_kurikuler.KETERANGAN
FROM (nilai INNER JOIN siswa ON nilai.NIS = siswa.NIS) INNER JOIN 
ekstra_kurikuler ON nilai.ID = ekstra_kurikuler.ID_NILAI where nilai.TAHUN_AJARAN='$tahun_ajaran' and nilai.ID='$id'");
  while($row_ekstra=mysql_fetch_array($nilai_ekstra))
  {
  $NO2++;
  ?>
  <tr class="text"> 
    <td align="center"><?php echo $NO2."."; ?></td>
    <td align="left">&nbsp;<?php echo $row_ekstra[JENIS_EKSTRA]; ?></td>
    <td align="center"><?php echo strtoupper($row_ekstra[NILAI]); ?></td>
    <td>&nbsp;<?php echo $row_ekstra[KETERANGAN]; ?></td>
  </tr>
	<?php
	}
	mysql_free_result($nilai_ekstra);
	?>
</table>
<table width="680" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr> 
    <td class="tdtitle">KETIDAK HADIRAN</td>
  </tr>
</table>
<?php
$strsql_hadir="SELECT ketidak_hadiran.IJIN, ketidak_hadiran.SAKIT, ketidak_hadiran.LAIN_LAIN, ketidak_hadiran.KETERANGAN_IJIN, ketidak_hadiran.KETERANGAN_SAKIT, ketidak_hadiran.KETERANGAN_LAIN
FROM ketidak_hadiran INNER JOIN nilai ON ketidak_hadiran.ID_NILAI = nilai.ID WHERE nilai.ID='$id' and ketidak_hadiran.SEMESTER='$semester' and nilai.TAHUN_AJARAN='$tahun_ajaran'";
$hasil_hadir=mysql_query($strsql_hadir);
$row_hadir=mysql_fetch_array($hasil_hadir);
?>
<table width="680" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr bgcolor="#EFEFEF" class="tdtitle2"> 
    <td width="30" height="25" align="center">NO.</td>
    <td width="170" align="center">ALASAN</td>
    <td width="100" align="center">LAMA</td>
    <td width="380" align="center">KETERANGAN</td>
  </tr>
  <tr class="text"> 
    <td align="center">1.</td>
    <td align="left">&nbsp;Ijin</td>
    <td align="center">&nbsp;<?php if ($row_hadir[IJIN]<>'0') echo $row_hadir[IJIN]; ?></td>
    <td>&nbsp;<?php echo $row_hadir[KETERANGAN_IJIN]; ?></td>
  </tr>
  <tr class="text"> 
    <td align="center">2.</td>
    <td>&nbsp;Sakit</td>
    <td align="center">&nbsp;<?php if ($row_hadir[SAKIT]<>'0') echo $row_hadir[SAKIT]; ?></td>
    <td>&nbsp;<?php echo $row_hadir[KETERANGAN_SAKIT]; ?></td>
  </tr>
  <tr class="text">
    <td class="text" align="center">3.</td>
    <td align="left">&nbsp;Lain - lain</td>
    <td align="center">&nbsp;<?php if ($row_hadir[LAIN_LAIN]<>'0') echo $row_hadir[LAIN_LAIN]; ?></td>
    <td>&nbsp;<?php echo $row_hadir[KETERANGAN_LAIN]; ?></td>
  </tr>
</table>
<?php
$strsql_kepribadian="SELECT kepribadian.KELAKUAN, kepribadian.KERAJINAN, kepribadian.KERAPIAN, kepribadian.KEBERSIHAN, kepribadian.SEMESTER, 
kepribadian.KETERANGAN_KELAKUAN, kepribadian.KETERANGAN_KERAJINAN, kepribadian.KETERANGAN_KERAPIAN, kepribadian.KETERANGAN_KEBERSIHAN
FROM kepribadian INNER JOIN nilai ON kepribadian.ID_NILAI = nilai.ID
WHERE nilai.ID='$id' and kepribadian.SEMESTER='$semester' and nilai.TAHUN_AJARAN='$tahun_ajaran'";
$hasil_kepribadian=mysql_query($strsql_kepribadian);
$row_kepribadian=mysql_fetch_array($hasil_kepribadian);
?>
<table width="680" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr> 
    <td class="tdtitle">KEPRIBADIAN</td>
  </tr>
</table>
<table width="680" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr bgcolor="#EFEFEF" class="tdtitle2"> 
    <td width="30" height="25" align="center">NO.</td>
    <td width="170" align="center">JENIS</td>
    <td width="100" align="center">PREDIKAT</td>
    <td width="380" align="center">KETERANGAN</td>
  </tr>
  <tr class="text"> 
    <td align="center">1.</td>
    <td>&nbsp;Kelakuan</td>
    <td align="center">&nbsp;<?php echo strtoupper($row_kepribadian[KELAKUAN]); ?></td>
    <td>&nbsp;<?php echo $row_kepribadian[KETERANGAN_KELAKUAN]; ?></td>
  </tr>
  <tr class="text"> 
    <td align="center">2.</td>
    <td>&nbsp;Kerajinan</td>
    <td align="center">&nbsp;<?php echo strtoupper($row_kepribadian[KERAJINAN]); ?></td>
    <td>&nbsp;<?php echo $row_kepribadian[KETERANGAN_KERAJINAN]; ?></td>
  </tr>
  <tr class="text"> 
    <td align="center">3.</td>
    <td>&nbsp;Kerapian</td>
    <td align="center">&nbsp;<?php echo strtoupper($row_kepribadian[KERAPIAN]); ?></td>
    <td>&nbsp;<?php echo $row_kepribadian[KETERANGAN_KERAPIAN]; ?></td>
  </tr>
  <tr class="text">
    <td align="center">4.</td>
    <td>&nbsp;Kebersihan</td>
    <td align="center">&nbsp;<?php echo strtoupper($row_kepribadian[KEBERSIHAN]); ?></td>
    <td>&nbsp;<?php echo $row_kepribadian[KETERANGAN_KEBERSIHAN]; ?></td>
  </tr>
</table>
<br>
<table width="680" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td class="text" align="center" width="300">Orang Tua / Wali Siswa</td>
    <td width="80">&nbsp;</td>
    <td class="text" align="center" width="300">Wali Kelas</td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?php
  $hasil_ortu=mysql_query("select nis,nama_wali from siswa where nis='$row[NIS]'");
  $row_ortu=mysql_fetch_array($hasil_ortu);
  ?>
  <tr> 
    <td align="center" class="text">( <?php echo strtoupper($row_ortu[nama_wali]); ?> 
      )</td>
    <td>&nbsp;</td>
    <?php
$strsql_wali="SELECT wali_kelas.ID, wali_kelas.TAHUN_AJARAN, guru.NIP, guru.GLR_DEPAN, guru.NAMA, guru.GLR_BLK, kelas.RUANG FROM 
kelas INNER JOIN (guru INNER JOIN wali_kelas ON guru.ID=wali_kelas.ID_GURU) ON kelas.ID=wali_kelas.ID_KELAS where 
wali_kelas.TAHUN_AJARAN='$tahun_ajaran' and kelas.ID='$kelas_id'";
$hasil_wali=mysql_query($strsql_wali);
$row_wali=mysql_fetch_array($hasil_wali);
?>
    <td align="center" class="text">( <?php echo strtoupper($row_wali[GLR_DEPAN]." ".$row_wali[NAMA]." ".$row_wali[GLR_BLK]); ?> 
      )</td>
  </tr>
  <tr>
    <td align="center" class="text">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center" class="text">NIP. <?php echo $row_wali[NIP]; ?></td>
  </tr>
</table>
</body>
</html>
