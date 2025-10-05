<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <style>
    body { font-family: Arial; background: #f5f5f5; }
    .container { max-width: 600px; margin: 80px auto; padding: 20px; background: white; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.2);}
    h2 { color: #004aad; }
    a { display: inline-block; margin-top: 20px; text-decoration: none; color: #004aad; font-weight: bold; }
    a:hover { color: #0078ff; }
  </style>
</head>
<body>

<div class="container">
  <h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
  <p>You are now logged in.</p>
  <a href="logout.php">Logout</a>
</div>

</body>
</html>
