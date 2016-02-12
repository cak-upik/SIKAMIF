<?php

include "../global/config.php";
$semester = $_REQUEST['semester'];
$id_nilai = $_REQUEST['id_nilai'];
$kd1 = $_REQUEST['nilai_kd1'];
$kd2 = $_REQUEST['nilai_kd2'];
$kd3 = $_REQUEST['nilai_kd3'];
$kd4 = $_REQUEST['nilai_kd4'];
$rata2 = $_REQUEST['nilai_rata2'];
$nilai_uts = $_REQUEST['nilai_uts'];
$nilai_uas = $_REQUEST['nilai_uas'];
$nilai_rpt = $_REQUEST['nilai_rpt'];
$catatan = $_REQUEST['ket'];
$tahun_ajaran = $_REQUEST['tahun_ajaran'];
$key = $_REQUEST['key'];
$kategori = $_REQUEST['kategori'];
$id_matpel = $_REQUEST['id_matpel'];
$kelas_id = $_REQUEST['kelas_id'];
$pjg_array = count($id_matpel);
for ($k = 0; $k < $pjg_array; $k++) {
//      echo "SEMESTER: $semester";
//      echo "<br>";
//      echo "ID_NILAI: $id_nilai";
//      echo "<br>";
//      echo "<br>NILAI UL1: $kd1";
//      echo "<br>";
//      echo "NILAI UL2: $kd2[$k]";
//      echo "<br>";
//      echo "NILAI RATA2: $rata2[$k]";
//      echo "<br>";
//      echo "NILAI UTS: $nilai_uts[$k]";
//      echo "<br>";
//      echo "NILAI UAS: $nilai_uas[$k]";
//      echo "<br>";
//      echo "NILAI SIKAP: $nilai_sikap[$k]";
//      echo "<br>";
//      echo "TAHUN AJARAN: $tahun_ajaran";
//      echo "<br>";
//      echo "KEY: $key";
//      echo "<br>";
//      echo "KATEGORI: $kategori";
//      echo "<br>";
//      echo "ID_MATPEL: $id_matpel[$k]";
//      echo "<br>";
//      echo "KELAS_ID: $kelas_id";
//      echo "<br><br><br>";
     
    $strsql = "insert into nilai_detil (id_nilai,id_matpel,semester,nilai_kd1,nilai_kd2,nilai_kd3,nilai_kd4,nilai_rata2,nilai_uts,nilai_uas,nilai_raport,keterangan) values
	('$id_nilai','$id_matpel[$k]','$semester','$kd1[$k]','$kd2[$k]','$kd3[$k]','$kd4[$k]','$rata2[$k]','$nilai_uts[$k]','$nilai_uas[$k]','$nilai_rpt[$k]','$catatan[$k]')";
    $result = mysql_query($strsql);
}
if($result) {
    echo "<script>alert('Data Berhasil Disimpan');window.location='input_nilai.php?tahun_ajaran=$tahun_ajaran&kelas_id=$kelas_id&key=$key&kategori=$kategori&semester=$semester';</script>";
}else {
    echo "<script>alert('Data Gagal Disimpan');history.go(-1)</script>";
}

//header("location:input_nilai.php?tahun_ajaran=$tahun_ajaran&key=$key&kategori=$kategori&kelas_id=$kelas_id&semester=$semester");
?>