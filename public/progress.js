var currentProgress = 0;


function plusPage(pageNum) {

    var page1 = document.getElementById("page1");
    var page2 = document.getElementById("page2");
    var page3 = document.getElementById("page3");
    var list = document.querySelectorAll('.progress_list li');

    var currentPage = document.getElementById(pageNum);
    //if (currentPage === page1 && (validate(pageNum))) {
    if (currentPage === page1) {
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
}

function validate(pageNum) {
    var currentPage = document.getElementById(pageNum);
    var page1 = document.getElementById("page1");

    var name = document.getElementById("donation_name").value;
    var person_id =document.getElementById("donation_person_id").value;
    var email =document.getElementById("donation_email").value;
    var phone =document.getElementById("phone").value;
    var flag = 0;
    alert(flag);

    var Message = document.getElementById('message');
    Message.textContent = "";


    if(currentPage == page1){
        if(name.length <= 0){
            Message.textContent.append("請輸入姓名\n");
            flag++;
        }
        if(person_id.length <= 0){
            Message.textContent.append("請輸入身分證字號\n");
            flag++;
        }
        if(email.length <= 0){
            Message.textContent.append("請輸入 Email\n");
            flag++;
        }
        if(phone.length <= 0){
            Message.textContent.append("請輸入電話號碼\n");
            flag++;
        }
    }
    if(flag != 0){
        showAlert();
        return false;
    }else{
        return true;
    }
}

function showAlert() {
    var Alert = document.getElementById('alert_window');
    Alert.style.display = 'block';
}

function closeAlert() {
    var Alert = document.getElementById('customAlert');
    Alert.style.display = 'none';
}

function minusPage(pageNum) {

    var page1 = document.getElementById("page1");
    var page2 = document.getElementById("page2");
    var page3 = document.getElementById("page3");
    var list = document.querySelectorAll('.progress_list li');

    var currentPage = document.getElementById(pageNum);

    if (currentPage === page2) {
        page1.style.display = "block";
        page2.style.display = "none";
        list[currentProgress].classList.remove('active_cir');
        currentProgress = currentProgress - 1;
        list[currentProgress].classList.add('active_cir');
        list[currentProgress].classList.remove('active_rec');
        list[currentProgress].classList.remove('active_complete');
        scrollToTop();
    }else if(currentPage === page3){
        page2.style.display = "block";
        page3.style.display = "none";
        list[currentProgress].classList.remove('active_cir');
        currentProgress = currentProgress - 1;
        list[currentProgress].classList.add('active_cir');
        list[currentProgress].classList.remove('active_rec');
        list[currentProgress].classList.remove('active_complete');
        scrollToTop();
    }
}

function scrollToTop() {
    document.documentElement.scrollTop = 0; 
}
