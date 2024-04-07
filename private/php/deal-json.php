<?php

/*
 * @author	John	john@gmail.com
 * @version	1.0.0	Function responsable for getting the incoming json
 * @since	1.0.0
 *
 * @return	array	Will return the json decoded in an array
 */
function get_incoming_json(): array {
	// will get incoming JSON stream from it's client counterpart
	// php://input doc: https://www.php.net/manual/en/wrappers.php.php
	$incoming_json = file_get_contents("php://input");

	if(!$incoming_json) {
 		echo "Could not obtain user information.\n";
		echo json_last_error_msg();
		exit(1);
	}

	$decoded_json = json_decode($incoming_json, true);

 	return $decoded_json;
}

?>
