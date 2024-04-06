// Maybe a forEach would be good in theses functions...
/**
 * @function	formatUserData
 * @param	{HTMLArray}	userData	- The information obtained from
 * 						var userData
 * @returns	{string[]}	returns an array of user information without whitespace
 * 				at the begining and of line
 * */
export function formatUserData(userData) {
	const formatedUserData = [];

	for(let i = 0; i < userData.length; i++) {
		formatedUserData.push(userData[i].value.trim());
	}

	return formatedUserData;
}

/**
 * @function	escapeBadChars
 * @param	{string[]}	userData	- Information about the user
 * @returns 	{string[]}	returns an array of userData with certain characters escaped
 * */
// modified code obtained from: 
// https://stackoverflow.com/questions/3446170/escape-string-for-use-in-javascript-regex
export function escapeBadChars(userData) {
	const sanitizedUserData = [];
	const specials		= [ "-", "[", "]", "/",
				"{", "}", "(", ")",
				"*", "+", "?", ".",
				"\\", "^", "$", "|" ];

	const regex	= new RegExp('['+specials.join("\\")+']', 'g');

	for(let i = 0; i < userData.length; i++) {
		// TODO: clean up
		sanitizedUserData.push(userData[i].replace(regex, '\$&'));
	}

	return sanitizedUserData;
}

