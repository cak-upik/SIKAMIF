<?php
//include "global/cek_session_admin.php";
include "../global/config.php";

$kelas=$_REQUEST['kelas'];
$skm=$_REQUEST['skm'];
$nama_matpel=$_REQUEST['nama_matpel'];
$matpel_id=$_REQUEST['matpel_id'];
$tahun_ajaran=$_REQUEST['tahun_ajaran'];

if (empty($skm))
{
echo "<script>alert('Anda belum memasukkan SKBM'); document.location.href='data_matpel.php?act=edit&matpel_id=$matpel_id&kelas=$kelas&tahun_ajaran=$tahun_ajaran';</script>\n";
exit();
}
else
{
$strsql="update matpel set skm='$skm' where id_matpel='$matpel_id'";
mysql_query($strsql);
header("location:data_matpel.php?kelas=$kelas&tahun_ajaran=$tahun_ajaran");
}
?>