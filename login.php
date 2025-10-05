<?php
session_start();
include 'users.php';

// If already logged in, redirect to dashboard
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit;
}

// Check login form submission
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));
    $remember = isset($_POST['remember']);

    if (isset($users[$username]) && $users[$username] === $password) {
        // Successful login
        $_SESSION['username'] = $username;

        // Set cookie if "Remember Me" checked (expires in 7 days)
        if ($remember) {
            setcookie("username", $username, time() + (7*24*60*60), "/");
        }

        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <style>
    body { font-family: Arial; background: #f5f5f5; }
    .container { max-width: 400px; margin: 80px auto; padding: 20px; background: white; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.2);}
    h2 { text-align: center; color: #004aad; }
    input { width: 100%; padding: 10px; margin: 8px 0; border-radius: 4px; border: 1px solid #ccc; }
    button { width: 100%; padding: 10px; background: #004aad; color: white; border: none; border-radius: 4px; cursor: pointer; margin-top: 10px; }
    button:hover { background: #0078ff; }
    .error { color: red; text-align: center; font-weight: bold; }
    label { display: block; margin-top: 10px; }
  </style>
</head>
<body>

<div class="container">
  <h2>Login</h2>
  <?php if ($error) echo "<p class='error'>$error</p>"; ?>
  <form action="" method="POST">
    <label>Username:</label>
    <input type="text" name="username" value="<?php echo isset($_COOKIE['username']) ? $_COOKIE['username'] : ''; ?>" required>
    <label>Password:</label>
    <input type="password" name="password" required>
    <label><input type="checkbox" name="remember" <?php echo isset($_COOKIE['username']) ? 'checked' : ''; ?>> Remember Me</label>
    <button type="submit">Login</button>
  </form>
</div>

</body>
</html>
