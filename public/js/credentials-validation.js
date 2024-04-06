/**
 * @typedef {HTMLElement[]} HTMLArray
 * @typedef {HTMLElement} Field
 * */

import { setAttributeTo } from "./show-warning.js";

/**
 * @function	showWarning
 * @param	{Field}		emptyField	- The field that is sure to be empty
 * */
export function showWarning(emptyField) {
	const fieldName		= emptyField.getAttribute("name");
	const formatedName	= fieldName[0].toUpperCase() + fieldName.slice(1);
	const msgField		= document.getElementById(`${fieldName}-msg`);

	msgField.innerText = `${formatedName} field is empty!`;
	setAttributeTo(msgField, "data-invalid-msg", "show");
	emptyField.focus();
}

/**
 * @function	isFieldEmpty
 * @param	{Field}		fieldElement	- The field that may be empty
 * @param	{string}	fieldContent	- The field value string
 * @returns	{boolean}	returns true if field is empty, false if it is not
 * */
export function isFieldEmpty(field, fieldContent) {
	if(fieldContent === '') {
		showWarning(field);
		return true;
	}

	return false;
}

/**
 * @function	checkForEmptyFields
 * @param	{HTMLArray}	userDataHtml
 * @param	{string[]}	userData
 * returns 	{boolean}	returns true if there is an empty field,
 * 				false if there isn't
 * */
export function checkForEmptyFields(userDataHtml, userData) {
	for(let i = 0; i < userDataHtml.length; i++) {
		if(isFieldEmpty(userDataHtml[i], userData[i])) {
			return true;
		}
	}

	return false;
}

