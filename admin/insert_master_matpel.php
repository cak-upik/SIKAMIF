<?php

include "../global/config.php";
$matpel = $_REQUEST['matpel'];
$kls = $_REQUEST['kls'];
$tahun = $_REQUEST['thn_ajaran'];
$strsql = "insert into matpel (nama_matpel,kelas,tahun_ajaran) values ('$matpel','$kls','$tahun')";

if (empty($matpel)) {
    echo "<script>alert('ANDA BELUM MEMASUKKAN NAMA MATA PELAJARAN'); document.location.href='matpel.php?act=tambah';</script>\n";
    exit();
} else {
    $hasil = mysql_query($strsql);
}

if ($hasil) {
    echo "<script>alert('NAMA MATA PELAJARAN $matpel BERHASIL DITAMBAH'); document.location.href='manageMatpel.php';</script>\n";
//    header("location:matpel.php?act=tambah");
} else {
    echo "<script>alert('NAMA MATA PELAJARAN $matpel SUDAH ADA'); document.location.href='manageMatpel.php';</script>\n";
    exit();
}
?>
