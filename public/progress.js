var currentProgress = 0;

function plusPage(pageNum) {

    var page1 = document.getElementById("page1");
    var page2 = document.getElementById("page2");
    var page3 = document.getElementById("page3");
    var list = document.querySelectorAll('.progress_list li');

    var currentPage = document.getElementById(pageNum);

    if (currentPage === page1) {
        page1.style.display = "none";
        page2.style.display = "block";
        list[currentProgress].classList.add('active_rec');
        currentProgress = currentProgress + 1;
        list[currentProgress].classList.add('active_cir');  
        scrollToTop();
    }else if(currentPage === page2){
        page2.style.display = "none";
        page3.style.display = "block";
        list[currentProgress].classList.add('active_rec');
        currentProgress = currentProgress + 1;
        list[currentProgress].classList.add('active_cir');
        scrollToTop();
    }
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
        list[currentProgress].classList.remove('active_rec');
        scrollToTop();
    }else if(currentPage === page3){
        page2.style.display = "block";
        page3.style.display = "none";
        list[currentProgress].classList.remove('active_cir');
        currentProgress = currentProgress - 1;
        list[currentProgress].classList.remove('active_rec');
        scrollToTop();
    }
}

function scrollToTop() {
    document.documentElement.scrollTop = 0; 
}
