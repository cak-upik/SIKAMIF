<?php
include "../global/config.php";


############################## ISI NILAI2 #################################

function isi_nilai3($tahun_ajaran, $kelas_id, $id, $key, $kategori, $semester) {
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
    ?>
<table class="table-bordered">
    <tr>
        <td>NIS</td>
        <td>:</td>
        <td><?php echo $row[NIS]; ?></td>
        <td>&nbsp;</td>
        <td>SEMESTER</td>
        <td>:</td>
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
        <td>:</td>
        <td><?php echo $row[NAMA_LENGKAP]; ?></td>
        <td></td>
        <td>TAHUN AJARAN</td>
        <td>:</td>
        <td><?php echo $tahun_ajaran; ?></td>
    </tr>
    <tr>
        <td>KELAS</td>
        <td>:</td>
        <td><?php echo $row[RUANG]; ?></td>
        <td></td>
        <td>WALI KELAS</td>
        <td>:</td>
        <td><?php echo $wali; ?></td>
    </tr>
</table>
<br/>

    <?php
//pengecekan apakah input baru atau data sudah ada
    $hasil_cek = mysql_query("select id_nilai,semester from nilai_detil where id_nilai='$id' and semester='$semester'");
    $cek = mysql_num_rows($hasil_cek);
    if (empty($cek)) {
        ?>
<form name="frm_isi_nilai" method="post" action="insert_nilai.php">
    <table class="table-bordered">
        <input type="hidden" name="semester" value="<?php echo $semester; ?>">
        <input type="hidden" name="id_nilai" value="<?php echo $id; ?>">
        <input type="hidden" name="tahun_ajaran" value="<?php echo $tahun_ajaran; ?>">
        <input type="hidden" name="kelas_id" value="<?php echo $kelas_id; ?>">
        <input type="hidden" name="key" value="<?php echo $key; ?>">
        <input type="hidden" name="kategori" value="<?php echo $kategori; ?>">
        <!--<input type="hidden" name="id_matpel" value="<?php echo $_POST['matpel']; ?>">-->
        <tr>
            <th colspan ="1"rowspan="2">No.</th>
            <th rowspan="2">MATA PELAJARAN</th>
            <th rowspan="1" colspan="4">NILAI ULANGAN HARIAN</th>
            <th colspan="1" rowspan="2">RATA-RATA</th>
            <th colspan="1" rowspan="2">NILAI UTS</th>
            <th colspan="1" rowspan="2">NILAI UAS</th>
            <th colspan="1" rowspan="2">NILAI RAPORT</th>
            <th colspan="1" rowspan="2">Catatan</th>
        </tr>
        <tr>
            <th rowspan="1">1</th>
            <th rowspan="1">2</th>
            <th rowspan="1">3</th>
            <th rowspan="1">4</th>
        </tr>

                <?php
                $strsql_nilai = "select id_matpel,nama_matpel,skm,kelas,tahun_ajaran from matpel where kelas='$str1' and tahun_ajaran='$tahun_ajaran' order by id_matpel";
                $hasil_nilai = mysql_query($strsql_nilai);
                while ($row_nilai = mysql_fetch_array($hasil_nilai)) {
                    $NO++;
                    ?>
        <tr>
            <td align="center"><?php echo $NO . "."; ?></td>
            <td>&nbsp;<?php echo $row_nilai[nama_matpel]; ?></td>
        <input type="hidden" name="id_matpel[]" value="<?php echo $row_nilai[id_matpel]; ?>">
        <td align="center"><input name="nilai_kd1[]" id="n1_<?php echo $NO; ?>" type="text" onselect="formatangka(this);" onkeyup="formatangka(this);" class="input-mini" maxlength="3" style="text-align:center"></td>
        <td align="center"><input name="nilai_kd2[]" id="n2_<?php echo $NO; ?>" type="text"onselect="formatangka(this);" class="input-mini" maxlength="3" style="text-align:center"></td>
        <td align="center"><input name="nilai_kd3[]" id="n23_<?php echo $NO; ?>" type="text"onselect="formatangka(this);" class="input-mini" maxlength="3" style="text-align:center"></td>
        <td align="center"><input name="nilai_kd4[]" id="n24_<?php echo $NO; ?>" type="text"onselect="formatangka(this);" onkeyup="calculate('<?php echo $NO; ?>');" class="input-mini" maxlength="3" style="text-align:center"></td>
        <td align="center"><input name="nilai_rata2[]" id="n3_<?php echo $NO; ?>" type="text"onselect="formatangka(this);" onkeyup="formatangka(this);" class="input-mini" maxlength="3" style="text-align:center" readonly></td>
        <td align="center"><input name="nilai_uts[]" id="n4_<?php echo $NO; ?>" type="text"onselect="formatangka(this);" onkeyup="formatangka(this);" class="input-mini" maxlength="3" style="text-align:center"></td>
        <td align="center"><input name="nilai_uas[]" id="n5_<?php echo $NO; ?>" type="text" onSelect="formatangka(this);" onkeyup="calculateReport('<?php echo $NO; ?>');" class="input-mini" maxlength="3" style="text-align:center"></td>
        <td align="center"><input name="nilai_rpt[]" id="n6_<?php echo $NO; ?>" type="text" class="input-mini" style="text-align:center" readonly></td>
        <td align="center"><input name="ket[]" id="n7_<?php echo $NO; ?>" type="text"value="" class="input-medium" style="text-align:center" readonly></td>
        </tr>

                    <?php
                }
                mysql_free_result($hasil_nilai);
                ?>
    </table>
            <?php
        } else {
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
                <th colspan ="1"rowspan="2">No.</th>
                <th rowspan="2">MATA PELAJARAN</th>
                <th rowspan="1" colspan="4">NILAI ULANGAN HARIAN</th>
                <th colspan ="1" rowspan="2">RATA-RATA</th>
                <th colspan="1" rowspan="2">NILAI UTS </th>
                <th colspan="1" rowspan="2">NILAI UAS </th>
                <th colspan="1" rowspan="2">NILAI RAPORT</th>
                <th colspan="1" rowspan="2">Catatan</th>
            </tr>
            <tr>
                <th rowspan="1">1</th>
                <th rowspan="1">2</th>
                <th rowspan="1">3</th>
                <th rowspan="1">4</th>
            </tr>
                    <?php
                    $strsql_nilai = "select distinct matpel.id_matpel, matpel.nama_matpel,matpel.skm,matpel.kelas, T1.id_matpel,T1.nilai_kd1,
	T1.nilai_kd2,T1.nilai_kd3,T1.nilai_kd4,T1.nilai_rata2,T1.nilai_sikap,T1.nilai_uts,T1.nilai_uas,T1.nilai_raport,T1.keterangan from matpel left join (select * from nilai_detil where id_nilai='$id' and semester='$semester')
	T1 on matpel.id_matpel=T1.id_matpel	where matpel.kelas='$str1' and tahun_ajaran='$tahun_ajaran' order by matpel.id_matpel";
//                    }
                    echo $strsql_nilai;
                    $hasil_nilai = mysql_query($strsql_nilai);
                    while ($row_nilai = mysql_fetch_array($hasil_nilai)) {
                        $NO++;
                        ?>
            <input type="hidden" name="id_matpel[]" value="<?php echo $row_nilai[id_matpel]; ?>">
            <tr>
                <td align="center"><?php echo $NO . "."; ?></td>
                <td>&nbsp;<?php echo $row_nilai[nama_matpel]; ?></td>
                <td height="25" align="center"><input name="nilai_kd1[]" id="n1_<?php echo $NO; ?>" type="text"onSelect="formatangka(this);" onkeyup="formatangka(this);" class="input-mini" maxlength="3" style="text-align:center" value="<?php echo $row_nilai[nilai_kd1]; ?>"></td>
                <td height="25" align="center"><input name="nilai_kd2[]" id="n2_<?php echo $NO; ?>" type="text"onSelect="formatangka(this);" onkeypress="formatangka(this);" class="input-mini" maxlength="3" style="text-align:center" value="<?php echo $row_nilai[nilai_kd2]; ?>"></td>
                <td height="25" align="center"><input name="nilai_kd3[]" id="n23_<?php echo $NO; ?>" type="text"onSelect="formatangka(this);" onkeypress="formatangka(this);" class="input-mini" maxlength="3" style="text-align:center" value="<?php echo $row_nilai[nilai_kd3]; ?>"></td>
                <td height="25" align="center"><input name="nilai_kd4[]" id="n24_<?php echo $NO; ?>" type="text"onSelect="formatangka(this);" onkeypress="formatangka(this);" onkeyup="calculate(<?php echo $NO; ?>);" class="input-mini" maxlength="3" style="text-align:center" value="<?php echo $row_nilai[nilai_kd4]; ?>"></td>
                <td align="center"><input name="nilai_rata[]" id="n3_<?php echo $NO; ?>" type="text"  value="<?php
                                if ($row_nilai[nilai_rata2] == '0')
                                    echo "";
                                else
                                    echo $row_nilai[nilai_rata2];
                                                      ?>"onSelect="formatangka(this);" onkeyup="formatangka(this);" class="input-mini" maxlength="3" style="text-align:center" readonly></td>
                <td align="center"><input name="nilai_uts[]" id="n4_<?php echo $NO; ?>" type="text" value="<?php echo $row_nilai[nilai_uts]; ?>"class="input-mini" maxlength="3" style="text-align:center"></td>
                <td align="center"><input name="nilai_uas[]" id="n5_<?php echo $NO; ?>" type="text" value="<?php echo $row_nilai[nilai_uas]; ?>" onkeyup="calculateReport(<?php echo $NO; ?>);"class="input-mini" maxlength="3" style="text-align:center"></td>
                <td align="center"><input name="nilai_rpt[]" id="n6_<?php echo $NO; ?>" type="text" value="<?php
                                if ($row_nilai[nilai_raport] == '0') {
                                    echo "";
                                } else {
                                    echo $row_nilai[nilai_raport];
                                }
                                                      ?>" onkeypress="formatangka(this);" class="input-mini" maxlength="3" style="text-align:center" readonly></td>
                <td align="center"><input name="ket[]" id="n7_<?php echo $NO; ?>" type="text" value="<?php echo $row_nilai[keterangan]; ?>" class="input-medium" style="text-align:center" readonly></td>
            </tr>
                        <?php
                    }
                    mysql_free_result($hasil_nilai);
                    ?>

                    <?php
                }
                ?>
            <tr>
                <td colspan="11" rowspan="0"><input name="Submit22" type="image" value="Submit" src="images/simpan.gif" alt="klik disini untuk Simpan Data"><img src="images/batal.gif" border="0" alt="klik disini untuk Batal" onclick="window.location = 'input_nilai.php?tahun_ajaran=<?= $tahun_ajaran ?>&kelas_id=<?= $kelas_id ?>&key=<?= $key ?>&kategori=<?= $kategori ?>&semester=<?= $semester ?>';"></td>
            </tr>
        </table>
    </form>
        <?php
    }
    ?>

    <?php
################################ DATA MATA PELAJARAN ######################

    function master_matpel($kls, $thn_ajaran) {
        $strsql = "select distinct id_matpel,nama_matpel,kelas from matpel where kelas='$kls' and tahun_ajaran='$thn_ajaran' order by id_matpel asc";
        $hasil = mysql_query($strsql);
        while ($row = mysql_fetch_array($hasil)) {
            $NO++;
            if ($NO % 2 == 1)
                $warna = "";
            else
                $warna = "";
            ?>
    <tr bgcolor="<?php echo $warna; ?>">
        <td height="25"><?php echo $row[nama_matpel]; ?></td>
        <td width="100" align="center"><a href="?act=edit&id=<?php echo $row[id_matpel]; ?>" class="btn"><i class="icon-edit"></i>Edit</a></td>
        <td width="100" align="center"><a href="?act=del&id=<?php echo $row[id_matpel]; ?>" class="btn btn-danger"><i class="icon-remove"></i>Hapus</a></td>
    </tr>
            <?php
        }
        mysql_free_result($hasil);
    }
    ?>

    <?php
################################ MANAJEMEN MATA PELAJARAN ######################

    function manage_matpel($kls, $thn_ajaran) {
        $strsql = "select id_matpel, nama_matpel, kelas, tahun_ajaran, id_guru, glr_depan, nama, glr_blk from matpel inner join guru on matpel.ID_GURU = guru.ID where kelas='$kls' and tahun_ajaran='$thn_ajaran' order by id_matpel asc";
        $hasil = mysql_query($strsql);
        while ($row = mysql_fetch_array($hasil)) {
            $NO++;
            if ($NO % 2 == 1)
                $warna = "";
            else
                $warna = "";
            ?>
    <tr bgcolor="<?php echo $warna; ?>">
        <td height="25"><?php echo $row[nama_matpel]; ?></td>
        <td height="25"><?php echo $row[glr_depan]. "" .$row[nama] . "" .$row[glr_blk]; ?></td>
        <td height="25"><?php echo $row[kelas]; ?></td>
        <td height="25"><?php echo $row[tahun_ajaran]; ?></td>
        <td width="100" align="center"><a href="?act=edit&id=<?php echo $row[id_matpel]; ?>" class="btn"><i class="icon-edit"></i>Edit</a></td>
        <td width="100" align="center"><a href="?act=del&id=<?php echo $row[id_matpel]; ?>" class="btn btn-danger"><i class="icon-remove"></i>Hapus</a></td>
    </tr>
            <?php
        }
        mysql_free_result($hasil);
    }
    ?>

    <?php
############################ TAMBAH MANAJEMEN MATPEL #########################

    function tambah_manajemen_matpel($kelas, $thn, $nip, $nama, $matpel, $id_guru, $id_matpel) {
        ?>
    <script>
        document.getElementById('groupKelas').style.display = 'none';
    </script>
    <form method="post" action="insert_manajemen_matpel.php">
        <input type="hidden" value="<?php echo $tahun_ajaran; ?>" name="tahun_ajaran">
        <input type="hidden" value="<?php echo $kelas_id; ?>" name="kelas_id">
        <input type="hidden" name="id_guru" id="id_guru" value="<?php echo $id_guru; ?>">
        <input type="hidden" name="id_matpel" id="id_matpel" value="<?php echo $id_matpel; ?>">
        <table class="table-bordered" style="width: 70%">
            <!--DWLayoutTable-->
            <thead>
            <th colspan="4">Tambah Data Guru Mata Pelajaran</th>
            </thead>
            <tr>
                <td>NIP</td>
                <td><input name="nip" id="nip" type="text" class="input-big" value="<?echo $nip;?>" readonly>
                    <input name="btnRefGuru" type="button" onClick='Popreport_guru("view_guru_manajemen.php");' class="btn btn-info" value="Cari">
                </td>
                <td>NAMA GURU</td>
                <td><input name="nama" id="nama" type="text" class="input-large" value="<?echo $nama;?>" readonly></td>
            </tr>
            <tr>
                <td>MATPEL</td>
                <td colspan="4"><input name="matpel" id="matpel" type="text" class="input-big" value="<?echo $matpel;?>"readonly>
                    <input name="button322" type="button" class="btn btn-info" onClick='Popreport_guru("view_manajemen_matpel.php?kelas=<?php echo $kelas; ?>&tahun_ajaran=<?php echo $thn; ?>")' value="Cari">
                </td>
            </tr>
            <tr>
                <td>KELAS</td>
                <td colspan="4"><input name="kls" type="text" class="input-medium">
                </td>
            </tr>
            <tr>
                <td>TAHUN_AJARAN</td>
                <td colspan="4"><input name="thn_ajaran" type="text" class="input-medium">
                </td>
            </tr>
            <tr>
                <td colspan="4"><input name="Submit22222" type="image" value="Submit" src="images/simpan.gif" alt="klik disini untuk Simpan Data">
                    <img src="images/kembali.gif" border="0" alt="klik disini untuk Kembali ke Halaman Sebelumnya" onclick="history.go('-1');"></td>
            </tr>
        </table>
    </form>
        <?php
    }
    ?>

    <?php
############################ TAMBAH MASTER MATPEL #########################

    function tambah_master_matpel($kelas, $thn) {
        ?>
    <script>
        document.getElementById('groupKelas').style.display = 'none';
    </script>
    <form method="post" action="insert_master_matpel.php">
        <table class="table-bordered" style="width: 30%">
            <!--DWLayoutTable-->
            <thead>
            <th colspan="4">Tambah Data Mata Pelajaran</th>
            </thead>
            <tr>
                <td>MATA PELAJARAN</td>
                <td><input name="matpel" type="text" class="input-medium">
                </td>
            </tr>
            <tr>
                <td>KELAS</td>
                <td><input name="kls" type="text" class="input-mini">
                </td>
            </tr>
            <tr>
                <td>TAHUN AJARAN</td>
                <td><input name="thn_ajaran" type="text" class="input-medium">
                </td>
            </tr>
            <tr>
                <td colspan="2"><input name="Submit22222" type="image" value="Submit" src="images/simpan.gif" alt="klik disini untuk Simpan Data">
                    <img src="images/kembali.gif" border="0" alt="klik disini untuk Kembali ke Halaman Sebelumnya" onclick="history.go('-1');"></td>
            </tr>
        </table>
    </form>
        <?php
    }
    ?>

    <?php
############################ TAMBAH MASTER MATPEL #########################

    function edit_master_matpel($id) {
        $strsql = "select id_matpel,nama_matpel,kelas,tahun_ajaran from matpel where id_matpel='$id'";
        $hasil = mysql_query($strsql);
        $row = mysql_fetch_array($hasil);
        ?>
    <script>
        document.getElementById('groupKelas').style.display = 'none';
    </script>
    <form method="post" action="update_master_matpel.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <table class="table-bordered" style="width: 50%">
            <!--DWLayoutTable-->
            <thead>
            <th colspan="4">Edit Data Nama Pelajaran</th>
            </thead>
            <tr>
                <td>MATA PELAJARAN</td>
                <td><input name="matpel" type="text" class="input-xlarge" value="<?php echo $row[nama_matpel]; ?>">
                </td>
            </tr>
            <tr>
                <td>KELAS</td>
                <td><input name="kls" type="text" class="input-mini" value="<?php echo $row[kelas]; ?>">
                </td>
            </tr>
            <tr>
                <td>TAHUN AJARAN</td>
                <td><input name="thn_ajaran" type="text" class="input-small" value="<?php echo $row[tahun_ajaran]; ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2"><input name="Submit22222" type="image" value="Submit" src="images/simpan.gif" alt="klik disini untuk Simpan Data">
                    <a href="matpel.php?kelas=<? echo $row[kelas] ?>&tahun=<? echo $row[tahun_ajaran] ?>"><img src="images/kembali.gif" border="0" alt="klik disini untuk Kembali ke Halaman Sebelumnya"></a></td>
            </tr>
        </table>
    </form>
        <?php
        mysql_free_result($hasil);
    }

    function delete_master_matpel($id) {
        $matpel_qry = mysql_query("select id_matpel,nama_matpel,kelas,tahun_ajaran from matpel where id_matpel='$id'");
        $matpel_data = mysql_fetch_array($matpel_qry);
        ?>
    <script>
        document.getElementById('groupKelas').style.display = 'none';
    </script>
    <form method="post" action="delete_master_matpel.php">
        <input type="hidden" name="kls" value="<?php echo $matpel_data['kelas']?>">
        <input type="hidden" name="thn" value="<?php echo $matpel_data['tahun_ajaran']?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <table class="table-bordered" style="width: 50%">
            <!--DWLayoutTable-->
            <thead>
            <th colspan="2">Hapus Data Nama Pelajaran</th>
            </thead>
            <tr>
                <td height="50" colspan="2"><b>Anda Yakin Akan Menghapus MATA PELAJARAN Dengan Rincian :</b>
                </td>
            </tr>
            <tr>
                <td height="30">Nama Mata Pelajaran</td>
                <td height="30"><?php echo $matpel_data[nama_matpel]; ?>
                </td>
            </tr>
            <tr>
                <td height="30">Kelas</td>
                <td height="30"><?php echo $matpel_data[kelas]; ?>
                </td>
            </tr>
            <tr>
                <td height="30">Tahun Ajaran</td>
                <td height="30"><?php echo $matpel_data[tahun_ajaran]; ?>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Hapus" class="btn btn-danger" alt="klik disini untuk Simpan Data">
                    <a href="matpel.php?kelas=<? echo $matpel_data[kelas] ?>&tahun=<? echo $matpel_data[tahun_ajaran] ?>" class="btn">Batal</a></td>
            </tr>
        </table>
    </form>
        <?php
    }
    ?>
