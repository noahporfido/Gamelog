var anzeigen = true;

function blogAnzeigen() {
    if (anzeigen == true) {
        document.getElementById('blogText').style.display = "block";
        document.getElementById('blogDate').style.display = "block";
        anzeigen = false;
    }
    else {
        document.getElementById('blogText').style.display = "none";
        document.getElementById('blogDate').style.display = "none";
        anzeigen = true;
    }

}
