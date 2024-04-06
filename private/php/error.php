<!DOCTYPE html>
<html>
	<head>
		<title>OPS there was a mistake somewhere!</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1" />
		<meta name="profile" content="profile page" />
		<link rel="stylesheet" type="text/css" href="../css/error-page.css" />
	</head>

	<body>
		<header class="header">
			<h1>Oh oh! There seems to be a mistake of some kind!</h1>
		</header>
		<main>
			<p class="error"><?php echo $_GET["er"] ?></p>
		</main>
	</body>
</html>
