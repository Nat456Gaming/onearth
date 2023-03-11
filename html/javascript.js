/**
 * @param {number} pourcent - the % to show
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
	return;
}

/**
 * @param {number} goal - the goal id (1 to 16)
 */
function select_goal(goal) {
	return alert("You selected the " + goal + "th goal.");
}

/**
 * @param {number} goal - the goal id (1 to 16)
 * @param {number} nb - the number of done task to add (1 to 5)
 */
function goal_progress(goal, nb = 1) {
	nb += parseInt(document.getElementsByClassName("sdg-progress goal" + goal)[0].style.width.slice(0, document.getElementsByClassName("goal" + goal)[0].style.width.length - 1)) / 20;
	let identity = setInterval(
		(goal, nb) => {
			let pBar = document.getElementsByClassName("sdg-progress goal" + goal);
			if (parseInt(pBar[0].style.width.slice(0, pBar[0].style.width.length - 1)) / 20 >= nb) {
				clearInterval(identity);
			} else if (parseInt(pBar[0].style.width.slice(0, pBar[0].style.width.length - 1)) / 20 >= 5) {
				clearInterval(identity);
			} else {
				let i = 0;
				while (i < pBar.length) {
					pBar[i].style.width = parseInt(pBar[i].style.width.slice(0, pBar[i].style.width.length - 1)) + 20 + "%";
					document.getElementsByClassName("sdg-progress-text goal" + goal)[i].innerHTML = parseInt(pBar[i].style.width.slice(0, pBar[i].style.width.length - 1)) / 20 + "/5";
					i++;
				}
				if (parseInt(pBar[0].style.width.slice(0, pBar[0].style.width.length - 1)) / 20 >= 5) {
					let i = 0;
					let btn = document.getElementsByClassName("sdg-button goal" + goal);
					do {
						btn[i].style.display = "none";
						i++;
					} while (i < btn.length);
					i = 0;
					let done = document.getElementsByClassName("done")[0].getElementsByClassName("sdg-button goal" + goal);
					console.log(document.getElementsByClassName("done"));
					do {
						done[i].style.display = "block";
						i++;
					} while (i < done.length);
					clearInterval(identity);
				}
			}
		},
		50,
		goal,
		nb
	);
	return;
}

/**
 * @param {string} page - the page to show
 */
function show(page) {
	if (document.getElementById(page) == undefined) {
		return alert("No pages call '" + page + "'");
	}
	let i = 0;
	while (i < document.getElementsByClassName("pages").length) {
		document.getElementsByClassName("pages")[i].style.display = "none";
		i++;
	}
	document.getElementById(page).style.display = "block";
	return;
}

/**
 * no param
 */
function search() {
	alert("You searched: " + document.getElementById("search-form").elements[0].value);
}