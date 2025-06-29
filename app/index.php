<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'config.php';
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = $conn->prepare("SELECT * FROM users WHERE email=?");
    $query->bind_param("s", $email);
    $query->execute();
    $result = $query->get_result()->fetch_assoc();

    if ($result && password_verify($password, $result['password'])) {
        $_SESSION['user_id'] = $result['user_id'];
        header("Location: dashboard.php");
    } else {
        $error = "Invalid login credentials";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>EcoDrive Login</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h2 class="mt-5">EcoDrive Login</h2>
    <form method="post">
      <input type="email" name="email" placeholder="Email" required class="form-control mb-3">
      <input type="password" name="password" placeholder="Password" required class="form-control mb-3">
      <button type="submit" class="btn btn-success">Login</button>
    </form>
    <?php if (isset($error)) echo "<p class='text-danger'>$error</p>"; ?>
  </div>
</body>
</html>
