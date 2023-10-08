<?php
	session_start();
?>
<!DOCTYPE.html>
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
        <nav>
            <ul>
                <li><a href="Page2F.php">Create Event</a></li>
                <li><a href="Page2M.php">Event List</a></li>
                <li><a href="Page3M.php">Joined Events</a></li>
				<button id="logoutButton">Logout</button> <!-- Add the logout button here -->
            </ul>
        </nav>
    </header>
    <body>
        <div class="content-container">
            <h1>Create Event</h1>
            <hr>

            <form id="eventForm" action="your_server_script.php" method="POST">
                <label for="eventName">Event Name:</label>
                <input type="text" id="eventName" name="eventName" required><br><br>

                <label for="eventDate">Event Date:</label>
                <input type="date" id="eventDate" name="eventDate" required><br><br>

                <label for="numHours">Number of Hours:</label>
                <input type="text" id="numHours" name="numHours" required><br><br>

                <label for="eventLocation">Event Location:</label>
                <input type="text" id="eventLocation" name="eventLocation" required><br><br>

                <label for="eventDescription">Event Description:</label>
                <input type="text" id="eventDescription" name="eventDescription" required><br><br>

                <label for="peopleNeeded">Number of People needed:</label>
                <input type="text" id="peopleNeeded" name="peopleNeeded" required><br><br>

                <input type="submit" value="Submit Event">
            </form>
        </div>
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
