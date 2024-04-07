// again, code obtained and partially altered from: https://www.youtube.com/watch?v=tMdz-m-DmKY 

import { checkForEmptyFields } from "./credentials-validation.js";
import { formatUserData, escapeBadChars } from "../../private/js/sanitize-credentials.js";
import { createReq, mkReq } from "../../private/js/request.js";
import { AMOUNT_ELEMENTS, REQUEST_ERR } from "./enums.js";

document.getElementById("form-account").addEventListener("submit", prepLoginRequest);

/**
 * @function	prepLoginRequest
 * @param	{HTMLElement}		submitEvent - Default form event
 */
function prepLoginRequest(submitEvent) {
	const rawUserData	= document.querySelectorAll("[data-user-info]");
	const formatedInfo	= formatUserData(rawUserData);
	const sanitizedInfo	= escapeBadChars(formatedInfo);
	const requestData	= createReq(rawUserData, sanitizedInfo, AMOUNT_ELEMENTS.TWO);

	const requestLocation = "../../private/php/login-server.php";

	if(checkForEmptyFields(rawUserData, sanitizedInfo)) {
		submitEvent.preventDefault();
	}

	mkReq(requestData, requestLocation, true) === REQUEST_ERR.LOGIN_ERR);
	submitEvent.preventDefault();
}
