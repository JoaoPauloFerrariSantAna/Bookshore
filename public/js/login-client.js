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
	const requestData	= createReq(rawUserData, [ rawUserData[0].value, rawUserData[1].value] , AMOUNT_ELEMENTS.TWO);

	submitEvent.preventDefault();

	// if there is no empty fields
	if(checkForEmptyFields(rawUserData, sanitizedInfo)) {
		submitEvent.preventDefault();
	}

	if(mkReq(requestData, "../../teste.php", true) === REQUEST_ERR.LOGIN_ERR) {
		submitEvent.preventDefault();
	}

	submitEvent.preventDefault();
}
