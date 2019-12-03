//Custom JS for Slider

function Page(evt, PageName) {
    var i, tabcontent, buttonlinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    buttonlinks = document.getElementsByClassName("buttonlinks");
    for (i = 0; i < buttonlinks.length; i++) {
        buttonlinks[i].className = buttonlinks[i].className.replace(" active", "");
    }
    document.getElementById(PageName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="default" and click on it
document.getElementById("default").click();
