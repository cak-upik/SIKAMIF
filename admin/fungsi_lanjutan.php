<?php
include "../global/config.php";

############## TAMBAH WALI KELAS #########################

function tambah_wali($tahun_ajaran) {
    ?>
    <form method="post" action="insert_wali.php">
        <input type="hidden" value="<?php echo $tahun_ajaran; ?>" name="tahun_ajaran">
        <input type="hidden" name="id_guru" value="<?php echo $id_guru; ?>">
        <table class="table-bordered">
            <!--DWLayoutTable-->
            <thead>
            <th colspan="4">TAMBAH DATA WALI KELAS</th>
            </thead>
            <tr> 
            <tr>
                <td>NIP</td>
                <td><input name="nip" type="text"  class="input-medium" readonly="" value="<?php echo $nip; ?>">
                    <input name="button32" type="button" class="buttonlogin" onClick='Popreport_guru("view_guru.php")' value="..."></td>
                <td>NAMA</td>
                <td><input name="nama" type="text" class="input-xlarge" readonly="" value="<?php echo $nama; ?>">
                </td>
            </tr>
            <tr>
                <td>KELAS</td>
                <td colspan="4"><select name="kelas_id" class="input-mini">
                        <?php
                        $strsql = "SELECT kelas.id, kelas.ruang, kelas.aktif FROM kelas WHERE kelas.aktif='1' and
		id NOT IN (SELECT id_kelas FROM wali_kelas where tahun_ajaran='$tahun_ajaran') ORDER BY kelas.ruang";
                        $hasil = mysql_query($strsql);
                        while ($row = mysql_fetch_array($hasil)) {
                            echo("<OPTION VALUE='$row[id]'>$row[ruang]</OPTION>");
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>TAHUN AJARAN</td>
                <td colspan="4"><?php echo $tahun_ajaran; ?></td>
            </tr>
            <tr>
                <td colspan="4"><input name="Submit22222" type="image" value="Submit" src="images/simpan.gif" alt="klik disini untuk Simpan Data">
                    <a href="wali_kelas.php?tahun_ajaran=<?php echo $tahun_ajaran; ?>"><img src="images/kembali.gif" border="0" alt="klik disini untuk Kembali ke Halaman Sebelumnya"></a></td>
            </tr>
        </table>
    </form>
    <?php
}
?>

<?php
############## EDIT WALI KELAS #########################

function edit_wali($tahun_ajaran, $id) {
    $strsql = "SELECT wali_kelas.ID, wali_kelas.TAHUN_AJARAN, guru.ID as id_guru, guru.NIP, guru.GLR_DEPAN, guru.NAMA, guru.GLR_BLK, kelas.RUANG
FROM kelas INNER JOIN (guru INNER JOIN wali_kelas ON guru.ID = wali_kelas.ID_GURU) ON kelas.ID = wali_kelas.ID_KELAS
where wali_kelas.TAHUN_AJARAN='$tahun_ajaran' and wali_kelas.ID='$id'";
    $hasil = mysql_query($strsql);
    $row = mysql_fetch_array($hasil);
    $nama_guru = $row[GLR_DEPAN] . " " . $row[NAMA] . " " . $row[GLR_BLK];
    ?>
    <form method="post" action="update_wali.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" value="<?php echo $tahun_ajaran; ?>" name="tahun_ajaran">
        <input type="hidden" name="id_guru" value="<?php echo $row[id_guru]; ?>">
        <input type="hidden" name="temp" value="<?php echo $row[id_guru]; ?>">
        <table class="table-bordered">
            <!--DWLayoutTable-->
            <thead>
            <th colspan="4">EDIT DATA WALI KELAS</th>
            </thead>
            <tr> 
            <tr>
                <td>NIP</td>
                <td><input name="nip" type="text"  class="input-medium" readonly="" value="<?php echo $row[NIP]; ?>">
                    <input name="button32" type="button" class="buttonlogin" onClick='Popreport_guru("view_guru.php");' value="..."></td>
                <td>NAMA</td>
                <td> <input name="nama" type="text" class="input-xlarge" readonly="" value="<?php echo $nama_guru; ?>">
                </td>
            </tr>
            <tr>
                <td>KELAS</td>
                <td colspan="4"><?php echo $row[RUANG]; ?></td>
            </tr>
            <tr>
                <td>TAHUN AJARAN</td>
                <td colspan="4"><?php echo $tahun_ajaran; ?></td>
            </tr>
            <tr>
                <td colspan="4"><input name="Submit22222" type="image" value="Submit" src="images/simpan.gif" alt="klik disini untuk Simpan Data">
                    <a href="wali_kelas.php?tahun_ajaran=<?php echo $tahun_ajaran; ?>"><img src="images/batal.gif" border="0" alt="klik disini untuk Batal"></a></td>
            </tr>
        </table>
    </form>
    <?php
}
?>

<?php
###################### DATA WALI KELAS ######################

function data_wali_kelas($tahun_ajaran) {
    $strsql = "SELECT wali_kelas.ID, wali_kelas.TAHUN_AJARAN, guru.NIP, guru.GLR_DEPAN, guru.NAMA, guru.GLR_BLK, kelas.RUANG
FROM kelas INNER JOIN (guru INNER JOIN wali_kelas ON guru.ID = wali_kelas.ID_GURU) ON kelas.ID = wali_kelas.ID_KELAS
where wali_kelas.TAHUN_AJARAN='$tahun_ajaran' order by kelas.RUANG";
    $hasil = mysql_query($strsql);
    while ($row = mysql_fetch_array($hasil)) {
        $nama_guru = $row[GLR_DEPAN] . " " . $row[NAMA] . " " . $row[GLR_BLK];
        $NO++;
        if ($NO % 2 == 1)
            $warna = "";
        else
            $warna = "";
        ?>
        <tr bgcolor="<?php echo $warna; ?>">
            <td align="center" height="25"><?php echo $row[NIP]; ?></td>
            <td><?php echo $nama_guru; ?></td>
            <td align="center"><?php echo $row[RUANG]; ?></td>
            <td align="center" width="30" ><a href="?act=edit&id=<?php echo $row[ID]; ?>&tahun_ajaran=<?php echo $tahun_ajaran; ?>"><img src="images/edit_2.gif" alt="klik disini untuk Edit Data" border="0"></a></td>
            <td align="center" width="30"><a href="?act=del&id=<?php echo $row[ID]; ?>&tahun_ajaran=<?php echo $tahun_ajaran; ?>" onClick="return confirmdelete('Menghapus WALI KELAS: <?php echo $string = strtoupper($nama_guru); ?>\npada KELAS: <?php echo $string = strtoupper($row[RUANG]); ?>');"><img src="images/delete.gif" alt="klik disini untuk Hapus Data" border="0"></a></td>
        </tr>
        <?php
    }
    mysql_free_result($hasil);
}
?>

<?php
############## TAMBAH JADWAL #########################

function tambah_jadwal($tahun_ajaran, $kelas_id, $hari, $jam, $nip, $nama, $matpel, $id_guru, $id_matpel, $waktu1, $waktu2) {
    ?>
    <form method="post" action="insert_jadwal.php">
        <input type="hidden" value="<?php echo $tahun_ajaran; ?>" name="tahun_ajaran">
        <input type="hidden" value="<?php echo $kelas_id; ?>" name="kelas_id">
        <input type="hidden" value="<?php echo $hari; ?>" name="hari">
        <input type="hidden" name="id_guru" value="<?php echo $id_guru; ?>">
        <input type="hidden" name="id_matpel" value="<?php echo $id_matpel; ?>">
        <table class="table-bordered">
            <!--DWLayoutTable-->
            <thead>
            <th colspan="4">TAMBAH JADWAL PELAJARAN</th>
            </thead>
            <tr> 
                <td>NIP</td>
                <td><input name="nip" type="text" class="input-medium" readonly="" value="<?php echo $nip; ?>">
                    <input name="button32" type="button" class="buttonlogin" onClick='Popreport_guru("view_guru.php");' value="..."></td>
                <td>NAMA</td>
                <td><input name="nama" type="text" class="input-large" readonly="" value="<?php echo $nama; ?>"> </td>
            </tr>
            <tr>
                <td>MATA PELAJARAN</td>
                <td colspan="4"><input name="matpel" type="text" class="input-xlarge" readonly="" value="<?php echo $matpel; ?>">
                    <input name="button322" type="button" class="buttonlogin" onClick='Popreport_guru("view_matpel.php?kelas_id=<?php echo $kelas_id; ?>&tahun_ajaran=<?php echo $tahun_ajaran; ?>")' value="...">
                </td>
            </tr>
            <tr>
                <td>KELAS</td>
                <td colspan="4">
                    <?php
                    $strsql_kelas = "select id,ruang from kelas where id='$kelas_id'";
                    $hasil_kelas = mysql_query($strsql_kelas);
                    $row_kelas = mysql_fetch_array($hasil_kelas);
                    echo $row_kelas[ruang];
                    ?>
                </td>
            </tr>
            <tr>
                <td>HARI</td>
                <td colspan="4"><?php echo $hari; ?></td>
            </tr>
            <tr>
                <td>WAKTU</td>
                <td colspan="4"><input name="jam" type="text" class="input-mini" maxlength="2" onkeyup="formatangka(this);" value="<?php echo $jam; ?>" onSelect="formatangka(this);">
                    Jam </td>
            </tr>
            <tr>
                <td>JAM</td>
                <td colspan="4"><input name="waktu1" type="text" class="input-mini" maxlength="5"  value="<?php echo $waktu1; ?>">
                    -
                    <input name="waktu2" type="text" class="input-mini" maxlength="5" value="<?php echo $waktu2; ?>"></td>
            </tr>
            <tr>
                <td>TAHUN AJARAN</td>
                <td colspan="4"><?php echo $tahun_ajaran; ?></td>
            </tr>
            <tr>
                <td colspan="4"><input name="Submit22222" type="image" value="Submit" src="images/simpan.gif" alt="klik disini untuk Simpan Data">
                    <a href="jadwal_pelajaran.php?tahun_ajaran=<?php echo $tahun_ajaran; ?>&hari=<?php echo $hari; ?>&kelas_id=<?php echo $kelas_id; ?>"><img src="images/kembali.gif" border="0" alt="klik disini untuk Kembali ke Halaman Sebelumnya"></a></td>
            </tr>
        </table>
    </form>
    <?php
}
?>

<?php
################################ JADWAL PELAJARAN ###########################

function jadwal_pelajaran($tahun_ajaran, $hari, $kelas_id) {
    $strsql = "SELECT jadwal.ID_JADWAL, guru.GLR_DEPAN, guru.NAMA, guru.GLR_BLK, matpel.NAMA_MATPEL, jadwal.HARI, jadwal.JAM, jadwal.WAKTU, jadwal.TAHUN_AJARAN, kelas.ID
FROM kelas INNER JOIN (matpel INNER JOIN (guru INNER JOIN jadwal ON guru.ID = jadwal.ID_GURU) ON matpel.ID_MATPEL = jadwal.ID_MATPEL) ON kelas.ID = jadwal.ID_KELAS
where jadwal.TAHUN_AJARAN='$tahun_ajaran' and jadwal.HARI='$hari' and kelas.ID='$kelas_id'";
    $hasil = mysql_query($strsql);
    while ($row = mysql_fetch_array($hasil)) {
        $nama_guru = $row[GLR_DEPAN] . " " . $row[NAMA] . " " . $row[GLR_BLK];
        $NO++;
        if ($NO % 2 == 1)
            $warna = "";
        else
            $warna = "";
        ?>
        <tr bgcolor="<?php echo $warna; ?>">
            <td height="25"><?php echo $nama_guru; ?></td>
            <td><?php echo $row[NAMA_MATPEL]; ?></td>
            <td align="center"><?php echo $row[JAM]; ?> Jam</td>
            <td align="center"><?php echo $row[WAKTU]; ?></td>
            <td align="center" width="30" ><a href="?act=edit&id_jadwal=<?php echo $row[ID_JADWAL]; ?>&tahun_ajaran=<?php echo $tahun_ajaran; ?>&kelas_id=<?php echo $kelas_id; ?>&hari=<?php echo $hari; ?>"><img src="images/edit_2.gif" alt="klik disini untuk Edit Data" border="0"></a></td>
            <td align="center" width="30"><a href="?act=del&id_jadwal=<?php echo $row[ID_JADWAL]; ?>&tahun_ajaran=<?php echo $tahun_ajaran; ?>&kelas_id=<?php echo $kelas_id; ?>&hari=<?php echo $hari; ?>" onClick="return confirmdelete('Menghapus Data');"><img src="images/delete.gif" alt="klik disini untuk Hapus Data" border="0"></a></td>
        </tr>
        <?php
    }
    mysql_free_result($hasil);
}
?>

<?php
############## EDIT JADWAL #########################

function edit_jadwal($tahun_ajaran, $kelas_id, $hari, $id_jadwal) {
    $strsql = "SELECT jadwal.ID_JADWAL, guru.NIP, guru.GLR_DEPAN, guru.NAMA, guru.GLR_BLK, matpel.ID_MATPEL, matpel.NAMA_MATPEL, jadwal.HARI, jadwal.JAM, jadwal.WAKTU, jadwal.TAHUN_AJARAN, jadwal.ID_GURU, kelas.ID
FROM kelas INNER JOIN (matpel INNER JOIN (guru INNER JOIN jadwal ON guru.ID = jadwal.ID_GURU) ON matpel.ID_MATPEL = jadwal.ID_MATPEL) ON kelas.ID = jadwal.ID_KELAS
where jadwal.TAHUN_AJARAN='$tahun_ajaran' and jadwal.HARI='$hari' and kelas.ID='$kelas_id' and jadwal.ID_JADWAL='$id_jadwal'";
    $hasil = mysql_query($strsql);
    $row = mysql_fetch_array($hasil);
    $nama_guru = $row[GLR_DEPAN] . " " . $row[NAMA] . " " . $row[GLR_BLK];
    ?>
    <form method="post" action="update_jadwal.php">
        <input type="hidden" value="<?php echo $tahun_ajaran; ?>" name="tahun_ajaran">
        <input type="hidden" value="<?php echo $kelas_id; ?>" name="kelas_id">
        <input type="hidden" value="<?php echo $hari; ?>" name="hari">
        <input type="hidden" name="id_guru" value="<?php echo $row[ID_GURU]; ?>">
        <input type="hidden" name="id_matpel" value="<?php echo $row[ID_MATPEL]; ?>">
        <input type="hidden" name="id_jadwal" value="<?php echo $id_jadwal; ?>">
        <table class="table-bordered">
            <!--DWLayoutTable-->
            <thead>
            <th colspan="4">EDIT JADWAL PELAJARAN</th>
            </thead>
            <tr> 
            <tr>
                <td>NIP</td>
                <td><input name="nip" type="text" class="input-medium" readonly="" value="<?php echo $row[NIP]; ?>">
                    <input name="button32" type="button" class="buttonlogin" onClick='Popreport_guru("view_guru.php")' value="..."></td>
                <td>NAMA</td>
                <td> <input name="nama" type="text" class="input-xlarge" readonly="" value="<?php echo $nama_guru; ?>"> </td>
            </tr>
            <tr>
                <td>MATA PELAJARAN</td>
                <td colspan="4"><input name="matpel" type="text" class="input-xlarge" readonly="" value="<?php echo $row[NAMA_MATPEL]; ?>">
                    <input name="button322" type="button" class="buttonlogin" onClick='Popreport_guru("view_matpel.php?kelas_id=<?php echo $kelas_id; ?>")' value="...">
                </td>
            </tr>
            <tr>
                <td>KELAS</td>
                <td colspan="4">
                    <?php
                    $strsql_kelas = "select id,ruang from kelas where id='$kelas_id'";
                    $hasil_kelas = mysql_query($strsql_kelas);
                    $row_kelas = mysql_fetch_array($hasil_kelas);
                    echo $row_kelas[ruang];
                    ?>
                </td>
            </tr>
            <tr>
                <td>HARI</td>
                <td colspan="4"><?php echo $hari; ?></td>
            </tr>
            <tr>
                <td>WAKTU</td>
                <td colspan="4"><input name="jam" type="text" class="input-mini" maxlength="2" onkeyup="formatangka(this);" value="<?php echo $row[JAM]; ?>" onSelect="formatangka(this);">
                    Jam </td>
            </tr>
            <tr>
                <td>JAM</td>
                <td colspan="4">
                    <?php
                    $temp = explode("-", $row[WAKTU]);
                    $waktu1 = $temp[0];
                    $waktu2 = $temp[1];
                    ?>
                    <input name="waktu1" type="text" class="input-mini" maxlength="5"  value="<?php echo $waktu1; ?>">
                    -
                    <input name="waktu2" type="text" class="input-mini" maxlength="5" value="<?php echo $waktu2; ?>"></td>
            </tr>
            <tr>
                <td>TAHUN AJARAN</td>
                <td colspan="4"><?php echo $tahun_ajaran; ?></td>
            </tr>
            <tr>
                <td colspan="4"><input name="Submit22222" type="image" value="Submit" src="images/simpan.gif" alt="klik disini untuk Simpan Data">
                    <a href="jadwal_pelajaran.php?tahun_ajaran=<?php echo $tahun_ajaran; ?>&hari=<?php echo $hari; ?>&kelas_id=<?php echo $kelas_id; ?>"><img src="images/batal.gif" border="0" alt="klik disini untuk Batal"></a></td>
            </tr>
        </table>
    </form>
    <?php
    mysql_free_result($hasil);
}
?>

<?php
############## TAMBAH WALI KELAS #########################

function tambah_kelas_siswa($tahun_ajaran, $kelas_id, $nis, $nama) {
    ?>
    <form method="post" action="insert_kelas_siswa.php">
        <input type="hidden" value="<?php echo $tahun_ajaran; ?>" name="tahun_ajaran">
        <input type="hidden" name="kelas_id" value="<?php echo $kelas_id; ?>">
        <table class="table-bordered">
            <!--DWLayoutTable-->
            <thead>
            <th colspan="4">Tambah Data Penempatan Siswa</th>
            </thead>
            <tr> 
            <tr>
                <td>NIS</td>
                <td><input name="nis" type="text"   size="15" readonly="" value="<?php echo $nis; ?>">
                    <input name="button32" type="button" class="buttonlogin" onClick='Popreport_guru("view_siswa.php");' value="..."></td>
                <td>NAMA</td>
                <td> <input name="nama" type="text"  size="35" readonly="" value="<?php echo $nama; ?>">
                </td>
            </tr>
            <tr>
                <td>KELAS</td>
                <td colspan="4">
                    <?php
                    $strsql = "select id,ruang from kelas where id='$kelas_id'";
                    $hasil = mysql_query($strsql);
                    $row = mysql_fetch_array($hasil);
                    echo $row[ruang];
                    ?>
                </td>
            </tr>
            <tr>
                <td>TAHUN AJARAN</td>
                <td colspan="4"><?php echo $tahun_ajaran; ?></td>
            </tr>
            <tr>
                <td colspan="4"><input name="Submit22222" type="image" value="Submit" src="images/simpan.gif" alt="klik disini untuk Simpan Data">
                    <a href="penempatan_kelas.php?tahun_ajaran=<?php echo $tahun_ajaran; ?>&kelas_id=<?php echo $kelas_id; ?>"><img src="images/kembali.gif" border="0" alt="klik disini untuk Kembali ke Halaman Sebelumnya"></a></td>
            </tr>
        </table>
    </form>
    <?php
}
?>

<?php
###################### PENEMPATAN KELAS SISWA ######################

function kelas_siswa($tahun_ajaran, $kelas_id) {
    $strsql = "SELECT nilai.ID, siswa.NIS, siswa.NAMA_LENGKAP, kelas.RUANG
FROM kelas INNER JOIN (siswa INNER JOIN nilai ON siswa.NIS = nilai.NIS) ON kelas.ID = nilai.ID_KELAS
where nilai.TAHUN_AJARAN='$tahun_ajaran' AND kelas.ID='$kelas_id'
order by siswa.NIS";
    $hasil = mysql_query($strsql);
    while ($row = mysql_fetch_array($hasil)) {
        $NO++;
        if ($NO % 2 == 1)
            $warna = "";
        else
            $warna = "";
        ?>
        <tr bgcolor="<?php echo $warna; ?>">
            <td align="center" height="25"><?php echo $NO . "."; ?></td>
            <td align="center"><?php echo $row[NIS]; ?></td>
            <td><?php echo $row[NAMA_LENGKAP]; ?></td>
            <td align="center"><a href="?act=del&id=<?php echo $row[ID]; ?>&tahun_ajaran=<?php echo $tahun_ajaran; ?>&kelas_id=<?php echo $kelas_id; ?>" onClick="return confirmdelete('Menghapus Data');"><img src="images/delete.gif" alt="klik disini untuk Hapus Data" border="0"></a></td>
        </tr>
        <?php
    }
    mysql_free_result($hasil);
}
?>

<?php
###################### INPUT NILAI ######################

function input_nilai($tahun_ajaran, $kelas_id, $key, $kategori, $semester) {
    if ($kategori == 'NIS') {
        $strsql = "SELECT nilai.ID, siswa.NIS, siswa.NAMA_LENGKAP, kelas.RUANG
FROM kelas INNER JOIN (siswa INNER JOIN nilai ON siswa.NIS = nilai.NIS) ON kelas.ID = nilai.ID_KELAS
where nilai.TAHUN_AJARAN='$tahun_ajaran' AND kelas.ID='$kelas_id' AND siswa.NIS like '%$key%'
order by siswa.NIS";
    } elseif ($kategori == 'NAMA') {
        $strsql = "SELECT nilai.ID, siswa.NIS, siswa.NAMA_LENGKAP, kelas.RUANG
FROM kelas INNER JOIN (siswa INNER JOIN nilai ON siswa.NIS = nilai.NIS) ON kelas.ID = nilai.ID_KELAS
where nilai.TAHUN_AJARAN='$tahun_ajaran' AND kelas.ID='$kelas_id' AND siswa.NAMA_LENGKAP like '%$key%'
order by siswa.NIS";
    } else {
        $strsql = "SELECT nilai.ID, siswa.NIS, siswa.NAMA_LENGKAP, kelas.RUANG
FROM kelas INNER JOIN (siswa INNER JOIN nilai ON siswa.NIS = nilai.NIS) ON kelas.ID = nilai.ID_KELAS
where nilai.TAHUN_AJARAN='$tahun_ajaran' AND kelas.ID='$kelas_id'
order by siswa.NIS";
    }
    $hasil = mysql_query($strsql);
    $count = mysql_num_rows($hasil);
    while ($row = mysql_fetch_array($hasil)) {
        $NO++;
        if ($NO % 2 == 1)
            $warna = "";
        else
            $warna = "";
        ?>
        <tr bgcolor="<?php echo $warna; ?>">
            <td align="center" height="25"><?php echo $NO . "."; ?></td>
            <td align="center"><?php echo $row[NIS]; ?></td>
            <td><?php echo $row[NAMA_LENGKAP]; ?></td>
            <td align="center"><a href="?act=detil_isi&id=<?php echo $row[ID]; ?>&tahun_ajaran=<?php echo $tahun_ajaran; ?>&kelas_id=<?php echo $kelas_id; ?>&key=<?php echo $key; ?>&kategori=<?php echo $kategori; ?>&semester=<?php echo $semester; ?>" class="btn"><i class="icon-folder-open"></i>Buka</a></td>
        </tr>
        <?php
    }
    mysql_free_result($hasil);
}
?>

<?php
############################## ISI NILAI #################################

function isi_nilai($tahun_ajaran, $kelas_id, $id, $key, $kategori) {
    $strsql = "SELECT nilai.ID, siswa.NIS, siswa.NAMA_LENGKAP, kelas.RUANG
FROM kelas INNER JOIN (siswa INNER JOIN nilai ON siswa.NIS = nilai.NIS) ON kelas.ID = nilai.ID_KELAS
where nilai.TAHUN_AJARAN='$tahun_ajaran' AND kelas.ID='$kelas_id' and nilai.ID='$id'";
    $hasil = mysql_query($strsql);
    $row = mysql_fetch_array($hasil);
    ?>
    <form name="frm_insert_ajaran" method="post" action="cek_nilai.php">
        <input type="hidden" name="act" value="detil_isi">
        <input type="hidden" name="tahun_ajaran" value="<?php echo $tahun_ajaran; ?>">
        <input type="hidden" name="kelas_id" value="<?php echo $kelas_id; ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="key" value="<?php echo $key; ?>">
        <input type="hidden" name="kategori" value="<?php echo $kategori; ?>">
        <table class="table-bordered">
            <!--DWLayoutTable-->
            <thead>
            <th colspan="4">Pengisian Nilai</th>
            </thead>
            <tr> 
            <tr>
                <td>NIS</td>
                <td><?php echo $row[NIS]; ?></td>
            </tr>
            <tr>
                <td>NAMA
                    SISWA </td>
                <td><?php echo $row[NAMA_LENGKAP]; ?></td>
            </tr>
            <tr>
                <td>KELAS</td>
                <td><?php echo $row[RUANG]; ?></td>
            </tr>
            <tr>
                <td>TAHUN AJARAN</td>
                <td width="156"><?php echo $tahun_ajaran; ?></td>
            </tr>
            <tr>
                <td>SEMESTER</td>
                <td width="156"><select name="semester" >
                        <option value="1">GANJIL</option>
                        <option value="2">GENAP</option>
                    </select></td>
            </tr>
            <tr>
                <td><input name="Submit22" type="image" value="Submit" src="images/ok.gif" alt="klik disini untuk OK">
                    <a href="?tahun_ajaran=<?php echo $tahun_ajaran; ?>&kelas_id=<?php echo $kelas_id; ?>&id=<?php echo $id; ?>&key=<?php echo $key; ?>&kategori=<?php echo $kategori; ?>"><img src="images/kembali.gif" border="0" alt="klik disini untuk Kembali ke Halaman Sebelumnya"></a></td>
            </tr>
        </table>
    </form>
    <?php
}
?>
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
    <table class="table-bordered">
        <tr>
            <td>NIS</td>
            <td><?php echo $row[NIS]; ?></td>
            <td>&nbsp;</td>
            <td>SEMESTER</td>
            <td>
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
            <td>NAMA SISWA</td>
            <td><?php echo $row[NAMA_LENGKAP]; ?></td>
            <td>&nbsp;</td>
            <td>TAHUN AJARAN</td>
            <td><?php echo $tahun_ajaran; ?></td>
        </tr>
        <tr>
            <td>KELAS</td>
            <td><?php echo $row[RUANG]; ?></td>
            <td>&nbsp;</td>
            <td>WALI KELAS</td>
            <td><?php echo $wali; ?></td>
        </tr>
    </table>
    <form name="frm_isi_nilai" method="post" action="insert_nilai.php">
        <table class="table-bordered">
            <?php
//pengecekan apakah input baru atau data sudah ada
            $hasil_cek = mysql_query("select id_nilai,semester from nilai_detil where id_nilai='$id' and semester='$semester'");
            $cek = mysql_num_rows($hasil_cek);
            if ($cek == '0') {
                ?>

                <input type="hidden" name="semester" value="<?php echo $semester; ?>">
                <input type="hidden" name="id_nilai" value="<?php echo $id; ?>">
                <input type="hidden" name="tahun_ajaran" value="<?php echo $tahun_ajaran; ?>">
                <input type="hidden" name="kelas_id" value="<?php echo $kelas_id; ?>">
                <input type="hidden" name="key" value="<?php echo $key; ?>">
                <input type="hidden" name="kategori" value="<?php echo $kategori; ?>">
                <tr>
                    <td>NO.</td>
                    <td>MATA PELAJARAN</td>
                    <td>SKBM</td>
                    <td>NILAI
                        HASIL BELAJAR</td>
                </tr>
                <tr>
                    <td>PEMAHAMAN KONSEP</td>
                    <td>PRAKTIK</td>
                    <td>SIKAP</td>
                </tr>
                <tr>
                    <td>NILAI</td>
                    <td>NILAI</td>
                    <td>PREDIKAT</td>
                </tr>
                <?php
                //BERI PENGECEKAN APAKAH KELAS 1 , 2 atau 3 [jurusan]
                if ($str3 <> '') {
                    $strsql_nilai = "SELECT distinct nilai.ID, matpel.KELAS, matpel.ID_MATPEL, matpel.NAMA_MATPEL, matpel.SKM, nilai_detil.NILAI_TEORI, nilai_detil.NILAI_PRAKTIK,
 nilai_detil.NILAI_SIKAP
 FROM matpel LEFT JOIN (nilai INNER JOIN nilai_detil ON
 nilai.ID = nilai_detil.ID_NILAI) ON matpel.ID_MATPEL = nilai_detil.ID_MATPEL
 WHERE matpel.KELAS='$str1-$str2' and nilai_detil.SEMESTER='$semester' order by matpel.ID_MATPEL";
                } else {
                    $strsql_nilai = "SELECT distinct nilai.ID, matpel.KELAS, matpel.ID_MATPEL, matpel.NAMA_MATPEL, matpel.SKM, nilai_detil.NILAI_TEORI, nilai_detil.NILAI_PRAKTIK,
 nilai_detil.NILAI_SIKAP
 FROM matpel LEFT JOIN (nilai INNER JOIN nilai_detil ON
 nilai.ID = nilai_detil.ID_NILAI) ON matpel.ID_MATPEL = nilai_detil.ID_MATPEL
 WHERE matpel.KELAS='$str1' and nilai_detil.SEMESTER='$semester' order by matpel.ID_MATPEL";
                }
                $hasil_nilai = mysql_query($strsql_nilai);
                while ($row_nilai = mysql_fetch_array($hasil_nilai)) {
                    $NO++;
                    if ($NO % 2 == 1)
                        $warna = "";
                    else
                        $warna = "";
                    ?>
                    <input type="hidden" name="id_matpel[]" value="<?php echo $row_nilai[ID_MATPEL]; ?>">
                    <tr bgcolor="<?php echo $warna; ?>">
                        <td align="center"><?php echo $NO . "."; ?></td>
                        <td>&nbsp;<?php echo $row_nilai[NAMA_MATPEL]; ?></td>
                        <td align="center"><?php echo $row_nilai[SKM]; ?></td>
                        <td height="25" align="center"><input name="nilai_teori[]" type="text"  onSelect="formatangka(this)" onkeyup="formatangka(this)" size="5" maxlength="3" style="text-align:center"></td>
                        <td align="center"><input name="nilai_praktik[]" type="text"  onSelect="formatangka(this)" onkeyup="formatangka(this)" size="5" maxlength="3" style="text-align:center"></td>
                        <td align="center"><input name="nilai_sikap[]" type="text" class="inputlogin2" size="5" maxlength="1" style="text-align:center"></td>
                    </tr>
                    <?php
                }
                mysql_free_result($hasil_nilai);
                ?>
                <tr>
                    <td><input name="Submit22" type="image" value="Submit" src="images/simpan.gif" alt="klik disini untuk Simpan Data">
                        <a href="?tahun_ajaran=<?php echo $tahun_ajaran; ?>&kelas_id=<?php echo $kelas_id; ?>&id=<?php echo $id; ?>&key=<?php echo $key; ?>&kategori=<?php echo $kategori; ?>&semester=<?php echo $semester; ?>"><img src="images/batal.gif" border="0" alt="klik disini untuk Batal"></a></td>

            </table>
        </form>
        <?php
    }
    else {
        ?>
        <form name="frm_isi_nilai" method="post" action="update_nilai.php">
            <table class="table-bordered">
                <input type="hidden" name="semester" value="<?php echo $semester; ?>">
                <input type="hidden" name="id_nilai" value="<?php echo $id; ?>">
                <input type="hidden" name="tahun_ajaran" value="<?php echo $tahun_ajaran; ?>">
                <input type="hidden" name="kelas_id" value="<?php echo $kelas_id; ?>">
                <input type="hidden" name="key" value="<?php echo $key; ?>">
                <input type="hidden" name="kategori" value="<?php echo $kategori; ?>">
                <tr>
                    <td>NO.</td>
                    <td>MATA PELAJARAN</td>
                    <td>SKBM</td>
                    <td>NILAI
                        HASIL BELAJAR</td>
                </tr>
                <tr>
                    <td>PEMAHAMAN KONSEP</td>
                    <td>PRAKTIK</td>
                    <td>SIKAP</td>
                </tr>
                <tr>
                    <td>NILAI</td>
                    <td>NILAI</td>
                    <td>PREDIKAT</td>
                </tr>
                <?php
                $strsql_nilai = "SELECT matpel.ID_MATPEL, matpel.NAMA_MATPEL, matpel.SKM, nilai_detil.ID_NILAI, nilai_detil.NILAI_TEORI, nilai_detil.NILAI_PRAKTIK, nilai_detil.NILAI_SIKAP, nilai_detil.SEMESTER
FROM matpel INNER JOIN (nilai INNER JOIN nilai_detil ON nilai.ID = nilai_detil.ID_NILAI) ON matpel.ID_MATPEL = nilai_detil.ID_MATPEL
WHERE nilai_detil.SEMESTER='$semester' and nilai_detil.ID_NILAI='$id'";
                $hasil_nilai = mysql_query($strsql_nilai);
                while ($row_nilai = mysql_fetch_array($hasil_nilai)) {
                    $NO++;
                    if ($NO % 2 == 1)
                        $warna = "";
                    else
                        $warna = "";
                    ?>
                    <input type="hidden" name="id_matpel[]" value="<?php echo $row_nilai[ID_MATPEL]; ?>">
                    <tr bgcolor="<?php echo $warna; ?>">
                        <td align="center"><?php echo $NO . "."; ?></td>
                        <td>&nbsp;<?php echo $row_nilai[NAMA_MATPEL]; ?></td>
                        <td align="center"><?php echo $row_nilai[SKM]; ?></td>
                        <td height="25" align="center"><input name="nilai_teori[]" type="text"  onSelect="formatangka(this)" onkeyup="formatangka(this)" value="<?php if ($row_nilai[NILAI_TEORI] <> '0') echo $row_nilai[NILAI_TEORI]; ?>" size="5" maxlength="3" style="text-align:center"></td>
                        <td align="center"><input name="nilai_praktik[]" type="text"  onSelect="formatangka(this)" onkeyup="formatangka(this)" value="<?php if ($row_nilai[NILAI_PRAKTIK] <> '0') echo $row_nilai[NILAI_PRAKTIK]; ?>" size="5" maxlength="3" style="text-align:center"></td>
                        <td align="center"><input name="nilai_sikap[]" type="text" class="inputlogin2" value="<?php echo $row_nilai[NILAI_SIKAP]; ?>" size="5" maxlength="1" style="text-align:center"></td>
                    </tr>
                    <?php
                }
                mysql_free_result($hasil_nilai);
                ?>
                <tr>
                    <td><input name="Submit22" type="image" value="Submit" src="images/simpan.gif" alt="klik disini untuk Simpan Data">
                        <a href="?tahun_ajaran=<?php echo $tahun_ajaran; ?>&kelas_id=<?php echo $kelas_id; ?>&id=<?php echo $id; ?>&key=<?php echo $key; ?>&kategori=<?php echo $kategori; ?>&semester=<?php echo $semester; ?>"><img src="images/batal.gif" border="0" alt="klik disini untuk Batal"></a></td>
                </tr>
            </table>
        </form>
        <?php
    }
    ?>
    <?php
    mysql_free_result($hasil);
    mysql_free_result($hasil_wali);
}
?>

<?php
###################### INPUT EKSTRA ######################

function ekstra($tahun_ajaran, $kelas_id, $key, $kategori, $semester) {
    if ($kategori == 'NIS') {
        $strsql = "SELECT nilai.ID, siswa.NIS, siswa.NAMA_LENGKAP, kelas.RUANG
FROM kelas INNER JOIN (siswa INNER JOIN nilai ON siswa.NIS = nilai.NIS) ON kelas.ID = nilai.ID_KELAS
where nilai.TAHUN_AJARAN='$tahun_ajaran' AND kelas.ID='$kelas_id' AND siswa.NIS like '%$key%'
order by siswa.NIS";
    } elseif ($kategori == 'NAMA') {
        $strsql = "SELECT nilai.ID, siswa.NIS, siswa.NAMA_LENGKAP, kelas.RUANG
FROM kelas INNER JOIN (siswa INNER JOIN nilai ON siswa.NIS = nilai.NIS) ON kelas.ID = nilai.ID_KELAS
where nilai.TAHUN_AJARAN='$tahun_ajaran' AND kelas.ID='$kelas_id' AND siswa.NAMA_LENGKAP like '%$key%'
order by siswa.NIS";
    } else {
        $strsql = "SELECT nilai.ID, siswa.NIS, siswa.NAMA_LENGKAP, kelas.RUANG
FROM kelas INNER JOIN (siswa INNER JOIN nilai ON siswa.NIS = nilai.NIS) ON kelas.ID = nilai.ID_KELAS
where nilai.TAHUN_AJARAN='$tahun_ajaran' AND kelas.ID='$kelas_id'
order by siswa.NIS";
    }
    $hasil = mysql_query($strsql);
    while ($row = mysql_fetch_array($hasil)) {
        $NO++;
        if ($NO % 2 == 1)
            $warna = "";
        else
            $warna = "";
        ?>
        <tr bgcolor="<?php echo $warna; ?>">
            <td align="center" height="25"><?php echo $NO . "."; ?></td>
            <td align="center"><?php echo $row[NIS]; ?></td>
            <td><?php echo $row[NAMA_LENGKAP]; ?></td>
            <td align="center" width="30"><a href="?act=detil_isi&id=<?php echo $row[ID]; ?>&tahun_ajaran=<?php echo $tahun_ajaran; ?>&kelas_id=<?php echo $kelas_id; ?>&key=<?php echo $key; ?>&kategori=<?php echo $kategori; ?>&semester=<?php echo $semester; ?>"><img src="images/nilai.png" alt="klik disini untuk Isi Ekstra Kurikuler" border="0"></a></td>
        </tr>
        <?php
    }
    mysql_free_result($hasil);
}
?>

<?php
################################ ISI ESKTRA #######################

function isi_ekstra($tahun_ajaran, $kelas_id, $id, $key, $kategori, $semester) {
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
    ?>
    <table class="table-bordered">
        <tr>
            <td>NIS</td>
            <td><?php echo $row[NIS]; ?></td>
            <td>&nbsp;</td>
            <td>SEMESTER</td>
            <td>
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
            <td>NAMA SISWA</td>
            <td><?php echo $row[NAMA_LENGKAP]; ?></td>
            <td>&nbsp;</td>
            <td>TAHUN AJARAN</td>
            <td><?php echo $tahun_ajaran; ?></td>
        </tr>
        <tr>
            <td>KELAS</td>
            <td><?php echo $row[RUANG]; ?></td>
            <td>&nbsp;</td>
            <td>WALI KELAS</td>
            <td><?php echo $wali; ?></td>
        </tr>
    <!--        <tr>
            <td class="tdtitle"></td>
            <td class="tdtitle"></td>
            <td></td>
            <td></td>
            <td class="tdtitle"></td>
            <td class="tdtitle"></td>
            <td height="10"></td>
        </tr>-->
    </table>
    <form name="frm_ekstra" method="post" action="insert_ekstra.php">
        <table class="table-bordered">        
            <input type="hidden" name="semester" value="<?php echo $semester; ?>">
            <input type="hidden" name="id_nilai" value="<?php echo $id; ?>">
            <input type="hidden" name="tahun_ajaran" value="<?php echo $tahun_ajaran; ?>">
            <input type="hidden" name="kelas_id" value="<?php echo $kelas_id; ?>">
            <input type="hidden" name="key" value="<?php echo $key; ?>">
            <input type="hidden" name="kategori" value="<?php echo $kategori; ?>">
            <!--DWLayoutTable-->
            <thead>
            <th colspan="4">Tambah Data Ekstrakurikuler</th>
            </thead>
            <tr>
                <td>JENIS
                    KEGIATAN</td>
                <td><select name="jenis_ekstra" id="agama">
                        <?php
                        $strsql_agama = "SELECT id,jenis_ekstra FROM jenis_ekstra order by id asc";
                        $hasil_agama = mysql_query($strsql_agama);
                        while ($row_agama = mysql_fetch_array($hasil_agama)) {
                            echo("<OPTION VALUE='$row_agama[jenis_ekstra]'>$row_agama[jenis_ekstra]</OPTION>");
                        }
                        ?>
                    </select></td>
            </tr>
            <tr>
                <td<input name="Submit222222" type="image" value="Submit" src="images/simpan.gif" alt="klik disini untuk Simpan Data">
                    <a href="?tahun_ajaran=<?php echo $tahun_ajaran; ?>&kelas_id=<?php echo $kelas_id; ?>&id=<?php echo $id; ?>&key=<?php echo $key; ?>&kategori=<?php echo $kategori; ?>&semester=<?php echo $semester; ?>"><img src="images/kembali.gif" border="0" alt="klik disini untuk Kembali ke Halaman Sebelumnya"></a></td>
            </tr>    
        </table>
    </form>

    <form name="frm_ekstra" method="post" action="update_ekstra.php">   
        <table class="table-bordered">        
            <input type="hidden" name="semester" value="<?php echo $semester; ?>">
            <input type="hidden" name="id_nilai" value="<?php echo $id; ?>">
            <input type="hidden" name="tahun_ajaran" value="<?php echo $tahun_ajaran; ?>">
            <input type="hidden" name="kelas_id" value="<?php echo $kelas_id; ?>">
            <input type="hidden" name="key" value="<?php echo $key; ?>">
            <input type="hidden" name="kategori" value="<?php echo $kategori; ?>">
            <tr>
                <td align="center">NO.</td>
                <td align="center">JENIS KEGIATAN</td>
                <td align="center">PREDIKAT</td>
                <td align="center">KETERANGAN</td>
                <td align="center">&nbsp;</td>
            </tr>
            <?php
            $nilai_ekstra = mysql_query("SELECT ekstra_kurikuler.ID as ID_EKSTRA, ekstra_kurikuler.JENIS_EKSTRA, ekstra_kurikuler.NILAI, ekstra_kurikuler.KETERANGAN
FROM (nilai INNER JOIN siswa ON nilai.NIS = siswa.NIS) INNER JOIN
ekstra_kurikuler ON nilai.ID = ekstra_kurikuler.ID_NILAI where nilai.TAHUN_AJARAN='$tahun_ajaran' and nilai.ID='$id'");
            while ($row_ekstra = mysql_fetch_array($nilai_ekstra)) {
                $NO++;
                if ($NO % 2 == 1)
                    $warna = "";
                else
                    $warna = "";
                ?>
                <input type="hidden" name="id[]" value="<?php echo $row_ekstra[ID_EKSTRA]; ?>">
                <tr bgcolor="<?php echo $warna; ?>">
                    <td height="25" align="center"><?php echo $NO . "."; ?></td>
                    <td align="left"><?php echo $row_ekstra[JENIS_EKSTRA]; ?></td>
                    <td align="center"><input name="predikat[]" type="text" class="inputlogin2" size="5" maxlength="1" style="text-align:center" value="<?php echo $row_ekstra[NILAI]; ?>"></td>
                    <td align="center"><input name="keterangan[]" type="text"  value="<?php echo $row_ekstra[KETERANGAN]; ?>" size="70" maxlength="50"></td>
                    <td align="center" width="30"><a href="del_ekstra.php?id_ekstra=<?php echo $row_ekstra[ID_EKSTRA]; ?>&tahun_ajaran=<?php echo $tahun_ajaran; ?>&kelas_id=<?php echo $kelas_id; ?>&key=<?php echo $key; ?>&kategori=<?php echo $kategori; ?>&act=detil_isi&id=<?php echo $id; ?>" onClick="return confirmdelete('Menghapus Data');"><img src="images/delete.gif" alt="klik disini untuk Hapus Data" border="0"></a></td>
                </tr>
                <?php
            }
            mysql_free_result($nilai_ekstra);
            ?>
            <tr>
                <td><input name="Submit2222222" type="image" value="Submit" src="images/simpan.gif" alt="klik disini untuk Simpan Data">
                    <a href="?tahun_ajaran=<?php echo $tahun_ajaran; ?>&kelas_id=<?php echo $kelas_id; ?>&id=<?php echo $id; ?>&key=<?php echo $key; ?>&kategori=<?php echo $kategori; ?>&semester=<?php echo $semester; ?>"><img src="images/batal.gif" border="0" alt="klik disini untuk Batal"></a></td>
            </tr>    
        </table>
    </form>
    <?php
}
?>
</body>
</html>
