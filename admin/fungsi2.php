<?php
//include "../global/config.php";
include "../global/cek_session_admin.php";
?>
<?php
########################## TAMBAH DATA ALUMNI #######################

function tambah_alumni($tahun_ajaran, $jurusan, $kategori, $key, $nis, $uan, $motto) {
    ?>
    <form method="post" action="insert_alumni.php">
        <input type="hidden" value="<?php echo $tahun_ajaran; ?>" name="tahun_ajaran">
        <input type="hidden" name="jurusan" value="<?php echo $jurusan; ?>">
        <input type="hidden" name="kategori" value="<?php echo $kategori; ?>">
        <input type="hidden" name="key" value="<?php echo $key; ?>">
        <table class="table-bordered">
            <!--DWLayoutTable-->
            <thead> 
            <th colspan="4">TAMBAH DATA ALUMNI</th>
            </thead>
            <tr> 
                <td>NIS</td>
                <td><input name="nis" type="text" size="15" readonly="" value="<?php echo $nis; ?>"> 
                    <input name="button32" type="button" onClick='Popreport_guru("view_siswa_jurusan.php?jurusan=<?php echo $jurusan; ?>")' value="..."></td>
                <td>NAMA</td>
                <td> <input name="nama" type="text" size="35" readonly="" value="<?php echo $nama; ?>">
                </td>
            </tr>
            <tr> 
                <td>NILAI UAN</td>
                <td colspan="4" valign="middle"><input name="uan" type="text" value="<?php echo $uan; ?>"  size="10" maxlength="5"></td>
            </tr>
            <tr> 
                <td>MOTTO</td>
                <td colspan="4" valign="middle"><textarea name="motto" cols="60" rows="5"><?php echo $motto; ?></textarea></td>
            </tr>
            <tr> 
                <td>JURUSAN</td>
                <td colspan="4" valign="middle"><?php echo $jurusan; ?></td>
            </tr>
            <tr> 
                <td>TAHUN AJARAN</td>
                <td colspan="4" valign="middle"><?php echo $tahun_ajaran; ?></td>
            </tr>
            <tr> 
                <td colspan="4"><input name="Submit22222" type="image" value="Submit" src="images/simpan.gif" alt="klik disini untuk Simpan Data">
                    <a href="alumni.php?tahun_ajaran=<?php echo $tahun_ajaran; ?>&kategori=<?php echo $kategori; ?>&key=<?php echo $key; ?>&jurusan=<?php echo $jurusan; ?>"><img src="images/kembali.gif" border="0" alt="klik disini untuk Kembali ke Halaman Sebelumnya"></a></td>
            </tr>
        </table>
    </form>
    <?php
}
?>

<?php
######################## DATA ALUMNI #################

function data_alumni($tahun_ajaran, $jurusan, $kategori, $key) {
    if ($kategori == 'NIS') {
        $strsql = "SELECT siswa.NIS, siswa.NAMA_LENGKAP, alumni.TAHUN_AJARAN, alumni.JURUSAN, alumni.UAN, alumni.MOTTO
FROM siswa INNER JOIN alumni ON siswa.NIS = alumni.NIS where alumni.TAHUN_AJARAN='$tahun_ajaran' AND alumni.JURUSAN='$jurusan'
and siswa.NIS like '%$key%' order by siswa.NIS";
    } elseif ($kategori == 'NAMA') {
        $strsql = "SELECT siswa.NIS, siswa.NAMA_LENGKAP, alumni.TAHUN_AJARAN, alumni.JURUSAN, alumni.UAN, alumni.MOTTO
FROM siswa INNER JOIN alumni ON siswa.NIS = alumni.NIS where alumni.TAHUN_AJARAN='$tahun_ajaran' AND alumni.JURUSAN='$jurusan'
and siswa.NAMA_LENGKAP like '%$key%' order by siswa.NIS";
    } else {
        $strsql = "SELECT siswa.NIS, siswa.NAMA_LENGKAP, alumni.TAHUN_AJARAN, alumni.JURUSAN, alumni.UAN, alumni.MOTTO
FROM siswa INNER JOIN alumni ON siswa.NIS = alumni.NIS where alumni.TAHUN_AJARAN='$tahun_ajaran' AND alumni.JURUSAN='$jurusan'
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
            <td align="center"><?php echo $NO . "."; ?></td>
            <td align="center"><?php echo $row[NIS]; ?></td>
            <td><?php echo $row[NAMA_LENGKAP]; ?></td>
            <td align="center"><?php echo $row[UAN]; ?></td>
            <td align="center"><a href="?act=edit&nis=<?php echo $row[NIS]; ?>&jurusan=<?php echo $jurusan; ?>&tahun_ajaran=<?php echo $tahun_ajaran; ?>&kategori=<?php echo $kategori; ?>&key=<?php echo $key; ?>"><img src="images/edit_2.gif" alt="klik disini untuk Edit Data" border="0"></a></td>
            <td align="center"><a href="?act=del&nis=<?php echo $row[NIS]; ?>&jurusan=<?php echo $jurusan; ?>&tahun_ajaran=<?php echo $tahun_ajaran; ?>&kategori=<?php echo $kategori; ?>&key=<?php echo $key; ?>" onClick="return confirmdelete('Menghapus NAMA SISWA: <?php echo $string = strtoupper($row[NAMA_LENGKAP]); ?>');"><img src="images/delete.gif" alt="klik disini untuk Hapus Data" border="0"></a></td>
        </tr>
        <?php
    }
    mysql_free_result($hasil);
}
?>

<?php
########################## EDIT DATA ALUMNI #######################

function edit_alumni($tahun_ajaran, $jurusan, $kategori, $key, $nis, $uan, $motto) {
    $strsql = "SELECT siswa.NIS, siswa.NAMA_LENGKAP, alumni.TAHUN_AJARAN, alumni.JURUSAN, alumni.UAN, alumni.MOTTO
FROM siswa INNER JOIN alumni ON siswa.NIS = alumni.NIS where siswa.NIS='$nis'";
    $hasil = mysql_query($strsql);
    $row = mysql_fetch_array($hasil);
    ?>
    <form method="post" action="update_alumni.php">
        <input type="hidden" value="<?php echo $tahun_ajaran; ?>" name="tahun_ajaran">
        <input type="hidden" name="jurusan" value="<?php echo $jurusan; ?>">
        <input type="hidden" name="kategori" value="<?php echo $kategori; ?>">
        <input type="hidden" name="key" value="<?php echo $key; ?>">
        <input type="hidden" name="nis" value="<?php echo $nis; ?>">
        <table class="table-bordered">
            <!--DWLayoutTable-->
            <thead> 
            <th colspan="4">EDIT DATA ALUMNI</th>
            </thead>
            <tr> 
                <td>NIS</td>
                <td valign="middle"><?php echo $row[NIS]; ?></td>
                <td>NAMA</td>
                <td><?php echo $row[NAMA_LENGKAP]; ?></td>
            </tr>
            <tr> 
                <td>NILAI UAN</td>
                <td colspan="4" valign="middle"><input name="uan" type="text" value="<?php echo $row[UAN]; ?>"  size="10" maxlength="5"></td>
            </tr>
            <tr> 
                <td>MOTTO</td>
                <td colspan="4" valign="middle"><textarea name="motto" cols="60" rows="5"><?php echo $row[MOTTO]; ?></textarea></td>
            </tr>
            <tr> 
                <td>JURUSAN</td>
                <td colspan="4" valign="middle"><?php echo $jurusan; ?></td>
            </tr>
            <tr> 
                <td>TAHUN AJARAN</td>
                <td colspan="4" valign="middle"><?php echo $tahun_ajaran; ?></td>
            </tr>
            <tr> 
                <td colspan="4"><input name="Submit22222" type="image" value="Submit" src="images/simpan.gif" alt="klik disini untuk Simpan Data">
                <a href="alumni.php?tahun_ajaran=<?php echo $tahun_ajaran; ?>&kategori=<?php echo $kategori; ?>&key=<?php echo $key; ?>&jurusan=<?php echo $jurusan; ?>"><img src="images/batal.gif" border="0" alt="klik disini untuk Batal"></a></td>
            </tr>
        </table>
    </form>
    <?php
}
?>