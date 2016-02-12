<?php

include "../global/config.php";
$matpel = $_REQUEST['matpel'];
$kls = $_REQUEST['kls'];
$tahun = $_REQUEST['thn'];
$id = $_REQUEST['id'];
$strsql = "delete from matpel where id_matpel='$id'";
$hasil = mysql_query($strsql);

if ($hasil) {
    echo "<script>alert('NAMA MATA PELAJARAN $matpel TELAH DIHAPUS'); document.location.href='matpel.php?kelas=$kls&tahun=$tahun';</script>\n";
    exit();
} else {
    echo "<script>alert('NAMA MATA PELAJARAN $matpel GAGAL DIHAPUS'); document.location.href='matpel.php?act=edit&id=$id';</script>\n";
    exit();
}
?>
