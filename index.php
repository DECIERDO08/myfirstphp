<?php
// db connection (same as you already use)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "create_crud";

// Connect to database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get users from DB
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Simple CRUD</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php if (isset($_GET['signup']) && $_GET['signup'] === 'success'): ?>
        <p style="color: green;">User registered successfully!</p>
    <?php endif; ?>

    <div class="container">
        <h1>All Registered Users</h1>
        <a href="signup-form.php" class="btn"> +Add New User</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['full_name'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td>
                                <a href="edit.php?id=<?= $row['id'] ?>">✏️ Edit</a>
                                |
                                <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">🗑️ Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="4">No users found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php $conn->close(); ?>
