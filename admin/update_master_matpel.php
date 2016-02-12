<?php

include "../global/config.php";
$matpel = $_REQUEST['matpel'];
$kls = $_REQUEST['kls'];
$tahun = $_REQUEST['thn_ajaran'];
$id = $_REQUEST['id'];
$strsql = "update matpel set nama_matpel='$matpel',kelas='$kls',tahun_ajaran='$tahun' where id_matpel='$id'";

if (empty($matpel)) {
    echo "<script>alert('Anda belum memasukkan NAMA MATA PELAJARAN'); document.location.href='matpel.php?act=edit&id=$id';</script>\n";
    exit();
} else {
    $hasil = mysql_query($strsql);
}

if ($hasil) {
    echo "<script>alert('NAMA MATA PELAJARAN $matpel TELAH DIPERBARUHI'); document.location.href='matpel.php?kelas=$kls&tahun=$tahun';</script>\n";
//    header("location:matpel.php");
} else {
    echo "<script>alert('NAMA MATA PELAJARAN $matpel yang Anda masukkan sudah ada'); document.location.href='matpel.php?act=edit&id=$id';</script>\n";
    exit();
}
?>