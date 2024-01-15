<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "base";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', 'user')";

if ($conn->query($sql) === true) {
    header("Location: index.php");
} else {
    echo "Ошибка при регистрации: " . $conn->error;
}

$conn->close();
?>
