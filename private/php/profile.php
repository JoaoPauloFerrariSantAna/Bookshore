<?php

include("connect.php");


if(!isset($_SESSION["user_id"]) && !isset($_SESSION["username"])) {
	header("HTTP /1.1 401 Unauthorized");
	header("Location: error.php?er=You were not supposed to see that page, hacker!");
	exit(1);
}

$username = $_SESSION["username"];

function get_amount_books_read(string $uname): int {
	$tbl_template	= $uname."s_books";
	$mysql		= connect_db();

	$books_read = $mysql->prepare("SELECT books_read FROM ".$tbl_template);
	$books_read->execute();

	$amount = $books_read->num_rows;

	return $amount;
}

function check_books_read(int $amount): void {
	if($amount < 1) {
		echo "<p>So empty... please fill me with books!</p>";
		echo "<p>To make that happen, please: click <a href=\"create-list.php\" class=\"special-link\">here!</a>";
	} else {
		// TODO: show table with readed books
		echo "<p>Hould you like to add more books? Click <a href=\"create-list.php\" class=\"special-link\">here!<a><p>";
	}
}

$amount_of_books = get_amount_books_read($username);

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Bookshore - Profile</title>
		<link rel="stylesheet" type="text/css" href="../../public/css/general.css">
		<link rel="stylesheet" type="text/css" href="../../public/css/profile.css">
		<meta charset="UTF-8">
	</head>
	<body>
		<header class="header">
			<div class="img-container">
				<a href="/"><img src="#" alt="Bookshore logo"></a>
			</div>
			<nav>
				<ol class="menu">
					<li id="logoff-btn"><a href="logoff.php">Log off</a></li>
					<li>You're <span id="username"><a href="profile.php"><?php echo $username ?></span></a></li>
				</ol>
			</nav>
		</header>
		<main>
			<div id="books-place">
				<?php check_books_read($amount_of_books); ?>
			</div>
		</main>
		<footer>
			<p class="footer-text">Copyright 2024 John Petrovich &copy;</p>
		</footer>
	</body>
</html>
