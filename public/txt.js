function showTextbox(selectedValue) {

    var textbox = document.getElementById("txt_anonymity");

    // alert(selectedValue.value);
    if (selectedValue.value === true) {
      textbox.style.display = "inline-block";
    } else {
      textbox.style.display = "none";
    }
}

function showTW() {
    var selectedValue = document.querySelector('input[name="country"]:checked').value;
    var box = document.getElementById("address-TW");
    var city = document.getElementById('donation_city');
	var district = document.getElementById('donation_district');

    if(selectedValue == "1") {
        box.style.display = "block";
    }else{
        box.style.display = "none";
        city.value = '其他';
        district.value = '-';
    }
}

function showAddress(selectedValue) {
    var titlebox = document.getElementById("form-group title");
    var addressbox = document.getElementById("form-group address");
    var textbox = document.getElementById("txt_email");
    
    if (selectedValue.value == "paper") {
        titlebox.style.display = "block";
        addressbox.style.display = "block";
        textbox.style.display = "none";
    }else if (selectedValue.value == "electronic") {
        titlebox.style.display = "block";
        addressbox.style.display = "none";
        textbox.style.display = "inline-block";
    }else if (selectedValue.value == "none") {
        titlebox.style.display = "none";
        addressbox.style.display = "none";
        textbox.style.display = "none";
    }
}


function showInputName(selectedValue) {
    // alert(selectedValue.value);
    var public = document.getElementById("form-group public");
    var enterprise = document.getElementById("form-group enterprise");
    var NID = document.getElementById("NID");
    var UBN = document.getElementById("UBN");

    if (selectedValue.value == "normal") {
        public.style.display = "block";
        enterprise.style.display = "none";
        NID.style.display = "block";
        UBN.style.display = "none";
    }else if (selectedValue.value == "business") {
        enterprise.style.display = "block";
        public.style.display = "none";
        UBN.style.display = "block";
        NID.style.display = "none";
    }else if (selectedValue.value == "alumni") {
        public.style.display = "block";
        enterprise.style.display = "none";
        NID.style.display = "block";
        UBN.style.display = "none";
    }
}

