// got code from: https://www.youtube.com/watch?v=ndNPg8-5jgI

import { setAttributeTo } from "./show-warning.js"

document.getElementById("email").addEventListener("keyup", verifyEmail);

function isEmailValid(email) {
	const re = /^[a-zA-Z0-9\._\-]+@[a-zA-Z]+\.[a-z]{3,3}$/;

	return (email.match(re));
}

/**
 * @function verifyEmail
 * @returns {boolean} - false if email is not valid, true if email is valid
 */
function verifyEmail() {
	const userEmail		= document.getElementById("email").value;
	const warningMsg	= document.getElementById("email-msg");
	const submitBtn		= document.querySelector("[data-btn-active]");

	if(!isEmailValid(userEmail)) {
		setAttributeTo(warningMsg,"data-invalid-msg", "show");
		setAttributeTo(submitBtn, "data-btn-active", "disabled");

		return false;
	}

	setAttributeTo(warningMsg, "data-invalid-msg", "hidden");
	setAttributeTo(submitBtn, "data-btn-active", "enabled");

	return true;
}
