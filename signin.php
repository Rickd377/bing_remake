<?php
session_start();
include 'db_connection.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        // Debugging: Print the hashed password from the database
        echo "Hashed password from DB: " . $user['password'] . "<br>";

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            if ($user['is_admin']) {
                header('Location: admin.php');
            } else {
                header('Location: index.php');
            }
        } else {
            echo "Password verification failed.<br>";
        }
    } else {
        echo "User not found.<br>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            overflow: hidden;
        }
    </style>
</head>
<body>
    <div class="signin-container">
        <form class="signin-form" method="POST" action="signin.php">
            <h2>Sign In</h2>
            <input type="text" name="username" placeholder="Username" required autocomplete="off">
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Sign In</button>
            <a href="register.php">Don't have an account? <span>Register here</span></a>
        </form>
    </div>
</body>
</html>