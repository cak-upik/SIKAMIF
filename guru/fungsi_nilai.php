<?php
include "../global/config.php";
?>
<html>
    <head>
        <title>Untitled Document</title>
        <link rel="stylesheet" href="../global/style.css" type="text/css">
        <script language="JavaScript"  src="../global/jscript.js" type="text/javascript"></script>
        <script language="JavaScript"  src="../global/jscript_pop.js" type="text/javascript"></script>
    </head>

    <body>
        <?php
############################## ISI NILAI2 #################################

        function isi_nilai2($tahun_ajaran, $kelas_id, $id, $key, $kategori, $semester) {
            $strsql = "SELECT nilai.ID, siswa.NIS, siswa.NAMA_LENGKAP, kelas.RUANG
FROM kelas INNER JOIN (siswa INNER JOIN nilai ON siswa.NIS = nilai.NIS) ON kelas.ID = nilai.ID_KELAS 
where nilai.TAHUN_AJARAN='$tahun_ajaran' AND kelas.ID='$kelas_id' and nilai.ID='$id'";
            $hasil = mysql_query($strsql);
            $row = mysql_fetch_array($hasil);

            $hasil_wali = mysql_query("SELECT wali_kelas.ID, wali_kelas.TAHUN_AJARAN, guru.NIP, guru.GLR_DEPAN, guru.NAMA, guru.GLR_BLK, kelas.RUANG
FROM kelas INNER JOIN (guru INNER JOIN wali_kelas ON guru.ID = wali_kelas.ID_GURU) ON kelas.ID = wali_kelas.ID_KELAS
where wali_kelas.TAHUN_AJARAN='$tahun_ajaran' and kelas.id='$kelas_id' order by kelas.RUANG");
            $row_wali = mysql_fetch_array($hasil_wali);
            $wali = $row_wali[GLR_DEPAN] . " " . $row_wali[NAMA] . " " . $row_wali[GLR_BLK];

//parsing
            $temp = explode("-", $row[RUANG]);
            $str1 = $temp[0];
            $str2 = $temp[1];
            $str3 = $temp[2];
            ?>
            <table width="630" border="0" cellspacing="1" cellpadding="1">
                <tr> 
                    <td class="tdtitle" width="100">NIS</td>
                    <td class="tdtitle" align="center" width="10">:</td>
                    <td width="200" class="text"><?php echo $row[NIS]; ?></td>
                    <td width="10">&nbsp;</td>
                    <td class="tdtitle" width="100">SEMESTER</td>
                    <td class="tdtitle" width="10"><div align="center">:</div></td>
                    <td width="200" class="text">
                        <?php
                        if ($semester == '1') {
                            echo "GANJIL";
                        } else {
                            echo "GENAP";
                        }
                        ?>
                    </td>
                </tr>
                <tr> 
                    <td class="tdtitle">NAMA SISWA</td>
                    <td class="tdtitle"><div align="center">:</div></td>
                    <td class="text"><?php echo $row[NAMA_LENGKAP]; ?></td>
                    <td>&nbsp;</td>
                    <td class="tdtitle">TAHUN AJARAN</td>
                    <td class="tdtitle"><div align="center">:</div></td>
                    <td class="text"><?php echo $tahun_ajaran; ?></td>
                </tr>
                <tr> 
                    <td class="tdtitle">KELAS</td>
                    <td class="tdtitle"><div align="center">:</div></td>
                    <td class="text"><?php echo $row[RUANG]; ?></td>
                    <td>&nbsp;</td>
                    <td class="tdtitle">WALI KELAS</td>
                    <td class="tdtitle"><div align="center">:</div></td>
                    <td class="text"><?php echo $wali; ?></td>
                </tr>
                <tr>
                    <td class="tdtitle"></td>
                    <td class="tdtitle"></td>
                    <td class="text"></td>
                    <td></td>
                    <td class="tdtitle"></td>
                    <td class="tdtitle"></td>
                    <td class="text" height="10"></td>
                </tr>
            </table>
            <table border="0" cellspacing="2" cellpadding="2" width="680" class="box2_000000">
                <?php
//pengecekan apakah input baru atau data sudah ada
                $hasil_cek = mysql_query("select id_nilai,semester from nilai_detil where id_nilai='$id' and semester='$semester'");
                $cek = mysql_num_rows($hasil_cek);
                if ($cek == '0') {
                    ?>
                    <form name="frm_isi_nilai" method="post" action="insert_nilai.php">
                        <input type="hidden" name="semester" value="<?php echo $semester; ?>">
                        <input type="hidden" name="id_nilai" value="<?php echo $id; ?>">
                        <input type="hidden" name="tahun_ajaran" value="<?php echo $tahun_ajaran; ?>">
                        <input type="hidden" name="kelas_id" value="<?php echo $kelas_id; ?>">
                        <input type="hidden" name="key" value="<?php echo $key; ?>">
                        <input type="hidden" name="kategori" value="<?php echo $kategori; ?>">
                        <tr class="tdtitle"> 
                            <td width="30" rowspan="3" align="center" bgcolor="CEDB4A">NO.</td>
                            <td width="300" rowspan="3" align="center" bgcolor="CEDB4A">MATA PELAJARAN</td>
                            <td width="50" rowspan="3" align="center" bgcolor="CEDB4A">SKBM</td>
                            <td width="300" height="25" colspan="3" align="center" bgcolor="CEDB4A">NILAI 
                                HASIL BELAJAR</td>
                        </tr>
                        <tr class="tdtitle"> 
                            <td width="100" align="center" bgcolor="CEDB4A">PEMAHAMAN KONSEP</td>
                            <td width="100" align="center" bgcolor="CEDB4A">PRAKTIK</td>
                            <td width="100" align="center" bgcolor="CEDB4A">SIKAP</td>
                        </tr>
                        <tr class="tdtitle"> 
                            <td height="25" align="center" bgcolor="CEDB4A">NILAI</td>
                            <td align="center" bgcolor="CEDB4A">NILAI</td>
                            <td align="center" bgcolor="CEDB4A">PREDIKAT</td>
                        </tr>
                        <?php
                        //BERI PENGECEKAN APAKAH KELAS 1 , 2 atau 3 [jurusan]
                        /*
                          if ($str3<>'')
                          {
                          $strsql_nilai="SELECT matpel.ID_MATPEL, matpel.NAMA_MATPEL, matpel.SKM, nilai_detil.NILAI_TEORI, nilai_detil.NILAI_PRAKTIK,
                          nilai_detil.NILAI_SIKAP
                          FROM matpel LEFT JOIN (nilai INNER JOIN nilai_detil ON
                          nilai.ID = nilai_detil.ID_NILAI) ON matpel.ID_MATPEL = nilai_detil.ID_MATPEL
                          WHERE matpel.KELAS='$str1-$str2' and nilai_detil.semester='$semester' order by matpel.ID_MATPEL";
                          }
                          else
                          {
                          $strsql_nilai="SELECT matpel.ID_MATPEL, matpel.NAMA_MATPEL, matpel.SKM, nilai_detil.NILAI_TEORI, nilai_detil.NILAI_PRAKTIK,
                          nilai_detil.NILAI_SIKAP
                          FROM matpel LEFT JOIN (nilai INNER JOIN nilai_detil ON
                          nilai.ID = nilai_detil.ID_NILAI) ON matpel.ID_MATPEL = nilai_detil.ID_MATPEL
                          WHERE matpel.KELAS='$str1' and nilai_detil.semester='$semester' order by matpel.ID_MATPEL";
                          }
                         */
                        if ($str3 <> '') {
                            $strsql_nilai = "select id_matpel,nama_matpel,skm,kelas from matpel where kelas='$str1-$str2' order by id_matpel";
                        } else {
                            $strsql_nilai = "select id_matpel,nama_matpel,skm,kelas from matpel where kelas='$str1' order by id_matpel";
                        }
                        $hasil_nilai = mysql_query($strsql_nilai);
                        while ($row_nilai = mysql_fetch_array($hasil_nilai)) {
                            $NO++;
                            if ($NO % 2 == 1)
                                $warna = "EFEB94";
                            else
                                $warna = "F7F38C";
                            ?>
                            <input type="hidden" name="id_matpel[]" value="<?php echo $row_nilai[id_matpel]; ?>">
                            <tr class="text" bgcolor="<?php echo $warna; ?>">
                                <td align="center"><?php echo $NO . "."; ?></td>
                                <td>&nbsp;<?php echo $row_nilai[nama_matpel]; ?></td>
                                <td align="center"><?php echo $row_nilai[skm]; ?></td>
                                <td height="25" align="center"><input name="nilai_teori[]" type="text" class="inputlogin" onSelect="formatangka(this);" onkeyup="formatangka(this);" size="5" maxlength="3" style="text-align:center"></td>
                                <td align="center"><input name="nilai_praktik[]" type="text" class="inputlogin" onSelect="formatangka(this);" onkeyup="formatangka(this);" size="5" maxlength="3" style="text-align:center"></td>
                                <td align="center"><input name="nilai_sikap[]" type="text" class="inputlogin2" size="5" maxlength="1" style="text-align:center"></td>
                            </tr>
                            <?php
                        }
                        mysql_free_result($hasil_nilai);
                        ?>
                </table>
                <table width="100" cellpadding="0" cellspacing="0" border="0">
                    <tr> 
                        <td height="5"></td>
                    </tr>
                </table>
                <table border="0" cellpadding="0" cellspacing="0">
                    <tr> 
                        <td height="24" align="center" valign="middle"><input name="Submit22" type="image" value="Submit" src="../admin/images/simpan.gif" alt="klik disini untuk Simpan Data"></td>
                        <td width="5">&nbsp;</td>
                        <td height="24" align="center" valign="middle"><a href="?tahun_ajaran=<?php echo $tahun_ajaran; ?>&kelas_id=<?php echo $kelas_id; ?>&id=<?php echo $id; ?>&key=<?php echo $key; ?>&kategori=<?php echo $kategori; ?>&semester=<?php echo $semester; ?>"><img src="../admin/images/batal.gif" border="0" alt="klik disini untuk Batal"></a></td>
                    </tr>
                </form>
                <?php
            }
            else {
                ?>
                <form name="frm_isi_nilai" method="post" action="update_nilai.php">
                    <input type="hidden" name="semester" value="<?php echo $semester; ?>">
                    <input type="hidden" name="id_nilai" value="<?php echo $id; ?>">
                    <input type="hidden" name="tahun_ajaran" value="<?php echo $tahun_ajaran; ?>">
                    <input type="hidden" name="kelas_id" value="<?php echo $kelas_id; ?>">
                    <input type="hidden" name="key" value="<?php echo $key; ?>">
                    <input type="hidden" name="kategori" value="<?php echo $kategori; ?>">
                    <tr class="tdtitle"> 
                        <td width="30" rowspan="3" align="center" bgcolor="CEDB4A">NO.</td>
                        <td width="300" rowspan="3" align="center" bgcolor="CEDB4A">MATA PELAJARAN</td>
                        <td width="50" rowspan="3" align="center" bgcolor="CEDB4A">SKBM</td>
                        <td width="300" height="25" colspan="3" align="center" bgcolor="CEDB4A">NILAI 
                            HASIL BELAJAR</td>
                    </tr>
                    <tr class="tdtitle"> 
                        <td width="100" align="center" bgcolor="CEDB4A">PEMAHAMAN KONSEP</td>
                        <td width="100" align="center" bgcolor="CEDB4A">PRAKTIK</td>
                        <td width="100" align="center" bgcolor="CEDB4A">SIKAP</td>
                    </tr>
                    <tr class="tdtitle"> 
                        <td height="25" align="center" bgcolor="CEDB4A">NILAI</td>
                        <td align="center" bgcolor="CEDB4A">NILAI</td>
                        <td align="center" bgcolor="CEDB4A">PREDIKAT</td>
                    </tr>
                    <?php
                    if ($str3 <> '') {
                        $strsql_nilai = "select distinct matpel.id_matpel, matpel.nama_matpel,matpel.skm,matpel.kelas, T1.id_matpel,T1.nilai_teori,
	T1.nilai_praktik,T1.nilai_sikap from matpel left join (select * from nilai_detil where id_nilai='$id' and semester='$semester') 
	T1 on matpel.id_matpel=T1.id_matpel	where matpel.kelas='$str1-$str2' order by matpel.id_matpel";
                    } else {
                        $strsql_nilai = "select distinct matpel.id_matpel, matpel.nama_matpel,matpel.skm,matpel.kelas, T1.id_matpel,T1.nilai_teori,
	T1.nilai_praktik,T1.nilai_sikap from matpel left join (select * from nilai_detil where id_nilai='$id' and semester='$semester') 
	T1 on matpel.id_matpel=T1.id_matpel	where matpel.kelas='$str1' order by matpel.id_matpel";
                    }
                    $hasil_nilai = mysql_query($strsql_nilai);
                    while ($row_nilai = mysql_fetch_array($hasil_nilai)) {
                        $NO++;
                        if ($NO % 2 == 1)
                            $warna = "EFEB94";
                        else
                            $warna = "F7F38C";
                        ?>
                        <input type="hidden" name="id_matpel[]" value="<?php echo $row_nilai[id_matpel]; ?>">
                        <tr class="text" bgcolor="<?php echo $warna; ?>">
                            <td align="center"><?php echo $NO . "."; ?></td>
                            <td>&nbsp;<?php echo $row_nilai[nama_matpel]; ?></td>
                            <td align="center"><?php echo $row_nilai[skm]; ?></td>
                            <td height="25" align="center"><input name="nilai_teori[]" type="text" class="inputlogin" onSelect="formatangka(this);" onkeyup="formatangka(this);" value="<?php if ($row_nilai[nilai_teori] <> '0') echo $row_nilai[nilai_teori]; ?>" size="5" maxlength="3" style="text-align:center"></td>
                            <td align="center"><input name="nilai_praktik[]" type="text" class="inputlogin" onSelect="formatangka(this);" onkeyup="formatangka(this);" value="<?php if ($row_nilai[nilai_praktik] <> '0') echo $row_nilai[nilai_praktik]; ?>" size="5" maxlength="3" style="text-align:center"></td>
                            <td align="center"><input name="nilai_sikap[]" type="text" class="inputlogin2" value="<?php echo $row_nilai[nilai_sikap]; ?>" size="5" maxlength="1" style="text-align:center"></td>
                        </tr>
                        <?php
                    }
                    mysql_free_result($hasil_nilai);
                    ?>
            </table>
            <table width="100" cellpadding="0" cellspacing="0" border="0">
                <tr> 
                    <td height="5"></td>
                </tr>
            </table>
            <table border="0" cellpadding="0" cellspacing="0">
                <tr> 
                    <td height="24" align="center" valign="middle"><input name="Submit22" type="image" value="Submit" src="../admin/images/simpan.gif" alt="klik disini untuk Simpan Data"></td>
                    <td width="5">&nbsp;</td>
                    <td height="24" align="center" valign="middle"><a href="?tahun_ajaran=<?php echo $tahun_ajaran; ?>&kelas_id=<?php echo $kelas_id; ?>&id=<?php echo $id; ?>&key=<?php echo $key; ?>&kategori=<?php echo $kategori; ?>&semester=<?php echo $semester; ?>"><img src="../admin/images/batal.gif" border="0" alt="klik disini untuk Batal"></a></td>
                </tr>
            </form>  
            <?php
        }
        ?>
    </table>
    <?php
    mysql_free_result($hasil);
    mysql_free_result($hasil_wali);
}
?>
</body>
</html>
