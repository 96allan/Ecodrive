<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
echo "<h1>Welcome to EcoDrive Dashboard</h1>";
?>
<a href='logout.php'>Logout</a>
