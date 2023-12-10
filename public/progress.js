var currentProgress = 0;

/*function validate() {
    // Perform validation for specific fields on the page
    var name = document.getElementById("donation_name").value;
    var person_id = document.getElementById("donation_person_id").value;
    var email = document.getElementById("donation_email").value;
    var phone = document.getElementById("donation_phone").value;
    var flag = 0;

    var Message = document.getElementById('message');
    Message.innerHTML = '';

    if (name.trim() === ''){
        const label = document.createElement('p');
        label.textContent = "請輸入姓名";
        Message.appendChild(label);
        flag++;
    }
    if (person_id.trim() === ''){
        const label = document.createElement('p');
        label.textContent = "請輸入身分證字號";
        Message.appendChild(label);
        flag++;
    }
    if (email.trim() === ''){
        const label = document.createElement('p');
        label.textContent = "請輸入Email";
        Message.appendChild(label);
        flag++;
    }
    if (phone.trim() === ''){
        const label = document.createElement('p');
        label.textContent = "請輸入電話號碼";
        Message.appendChild(label);
        flag++;
    }

    console.log('flag:', flag);

    // If all required fields are filled, return true
    if(flag != 0){
        showAlert();
        return false;
    }else{
        return true;
    }
}

function showAlert() {
    var Alert = document.getElementById('alert_window');
    var overlay = document.getElementById('overlay');
    Alert.style.display = 'block';
    overlay.style.display = 'block';
}

function closeAlert() {
    var Alert = document.getElementById('alert_window');
    var overlay = document.getElementById('overlay');
    Alert.style.display = 'none';
    overlay.style.display = 'none';
}

function plusPage(pageNum) {

    var page1 = document.getElementById("page1");
    var page2 = document.getElementById("page2");
    var page3 = document.getElementById("page3");
    var list = document.querySelectorAll('.progress_list li');

    var currentPage = document.getElementById(pageNum);
    var tmp = validate();
    console.log(tmp);
    if (currentPage === page1 && validate()) {
    //if (currentPage === page1) {
        page1.style.display = "none";
        page2.style.display = "block";
        list[currentProgress].classList.remove('active_cir');
        list[currentProgress].classList.add('active_rec');
        list[currentProgress].classList.add('active_complete'); 
        currentProgress = currentProgress + 1;
        list[currentProgress].classList.add('active_cir');
        // list[currentProgress].classList.add('active_complete');    
        scrollToTop();
    //}else if(currentPage === page2 && (validate(pageNum))){
    }else if(currentPage === page2){
        page2.style.display = "none";
        page3.style.display = "block";
        list[currentProgress].classList.remove('active_cir');
        list[currentProgress].classList.add('active_rec');
        list[currentProgress].classList.add('active_complete');
        currentProgress = currentProgress + 1;
        list[currentProgress].classList.add('active_cir');
        // list[currentProgress].classList.add('active_complete'); 
        scrollToTop();
    }
}*/

function minusPage(pageNum) {

    var page1 = document.getElementById("page1");
    var page2 = document.getElementById("page2");
    var page3 = document.getElementById("page3");
    var list = document.querySelectorAll('.progress_list li');
    var cover = document.getElementById('progress_bar_cover');

    var currentPage = document.getElementById(pageNum);

    if (currentPage === page2) {
        page1.style.display = "block";
        page2.style.display = "none";
        list[currentProgress].classList.remove('active');
        currentProgress = currentProgress - 1;
        cover.style.width = '0%'; 
        scrollToTop();
    }else if(currentPage === page3){
        page2.style.display = "block";
        page3.style.display = "none";
        list[currentProgress].classList.remove('active');
        currentProgress = currentProgress - 1;
        cover.style.width = '25%'; 
        scrollToTop();
    }
}

function scrollToTop() {
    document.documentElement.scrollTop = 0; 
}
