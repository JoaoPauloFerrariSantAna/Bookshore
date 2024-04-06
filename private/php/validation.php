<?php

/*
 *
 *	@author		John	john@gmail.com
 *	@version	1.1.0	This function will validate $data
 *				that may cause an injection
 *	@since		1.0.0
 *
 *	@param		string	$data
 *	@returns	string	Will return $data without any malicious string
 *
 */

function validate_data(string $data): string {
	$data_validated = htmlspecialchars($data, ENT_QUOTES, "UTF-8");

	return stripslashes($data_validated);
}

/*
 *
 *	@author		John	john@gmail.com
 *	@version	1.1.0	This function will validate $email
 *	@since		1.0.0
 *
 *	@param		string	$data
 *	@returns	string	Will return $email without any malicious string
 *
 */
function validate_email(string $email): string {
	$email = trim($email);
	$email = stripslashes($email);
	$email = strip_tags($email);
	$email = filter_var($email, FILTER_VALIDATE_EMAIL);

	return $email;
}

/*
 *
 *	@author		John	john@gmail.com
 *	@version	1.1.0	This function will verify $udata is on DB
 *	@since		1.0.0
 *
 *	@param		string	$db_field	A field in the DB
 *	@param		string	$udata		User information
 *	@returns	bool	Will return true if $udata is in $db_field, false if not
 *
 */
function is_data_in_db(string $db_field, string $udata): bool {
	return ($udata === $db_field);
}

?>
