function showTextbox() {

    var selectedValue = document.querySelector('input[name="anonymity"]:checked').value;
    var textbox = document.getElementById("txt_anonymity");

    if (selectedValue === "1") {
      textbox.style.display = "inline-block";
    } else {
      textbox.style.display = "none";
    }
}

function showAddress() {
    var selectedValue = document.querySelector('input[name="receipt"]:checked').value;
    var divbox = document.getElementById("receipt_control");
    var textbox = document.getElementById("txt_email");

    if (selectedValue === "0") {
        divbox.style.display = "block";
    }else{
        divbox.style.display = "none";
    }

    if (selectedValue == "1") {
        textbox.style.display = "inline-block";
    }else{
        textbox.style.display = "none";
    }
}