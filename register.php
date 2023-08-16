<?php phpinfo(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <style>
        body {
            font-family: 'Comic Sans MS', cursive, sans-serif;
			background-color: #ffcc00; /* Updated colorful background color */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .burger-form {
            background-color: #ffffff;
			padding: 30px; /* Increased padding for a larger container */
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 300px; /* Increased width for a larger container */
            text-align: center;
			margin-top: -20px; /* Adjusted negative margin to move it to the top */
			margin-left: -20px; /* Adjusted negative margin to move it to the left */
        }

        .burger-form h1 {
            margin-bottom: 20px;
            color: #e74c3c;
        }

        .burger-form label {
            display: block;
            margin-bottom: 6px;
            color: #666;
        }

        .burger-form input[type="text"],
        .burger-form input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 15px;
			margin-left: -10px; /* Added negative left margin */
            font-size: 14px;
            color: #333;
        }
		
        .burger-form .btn-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .burger-form input[type="submit"],
		.burger-form input[type="button"] {
            background-color: #e74c3c;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
			margin-bottom: 10px;
        }

        .burger-form input[type="submit"]:hover,
		.burger-form input[type="button"]:hover {
            background-color: #c0392b;
        }

        .message {
            margin-top: 15px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="burger-form">
        <h1>Bob's Burgers Registration</h1>
        <form action="register.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <div class="btn-container">
                <input type="submit" value="Join the Feast">
                <input type="button" value="Already a Burger Lover? Login" onclick="window.location.href='login.html';" class="login-btn">
            </div>
        </form>
	
		<div class="message">
			<?php
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				// Retrieve form data
				$username = $_POST["username"];
				$password = $_POST["password"];

				// Database connection parameters
				$servername = "localhost";
				$username_db = "root";
				$password_db = "";
				$dbname = "userauth";

				// Create a connection
				$conn = new mysqli($servername, $username_db, $password_db, $dbname);

				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}

				// Hash the password
				$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

				$sql = "INSERT INTO Users (username, password) VALUES (?, ?)";
				$stmt = $conn->prepare($sql);
				$stmt->bind_param("ss", $username, $hashedPassword);

				if ($stmt->execute()) {
					echo "Registration successful!";
				} else {
					echo "Error during registration: " . $conn->error;
				}

				$stmt->close();
				$conn->close();
			}
			?>
		</div>
	</div>
</body>
</html>
