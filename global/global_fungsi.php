
<?php

################### PEMBULATAN 2 ANGKA DI BELAKANG KOMA #################

function null($angka) {
    $nilai = number_format($angka, 2, ".", ".");
    echo "$nilai";
}

#################### MENCARI BULAN DI DALAM FIELD ###################

function bulan($nilai) {
//
    if ($nilai == '01') {
        echo "Januari";
    } elseif ($nilai == '02') {
        echo "Februari";
    } elseif ($nilai == '03') {
        echo "Maret";
    } elseif ($nilai == '04') {
        echo "April";
    } elseif ($nilai == '05') {
        echo "Mei";
    } elseif ($nilai == '06') {
        echo "Juni";
    } elseif ($nilai == '07') {
        echo "Juli";
    } elseif ($nilai == '08') {
        echo "Agustus";
    } elseif ($nilai == '09') {
        echo "September";
    } elseif ($nilai == '10') {
        echo "Oktober";
    } elseif ($nilai == '11') {
        echo "November";
    } elseif ($nilai == '12') {
        echo "Desember";
    }
//end function
}

?>