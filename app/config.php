<?php
$host = getenv('MYSQL_HOST') ?: '127.0.0.1'; //use IP not localhost
$user = getenv('MYSQL_USER') ?: 'root';
$pass = getenv('MYSQL_PASSWORD') ?: 'root';
$db   = getenv('MYSQL_DATABASE') ?: 'ecodrive';
$port = getenv('MYSQL_PORT')  ?: 3306;

$conn = new mysqli($host, $user, $pass, $db, $port);

//check connection
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
