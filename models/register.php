<?php
include 'koneksi.php';

if (isset($_POST['register'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
    $role_id = 1; // Default role is 'user'

    // Check if email already exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo "Email already exists.";
    } else {
        // Insert the new user
        $stmt = $conn->prepare("INSERT INTO users (fullname, email, password, role_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $fullname, $email, $password, $role_id);
        if ($stmt->execute()) {
            echo "Registration successful!";
            header("Location: ../web/login.php");
        } else {
            echo "Error: " . $stmt->error;
        }
    }
    $stmt->close();
    $conn->close();
}
?>
