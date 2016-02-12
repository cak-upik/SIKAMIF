/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function calculate($no) {
	// alert($no);
    var valA=document.getElementById('n1_'+$no).value;
    var valB=document.getElementById('n2_'+$no).value;
    var valC=document.getElementById('n23_'+$no).value;
    var valD=document.getElementById('n24_'+$no).value;
    var bkKey = event.keyCode || event.charCode;
    //rumus nilai rata-rata
    var plus = +valA + +valB + +valC + +valD;
    var result = +plus / 4;
    //deteksi apakah yang di input arrowKey left, up, right, down
    if (bkKey == 37 || bkKey == 38 || bkKey == 39 || bkKey == 40) {
        return false;
    }
    //set hasil pada text rata-rata
    if(document.getElementById('n1_'+$no).value !='' && document.getElementById('n2_'+$no).value !='' && document.getElementById('n23_'+$no).value !='' && document.getElementById('n24_'+$no).value !='') {
        document.getElementById('n3_'+$no).value ='';
        document.getElementById('n3_'+$no).value = result;
    }
    //deteksi bila text value kosong maka text rata-rata di set value =0
    if(document.getElementById('n24_'+$no).value =='') {
        document.getElementById('n3_'+$no).value =0;
    }

    if(document.getElementById('n4_'+$no).value !='') {
        document.getElementById('btnHitungUts').style.display ='block';
    }else {
        document.getElementById('btnHitungUts').style.display ='none';
    }

    if(document.getElementById('n5_'+$no).value !='') {
        document.getElementById('btnHitungUas').style.display ='block';
    }else {
        document.getElementById('btnHitungUas').style.display ='none';
    }
}

function calculateUTS($no) {
    var valA=document.getElementById('n4_'+$no).value;
    var val_uts=document.getElementById('val_uts').value;
    var nilai_uts = +valA / 100 * +val_uts;
    if(document.getElementById('n4_'+$no).value !='') {
        document.getElementById('n4_'+$no).value = nilai_uts;
    }
}

function calculateUAS($no) {
    var valA=document.getElementById('n5_'+$no).value;
    var val_uas=document.getElementById('val_uas').value;
    var nilai_uas = +valA / 100 * +val_uas;
    if(document.getElementById('n5_'+$no).value !='') {
        document.getElementById('n5_'+$no).value = nilai_uas;
    }
}

function calculateReport($no) {
    var valA=document.getElementById('n6_'+$no).value;
    var valRata=document.getElementById('n3_'+$no).value;
    var valUts=document.getElementById('n4_'+$no).value;
    var valUas=document.getElementById('n5_'+$no).value;
    var nilai_rpt = ((3 * +valRata)+ +valUts + +valUas)/ 5;
    var ket= '';
    if(+nilai_rpt > 74) {
        ket = 'LULUS';
    }else {
        ket = 'TIDAK LULUS';
    }
    if(document.getElementById('n3_'+$no).value !='' && document.getElementById('n4_'+$no).value !='' && document.getElementById('n5_'+$no).value !='') {
        document.getElementById('n6_'+$no).value = '';
        document.getElementById('n6_'+$no).value = nilai_rpt;
        document.getElementById('n7_'+$no).value = ket;
    }else {
        document.getElementById('n6_'+$no).value = nilai_rpt;
        document.getElementById('n7_'+$no).value = ket;
    }
}
