/**
 * @param {number} pourcent - pourcentage à ajouter
 */
function init_progress(pourcent) {
	pourcent += parseInt(document.getElementById("progress-bar").style.width.slice(0, document.getElementById("progress-bar").style.width.length - 1));
	let identity = setInterval(
		(pourcent) => {
			let pBar = document.getElementById("progress-bar");
			if (parseInt(pBar.style.width.slice(0, pBar.style.width.length - 1)) >= pourcent) {
				clearInterval(identity);
			} else if (parseInt(pBar.style.width.slice(0, pBar.style.width.length - 1)) >= 100) {
				clearInterval(identity);
			} else {
				pBar.style.width = parseInt(pBar.style.width.slice(0, pBar.style.width.length - 1)) + 1 + "%";
				document.getElementById("progress-bar-text").innerHTML = parseInt(pBar.style.width.slice(0, pBar.style.width.length - 1)) + "%";
			}
		},
		50,
		pourcent
	);
}

/**
 * @param {number} goal - le goal selectioner (de 0 à 16)
 */
function select_goal(goal) {
	return alert("You selected the " + goal+"th goal.");
}
