<?php
session_start();
include "../global/cek_session_admin.php";

$strsql = "select ID,NAMA,STATUS,NSS,NDS,ALAMAT,KECAMATAN,KABUPATEN,PROPINSI from profil";
$hasil = mysql_query($strsql);
$row = mysql_fetch_array($hasil);
?>
<div class="span10">
    <div class="hero-unit">
        <p>
        <h2>Tahap Pengembangan</h2>
        <i><font color="#FF6600">Mohon Maaf</font></i><br>
        Halaman ini Masih Dalam Tahap Pengembangan<br>
        </p>
    </div>
</div>

