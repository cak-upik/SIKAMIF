<?php
include "../global/cek_session_siswa.php";
session_start();
$strsql = "select * from profil";
$hasil = mysql_query($strsql);
$row = mysql_fetch_array($hasil);
?>
<div class="span9">
    <div class="hero-unit">
        <p>
        <h2>Anda Telah Berada di Halaman Administrator</h2>
        <i><font color="#FF6600">Sistem Informasi Akademik <?php echo $row['NAMA']; ?></font></i><br>
        Untuk Menjaga Keamanan Data, Silahkan Anda klik LogOut untuk Keluar<br>
        </p>
    </div>
</div>
