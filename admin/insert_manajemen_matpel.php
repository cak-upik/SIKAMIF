<?php

include "../global/config.php";
$matpel = $_REQUEST['matpel'];
$kls = $_REQUEST['kls'];
$tahun = $_REQUEST['thn_ajaran'];
$id_guru = $_REQUEST['id_guru'];
$id_matpel = $_REQUEST['id_matpel'];
$nip = $_REQUEST['nip'];
$nama = $_REQUEST['nama'];
$strsql = "UPDATE `matpel` SET `ID_GURU` = '$id_guru' WHERE `matpel`.`ID_MATPEL` ='$id_matpel' LIMIT 1";

if (empty($matpel)) {
    echo "<script>alert('ANDA BELUM MEMASUKKAN NAMA MATA PELAJARAN'); document.location.href='matpel.php?act=tambah';</script>\n";
    exit();
} else {
    $hasil = mysql_query($strsql);
}

if ($hasil) {
    echo "<script>alert('DATA GURU MATA PELAJARAN $matpel BERHASIL DITAMBAH'); document.location.href='manageMatpel.php?kelas=$kls&tahun=$tahun';</script>\n";
//    header("location:matpel.php?act=tambah");
} else {
    echo "<script>alert('DATA GURU MATA PELAJARAN $matpel SUDAH ADA'); document.location.href='matpel.php?act=tambah';</script>\n";
    exit();
}
?>