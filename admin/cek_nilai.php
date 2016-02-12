<?php

require_once "fungsi_lanjutan.php";
$tahun_ajaran = $_REQUEST['tahun_ajaran'];
$kelas_id = $_REQUEST['kelas_id'];
$act = $_REQUEST['act'];
$nis = $_REQUEST['nis'];
$nama = $_REQUEST['nama'];
$id = $_REQUEST['id'];
$kategori = $_REQUEST['kategori'];
$key = $_REQUEST['key'];
$semester = $_REQUEST['semester'];

header("location:input_nilai.php?act=detil_isi&tahun_ajaran=$tahun_ajaran&semester=$semester&id=$id&kelas_id=$kelas_id&key=$key&kategori=$kategori");
?>