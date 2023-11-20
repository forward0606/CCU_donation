var currentProgress = 25;

function plusProgress() {
    var progressBar = document.getElementById("progress-bar");
    
    if (currentProgress < 100) {
        currentProgress += 25;
        progressBar.style.width = currentProgress + "%";
    }


}

function minusProgress() {
    var progressBar = document.getElementById("progress-bar");
    
    if (currentProgress > 0) {
        currentProgress -= 25;
        progressBar.style.width = currentProgress + "%";
    }
}


function plusPage(pageNum) {

    var page1 = document.getElementById("page1");
    var page2 = document.getElementById("page2");
    var page3 = document.getElementById("page3");

    var currentPage = document.getElementById(pageNum);

    if (currentPage === page1) {
        page1.style.display = "none";
        page2.style.display = "block";
        plusProgress();
    }
    else if(currentPage === page2){
        page2.style.display = "none";
        page3.style.display = "block";
        plusProgress();
    }
}


function minusPage(pageNum) {

    var page1 = document.getElementById("page1");
    var page2 = document.getElementById("page2");
    var page3 = document.getElementById("page3");

    var currentPage = document.getElementById(pageNum);

    if (currentPage === page2) {
        page1.style.display = "block";
        page2.style.display = "none";
        minusProgress();
    }
    else if(currentPage === page3){
        page2.style.display = "block";
        page3.style.display = "none";
        minusProgress();
    }
}
