<?php

include "../global/config.php";
$semester = $_REQUEST['semester'];
$id_nilai = $_REQUEST['id_nilai'];
$nilai_teori = $_REQUEST['nilai_teori'];
$nilai_praktik = $_REQUEST['nilai_praktik'];
$nilai_sikap = $_REQUEST['nilai_sikap'];
$tahun_ajaran = $_REQUEST['tahun_ajaran'];
$key = $_REQUEST['key'];
$kategori = $_REQUEST['kategori'];
$id_matpel = $_REQUEST['id_matpel'];
$kelas_id = $_REQUEST['kelas_id'];

$pjg_array = count($id_matpel);
for ($k = 0; $k < $pjg_array; $k++) {
    $strsql = "update nilai_detil set nilai_teori='$nilai_teori[$k]',nilai_praktik='$nilai_praktik[$k]',nilai_sikap='$nilai_sikap[$k]' 
	where id_nilai='$id_nilai' and semester='$semester' and id_matpel='$id_matpel[$k]'";
    mysql_query($strsql);
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

header("location:input_nilai.php?tahun_ajaran=$tahun_ajaran&key=$key&kategori=$kategori&kelas_id=$kelas_id&semester=$semester");
?>