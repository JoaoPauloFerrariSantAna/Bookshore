<?php

// TOREAD: https://www.codeproject.com/Questions/842688/HOW-TO-CONCAT-TABLE-NAME-WITH-STRING

include("db-common-queries.php");
include("validation.php");
include("deal-json.php");

$formated_json	= get_incoming_json();

$user_name	= validate_data($formated_json["username"]);
$password	= validate_data($formated_json["password"]);
$email		= validate_email($formated_json["email"]);

insert_to_db($user_name, $password, $email);
mk_tbl_for_user_books($user_name);

header("HTTP/1.1 200 OK");
echo "Account created";

?>
