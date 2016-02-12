<?php
//include "../global/cek_session_admin.php";
include "../global/config.php";
$nis=$_REQUEST['nis'];
$strsql_cek="select * from siswa where nis='$nis'";
$hasil_cek=mysql_query($strsql_cek);
$cek_ok=mysql_num_rows($hasil_cek);

if (empty($nis))
{
echo "<script>alert('Anda belum memasukkan NIS'); document.location.href='grafik.php';</script>\n";
exit();
}
elseif ($cek_ok <> '1')
{
echo "<script>alert('NIS yang Anda masukkan tidak ada dalam Data Siswa'); document.location.href='grafik.php?nis=$nis';</script>\n";
exit();
}

header("location:grafik.php?act=ok&nis=$nis");
?>