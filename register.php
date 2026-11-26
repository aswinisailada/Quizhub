<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];
    $email = $_POST['email'];
    $avatar = $_POST['avatar'];

    // Check if username already exists
    $check = $conn->prepare("SELECT * FROM users WHERE username=?");
    $check->bind_param("s", $username);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        echo "Username already exists!";
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO users (username, password, role, email, avatar) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $username, $password, $role, $email, $avatar);

    if ($stmt->execute()) {
        echo "Registered successfully. <a href='login.php'>Login Now</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>