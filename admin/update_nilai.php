<?php
include "../global/config.php";
$semester=$_REQUEST['semester'];
$id_nilai=$_REQUEST['id_nilai'];
$nilai_kd1=$_REQUEST['nilai_kd1'];
$nilai_kd2=$_REQUEST['nilai_kd2'];
$nilai_kd3=$_REQUEST['nilai_kd3'];
$nilai_kd4=$_REQUEST['nilai_kd4'];
$nilai_rata=$_REQUEST['nilai_rata'];
$nilai_raport=$_REQUEST['nilai_rpt'];
$nilai_uts=$_REQUEST['nilai_uts'];
$nilai_uas=$_REQUEST['nilai_uas'];
$cat=$_REQUEST['ket'];
$tahun_ajaran=$_REQUEST['tahun_ajaran'];
$key=$_REQUEST['key'];
$kategori=$_REQUEST['kategori'];
$id_matpel=$_REQUEST['id_matpel'];
$kelas_id=$_REQUEST['kelas_id'];
$valUts = $_REQUEST['uts'];
$valUas = $_REQUEST['uas'];

	$pjg_array=count($id_matpel);
    for ($k=0;$k<$pjg_array;$k++)
    {
	$strsql="update nilai_detil set nilai_kd1='$nilai_kd1[$k]',nilai_kd2='$nilai_kd2[$k]',nilai_kd3='$nilai_kd3[$k]',nilai_kd4='$nilai_kd4[$k]',nilai_rata2='$nilai_rata[$k]',nilai_uts='$nilai_uts[$k]',nilai_uas='$nilai_uas[$k]',nilai_raport='$nilai_raport[$k]',keterangan='$cat[$k]' where id_nilai='$id_nilai' and semester='$semester' and id_matpel='$id_matpel[$k]'";
	$hasil = mysql_query($strsql);

	/*
	echo $nilai_teori[$k];
	echo "<br>";
	echo $nilai_praktik[$k];
	echo "<br>";
	echo $nilai_sikap[$k];
	echo "<br>";
	echo $id_matpel[$k];
	*/
	}
        if($hasil) {
            echo "<script>alert('Data Berhasil Disimpan');</script>";
            echo "<script>window.location='input_nilai.php?tahun_ajaran=".$tahun_ajaran."&kelas_id=".$kelas_id."&key=".$key."&kategori=".$kategori."&semester=".$semester."'</script>";
        }else {
            echo "<script>alert('Data Gagal Disimpan');</script>";
        }
	
//header("location:input_nilai.php?tahun_ajaran=$tahun_ajaran&key=$key&kategori=$kategori&kelas_id=$kelas_id&semester=$semester");
?>