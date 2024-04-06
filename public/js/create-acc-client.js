// initial code version obtained from: https://www.youtube.com/watch?v=tMdz-m-DmKY
// all thanks to Dev + Coffee

import { checkForEmptyFields } from "./credentials-validation.js";
import { AMOUNT_ELEMENTS, REQUEST_ERR } from "./enums.js";
import { formatUserData, escapeBadChars } from "../../private/js/sanitize-credentials.js"
import { createReq, mkReq } from "../../private/js/request.js";

document.getElementById("form-account").addEventListener("submit", prepAccRequest, true);

/**
 * @function prepAccRequest
 * @param {HTMLElement} submitEvent - Default form event
 */
function prepAccRequest(submitEvent) {
	const rawUserData	= document.querySelectorAll("[data-user-info]");
	const formatedInfo	= formatUserData(rawUserData);
	const sanitizedInfo	= escapeBadChars(formatedInfo);
	const requestData	= createReq(rawUserData, sanitizedInfo, AMOUNT_ELEMENTS.ALL);

	if(!checkForEmptyFields(rawUserData, sanitizedInfo)) {
		mkReq(requestData, "../../private/php/create-acc-server.php", false);
		submitEvent.preventDefault();
	}

	submitEvent.preventDefault();
}
