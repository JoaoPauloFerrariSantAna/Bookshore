<?php

/**
 * @author	John john@gmail.com
 * @version	1.0.0 Will connect to DB
 * @since	1.0.0
 */
function connect_db() {
	$db_name = "bookshore_db";
	$db_user = "root";
	$db_pass = "ghostlyTr1nk37";
	$db_host = "localhost";

	$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

	if(!$mysqli) {
		echo "There was a mistake: ".$msqli->connect_error;
	} else {
		return $mysqli;
	}
}

?>
