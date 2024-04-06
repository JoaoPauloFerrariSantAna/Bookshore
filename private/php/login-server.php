<?php

// code obtained and almost fully altered from: https://www.youtube.com/watch?v=scd8YKiuS7I

include("db-common-queries.php");
include("validation.php");
# include("deal-json.php");
#

print_r($_POST);

exit(0);
$username	= validate_data($formated_json["username"]);
$password	= validate_data($formated_json["password"]);

$user		= get_credentials($username, $password);
$user_id	= $user[0];
$db_uname	= $user[1];
$db_password	= $user[2];

$_SESSION["username"] 	= $db_uname;
$_SESSION["password"] 	= $db_password;
$_SESSION["user_id"]	= $user_id;
$_SESSION["books_read"]	= get_books_read($username);

header("Location: ./profile.php");
echo "Entering Account"

?>
