<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>GiveBack</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<header>
			<img src="logo.png" alt="GiveBack! logo">
			<nav>
				<ul>
					<li><a href="Page2F.php">Create Event </a></li>
					<li><a href="Page2M.php">Event List </a></li>
					<li><a href="Page3M.php">Joined Events </a></li>
					<button id="logoutButton">Logout</button> <!-- Add the logout button here -->
				</ul>
			</nav>
		</header>
	<body>
		<h1>Event List</h1>
			<hr>
		<ul id="eventList"></ul>
<table border="1">	
	<tr>
        <td> Name </td>
        <td> Facilitator </td>
	<td> Location </td>
	<td> Description </td>
	<td> Length in Hours </td>
	<td> Event Date </td>
	</tr>
<?php
	try {
        	$pdo = new PDO('mysql:host=localhost;dbname=herebestuff', 'root', '');
        	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        	$sql = 'SELECT * FROM events';
        	$stmt = $pdo->prepare($sql);
        	$stmt->execute();

        	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        		echo '<tr>';
            		echo '<td>' . $row['name'] . '</td>';
            		echo '<td>' . $row['facilitator'] . '</td>';
			echo '<td>' . $row['location'] . '</td>';
			echo '<td>' . $row['descript'] . '</td>';
			echo '<td>' . $row['length_in_hours'] . '</td>';
			echo '<td>' . $row['event_date'] . '</td>';
			echo '</tr>';
        	}
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
    ?>

</table>
		<script>
			// Function to log the user out
			function logout() {
				<?php
					session_destroy();
				?>
				window.location.href = "index.php";
			}

			// Add an event listener to the logout button
			const logoutButton = document.getElementById('logoutButton');
			if (logoutButton) {
				logoutButton.addEventListener('click', logout);
			}
		</script>
		<footer>
			&copy; 2023 GiveBack | No rights reserved.
		</footer>
	</body>
</html>
