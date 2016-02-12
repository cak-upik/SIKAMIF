<?php
include "../global/config.php";

$strsql = "select * from profil";
$hasil = mysql_query($strsql);
$row = mysql_fetch_array($hasil);
?>
<div style="text-align: center">
    <img src="../bootstrap/img/logo.png" width="150" height="100">
    <h3>Sistem Informasi Managemen <?php echo $row['NAMA']; ?></h3>
    <p class="brand"><?php
        echo $row['ALAMAT'];
        echo "  " . $row['KABUPATEN'];
        echo "  " . $row['PROPINSI'];
        ?></p>
</div>