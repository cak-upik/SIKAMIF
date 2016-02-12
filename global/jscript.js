// JavaScript Document
function confirmdelete(msg)
{
    question = confirm("Apakah Anda yakin untuk " + msg + " ?");
    if (question != "0")
    {
        return true;
    }
    else
    {
        return false;
    }
}

function formatangka(objek)
{
    a = objek.value;
    b = a.replace(/[^\d]/g, "");
    c = "";
    panjang = b.length;
    j = 0;
    for (i = panjang; i > 0; i--) {
        j = j + 1;
        if (((j % 3) == 1) && (j != 1)) {
            c = b.substr(i - 1, 1) + c;
        } else {
            c = b.substr(i - 1, 1) + c;
        }
    }
    objek.value = c;
}