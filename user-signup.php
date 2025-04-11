<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "create_crud";

// Create connection
$conn = new mysqli($servername, $username, $password,  $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "Passwords do not match.";
        exit;
    }

	// Hash the password (for security!)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

	// Insert into users table
    $sql = "INSERT INTO users (full_name, email, password) VALUES ('$full_name', '$email', '$hashed_password')";

	if ($conn->query($sql) === TRUE) {
		// Redirect to index.php (home page)
		header("Location: index.php");
		exit();
	} else {
		echo "Error: " . $conn->error;
	}
}

/*  Query to retrieve data
$sql = "SELECT id, full_name, email FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "ID: {$row['id']} | Name: {$row['full_name']} | Email: {$row['email']}<br>";
    }
} else {
    echo "0 results";
}
*/

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PHP Basic Crud</title>
	<link rel="stylesheet" href="user-signup.css">
</head>
<body>
	<div class="container">
		<h1>SIGN UP HERE</h1>
		<form method="POST" action="user-signup.php">
			<input type="text" name="full_name" placeholder="Full Name" required><br>
			<input type="email" name="email" placeholder="Email" required><br>
			<input type="password" name="password" placeholder="Password" required><br>
			<input type="password" name="confirm_password" placeholder="Confirm Password" required><br>
  			<button class="signup" type="submit" name="submit">Sign Up</button>
		</form>
	</div>
</body>
</html>

