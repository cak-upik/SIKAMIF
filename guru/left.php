<?php
include "../global/cek_session_wali_kelas.php";
//include "../global/config.php";

//echo $nameuser;
$hasil_ta = mysql_query("select tahun_ajaran from tahun_ajaran order by tahun_ajaran desc limit 0,1");
$row_ta = mysql_fetch_array($hasil_ta);

$hasil_kelas = mysql_query("select id,ruang,aktif from kelas where aktif='1' order by ruang asc limit 0,1");
$row_kelas = mysql_fetch_array($hasil_kelas);

$hasil_ta2 = mysql_query("select tahun_ajaran from tahun_ajaran order by tahun_ajaran desc limit 1,1");
$row_ta2 = mysql_fetch_array($hasil_ta2);
?>
<div class="span2">
    <div class="well sidebar-nav">
        <ul class="nav nav-list">
            <li class="nav-header">Menu</li>
            <li><a href="data_pribadi.php">Data Pribadi</a></li>
            <li><a href="jadwal_mengajar.php?tahun_ajaran=<?php echo $row_ta[tahun_ajaran]; ?>&hari=SENIN&kelas_id=<?php echo $row_kelas[id]; ?>">Jadwal Mengajar</a></li>
            <li><a href="input_nilai.php?tahun_ajaran=<?php echo $row_ta[tahun_ajaran]; ?>&kelas_id=<?php echo $row_kelas[id]; ?>&semester=1">Input Nilai</a></li>
                    
            <?php
            $strsql_cek_wali = "select nip from guru,wali_kelas where guru.id=wali_kelas.id_guru and nip='$_SESSION[username]'";
            $hasil_cek_wali = mysql_query($strsql_cek_wali);
            $cek_wali = mysql_num_rows($hasil_cek_wali);

            if ($cek_wali > '0') {
                ?>

                <?php
            }
            ?>
        </ul>
    </div>
</div>