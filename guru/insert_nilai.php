<?php
include "../global/config.php";
$semester=$_REQUEST['semester'];
$id_nilai=$_REQUEST['id_nilai'];
$nilai_teori=$_REQUEST['nilai_teori'];
$nilai_praktik=$_REQUEST['nilai_praktik'];
$nilai_sikap=$_REQUEST['nilai_sikap'];
$tahun_ajaran=$_REQUEST['tahun_ajaran'];
$key=$_REQUEST['key'];
$kategori=$_REQUEST['kategori'];
$id_matpel=$_REQUEST['id_matpel'];
$kelas_id=$_REQUEST['kelas_id'];

	$pjg_array=count($id_matpel);
    for ($k=0;$k<$pjg_array;$k++)
    {
	$strsql="insert into nilai_detil (id_nilai,id_matpel,semester,nilai_teori,nilai_praktik,nilai_sikap) values
	('$id_nilai','$id_matpel[$k]','$semester','$nilai_teori[$k]','$nilai_praktik[$k]','$nilai_sikap[$k]')"; 
	mysql_query($strsql);    
	}
	
header("location:input_nilai.php?tahun_ajaran=$tahun_ajaran&key=$key&kategori=$kategori&kelas_id=$kelas_id&semester=$semester");
?>