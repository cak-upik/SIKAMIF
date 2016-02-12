<?php

session_start();
include "../global/cek_session_admin.php";
$query = mysql_query("select NIS,NAMA_LENGKAP from siswa where NIS = $_GET[kode]");

while ($row = mysql_fetch_array($query)) {
    echo "<input name='siswa' value='$row[NAMA_LENGKAP]' disabled>";
}
?>
