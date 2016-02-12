<?php

session_start();
session_destroy();
echo "<script>alert('Logout Sukses.'); parent.location='../index.php';</script>\n";
exit();
?>
