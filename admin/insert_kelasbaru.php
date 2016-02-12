<?php
include "../global/config.php";
$tahun_ajaran=$_REQUEST['tahun_ajaran'];
$kelas_id=$_REQUEST['kelas_id'];
$kategori=$_REQUEST['kategori'];
$key=$_REQUEST['key'];
$tahun_ajaran2=$_REQUEST['tahun_ajaran2'];
$kelas_id2=$_REQUEST['kelas_id2'];
$kategori2=$_REQUEST['kategori2'];
$key2=$_REQUEST['key2'];
$nis=$_REQUEST['nis'];


	$pjg_array=count($nis);
    for ($k=0;$k<$pjg_array;$k++)
    {
	$hasil_cek=mysql_query("select id,tahun_ajaran,nis,id_kelas from nilai where tahun_ajaran='$tahun_ajaran2' and id_kelas='$kelas_id2' and nis='$nis[$k]'");
	$cek=mysql_num_rows($hasil_cek);
		if ($cek > '0')
		{
		echo "<script>alert('SISWA sudah Terdaftar'); document.location.href='kenaikan_kelas.php?tahun_ajaran=$tahun_ajaran&kelas_id=$kelas_id&tahun_ajaran2=$tahun_ajaran2&kelas_id2=$kelas_id2&key=$key&kategori=$kategori&key2=$key2&kategori2=$kategori2';</script>\n";
		exit();
		}
		else
		{
		$strsql="insert into nilai (tahun_ajaran,nis,id_kelas) values ('$tahun_ajaran2','$nis[$k]','$kelas_id2')";
		mysql_query($strsql);
		}
	}

header("location:kenaikan_kelas.php?tahun_ajaran=$tahun_ajaran&kelas_id=$kelas_id&tahun_ajaran2=$tahun_ajaran2&kelas_id2=$kelas_id2&key=$key&kategori=$kategori&key2=$key2&kategori2=$kategori2");
?>