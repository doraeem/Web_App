<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header("Location: login.html");
    exit;
}

echo "Welcome, " . $_SESSION['username'] . "!<br>";
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        .logout-button {
            display: inline-block;
            padding: 5px 10px;
            font-size: 16px;
            color: white;
            background-color: black;
            border: none;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s;
            
        }
        .logout-button:hover {
            background-color: #800080;
        }
    </style>
</head>
<body>
    <a href="logout.html" class="logout-button">Logout</a>
</body>
</html>
