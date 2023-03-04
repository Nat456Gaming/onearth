function test_progress() {
    var element = document.getElementById("progress-bar");   
    var width = 1;
    var identity = setInterval(scene, 10);
    function scene() {
        if (width >= 100) {
            clearInterval(identity);
        } else {
            width++; 
            element.style.width = width + '%';
            element.innerHTML = '<p>'+ width + '%</p>';
        }
    }
}