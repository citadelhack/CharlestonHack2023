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
		<h1>Joined Events</h1>
			<hr>
		<ul id="userEventList"></ul>
		<hr>
		<p>Total Hours Served: <span id="totalHours"></span></p>
		<hr>

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


		<script>
			async function loadUserEvents(userId) {
				const response = await fetch(`/userevents/${userId}`);
				const userEvents = await response.json();
				const userEventList = document.getElementById('userEventList');
				const totalHoursSpan = document.getElementById('totalHours');
				let totalHours = 0;

				userEvents.forEach(event => {
					totalHours += event.hours;
					const listItem = document.createElement('li');
					listItem.innerHTML = `<strong>${event.name}</strong> - Date: ${event.date}, Hours Served: ${event.hours}`;
					userEventList.appendChild(listItem);
				});

				totalHoursSpan.textContent = totalHours;
			}

			// Replace with the actual user ID
			const userId = 1;
			loadUserEvents(userId);
		</script>
		<footer>
			&copy; 2023 GiveBack | No rights reserved.
		</footer>
	</body>
</html>
