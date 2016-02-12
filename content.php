<?php
include_once "./global/config.php";

$strsql = "select * from profil";
$hasil = mysql_query($strsql);
$row = mysql_fetch_array($hasil);
?>
<div class="span20">
    <h2><?php echo $row['NAMA']; ?></h2>
    <p><?php echo $row['ABOUT']; ?></p>
</div>
