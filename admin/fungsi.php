<?php
session_start();
include "../global/config.php";

#################################### FUNGSI PROFIL SEKOLAH #######################################

function edit_profil($id) {
    $strsql = "select ID,NAMA,STATUS,NSS,NDS,ALAMAT,KECAMATAN,KABUPATEN,PROPINSI,VISI,MISI,EMAIL,WEBSITE from profil where ID='$id'";
    $hasil = mysql_query($strsql);
    $row = mysql_fetch_array($hasil);
    ?>
    <form name="frm_profil" method="post" action="update_profil.php">
        <input type="hidden" name="id" value="<?php echo $row[ID]; ?>">
        <table class="table-bordered">
            <thead>
            <th colspan="3" >EDIT PROFIL SEKOLAH</th>
            </thead>
            <tr>
                <td>Nama Sekolah</td>
                <td>:</td>
                <td><input name="nama" type="text" class="input-xlarge" value="<?php echo $row[NAMA]; ?>"></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>:</td>
                <td><input name="status" type="text" class="input-xlarge" value="<?php echo $row[STATUS]; ?>"></td>
            </tr>
            <tr>
                <td>NSS</td>
                <td>:</td>
                <td><input name="nss" type="text" class="input-xlarge" value="<?php echo $row[NSS]; ?>"></td>
            </tr>
            <tr>
                <td>NDS</td>
                <td>:</td>
                <td><input name="nds" type="text" class="input-xlarge" value="<?php echo $row[NDS]; ?>"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><textarea rows="3" name="alamat" class="span10"><?php echo $row[ALAMAT]; ?></textarea>
            </tr>
            <tr>
                <td>Kecamatan</td>
                <td>:</td>
                <td><input name="kecamatan" type="text" class="input-medium" value="<?php echo $row[KECAMATAN]; ?>"></td>
            </tr>
            <tr>
                <td>Kabupaten</td>
                <td>:</td>
                <td><input name="kabupaten" type="text" class="input-medium" value="<?php echo $row[KABUPATEN]; ?>"></td>
            </tr>
            <tr>
                <td>Propinsi</td>
                <td>:</td>
                <td><input name="propinsi" type="text" class="input-medium" value="<?php echo $row[PROPINSI]; ?>"></td>
            </tr>
            <tr>
                <td>Visi</td>
                <td>:</td>
                <td><textarea rows="3" name="visi" class="span10"><?php echo $row[VISI]; ?></textarea>
            </tr>
            <tr>
                <td>Misi</td>
                <td>:</td>
                <td><textarea rows="8" name="misi" class="span10"><?php echo $row[MISI]; ?></textarea>
            </tr>
            <tr>
                <td>WEBSITE</td>
                <td>:</td>
                <td><input name="website" type="text" class="input-xlarge" value="<?php echo $row[WEBSITE]; ?>"></td>
            </tr>
            <tr>
                <td>EMAIL</td>
                <td>:</td>
                <td><input name="email" type="text" class="input-xlarge" value="<?php echo $row[EMAIL]; ?>"></td>
            </tr>
<tr>
                <td>TENTANG SEKOLAH</td>
                <td>:</td>
                <td><textarea name="about" rows="8" class="span10"><?php echo $row[ABOUT]; ?></textarea>
            </tr>
            <tr>
                <td colspan="3"><input name="Submit2" type="image" value="Submit" src="images/simpan.gif" alt="klik disini untuk Simpan Data">
                    <a href="profil_sekolah.php"><img src="images/batal.gif" border="0" alt="klik disini untuk Batal"></a></td>
            </tr>
        </table>
    </form>
    <?php
    mysql_free_result($hasil);
}
?>

<?php
############################ DATA TAHUN AJARAN ############################

function tahun_ajaran() {
    $strsql = "select id,tahun_ajaran from tahun_ajaran order by tahun_ajaran desc";
    $hasil = mysql_query($strsql);
    while ($row = mysql_fetch_array($hasil)) {
        $NO++;
        if ($NO % 2 == 1)
            $warna = "";
        else
            $warna = "";
        ?>
        <tr bgcolor="<?php echo $warna; ?>">
            <td align="center" height="25"><?php echo $row[tahun_ajaran]; ?></td>
            <td align="center" width="30" ><a href="?act=edit&id=<?php echo $row[id]; ?>"><img src="images/edit_2.gif" alt="klik disini untuk Edit Data" border="0"></a></td>
            <td align="center" width="30"><a href="?act=del&id=<?php echo $row[id]; ?>" onClick="return confirmdelete('Menghapus TAHUN AJARAN: <?php echo $string = strtoupper($row[tahun_ajaran]); ?>');"><img src="images/delete.gif" alt="klik disini untuk Hapus Data" border="0"></a></td>
        </tr>
        <?php
    }
    mysql_free_result($hasil);
}
?>

<?php
########DATA TAHUN AJARAN ############################

function tambah_tahun_ajaran($tahun_kurikulum1, $tahun_kurikulum2) {
    ?>
    <br/>
    <form name="frm_insert_ajaran" method="post" action="insert_tahun_ajaran.php">
        <table class="table-bordered" style="width: 35%;">
            <!--DWLayoutTable-->
            <thead>
            <th colspan="3">Tambah Data Tahun Ajaran</th>
            </thead>
            <tr>
                <td>TAHUN
                    AJARAN</td>
                <td>:</td>
                <td><input name="tahun_kurikulum1" type="text" class="input-mini" maxlength="4" onkeyup="formatangka(this);" value="<?php echo $tahun_kurikulum1; ?>" onSelect="formatangka(this);">
                    -
                    <input name="tahun_kurikulum2" type="text" class="input-mini" maxlength="4" onkeyup="formatangka(this);" value="<?php echo $tahun_kurikulum2; ?>" onSelect="formatangka(this);"></td>
            </tr>
            <tr>
                <td colspan="3">
                    <input name="Submit22" type="image" value="Submit" src="images/simpan.gif" alt="klik disini untuk Simpan Data"><a href="tahun_ajaran.php"><img src="images/kembali.gif" border="0" alt="klik disini untuk Kembali ke Halaman Sebelumnya"></a></td>
            </tr>
        </table>
    </form>
    <?php
}
?>

<?php
############################ EDIT DATA TAHUN AJARAN ############################

function edit_tahun_ajaran($id) {
    $strsql = "select id,tahun_ajaran from tahun_ajaran where id='$id'";
    $hasil = mysql_query($strsql);
    $row = mysql_fetch_array($hasil);
    ?>
    <br/>
    <form name="frm_insert_ajaran" method="post" action="update_tahun_ajaran.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <table class="table-bordered" style="width: 35%;" >
            <!--DWLayoutTable-->
            <thead>
            <th colspan="3">Edit Data Tahun Ajaran</th>
            </thead>
            <tr>
                <td>&nbsp;TAHUN
                    AJARAN</td>
                <td>:</td>
                <td>
                    <?php
                    $temp = explode("-", $row[tahun_ajaran]);
                    $tahun_kurikulum1 = $temp[0];
                    $tahun_kurikulum2 = $temp[1];
                    ?>
                    <input name="tahun_kurikulum1" type="text" class="input-mini" maxlength="4" onkeyup="formatangka(this);" value="<?php echo $tahun_kurikulum1; ?>" onSelect="formatangka(this);">
                    -
                    <input name="tahun_kurikulum2" type="text" class="input-mini" maxlength="4" onkeyup="formatangka(this);" value="<?php echo $tahun_kurikulum2; ?>" onSelect="formatangka(this);"></td>
            </tr>
            <tr>
                <td colspan="3"><input name="Submit22" type="image" value="Submit" src="images/simpan.gif" alt="klik disini untuk Simpan Data">
                    <a href="tahun_ajaran.php"><img src="images/batal.gif" border="0" alt="klik disini untuk Batal"></a></td>
            </tr>
        </table>
    </form>
    <?php
    mysql_free_result($hasil);
}
?>

<?php
############################## DATA KELAS ###########################

function data_kelas() {
    $strsql = "select id,ruang,aktif from kelas order by ruang";
    $hasil = mysql_query($strsql);
    while ($row = mysql_fetch_array($hasil)) {
        $NO++;
        if ($NO % 2 == 1)
            $warna = "";
        else
            $warna = "";
        ?>
        <tr bgcolor="<?php echo $warna; ?>">
            <td style="width:62%"><center><?php echo $row[ruang]; ?></center></td>
            <td><a class="btn" href="?act=edit&id=<?php echo $row[id]; ?>"><i class="icon-edit"></i>Edit</a>
            <a class="btn btn-danger" href="?act=del&id=<?php echo $row[id]; ?>" onClick="return confirm('Menghapus NAMA KELAS: <?php echo $string = strtoupper($row[ruang]); ?>');"><i class="icon-remove"></i>Hapus</a>
			</td>
            <?php
        }
        mysql_free_result($hasil);
    }
    ?>

    <?php
######################## TAMBAH DATA KELAS ########################

    function tambah_kelas($kelas) {
        ?>
    <br/>
    <form name="frm_kelas" method="post" action="insert_kelas.php">
        <table class="table-bordered" style="width: 30%;">
            <thead>
            <th colspan="2">Tambah Data Kelas / Ruang</th>
            </thead>
            <tr>
                <td>NAMA KELAS</td>
            <td:</td>
                <td><input name="nama_ruang" type="text" class="input-medium" value="<?php echo $kelas; ?>"></td>
                </tr>
                <tr>
                    <td>AKTIF</td>
                    <td><input name="aktif" type="radio"  value="1" checked>Ya
                        <input type="radio" name="aktif" value="0"/>Tidak</td>
                </tr>
                <tr>
                    <td colspan="2"><input name="Submit222" type="image" value="Submit" src="images/simpan.gif" alt="klik disini untuk Simpan Data">
                        <a href="data_kelas.php"><img src="images/kembali.gif" border="0" alt="klik disini untuk Kembali ke Halaman Sebelumnya"></a></td>
                </tr>
        </table>
    </form>
    <?php
}
?>


<?php
######################## EDIT DATA KELAS ########################

function edit_kelas($id) {
    $strsql = "select id,ruang,aktif from kelas where id='$id'";
    $hasil = mysql_query($strsql);
    $row = mysql_fetch_array($hasil);
    ?>
    <br/>
    <form name="frm_kelas" method="post" action="update_kelas.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <table class="table-bordered" style="width: 50%;">
            <thead>
            <th colspan="2">Edit Data Kelas / Ruang</th>
            </thead>
            <tr>
                <td>NAMA KELAS</td>
            <td:</td>
                <td><input name="nama_ruang" type="text" class="input-medium" value="<?php echo $row[ruang]; ?>"></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>
                        <?php
                        if ($row[aktif] == '1') {
                            ?>
                            <input name="aktif" type="radio"  value="1" checked> Ya
                            <input type="radio" name="aktif" value="0" >Tidak
                            <?php
                        } else {
                            ?>
                            <input name="aktif" type="radio"  value="1">Ya
                            <input type="radio" name="aktif" value="0" checked>Tidak
                            <?php
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input name="Submit222" type="image" value="Submit" src="images/simpan.gif" alt="klik disini untuk Simpan Data"><a href="data_kelas.php"><img src="images/batal.gif" border="0" alt="klik disini untuk Batal"></a></td>
                </tr>
        </table>
    </form>
    <?php
}
?>

<?php
####################### DATA GURU #########################

function data_guru($key, $kategori) {
    if ($kategori == 'NIP') {
        $strsql = "select id,nip,glr_depan,nama,glr_blk from guru where nip like '%$key%'order by id";
    } elseif ($kategori == 'NAMA') {
        $strsql = "select id,nip,glr_depan,nama,glr_blk from guru where nama like '%$key%' order by id";
    } else {
        $strsql = "select id,nip,glr_depan,nama,glr_blk from guru order by id";
    }

    $hasil = mysql_query($strsql);
    while ($row = mysql_fetch_array($hasil)) {
        $nama_dosen = $row[glr_depan] . " " . $row[nama] . " " . $row[glr_blk];
        $NO++;
        if ($NO % 2 == 1)
            $warna = "";
        else
            $warna = "";
        ?>
        <trbgcolor="<?php echo $warna; ?>">
            <td align="center"><a href="#" onClick='Popreport_look_guru("detil_guru.php?id=<?php echo $row[id]; ?>")' class="link2"><?php echo $row[nip]; ?></a></td>
            <td><?php echo $nama_dosen; ?></td>
            <td align="center" width="30" ><a href="?act=edit&id=<?php echo $row[id]; ?>"><img src="images/edit_2.gif" alt="klik disini untuk Edit Data" border="0"></a></td>
            <td align="center" width="30"><a href="?act=del&id=<?php echo $row[id]; ?>" onClick="return confirmdelete('Menghapus NAMA DOSEN: <?php echo $string = strtoupper($nama_dosen); ?>');"><img src="images/delete.gif" alt="klik disini untuk Hapus Data" border="0"></a></td>
        </tr>
        <?php
    }
    mysql_free_result($hasil);
}
?>

<?php
############################## TAMBAH DATA GURU #############################

function tambah_guru($nip, $glr_depan, $nama, $glr_blk, $golongan, $jabatan, $tempat_lahir, $tahun, $bulan, $tgl, $agama, $alamat_lengkap, $telp_rumah, $telp_hp, $alamat_asal, $narasi, $aktif) {
    ?>
    <form method="post" action="insert_guru.php">
        <table class="table-bordered">
            <thead>
            <th colspan="4">Tambah Data Guru</th>
            </thead>
            <tr>
                <td>NIP</td>
                <td><input name="nip" type="text" value="<?php echo $nip; ?>">
                </td>
            </tr>
            <tr>
                <td>GELAR DEPAN</td>
                <td><input name="glr_depan" type="text" class="input-mini" value="<?php echo $glr_depan; ?>"></td>
            </tr>
            <tr>
                <td>NAMA</td>
                <td><input name="nama" type="text" class="input-xlarge" value="<?php echo $nama; ?>">
                </td>
            </tr>
            <tr>
                <td>GELAR BELAKANG</td>
                <td><input name="glr_blk" type="text" class="input-mini" value="<?php echo $glr_blk; ?>"></td>
            </tr>
            <tr>
                <td>GOLONGAN</td>
                <td><input name="golongan" type="text" class="input-mini" value="<?php echo $golongan; ?>"></td>
            </tr>
            <tr>
                <td>JABATAN</td>
                <td><input name="jabatan" type="text" class="input-medium" value="<?php echo $jabatan; ?>"></td>
            </tr>
            <tr>
                <td>TEMPAT LAHIR</td>
                <td><input name="tempat_lahir" type="text" value="<?php echo $tempat_lahir; ?>"></td>
            </tr>
            <tr>
                <td>TGL. LAHIR</td>
                <td><input name="tahun" type="text" placeholder="Tahun" class="input-mini" onkeyup="formatangka(this)" maxlength="4" onSelect="formatangka(this)" value="<?php echo $tahun; ?>">
                    -
                    <input name="bulan" type="text" placeholder="Bulan" class="input-mini" onkeyup="formatangka(this)" maxlength="2" onSelect="formatangka(this)" value="<?php echo $bulan; ?>">
                    -
                    <input name="tgl" type="text" placeholder="Tgl" class="input-mini" onkeyup="formatangka(this)" maxlength="2" onSelect="formatangka(this)" value="<?php echo $tgl; ?>">
                    <br/><i>( tahun / bulan / tgl. )</i></td>
            </tr>
            <tr>
                <td>JENIS KELAMIN</td>
                <td><input type="radio" name="jenis_kelamin" value="L"  checked>Laki - laki
                    <input type="radio" name="jenis_kelamin" value="P" >Perempuan</td>
            </tr>
            <tr>
                <td>AGAMA</td>
                <td><select name="agama" id="agama" class="input-medium">
                        <?php
                        $strsql_agama = "SELECT id,agama FROM agama order by id asc";
                        $hasil_agama = mysql_query($strsql_agama);
                        while ($row_agama = mysql_fetch_array($hasil_agama)) {
                            echo("<OPTION VALUE='$row_agama[agama]'>$row_agama[agama]</OPTION>");
                        }
                        ?>
                    </select></td>
            </tr>
            <tr>
                <td>ALAMAT LENGKAP</td>
                <td><input name="alamat_lengkap" type="text" class="input-xxlarge" value="<?php echo $alamat_lengkap; ?>"></td>
            </tr>
            <tr>
                <td>TELP. RUMAH</td>
                <td><input name="telp_rumah" type="text" class="input-medium" value="<?php echo $telp_rumah; ?>" maxlength="15"></td>
            </tr>
            <tr>
                <td>TELP. HP</td>
                <td><input name="telp_hp" type="text" class="input-medium" value="<?php echo $telp_hp; ?>" maxlength="15"></td>
            </tr>
            <tr>
                <td>ALAMAT ASAL LENGKAP</td>
                <td><input name="alamat_asal" type="text" class="input-xxlarge" value="<?php echo $alamat_asal; ?>"></td>
            </tr>
            <tr>
                <td>NARASI</td>
                <td><textarea name="narasi" cols="50" rows="7" class="span12"><?php echo $narasi; ?></textarea></td>
            </tr>
            <tr>
                <td>AKTIF</td>
                <td><input name="aktif" type="radio"  value="1" checked>Ya
                    <input type="radio" name="aktif" value="0" >Tidak</td>
            </tr>
            <tr>
                <td colspan="4"><input name="Submit2222" type="image" value="Submit" src="images/simpan.gif" alt="klik disini untuk Simpan Data">
                    <a href="data_guru.php"><img src="images/kembali.gif" border="0" alt="klik disini untuk Kembali ke Halaman Sebelumnya"></a></td>
            </tr>
        </table>
    </form>
    <?php
}
?>


<?php
############################## EDIT DATA GURU #############################

function edit_guru($id) {
    $strsql = "select NIP,GLR_DEPAN,NAMA,GLR_BLK,TEMPAT_LAHIR,TGL_LAHIR,ALAMAT_SKR,TELP_RUMAH,TELP_HP,ALAMAT_ASAL,NARASI,AGAMA,AKTIF,SEX from guru where id='$id'";
    $hasil = mysql_query($strsql);
    $row = mysql_fetch_array($hasil);
    ?>
    <form method="post" action="update_guru.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <table class="table-bordered">
            <thead>
            <th colspan="4">Edit Data Guru</th>
            </thead>
            <tr>
                <td>NIP</td>
                <td><?php echo $row[NIP]; ?>
                </td>
            </tr>
            <tr>
                <td>GELAR DEPAN</td>
                <td><input name="glr_depan" type="text" class="input-mini" value="<?php echo $row[GLR_DEPAN]; ?>"></td>
            </tr>
            <tr>
                <td>NAMA</td>
                <td><input name="nama" type="text"class="input-xlarge" value="<?php echo $row[NAMA]; ?>">
                </td>
            </tr>
            <tr>
                <td>GELAR BELAKANG</td>
                <td><input name="glr_blk" type="text" class="input-mini" value="<?php echo $row[GLR_BLK]; ?>"></td>
            </tr>
            <tr>
                <td>TEMPAT LAHIR</td>
                <td><input name="tempat_lahir" type="text" class="input-medium" value="<?php echo $row[TEMPAT_LAHIR]; ?>"></td>
            </tr>
            <tr>
                <td>TGL. LAHIR</td>
                <td>
                    <?php
                    $temp = explode("-", $row[TGL_LAHIR]);
                    $tahun = $temp[0];
                    $bulan = $temp[1];
                    $tgl = $temp[2];
                    ?>
                    <input name="tahun" type="text"  onkeyup="formatangka(this)" class="input-mini" maxlength="4" onSelect="formatangka(this)" value="<?php echo $tahun; ?>">
                    -
                    <input name="bulan" type="text"  onkeyup="formatangka(this)" class="input-mini" maxlength="2" onSelect="formatangka(this)" value="<?php echo $bulan; ?>">
                    -
                    <input name="tgl" type="text"  onkeyup="formatangka(this)" class="input-mini" maxlength="2" onSelect="formatangka(this)" value="<?php echo $tgl; ?>">
                    <br/><i>( tahun / bulan / tgl. )</i></td>
            </tr>
            <tr>
                <td>JENIS KELAMIN</td>
                <td>
                    <?php
                    if ($row[SEX] == 'L') {
                        ?>
                        <input type="radio" name="jenis_kelamin" value="L"  checked>
                        Laki - laki<input type="radio" name="jenis_kelamin" value="P" >
                        Perempuan
                        <?php
                    } else {
                        ?>
                        <input type="radio" name="jenis_kelamin" value="L" >
                        Laki - laki
                        <input type="radio" name="jenis_kelamin" value="P"  checked>
                        Perempuan
                        <?php
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>AGAMA</td>
                <td><select name="agama" id="agama" class="input-medium">
                        <?php
                        $strsql2 = "select id,agama FROM agama where agama='$row[AGAMA]'";
                        $hasil2 = mysql_query($strsql2);
                        $row2 = mysql_fetch_array($hasil2);
                        echo("<OPTION VALUE='$row2[agama]'>$row2[agama]</OPTION>");

                        $strsql_agama = "SELECT id,agama FROM agama where agama<>'$row[AGAMA]' order by id asc";
                        $hasil_agama = mysql_query($strsql_agama);
                        while ($row_agama = mysql_fetch_array($hasil_agama)) {
                            echo("<OPTION VALUE='$row_agama[agama]'>$row_agama[agama]</OPTION>");
                        }
                        ?>
                    </select></td>
            </tr>
            <tr>
                <td>ALAMAT LENGKAP</td>
                <td><input name="alamat_lengkap" type="text"class="input-xxlarge"  value="<?php echo $row[ALAMAT_SKR]; ?>"></td>
            </tr>
            <tr>
                <td>TELP. RUMAH</td>
                <td><input name="telp_rumah" type="text" class="input-medium"  value="<?php echo $row[TELP_RUMAH]; ?>" maxlength="15"></td>
            </tr>
            <tr>
                <td>TELP. HP</td>
                <td><input name="telp_hp" type="text" class="input-medium"  value="<?php echo $row[TELP_HP]; ?>" maxlength="15"></td>
            </tr>
            <tr>
                <td>ALAMAT ASAL LENGKAP</td>
                <td><input name="alamat_asal" type="text" class="input-xxlarge" value="<?php echo $row[ALAMAT_ASAL]; ?>"></td>
            </tr>
            <tr>
                <td>NARASI</td>
                <td><textarea name="narasi" cols="40" rows="7" class="span12"><?php echo $row[NARASI]; ?></textarea></td>
            </tr>
            <tr>
                <td>AKTIF</td>
                <td>
                    <?php
                    if ($row[AKTIF] == '1') {
                        ?>
                        <input name="aktif" type="radio"  value="1" checked>
                        Ya<input type="radio" name="aktif" value="0" >
                        Tidak
                        <?php
                    } else {
                        ?>
                        <input name="aktif" type="radio"  value="1">
                        Ya<input type="radio" name="aktif" value="0"  checked>
                        Tidak
                        <?php
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="4"><input name="Submit2222" type="image" value="Submit" src="images/simpan.gif" alt="klik disini untuk Simpan Data">
                    <a href="data_guru.php"><img src="images/batal.gif" border="0" alt="klik disini untuk Batal"></a></td>
            </tr>
        </table>
    </form>
    <?php
}
?>

<?php
####################### DATA MATPEL #########################

function data_matpel($kelas, $tahun_ajaran) {
    $strsql = "select ID_MATPEL,NAMA_MATPEL,SKM,KELAS,TAHUN_AJARAN from matpel where KELAS='$kelas' and TAHUN_AJARAN='$tahun_ajaran'";
    $hasil = mysql_query($strsql);
    while ($row = mysql_fetch_array($hasil)) {
        $NO++;
        if ($NO % 2 == 1)
            $warna = "";
        else
            $warna = "";
        ?>
        <tr  bgcolor="<?php echo $warna; ?>">
            <td><?php echo $row[NAMA_MATPEL]; ?></td>
            <td><?php echo $row[SKM]; ?></td>
            <td><a href="?act=edit&matpel_id=<?php echo $row[ID_MATPEL]; ?>&kelas=<?php echo $kelas; ?>&tahun_ajaran=<?php echo $row[TAHUN_AJARAN]; ?>"><img src="images/edit_2.gif" alt="klik disini untuk Edit Data" border="0"></a></td>
            <td><a href="?act=del&matpel_id=<?php echo $row[ID_MATPEL]; ?>&kelas=<?php echo $kelas; ?>&tahun_ajaran=<?php echo $row[TAHUN_AJARAN]; ?>" onClick="return confirmdelete('Menghapus MATA PELAJARAN: <?php echo $string = strtoupper($row[NAMA_MATPEL]); ?>\ndengan Nilai SKBM: <?php echo $row[SKM]; ?>');"><img src="images/delete.gif" alt="klik disini untuk Hapus Data" border="0"></a></td>
        </tr>
        <?php
    }
    mysql_free_result($hasil);
}
?>
        
<?php
############################ TAMBAH DATA MATA PELAJARAN ######################

function tambah_matpel($nama_matpel, $skm, $kelas, $tahun_ajaran) {
    ?>
    <form name="frm_kelas" method="post" action="insert_matpel.php">
        <input type="hidden" name="kelas" value="<?php echo $kelas; ?>">
        <input type="hidden" name="tahun_ajaran" value="<?php echo $tahun_ajaran; ?>">
        <table class="table-bordered" style="width: 65%;" >
            <thead>
            <th colspan="4">Tambah Data SKBM</th>
            </thead>
            <tr>
                <td>TAHUN AJARAN</td>
                <td><?php echo $tahun_ajaran; ?></td>
            </tr>
            <tr>
                <td>MATA PELAJARAN</td>
                <td><input name="nama_matpel" type="text"  value="<?php echo $nama_matpel; ?>">
                    <input name="button322" type="button" class="input-medium" onClick='Popreport_guru("view_mastermatpel.php");' value="..."></td>
            </tr>
            <tr>
                <td>SKBM</td>
                <td><input name="skm" type="text" onSelect="formatangka(this);" onkeyup="formatangka(this);" value="<?php echo $skm; ?>" class="input-mini" maxlength="2"></td>
            </tr>
            <tr>
                <td>KELAS</td>
                <td>
                    <?php
                    if ($kelas == '1') {
                        echo "I (Satu)";
                    } elseif ($kelas == '2') {
                        echo "II (Dua)";
                    } elseif ($kelas == '3-IPS') {
                        echo "III (Tiga) IPS";
                    } elseif ($kelas == '3-IPA') {
                        echo "III (Tiga) IPA";
                    } elseif ($kelas == '3-BAHASA') {
                        echo "III (Tiga) Bahasa";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input name="Submit222" type="image" value="Submit" src="images/simpan.gif" alt="klik disini untuk Simpan Data">
                    <a href="data_matpel.php?kelas=<?php echo $kelas; ?>&tahun_ajaran=<?php echo $tahun_ajaran; ?>"><img src="images/kembali.gif" border="0" alt="klik disini untuk Kembali ke Halaman Sebelumnya"></a></td>
            </tr>
        </table>
    </form>
    <?php
}
?>

<?php
############################ TAMBAH DATA MATA PELAJARAN ######################

function edit_matpel($matpel_id, $kelas, $tahun_ajaran) {
    $hasil = mysql_query("select id_matpel,nama_matpel,skm,kelas from matpel where id_matpel='$matpel_id'");
    $row = mysql_fetch_array($hasil);
    ?>
    <form name="frm_kelas" method="post" action="update_matpel.php">
        <input type="hidden" name="kelas" value="<?php echo $kelas; ?>">
        <input type="hidden" name="matpel_id" value="<?php echo $matpel_id; ?>">
        <input type="hidden" name="tahun_ajaran" value="<?php echo $tahun_ajaran; ?>">
        <input name="nama_matpel" type="hidden" value="<?php echo $row[nama_matpel]; ?>">
        <table class="table-bordered" style="width: 65%;" >
            <thead>
            <th colspan="4">Edit Data SKBM</th>
            </thead>
            <tr>
                <td>TAHUN AJARAN</td>
                <td><?php echo $tahun_ajaran; ?></td>
            </tr>  
            <tr>
                <td>MATA PELAJARAN</td>
                <td><?php echo $row[nama_matpel]; ?></td>
            </tr>
            <tr>
                <td>SKBM</td>
                <td><input name="skm" type="text" onSelect="formatangka(this);" onkeyup="formatangka(this);" value="<?php echo $row[skm]; ?>" class="input-mini" maxlength="2"></td>
            </tr>
            <tr>
                <td>KELAS</td>
                <td>
                    <?php
                    if ($kelas == '1') {
                        echo "I (Satu)";
                    } elseif ($kelas == '2') {
                        echo "II (Dua)";
                    } elseif ($kelas == '3-IPS') {
                        echo "III (Tiga) IPS";
                    } elseif ($kelas == '3-IPA') {
                        echo "III (Tiga) IPA";
                    } elseif ($kelas == '3-BAHASA') {
                        echo "III (Tiga) Bahasa";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input name="Submit222" type="image" value="Submit" src="images/simpan.gif" alt="klik disini untuk Simpan Data">
                    <a href="data_matpel.php?kelas=<?php echo $kelas; ?>&tahun_ajaran=<?php echo $tahun_ajaran; ?>"><img src="images/batal.gif" border="0" alt="klik disini untuk Batal"></a></td>
            </tr>
        </table>
    </form>
    <?php
    mysql_free_result($hasil);
}
?>

<?php
####################### DATA SISWA #########################

function data_siswa($key, $kategori, $perlihat) {
    ?>
    <?php
    if ($kategori == 'NIS') {
        $strsql = "select siswa.*,nilai.* from siswa INNER JOIN nilai ON siswa.NIS = nilai.NIS where nilai.NIS like '%$key%' ORDER BY nilai.NIS";
    } elseif ($kategori == 'NAMA') {
        $strsql = "select nis,nama_lengkap from siswa where nama_lengkap like '%$key%'";
    } else {
        $strsql = "select nis,nama_lengkap from siswa order by nis";
    }
    $lihat = mysql_query($strsql);
    $baris = mysql_num_rows($lihat);
    if ($perlihat > 1) {
        $ada = 15 * ($perlihat - 1);
        $i = $perlihat * 15;
        for ($i = 1; $i <= $ada; $i++) {
            $data = mysql_fetch_array($lihat);
        }
    } else {
        $perlihat = 1;
        $i = $perlihat;
    }
    for (; $i <= $perlihat * 15 && $i <= $baris; $i++) {
        $row = mysql_fetch_array($lihat);
        $NO++;
        if ($NO % 2 == 1)
            $warna = "";
        else
            $warna = "";
        ?>
        <tr bgcolor="<?php echo $warna; ?>">
            <td><a href="#" onClick='Popreport_look_siswa("detil_siswa.php?nis=<?php echo $row[nis]; ?>");' class="link2"><?php echo $row[nis]; ?></a></td>
            <td><?php echo $row[nama_lengkap]; ?></td>
<td><?php echo $row[kelas]; ?></td>
            <td><a href="?act=edit&nis=<?php echo $row[nis]; ?>&perlihat=<?php echo $perlihat; ?>"><img src="images/edit_2.gif" alt="klik disini untuk Edit Data" border="0"></a></td>
            <td><a href="?act=del&nis=<?php echo $row[nis]; ?>" onClick="return confirmdelete('Menghapus NAMA SISWA: <?php echo $string = strtoupper($row[nama_lengkap]); ?>');"><img src="images/delete.gif" alt="klik disini untuk Hapus Data" border="0"></a></td>
        </tr>
        <?php
    }
    mysql_free_result($lihat);
    ?>
    <table>
        <tr>
            <td>
                <a class=text_login>Halaman ke : </a>
                <?php
                if ($perlihat > 1) {
                    $belakang = $perlihat - 1;
                }$baris1 = $baris - $perlihat * 15;
                $lin = (int) ($baris / 15);
                if ($baris % 15 > 0) {
                    $lin = $lin + 1;
                }
                if ($lin > 1) {
                    for ($i = 1; $i <= $lin; $i++) {
                        if ($i != $perlihat) {
                            ?>
                            &nbsp;<a href="<?php echo "?perlihat=$i&key=$key&kategori=$kategori"; ?>" class="link_halaman"><?php echo $i; ?></a>&nbsp;
                            <?php
                        } else {
                            ?>
                            &nbsp;<?php echo "<a class=text_login>$i</a>"; ?>&nbsp;
                            <?php
                        }
                    }
                }
                if ($baris1 > 0) {
                    $perlihat = $perlihat + 1;
                }
//end function
                echo "</a></td></tr></table></tr></td>";
            }
            ?>

            <?php
###################################### TAMBAH DATA GURU #########################################

            function tambah_siswa($nis, $nama_lengkap, $nama_panggilan, $alamat, $telp_rumah, $telp_hp, $tempat_lahir, $tgl_lahir, $sex, $agama, $nomor_induk, $anak_ke, $status, $jenis_ijazah, $tahun_ijazah, $nomor_ijazah, $nama_ayah, $pekerjaan_ayah, $alamat_ayah, $telp_rumah_ayah, $telp_hp_ayah, $nama_ibu, $pekerjaan_ibu, $alamat_ibu, $telp_rumah_ibu, $telp_hp_ibu, $nama_wali, $pekerjaan_wali, $alamat_wali, $telp_rumah_wali, $telp_hp_wali, $catatan_lain, $foto, $aktif, $tahun, $bulan, $tgl) {
                ?>
                <h3>TAMBAH DATA SISWA</h3>
                <form name="frm_tambah_mhs" method="post" action="insert_siswa.php" enctype="multipart/form-data">
                    <table class="table-bordered">
                        <thead>
                        <th colspan="4">DATA SISWA</th>
                        </thead>
                        <tr>
                            <td>NIS</td>
                            <td><input name="nis" type="text" class="input-medium" value="<?php echo $nis; ?>"></td>
                        </tr>
                        <tr>
                            <td>NAMA LENGKAP</td>
                            <td><input name="nama_lengkap" type="text" class="input-xlarge" value="<?php echo $nama_lengkap; ?>"></td>
                        </tr>
                        <tr>
                            <td>NAMA PANGGILAN</td>
                            <td><input name="nama_panggilan" type="text" class="input-mini" value="<?php echo $nama_panggilan; ?>"></td>
                        </tr>
                        <tr>
                            <td>ALAMAT</td>
                            <td><input name="alamat" type="text" class="input-xxlarge" value="<?php echo $alamat; ?>"></td>
                        </tr>
                        <tr>
                            <td>TELP. RUMAH</td>
                            <td><input name="telp_rumah" type="text" class="input-medium" value="<?php echo $telp_rumah; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>TELP. HP</td>
                            <td><input name="telp_hp" type="text" class="input-medium" value="<?php echo $telp_hp; ?>"></td>
                        </tr>
                        <tr>
                            <td>TEMPAT LAHIR</td>
                            <td><input name="tempat_lahir" type="text" class="input-medium" value="<?php echo $tempat_lahir; ?>"></td>
                        </tr>
                        <tr>
                            <td>TGL. LAHIR</td>
                            <td><input name="tahun" type="text"  onkeyup="formatangka(this);" class="input-mini" maxlength="4" onSelect="formatangka(this);" value="<?php echo $tahun; ?>">
                                -
                                <input name="bulan" type="text"  onkeyup="formatangka(this);" class="input-mini" maxlength="2" onSelect="formatangka(this);" value="<?php echo $bulan; ?>">
                                -
                                <input name="tgl" type="text"  onkeyup="formatangka(this)" class="input-mini" maxlength="2" onSelect="formatangka(this)" value="<?php echo $tgl; ?>">
                                <br/><i>( tahun / bulan / tgl. )</i></td>
                        </tr>
                        <tr>
                            <td>JENIS KELAMIN</td>
                            <td><input type="radio" name="jenis_kelamin" value="L" checked>
                                Laki - laki
                                <input type="radio" name="jenis_kelamin" value="P" >
                                Perempuan</td>
                        </tr>
                        <tr>
                            <td>AGAMA</td>
                            <td><select name="agama" class="input-medium">
                                    <?php
                                    $strsql_agama = "SELECT id,agama FROM agama order by id asc";
                                    $hasil_agama = mysql_query($strsql_agama);
                                    while ($row_agama = mysql_fetch_array($hasil_agama)) {
                                        echo("<OPTION VALUE='$row_agama[agama]'>$row_agama[agama]</OPTION>");
                                    }
                                    ?>
                                </select></td>
                        </tr>
                        <tr>
                            <td>ANAK KE</td>
                            <td><input name="anak_ke" type="text" class="input-mini" onSelect="formatangka(this)" onkeyup="formatangka(this)" value="<?php echo $anak_ke; ?>" maxlength="2"></td>
                        </tr>
                        <tr>
                            <td>STATUS KELUARGA</td>
                            <td><select name="status" class="input-medium">
                                    <option value="Anak Kandung">Anak Kandung</option>
                                    <option value="Anak Angkat">Anak Angkat</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td>JENIS IJAZAH MASUK</td>
                            <td><select name="jenis_ijazah" class="input-mini">
                                    <option value="SMP">SMP</option>
                                    <option value="MTS">MTS</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td>TAHUN IJAZAH</td>
                            <td><input name="tahun_ijazah" type="text" class="input-mini" onSelect="formatangka(this)" onkeyup="formatangka(this)" value="<?php echo $tahun_ijazah; ?>" maxlength="4"></td>
                        </tr>
                        <tr>
                            <td>NOMOR IJAZAH</td>
                            <td><input name="nomor_ijazah" type="text" class="input-medium" value="<?php echo $nomor_ijazah; ?>"></td>
                        </tr>
                        <tr>
                            <td>CATATAN LAIN</td>
                            <td><textarea name="catatan_lain" cols="8" rows="3" class="span12" ><?php echo $catatan_lain; ?></textarea></td>
                        </tr>
                        <tr>
                            <td>FOTO</td>
                            <td><input type="file" name="foto" class="input-medium"></td>
                        </tr>
                        <tr>
                            <td height="25"> AKTIF</td>
                            <!--<td><div align="center">:</div></td>-->
                            <td><input name="aktif" type="radio"  value="1" checked>
                                Ya
                                <input type="radio" name="aktif" value="0" >
                                Tidak</td>
                        </tr>
                        <thead>
                        <th colspan="2">DATA AYAH</th>
                        </thead>
                        <tr>
                            <td>NAMA AYAH </td>
                            <td><input name="nama_ayah" type="text" class="input-xlarge" value="<?php echo $nama_ayah; ?>"></td>
                        </tr>
                        <tr>
                            <td>PEKERJAAN</td>
                            <td> <select name="pekerjaan_ayah" class="input-medium">
                                    <?php
                                    $strsql_pekerjaan = "select id,kerja from pekerjaan order by id asc";
                                    $hasil_pekerjaan = mysql_query($strsql_pekerjaan);
                                    while ($row_pekerjaan = mysql_fetch_array($hasil_pekerjaan)) {
                                        echo("<OPTION VALUE='$row_pekerjaan[kerja]'>$row_pekerjaan[kerja]</OPTION>");
                                    }
                                    ?>
                                </select></td>
                        </tr>
                        <tr>
                            <td>ALAMAT</td>
                            <td><input name="alamat_ayah" type="text" class="input-xxlarge" value="<?php echo $alamat_ayah; ?>"></td>
                        </tr>
                        <tr>
                            <td>TELP. RUMAH</td>
                            <td><input name="telp_rumah_ayah" type="text" class="input-medium" value="<?php echo $telp_rumah_ayah; ?>"></td>
                        </tr>
                        <tr>
                            <td>TELP. HP</td>
                            <td><input name="telp_hp_ayah" type="text" class="input-medium" value="<?php echo $telp_hp_ayah; ?>">
                            </td>
                        </tr>
                        <thead>
                        <th colspan="2">DATA IBU</th>
                        </thead>
                        <tr>
                            <td>NAMA IBU</td>
                            <td><input name="nama_ibu" type="text" class="input-xlarge" value="<?php echo $nama_ibu; ?>"></td>
                        </tr>
                        <tr>
                            <td>PEKERJAAN</td>
                            <td><select name="pekerjaan_ibu" class="input-medium">
                                    <?php
                                    $strsql_pekerjaan = "select id,kerja from pekerjaan order by id asc";
                                    $hasil_pekerjaan = mysql_query($strsql_pekerjaan);
                                    while ($row_pekerjaan = mysql_fetch_array($hasil_pekerjaan)) {
                                        echo("<OPTION VALUE='$row_pekerjaan[kerja]'>$row_pekerjaan[kerja]</OPTION>");
                                    }
                                    ?>
                                </select></td>
                        </tr>
                        <tr>
                            <td>ALAMAT</td>
                            <td><input name="alamat_ibu" type="text" class="input-xxlarge" value="<?php echo $alamat_ibu; ?>"></td>
                        </tr>
                        <tr>
                            <td>TELP. RUMAH</td>
                            <td><input name="telp_rumah_ibu" type="text" class="input-medium" value="<?php echo $telp_rumah_ibu; ?>"></td>
                        </tr>
                        <tr>
                            <td>TELP. HP</td>
                            <td><input name="telp_hp_ibu" type="text" class="input-medium" value="<?php echo $telp_hp_ibu; ?>"></td>
                        </tr>
                        <thead>
                        <th colspan="2">DATA WALI</th>
                        </thead>
                        <tr>
                            <td>NAMA WALI</td>
                            <td><input name="nama_wali" type="text" class="input-xlarge" value="<?php echo $nama_wali; ?>"></td>
                        </tr>
                        <tr>
                            <td>PEKERJAAN</td>
                            <td><select name="pekerjaan_wali" class="input-medium">
                                    <?php
                                    $strsql_pekerjaan = "select id,kerja from pekerjaan order by id asc";
                                    $hasil_pekerjaan = mysql_query($strsql_pekerjaan);
                                    while ($row_pekerjaan = mysql_fetch_array($hasil_pekerjaan)) {
                                        echo("<OPTION VALUE='$row_pekerjaan[kerja]'>$row_pekerjaan[kerja]</OPTION>");
                                    }
                                    ?>
                                </select></td>
                        </tr>
                        <tr>
                            <td>ALAMAT</td>
                            <td><input name="alamat_wali" type="text" class="input-xxlarge" value="<?php echo $alamat_wali; ?>"></td>
                        </tr>
                        <tr>
                            <td>TELP. RUMAH</td>
                            <td><input name="telp_rumah_wali" type="text" class="input-medium" value="<?php echo $telp_rumah_wali; ?>"></td>
                        </tr>
                        <tr>
                            <td>TELP. HP</td>
                            <td><input name="telp_hp_wali" type="text" class="input-medium" value="<?php echo $telp_hp_wali; ?>"></td>
                        </tr>
                        <tr>
                            <td colspan="4"><input name="Submit22222" type="image" value="Submit" src="images/simpan.gif" alt="klik disini untuk Simpan Data">
                                <a href="data_siswa.php?perlihat=<?php echo $perlihat; ?>"><img src="images/kembali.gif" border="0" alt="klik disini untuk Kembali ke Halaman Sebelumnya"></a></td>
                        </tr>
                    </table>
                </form>
                <?php
            }
            ?>

            <?php
###################################### EDIT DATA SISWA #########################################

            function edit_siswa($nis, $perlihat) {
                $strsql = "select nis,nama_lengkap,nama_panggilan,alamat,telp_rumah,telp_hp,tempat_lahir,tgl_lahir,sex,agama,anak_ke,status,
jenis_ijazah,tahun_ijazah,nomor_ijazah,nama_ayah,pekerjaan_ayah,alamat_ayah,telp_rumah_ayah,telp_hp_ayah,nama_ibu,pekerjaan_ibu,
alamat_ibu,telp_rumah_ibu,telp_hp_ibu,nama_wali,pekerjaan_wali,alamat_wali,telp_rumah_wali,telp_hp_wali,catatan_lain,aktif,foto
from siswa where nis='$nis'";
                $hasil = mysql_query($strsql);
                $row = mysql_fetch_array($hasil);
                ?>
                <h2>EDIT DATA SISWA</h2>
                <form name="frm_tambah_mhs" method="post" action="update_siswa.php" enctype="multipart/form-data">
                    <input type="hidden" name="nis" value="<?php echo $nis; ?>">
                    <input type="hidden" name="perlihat" value="<?php echo $perlihat; ?>">
                    <table class="table-bordered">
                        <thead>
                        <th colspan="4">EDIT DATA SISWA</th>
                        </thead>
                        <tr>
                            <td>NIS</td>
                            <td><?php echo $nis; ?></td>
                        </tr>
                        <tr>
                            <td>NAMA LENGKAP</td>
                            <td><input name="nama_lengkap" type="text" class="input-xlarge"  value="<?php echo $row[nama_lengkap]; ?>"></td>
                        </tr>
                        <tr>
                            <td>NAMA PANGGILAN</td>
                            <td><input name="nama_panggilan" type="text" class="input-mini"  value="<?php echo $row[nama_panggilan]; ?>"></td>
                        </tr>
                        <tr>
                            <td>ALAMAT</td>
                            <td><input name="alamat" type="text" class="input-xxlarge"  value="<?php echo $row[alamat]; ?>"></td>
                        </tr>
                        <tr>
                            <td>TELP. RUMAH</td>
                            <td><input name="telp_rumah" type="text" class="input-medium"  value="<?php echo $row[telp_rumah]; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>TELP. HP</td>
                            <td><input name="telp_hp" type="text" class="input-medium"  value="<?php echo $row[telp_hp]; ?>"></td>
                        </tr>
                        <tr>
                            <td>TEMPAT LAHIR</td>
                            <td><input name="tempat_lahir" type="text" class="input-medium"  value="<?php echo $row[tempat_lahir]; ?>"></td>
                        </tr>
                        <tr>
                            <td>TGL. LAHIR</td>
                            <td>
                                <?php
                                $temp = explode("-", $row[tgl_lahir]);
                                $tahun = $temp[0];
                                $bulan = $temp[1];
                                $tgl = $temp[2];
                                ?>
                                <input name="tahun" type="text" onkeyup="formatangka(this)" class="input-mini" class="input-mini"  maxlength="4" onSelect="formatangka(this)" value="<?php echo $tahun; ?>">
                                -
                                <input name="bulan" type="text" onkeyup="formatangka(this)" class="input-mini" class="input-mini" maxlength="2" onSelect="formatangka(this)" value="<?php echo $bulan; ?>">
                                -
                                <input name="tgl" type="text" onkeyup="formatangka(this)" class="input-mini" class="input-mini" maxlength="2" onSelect="formatangka(this)" value="<?php echo $tgl; ?>">
                                <br/><i>( tahun / bulan / tgl. )</i></td>
                        </tr>
                        <tr>
                            <td>JENIS KELAMIN</td>
                            <td>
                                <?php
                                if ($row[sex] == 'L') {
                                    ?>
                                    <input type="radio" name="jenis_kelamin" value="L"  checked>
                                    Laki - laki 
                                    <input type="radio" name="jenis_kelamin" value="P" >
                                    Perempuan
                                    <?php
                                } else {
                                    ?>
                                    <input type="radio" name="jenis_kelamin" value="L" >
                                    Laki - laki
                                    <input type="radio" name="jenis_kelamin" value="P"  checked>
                                    Perempuan
                                    <?php
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>AGAMA</td>
                            <td><select name="agama" id="select" class="input-medium" >
                                    <?php
                                    $strsql2 = "select id,agama FROM agama where agama='$row[agama]'";
                                    $hasil2 = mysql_query($strsql2);
                                    $row2 = mysql_fetch_array($hasil2);
                                    echo("<OPTION VALUE='$row2[agama]'>$row2[agama]</OPTION>");

                                    $strsql_agama = "SELECT id,agama FROM agama where agama<>'$row[agama]' order by id asc";
                                    $hasil_agama = mysql_query($strsql_agama);
                                    while ($row_agama = mysql_fetch_array($hasil_agama)) {
                                        echo("<OPTION VALUE='$row_agama[agama]'>$row_agama[agama]</OPTION>");
                                    }
                                    ?>
                                </select></td>
                        </tr>
                        <tr>
                            <td>ANAK KE</td>
                            <td><input name="anak_ke" type="text" class="input-mini" onSelect="formatangka(this);" onkeyup="formatangka(this);" value="<?php echo $row[anak_ke]; ?>" maxlength="2"></td>
                        </tr>
                        <tr>
                            <td>STATUS KELUARGA</td>
                            <td><select name="status" class="input-medium" >
                                    <option value="Anak Kandung" <?php if ($row[status] == 'Anak Kandung') echo "SELECTED"; ?>>Anak Kandung</option>
                                    <option value="Anak Angkat" <?php if ($row[status] == 'Anak Angkat') echo "SELECTED"; ?>>Anak Angkat</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td>JENIS IJAZAH MASUK</td>
                            <td><select name="jenis_ijazah" class="input-mini" >
                                    <option value="SMP" <?php if ($row[jenis_ijazah] == 'SMP') echo "SELECTED"; ?>>SMP</option>
                                    <option value="MTS" <?php if ($row[jenis_ijazah] == 'MTS') echo "SELECTED"; ?>>MTS</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td>TAHUN IJAZAH</td>
                            <td><input name="tahun_ijazah" type="text" class="input-mini" onSelect="formatangka(this);" onkeyup="formatangka(this);" value="<?php echo $row[tahun_ijazah]; ?>" maxlength="4"></td>
                        </tr>
                        <tr>
                            <td>NOMOR IJAZAH</td>
                            <td><input name="nomor_ijazah" type="text" class="input-medium" value="<?php echo $row[nomor_ijazah]; ?>"></td>
                        </tr>
                        <tr>
                            <td>CATATAN LAIN</td>
                            <td><textarea name="catatan_lain" cols="8" rows="3" class="span12" ><?php echo $row[catatan_lain]; ?></textarea></td>
                        </tr>
                        <tr>
                            <td>FOTO</td>
                            <td>
                                <?php
                                if ($row[foto] <> '')
                                    echo "<img src='foto/$row[foto]' width='120' height='110'>";
                                ?>
                                <input type="file"  name="foto" class="input-medium" >
                            </td>
                        </tr>
                        <tr>
                            <td>AKTIF</td>
                            <td>
                                <?php
                                if ($row[aktif] == '1') {
                                    ?>
                                    <input name="aktif" type="radio"  value="1" checked>
                                    Ya
                                    <input type="radio" name="aktif" value="0" >
                                    Tidak
                                    <?php
                                } else {
                                    ?>
                                    <input name="aktif" type="radio"  value="1">
                                    Ya
                                    <input type="radio" name="aktif" value="0"  checked>
                                    Tidak
                                    <?php
                                }
                                ?>
                            </td>
                        </tr>
                        <thead>
                        <th colspan="3">DATA AYAH</th>
                        </thead>
                        <tr>
                            <td>NAMA AYAH </td>
                            <td><input name="nama_ayah" type="text" class="input-xlarge" value="<?php echo $row[nama_ayah]; ?>"></td>
                        </tr>
                        <tr>
                            <td>PEKERJAAN</td>
                            <td> <select name="pekerjaan_ayah" >
                                    <?php
                                    $hasil_p_ayah = mysql_query("select id,kerja from pekerjaan where kerja='$row[pekerjaan_ayah]'");
                                    $row_p_ayah = mysql_fetch_array($hasil_p_ayah);
                                    echo("<OPTION VALUE='$row_p_ayah[kerja]'>$row_p_ayah[kerja]</OPTION>");

                                    $strsql_pekerjaan = "select id,kerja from pekerjaan where kerja<>'$row[pekerjaan_ayah]'";
                                    $hasil_pekerjaan = mysql_query($strsql_pekerjaan);
                                    while ($row_pekerjaan = mysql_fetch_array($hasil_pekerjaan)) {
                                        echo("<OPTION VALUE='$row_pekerjaan[kerja]'>$row_pekerjaan[kerja]</OPTION>");
                                    }
                                    ?>
                                </select></td>
                        </tr>
                        <tr>
                            <td>ALAMAT</td>
                            <td><input name="alamat_ayah" type="text" class="input-xxlarge" value="<?php echo $row[alamat_ayah]; ?>"></td>
                        </tr>
                        <tr>
                            <td>TELP. RUMAH</td>
                            <td><input name="telp_rumah_ayah" type="text" class="input-medium" value="<?php echo $row[telp_rumah_ayah]; ?>"></td>
                        </tr>
                        <tr>
                            <td>TELP. HP</td>
                            <td><input name="telp_hp_ayah" type="text" class="input-medium" value="<?php echo $row[telp_hp_ayah]; ?>">
                            </td>
                        </tr>
                        <thead>
                        <th colspan="3">DATA IBU</th>
                        </thead>
                        <tr>
                            <td>NAMA IBU</td>
                            <td><input name="nama_ibu" type="text" class="input-xlarge" value="<?php echo $row[nama_ibu]; ?>"></td>
                        </tr>
                        <tr>
                            <td>PEKERJAAN</td>
                            <td><select name="pekerjaan_ibu" class="input-medium" >
                                    <?php
                                    $hasil_p_ayah = mysql_query("select id,kerja from pekerjaan where kerja='$row[pekerjaan_ibu]'");
                                    $row_p_ayah = mysql_fetch_array($hasil_p_ayah);
                                    echo("<OPTION VALUE='$row_p_ayah[kerja]'>$row_p_ayah[kerja]</OPTION>");

                                    $strsql_pekerjaan = "select id,kerja from pekerjaan where kerja<>'$row[pekerjaan_ibu]'";
                                    $hasil_pekerjaan = mysql_query($strsql_pekerjaan);
                                    while ($row_pekerjaan = mysql_fetch_array($hasil_pekerjaan)) {
                                        echo("<OPTION VALUE='$row_pekerjaan[kerja]'>$row_pekerjaan[kerja]</OPTION>");
                                    }
                                    ?>
                                </select></td>
                        </tr>
                        <tr>
                            <td>ALAMAT</td>
                            <td><input name="alamat_ibu" type="text" class="input-xlarge"  value="<?php echo $row[alamat_ibu]; ?>"></td>
                        </tr>
                        <tr>
                            <td>TELP. RUMAH</td>
                            <td><input name="telp_rumah_ibu" type="text" class="input-medium" value="<?php echo $row[telp_rumah_ibu]; ?>"></td>
                        </tr>
                        <tr>
                            <td>TELP. HP</td>
                            <td><input name="telp_hp_ibu" type="text" class="input-medium" value="<?php echo $row[telp_hp_ibu]; ?>"></td>
                        </tr>
                        <thead>
                        <th colspan="3">DATA WALI</th>
                        </thead>
                        <tr>
                            <td>NAMA WALI</td>
                            <td><input name="nama_wali" type="text" class="input-xlarge" value="<?php echo $row[nama_wali]; ?>"></td>
                        </tr>
                        <tr>
                            <td>PEKERJAAN</td>
                            <td><select name="pekerjaan_wali" class="input-medium" >
                                    <?php
                                    $hasil_p_ayah = mysql_query("select id,kerja from pekerjaan where kerja='$row[pekerjaan_wali]'");
                                    $row_p_ayah = mysql_fetch_array($hasil_p_ayah);
                                    echo("<OPTION VALUE='$row_p_ayah[kerja]'>$row_p_ayah[kerja]</OPTION>");

                                    $strsql_pekerjaan = "select id,kerja from pekerjaan where kerja<>'$row[pekerjaan_wali]'";
                                    $hasil_pekerjaan = mysql_query($strsql_pekerjaan);
                                    while ($row_pekerjaan = mysql_fetch_array($hasil_pekerjaan)) {
                                        echo("<OPTION VALUE='$row_pekerjaan[kerja]'>$row_pekerjaan[kerja]</OPTION>");
                                    }
                                    ?>
                                </select></td>
                        </tr>
                        <tr>
                            <td>ALAMAT</td>
                            <td><input name="alamat_wali" type="text" class="input-xxlarge"  value="<?php echo $row[alamat_wali]; ?>"></td>
                        </tr>
                        <tr>
                            <td>TELP. RUMAH</td>
                            <td><input name="telp_rumah_wali" type="text" class="input-medium" value="<?php echo $row[telp_rumah_wali]; ?>"></td>
                        </tr>
                        <tr>
                            <td>TELP. HP</td>
                            <td><input name="telp_hp_wali" type="text" class="input-medium" value="<?php echo $row[telp_hp_wali]; ?>"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input name="Submit22222" type="image" value="Submit" src="images/simpan.gif" alt="klik disini untuk Simpan Data">
                                <a href="data_siswa.php?perlihat=<?php echo $perlihat; ?>"><img src="images/batal.gif" border="0" alt="klik disini untuk Batal"></a></td>
                        </tr>
                    </table>
                </form>
                <?php
            }
            ?>


            <?php
############################## USER MANAGER ##############################

            function user_manager($status, $key, $kategori, $perlihat) {
                ?>
                <?php
                if (!empty($key)) {
                    $strsql = "select ID,LOGIN,PWD,TIPE,AKTIF,LAST_LOGIN from usermanager where TIPE='$status' and LOGIN like '%$key%' ORDER by ID";
                } else {
                    $strsql = "select ID,LOGIN,PWD,TIPE,AKTIF,LAST_LOGIN from usermanager where TIPE='$status' ORDER by ID";
                }
                $lihat = mysql_query($strsql);
                $baris = mysql_num_rows($lihat);
                if ($perlihat > 1) {
                    $ada = 20 * ($perlihat - 1);
                    $i = $perlihat * 20;
                    for ($i = 1; $i <= $ada; $i++) {
                        $data = mysql_fetch_array($lihat);
                    }
                } else {
                    $perlihat = 1;
                    $i = $perlihat;
                }
                for (; $i <= $perlihat * 20 && $i <= $baris; $i++) {
                    $row = mysql_fetch_array($lihat);
                    $NO++;
                    if ($NO % 2 == 1)
                        $warna = "";
                    else
                        $warna = "";
                    ?>
            <tr  bgcolor="<?php echo $warna; ?>">
                <td height="25"><?php echo $row[LOGIN]; ?></td>
                <td align="center"><?php
                    if ($row[AKTIF] == '1')
                        echo "<img src=images/tick.png>";
                    else
                        echo "<img src=images/cancel.png>";
                    ?>
                </td>
                <td align="center"><?php echo $row[LAST_LOGIN]; ?></td>
                <td align="center" width="30"><a href="?act=edit&status=<?php echo $status; ?>&key=<?php echo $key; ?>&id=<?php echo $row[ID]; ?>"><img src="images/edit_2.gif" alt="klik disini untuk Edit Data" border="0"></a></td>
                <td align="center" width="30"><a href="?act=del&status=<?php echo $status; ?>&key=<?php echo $key; ?>&id=<?php echo $row[ID]; ?>" onClick="return confirmdelete('Menghapus USERNAME: <?php echo $row[LOGIN]; ?>');"><img src="images/delete.gif" alt="klik disini untuk Hapus Data" border="0"></a></td>
                <td align="center" width="30"><a href="?act=set&status=<?php echo $status; ?>&key=<?php echo $key; ?>&id=<?php echo $row[ID]; ?>&aktif=<?php echo $row[AKTIF]; ?>"><img src="images/lock.png" alt="klik disini untuk set Aktif atau Non-Aktif User" border="0"></a></td>
            </tr>
            <?php
        }
        mysql_free_result($lihat);
        ?>
        <table>
            <tr>
                <td>
                    <a class=text_login>Halaman ke : </a>
                    <?php
                    if ($perlihat > 1) {
                        $belakang = $perlihat - 1;
                    }$baris1 = $baris - $perlihat * 20;
                    $lin = (int) ($baris / 20);
                    if ($baris % 20 > 0) {
                        $lin = $lin + 1;
                    }
                    if ($lin > 1) {
                        for ($i = 1; $i <= $lin; $i++) {
                            if ($i != $perlihat) {
                                ?>
                                &nbsp;<a href="<?php echo "?perlihat=$i&key=$key&kategori=$kategori&status=$status"; ?>" class="link_halaman"><?php echo $i; ?></a>&nbsp;
                                <?php
                            } else {
                                ?>
                                &nbsp;<?php echo "<a class=text_login>$i</a>"; ?>&nbsp;
                                <?php
                            }
                        }
                    }
                    if ($baris1 > 0) {
                        $perlihat = $perlihat + 1;
                    }
//end function
                    echo "</a></td></tr></table></tr></td>";
                }
                ?>

                <?php
############################# TAMBAH USER MANAGER ########################

                function tambah_user($status) {
                    ?>
                    <form name="frm_insert_ajaran" method="post" action="insert_usermanager.php">
                        <input type="hidden" name="status" value="<?php echo $status; ?>">
                        <table class="table-bordered">
                            <thead>
                            <th colspan="4">Tambah Data User</th>
                            </thead>
                            <tr>
                                <td>STATUS</td>
                                <td>
                                    <?php
                                    if ($status == '1') {
                                        echo "ADMINISTRATOR";
                                    } elseif ($status == '2') {
                                        echo "SISWA";
                                    } elseif ($status == '3') {
                                        echo "GURU";
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>USERNAME</td>
                                <td><input name="username" type="text" class="input-medium" maxlength="10"></td>
                            </tr>
                            <tr>
                                <td>PASSWORD</td>
                                <td><input name="password" type="password" class="input-medium" maxlength="10"></td>
                            </tr>
                            <tr>
                                <td colspan="4"><input name="Submit22" type="image" value="Submit" src="images/simpan.gif" alt="klik disini untuk Simpan Data">
                                    <a href="user_manager.php?status=<?php echo $status; ?>"><img src="images/kembali.gif" border="0" alt="klik disini untuk Kembali ke Halaman Sebelumnya"></a></td>
                            </tr>
                        </table>
                    </form>
                    <?php
                }
                ?>

                <?php
############################# EDIT USER MANAGER ########################

                function edit_user($status, $key, $id) {
                    $strsql = "select ID,LOGIN,PWD,TIPE,AKTIF,LAST_LOGIN from usermanager where ID='$id'";
                    $hasil = mysql_query($strsql);
                    $row = mysql_fetch_array($hasil);
                    ?>
                    <form name="frm_insert_ajaran" method="post" action="update_usermanager.php">
                        <input type="hidden" name="status" value="<?php echo $status; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="key" value="<?php echo $key; ?>">
                        <table class="table-bordered">
                            <thead>
                            <th colspan="4">Edit Data User</th>
                            </thead>
                            <tr>
                                <td>STATUS</td>
                                <td>
                                    <?php
                                    if ($status == '1') {
                                        echo "ADMINISTRATOR";
                                    } elseif ($status == '2') {
                                        echo "SISWA";
                                    } elseif ($status == '3') {
                                        echo "GURU";
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>USERNAME</td>
                                <td><input name="username" type="text" class="input-medium" value="<?php echo $row[LOGIN]; ?>" maxlength="10"></td>
                            </tr>
                            <tr>
                                <td>PASSWORD</td>
                                <td><input name="password" type="password" class="input-medium" value="<?php echo $row[PWD]; ?>" maxlength="10"></td>
                            </tr>
                            <tr>
                                <td colspan="4"><input name="Submit22" type="image" value="Submit" src="images/simpan.gif" alt="klik disini untuk Simpan Data">
                                    <a href="user_manager.php?status=<?php echo $status; ?>&key=<?php echo $key; ?>"><img src="images/kembali.gif" border="0" alt="klik disini untuk Kembali ke Halaman Sebelumnya"></a></td>
                            </tr>
                        </table>
                    </form>
                    <?php
                }
                ?>

                <?php
############# HALAMAN MASTER BERITA #############

                function master_berita($id_berita, $perlihat) {
                    ?>
                    <?php
                    $strsql = "select id,judul,isi,waktu,gambar from berita order by id";
                    $hasil = mysql_query($strsql);
                    while ($row = mysql_fetch_array($hasil)) {
                        $NO++;
                        if ($NO % 2 == 1)
                            $warna = "";
                        else
                            $warna = "";
                        ?>
                <tr bgcolor="<? echo $warna ?>">
                    <td align="left" height="25"><?php echo $row[judul]; ?></td>
                    <td align="left"><?php echo $row[waktu]; ?></td>
                    <td align="center" width="30"><a href="?act=edit_berita&id=<?php echo $row[id]; ?>"><img src="images/edit_2.gif" alt="klik disini untuk Edit Data" border="0"></a></td>
                    <td align="center" width="30"><a href="?act=del&id=<?php echo $row[id]; ?>" onClick="return confirmdelete('Menghapus JUDUL: <?php echo strtoupper($row[judul]); ?>');"><img src="images/delete.gif" alt="klik disini untuk Hapus Data" border="0"></a></td>
                </tr>
                <?php
            }
            mysql_free_result($hasil);
        }
        ?>

        <?php
############# TAMBAH BERITA #############

        function tambah_berita($judul, $isi, $waktu, $gambar) {
            ?>
            <form method="post" action="insert_berita.php" enctype="multipart/form-data">
                <table class="table-bordered">
                    <thead>
                    <th colspan="4">Tambah Data Berita</th>
                    </thead>
                    <tr>
                        <td>JUDUL</td>
                        <td><input name="judul" type="text" size="50" value="<?php echo $judul; ?>"></td>
                    </tr>
                    <tr>
                        <td>ISI BERITA</td>
                        <td><textarea name="isi" cols="7" rows="5" ><?php echo $isi; ?></textarea></td>
                    </tr>
                    <tr>
                        <td>GAMBAR</td>
                        <td><input name="gambar" type="file" size="30" ></td>
                    </tr>
                    <tr>
                        <td colspan="4"><input name="Submit222" type="image" value="Submit" src="images/simpan.gif" alt="klik disini untuk Simpan Data">
                            <a href="?tengah=berita&menu=sukses"><img src="images/kembali.gif" border="0" alt="klik disini untuk Kembali ke Halaman Sebelumnya"></a></td>
                    </tr>
                </table>
            </form>
            <?php
        }
        ?>
        <?php
############# EDIT BERITA #############

        function edit_berita($id) {
            $strsql = "select id,judul,isi,waktu,gambar from berita where id='$id'";
            $hasil = mysql_query($strsql);
            $row = mysql_fetch_array($hasil);
            ?>
            <form method="post" action="update_berita.php" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $row[id]; ?>">
                <table class="table-bordered" style="width: 65%;" >
                    <thead>
                    <th colspan="4">Edit Berita</th>
                    </thead>
                    <tr>
                        <td>JUDUL</td>
                        <td><input name="judul" type="text"  id="judul2" size="50" value="<?php echo $row[judul]; ?>"></td>
                    </tr>
                    <tr>
                        <td>ISI BERITA</td>
                        <td><textarea name="isi" cols="75" rows="15"  id="isi2"><?php echo $row[isi]; ?></textarea></td>
                    </tr>
                    <tr>
                        <td>GAMBAR</td>
                        <td>
                            <?php
                            if ($row[gambar] <> '') {
                                ?>
                                <img src="gambar/<?php echo $row[gambar]; ?>" width="120" height="90" class="box2_000000">
                                <br>
                                <?php
                            }
                            ?>
                            <input name="gambar" type="file"  size="30" ></td>
                    </tr>
                    <tr>
                        <td><input name="Submit222" type="image" value="Submit" src="images/simpan.gif" alt="klik disini untuk Simpan Data">
                            <a href="?tengah=berita&menu=sukses"><img src="images/batal.gif" border="0" alt="klik disini untuk Batal"></a></td>
                    </tr>
                </table>
            </form>
            <?php
            mysql_free_result($hasil);
        }
        ?>
