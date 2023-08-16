<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $enteredUsername = $_POST["username"];
    $enteredPassword = $_POST["password"];

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

    // Retrieve stored password for the entered username
    $sql = "SELECT password FROM Users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $enteredUsername);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // Verify the entered password against the stored hashed password
    if ($row && password_verify($enteredPassword, $row["password"])) {
        echo "Login successful!";
        // Redirect to a new page, e.g., lab2.html
        header("Location: lab2.html");
        exit();
    } else {
        echo "Login failed. Incorrect username or password.";
    }

    $stmt->close();
    $conn->close();
}
?>
