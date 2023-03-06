/**
 * @param {number} pourcent - pourcentage à ajouter
 */
function global_progress(pourcent) {
	pourcent += parseInt(document.getElementById("global_progress").style.width.slice(0, document.getElementById("global_progress").style.width.length - 1));
	let identity = setInterval(
		(pourcent) => {
			let pBar = document.getElementById("global_progress");
			if (parseInt(pBar.style.width.slice(0, pBar.style.width.length - 1)) >= pourcent) {
				clearInterval(identity);
			} else if (parseInt(pBar.style.width.slice(0, pBar.style.width.length - 1)) >= 100) {
				clearInterval(identity);
			} else {
				pBar.style.width = parseInt(pBar.style.width.slice(0, pBar.style.width.length - 1)) + 1 + "%";
				document.getElementById("global_progress-text").innerHTML = pBar.style.width;
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
	return alert("Vous avez cliquez sur le goal n°" + goal);
}

/**
 * @param {number} goal - le goal selectioner (de 0 à 16)
 * @param {number} nb - nb de tache à ajouter
 */
function goal_progress(goal, nb = 1) {
	nb += parseInt(document.getElementsByClassName("stg-progress goal" + goal)[0].style.width.slice(0, document.getElementsByClassName("goal" + goal)[0].style.width.length - 1)) / 20;
	let identity = setInterval(
		(goal, nb) => {
			let pBar = document.getElementsByClassName("stg-progress goal" + goal);
			if (parseInt(pBar[0].style.width.slice(0, pBar[0].style.width.length - 1)) / 20 >= nb) {
				clearInterval(identity);
			} else if (parseInt(pBar[0].style.width.slice(0, pBar[0].style.width.length - 1)) / 20 >= 5) {
				clearInterval(identity);
			} else {
				let i = 0;
				while (i < pBar.length) {
					console.log(pBar[i]);
					pBar[i].style.width = parseInt(pBar[i].style.width.slice(0, pBar[i].style.width.length - 1)) + 20 + "%";
					document.getElementsByClassName("stg-progress-text goal" + goal)[i].innerHTML = parseInt(pBar[i].style.width.slice(0, pBar[i].style.width.length - 1)) / 20 + "/5";
					i++;
				}
			}
		},
		50,
		goal,
		nb
	);
}
