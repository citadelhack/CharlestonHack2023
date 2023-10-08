<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = $_POST["username"];
	$email = $_POST["email"];
	$passwd = $_POST["password"];
	$hashed_password = password_hash($passwd, PASSWORD_DEFAULT);
	try {
		require_once "dbh.inc.php";
		
		$search_query = "SELECT COUNT(*) as count FROM members WHERE email = ?";
		$stmt = $pdo->prepare($search_query);
		$stmt->bindParam(1, $email);
		$stmt->execute();

		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		if ($result['count'] > 0) {
			$search_query = "SELECT password FROM members WHERE email = ?";
			$stmt = $pdo->prepare($search_query);
			$stmt->bindParam(1, $email);
			$stmt->execute();
			
			$stored_pass = $stmt->fetchColumn();


			if (password_verify($passwd, $stored_pass)) {
				$search_query = "SELECT username FROM members WHERE email = ?";
				$stmt = $pdo->prepare($search_query);
				$stmt->bindParam(1, $email);
				$stmt->execute();
				
				$usr = $stmt->fetchColumn();

				$_SESSION['username'] = $usr;
				header("Location: ../Page2M.php");
				exit();
			}
			else{
				echo "Wrong password.";
				exit();
			}
			
		}
		else{
			try {
		
				$query = "INSERT INTO members (username, password, email) VALUES (?, ?, ?);";

				$stmt = $pdo->prepare($query);
				$stmt->execute([$username, $hashed_password, $email]);
		
				
				$stmt = null;

				header("Location: ../index.php");
				die();
		
			} catch(PDOException $e) {
				die("Query1 failed: " . $e->getMessage());
			}
		}

		} catch(PDOException $e) {
			die("Query2 failed: " . $e->getMessage());
		} finally { 
			$pdo = null;
		}
		
} else {
	header("Location: ../index.php");
	exit();
}
