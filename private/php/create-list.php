<?php session_start(); ?>
<!DOCTYPE html>
<html>

	<head>
		<title>Add a Book!</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="../../public/css/general.css" />
		<link rel="stylesheet" type="text/css" href="../../public/css/form.css" />
		<link rel="stylesheet" type="text/css" href="../../public/css/list.css" />
	</head>

	<body>

		<header class="header">

			<div class="title">
				<h1>Add a book to your list!</h1>
			</div>

			<nav>
				<ol class="menu">
					<li><a href="/public/html/">Home</a></li>
					<li><a href="/private/php/profile.php"><?php echo $_SESSION["username"] ?></a></li>
					<li><a href="/private/php/profile-conf.php">Configurations</a></li>
				</ol>
			</nav>
		</header>

		<main>
			<form id="books-form" action="get-books.php" method="POST">

				<div class="form-part">

					<label for="bookname">Name of the Book</label>
					<input type="text" id="book-name" name="bookname" data-book-info="book-name">

				</div>

				<div class="form-part">

					<label for="pagesread">How many pages did you read</label>
					<input type="text" id="pages-read" name="pagesread" data-book-info="pages-read">

				</div>


				<div class="form-part">

					<label for="totalpages">How many pages does the book have?</label>
					<input type="text" id="total-pages" name="totalpages" data-book-info="total-pages">

				</div>

				<div class="form-part" id="button-submit-area">

					<button type="submit">Send data</button>

				</div>

			</form>
		</main>

		<footer>
			<p class="footer-text">Copyright 2024 John Petrovich &copy;</p>
		</footer>

		<script type="text/javascript"></script>
	</body>
</html>
