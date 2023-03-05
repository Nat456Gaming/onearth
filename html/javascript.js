function test_progress() {
	let identity = setInterval(() => {
        let pBar = document.getElementById("progress-bar");
		if (parseInt(pBar.style.width.slice(0,pBar.style.width.length-1)) >= 100) {
			clearInterval(identity);
		} else {
			pBar.style.width = (parseInt(pBar.style.width.slice(0,pBar.style.width.length-1))+1) + "%";
			//pBar.innerHTML = parseInt(pBar.style.width.slice(0,pBar.style.width.length-1)) + "%";
         document.getElementById("progress-bar-text").innerHTML=parseInt(pBar.style.width.slice(0,pBar.style.width.length-1)) + "%";
		}
	}, 10);
}
