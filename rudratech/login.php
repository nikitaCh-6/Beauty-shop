

<?php
$email = $_POST['email'];
$passwords = $_POST['password'];

// Database connection parameters
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'beauty_shop';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");

    $stmt->bind_param('ss', $email, $passwords);

    $execval = $stmt->execute();
    echo "Registration successfully...";

    // Close the statement and the database connection
    $stmt->close();
    $conn->close();
}

