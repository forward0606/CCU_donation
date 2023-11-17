var currentProgress = 0;

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