window.onload = function () {
	setCookie("Cookie", "The cake is a lie", 1);//this cookie will be delete in 1 day
};

/**
 * @param {string} cName - the name of the cookie
 * @param {string} cValue - the value of the cookie
 * @param {number} exDays - the time in day for expires of the cookie
 */
function setCookie(cName, cValue, exDays = 1) {
	const d = new Date();
	d.setTime(d.getTime() + exDays * 24 * 60 * 60 * 1000);
	document.cookie = cName + "=" + cValue + "; " + "expires=" + d.toUTCString() + "; path=/onearth";
}

/**
 * @param {string} cName - the name of the cookie
 */
function getCookie(cName) {
	let decodedCookie = decodeURIComponent(document.cookie);
	let ca = decodedCookie.split(";");
	for (let i = 0; i < ca.length; i++) {
		let c = ca[i];
		while (c.charAt(0) == " ") {
			c = c.substring(1);
		}
		if (c.indexOf(cName) == 0) {
			return c.substring(cName.length + 1, c.length);
		}
	}
	return false;
}

/**
 * @param {string} cName - the name of the cookie
 */
function delCookie(cName) {
	document.cookie = cName + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/html";
}