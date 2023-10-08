<?php
	session_start()
?>
<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>GiveBack</title>
		<link rel="stylesheet" href="style.css">
		<style>
			/* Center the content container */
			.content-container {
				display: flex;
				flex-direction: column;
				align-items: center;
				text-align: center;
				margin-top: 20px; /* Add margin to push content down from header */
			}

			/* Center the form within the container */
			form {
				width: 300px; /* Adjust the width as needed */
			}
		</style>
	</head>
	<body>
		<header>
			<img src="logo.png" alt="GiveBack! logo">
		</header>
		<div class="content-container">
			<h1>GiveBack Sign-in:</h1>
			<hr>
			<form action="includes/formhandler.inc.php" method="POST">
				<label for="email">Email:</label>
				<input type="text" id="email" name="email" required><br><br>

				<label for="username">Username:</label>
				<input type="text" id="username" name="username" required><br><br>

				<label for="password">Password:</label>
				<input type="password" id="password" name="password" required><br><br>

				<input type="submit" value="Sign In">
			</form>
		</div>
		<footer>
			&copy; 2023 GiveBack | No rights reserved.
		</footer>
	</body>
</html>
