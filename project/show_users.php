<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION['username'])) {
    $current_username = $_SESSION['username'];

    // Check if the current user is the first registered user
    $sql = "SELECT username FROM users ORDER BY id ASC LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($current_username == $row['username']) {
            $sql = "SELECT username, email, first_name, last_name FROM users";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<h2>Registered Users</h2>";
                while($row = $result->fetch_assoc()) {
                    echo "Username: " . $row['username']. " - Email: " . $row['email']. " - Name: " . $row['first_name']. " " . $row['last_name']. "<br>";
                }
            } else {
                echo "No registered users found.";
            }
        } else {
            echo "Access denied.";
        }
    }
}

$conn->close();
?>
