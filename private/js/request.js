import { REQUEST_ERR } from "../../public/js/enums.js"
/**
 * @typedef {string} JSON
 * @typedef {number} ENUM
 * @typedef {number} Int
 * */

/**
 * @function	showServerMsg
 * @param	{string}	whatToShow - The response from server
 * */
function showServerMsg(whatToShow) {
	const serverRespField	= document.getElementById("server-resp");

	serverRespField.innerText = whatToShow;
}

/**
 * @function	checkForErr
 * @param	{number}		respStat	- The response code obtained 
 * 						from the server
 * @param 	{string}	respTxt		- The server response in a string
 * @returns	{Boolean}	- returns true if status is different from 200
 * */
function checkForBadReq(respStat, respTxt) {
	if(respStat >= 400) {
		showServerMsg(respTxt);
		return true;;
	}

	return false;
}

/**
 * @function genServerInfo
 * @param	{JSON} 	data	- User data transformed into JSON
 * @returns	{Object}	- Will return the parameters for the fetch request
 * */
function genServerInfo(data) {
	const headers	= {
		"Content-Type": "application/json"
	};

	const reqParam = {
		method: "POST",
		headers,
		body: data
	};

	return reqParam;
}

/**
 * @function mkReq
 * @param {JSON}	data		- User data transformed into JSON
 * @param {string}	serverUrl	- The path to send parameter data into server
 * @param {Boolean}	userWillLogin	- Will be used to verify if we want to
 * 					make user login
 * */
// Async/await no JavaScript: o que é e quando usar a programação assíncrona?:
// https://www.alura.com.br/artigos/async-await-no-javascript-o-que-e-e-quando-usar
export async function mkReq(data, serverUrl, userWillLogin) {
	const serverInformation = genServerInfo(data);

	const resp		= await fetch(serverUrl, serverInformation);
	const serverRespCode	= await resp.statusCode;
	const serverText	= await resp.text();

	if(checkForBadReq(serverRespCode, serverText)) {
		return REQUEST_ERR.LOGIN_ERR;
	}

	if(!userWillLogin) {
		showServerMsg(serverText);
	}

	if(userWillLogin) {
		window.location = resp.url;
	}
}

// https://coderwall.com/p/m-rmpq/dynamically-creating-properties-on-objects-using-javascript
/**
 * @function createReq
 * @param	{Array.HTMLElements}	fieldName	- Array for keys within object userData
 * @param	{ENUM}			fieldsToAdd	- An enum that will say how many elements
 * 							to add to the request
 * @returns	{JSON}					- Will return JSON with the userData
 * */
export function createReq(userInfoHtml, userInfo, fieldsToAdd) {
	const userData	= {};

	for(let i = 0; i < fieldsToAdd; i++) {
		const fieldName = userInfoHtml[i].getAttribute("name");

		userData[fieldName] = userInfo[i];
	}

	return JSON.stringify(userData);
}
