<?php
session_start();

// temp credentials
$validUser = "admin";
$validPass = "password123";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars(trim($_POST['username'] ?? ''));
    $password = trim($_POST['password'] ?? '');

    if (empty($username) || empty($password)) {
        $error = "Please enter both username and password.";
    } elseif

     ($username === $validUser && $password === $validPass) {
        $_SESSION['user'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid credentials!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
   <!-- Style CSS -->
    <link rel="stylesheet" href="./assets/css/style.css" />
</head>
<body>
    <div class="login-wrapper">
        <div class="container">
  <h2 class="login-title">Login to Dashboard</h2>

 

  <form method="POST" action="login.php">
    <input type="text" name="username" placeholder="Username"  required/><br /><br />
    <input type="password" name="password" placeholder="Password"  required/><br /><br />
    <button type="submit" class="submit-btn">Login</button>
  </form>
   <?php if (isset($error)): ?>
    <p style="color:red; text-align:center"><?= $error ?></p>
  <?php endif; ?>
  <div class="admin-link-wrapper">
    <a href="index.html" class="dashboard-link">🐞 Bug Report</a>
  </div>
  </div>
  </div>
</body>
</html>
