var test = document.getElementById("test");

var page = document.getElementById("page4");
var name = document.getElementById('donation_name').value;

test.addEventListener('click',function(){
    const label = document.createElement('label');
    const value = document.createElement('label');
    
    label.textContent = "姓名";
    value.textContent = document.getElementById('donation_name').value;
    page.appendChild(label);
    page.appendChild(value);
});
