<?php
session_start();
require 'config.php';

//Handle loging
if (isset($_POST['login'])) {
    $email = $_POST['login_email'];
    $password = $_POST['login_password'];

    $query = $conn->prepare("SELECT * FROM users WHERE email=?");
    $query->bind_param("s", $email);
    $query->execute();
    $result = $query->get_result()->fetch_assoc();

    if ($result && password_verify($password, $result['password'])) {
        $_SESSION['user_id'] = $result['user_id'];
        header("Location: dashboard.php");
    } else {
        $login_error = "Invalid login credentials.";
    }
}

//Handle Signup
if (isset($_POST['signup'])) {
  $name = $_POST['signup_name'];
  $email = $_POST['signup_email'];
  $password = password_hash($_POST['signup_password'], PASSWORD_BCRYPT);
  $role = 'EV owner';

  $check = $conn->prepare("SELECT * FROM users WHERE email=?");
  $check->bind_param("s", $email);
  $check->execute();
  $existing = $check->get_result()->fetch_assoc();

  if ($existing) {
    $signup_error = "Email already registered.";
  } else {
    $stmt = $conn->prepare("INSERT INTO users (name, email, password, role ) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $password, $role);
    if ($stmt->execute()) {
      $sign_success = "Account created! Please log in.";
    } else {
        $signup_error = "Error creating account.";
      }
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
