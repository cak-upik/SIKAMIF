<?php
include "../global/config.php";

$strsql = "select ID,NAMA,STATUS,NSS,NDS,ALAMAT,KECAMATAN,KABUPATEN,PROPINSI from profil";
$hasil = mysql_query($strsql);
$row = mysql_fetch_array($hasil);
?>
<html>
    <head>
        <title>Raport Mata Pelajaran</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link href="../bootstrap/css/bootstrap.css" rel="stylesheet"/>
        <link href="../bootstrap/css/bootstrap-responsive.css" rel="stylesheet"/>
        <link href="../bootstrap/css/style.css" rel="stylesheet"/>
        <script src="../bootstrap/js/jquery-1.7.2.min.js"></script>
        <script src="../bootstrap/js/bootstrap-dropdown.js"></script>
        <script language="JavaScript"  src="../global/jscript.js" type="text/javascript"></script>
        <script language="JavaScript"  src="../global/jscript_pop.js" type="text/javascript"></script>
        <script type="text/javascript" src="../bootstrap/js/jquery.js"></script>
        <script type="text/javascript" src="../bootstrap/js/styletable.jquery.plugin.js"></script>
        <script language="JavaScript">
            $(document).ready(function() {
                $('table').styleTable({
                    th_bgcolor: '#3E83C9',
                    th_color: '#ffffff',
                    th_border_color: '#333333',
                    tr_odd_bgcolor: '#ECF6FC',
                    tr_even_bgcolor: '#ffffff',
                    tr_border_color: '#95BCE2',
                    tr_hover_bgcolor: '#BCD4EC'
                });
            });
        </script>
        <style>
            body{
                padding: 10px;
            }
        </style>
    </head>

    <body>

        <div class="container-fluid">
            <div class="span20">

                <div class="container pull-left">  
                    <img src="../bootstrap/img/Logo bangkalan.JPG" width="120" height="110" class="brand">                 
                    <p class="brand"><?php echo $row['NAMA']; ?></p>
                    <?php echo $row['ALAMAT']; ?>
                    <hr/>
                </div>
            </div>
        </div>
    </body>
</html>