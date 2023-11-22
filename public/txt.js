function showTextbox() {

    var selectedValue = document.querySelector('input[name="anonymity"]:checked').value;
    var textbox = document.getElementById("txt_anonymity");

    if (selectedValue === "1") {
      textbox.style.display = "inline-block";
    } else {
      textbox.style.display = "none";
    }
}

function showTW() {
    var selectedValue = document.querySelector('input[name="country"]:checked').value;
    var box = document.getElementById("address-TW");

    if(selectedValue == "1") {
        box.style.display = "block";
    }else{
        box.style.display = "none";
    }
}

function showAddress() {
    var selectedValue = document.querySelector('input[name="receipt"]:checked').value;
    var titlebox = document.getElementById("form-group title");
    var addressbox = document.getElementById("form-group address");
    var textbox = document.getElementById("txt_email");

    if (selectedValue == "0") {
        titlebox.style.display = "block";
        addressbox.style.display = "block";
        textbox.style.display = "none";
    }else if (selectedValue == "1") {
        titlebox.style.display = "block";
        addressbox.style.display = "none";
        textbox.style.display = "inline-block";
    }else if (selectedValue == "2") {
        titlebox.style.display = "none";
        addressbox.style.display = "none";
        textbox.style.display = "none";
    }

}

function showInputName() {
    var identity_type = document.getElementById("identity_type").value;
    var public = document.getElementById("form-group public");
    var enterprise = document.getElementById("form-group enterprise");
    var NID = document.getElementById("NID");
    var UBN = document.getElementById("UBN");

    if (identity_type == "public") {
        public.style.display = "block";
        enterprise.style.display = "none";
        NID.style.display = "block";
        UBN.style.display = "none";
    }else if (identity_type == "enterprise") {
        enterprise.style.display = "block";
        public.style.display = "none";
        UBN.style.display = "block";
        NID.style.display = "none";
    }else if (identity_type == "alumnus") {
        public.style.display = "block";
        enterprise.style.display = "none";
        NID.style.display = "block";
        UBN.style.display = "none";
    }
}

