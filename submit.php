<?php
// Check POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $name = htmlspecialchars(strip_tags(trim($_POST['name'])));
    $email = htmlspecialchars(strip_tags(trim($_POST['email'])));
    $dept = htmlspecialchars(strip_tags(trim($_POST['dept'])));
    $year = htmlspecialchars(strip_tags(trim($_POST['year'])));

    // Validate
    if (empty($name) || empty($email) || empty($dept) || empty($year)) {
        echo "<p class='error'>Error: All fields are required.</p>";
        echo "<a href='index.php'>Go Back</a>";
        exit;
    }

    // Prepare data line
    $data = "$name | $email | $dept | $year" . PHP_EOL;

    // Store in registrations.txt
    $file = 'registrations.txt';
    if (file_put_contents($file, $data, FILE_APPEND | LOCK_EX)) {
        echo "<p class='success'>Registration Successful!</p>";
        echo "<p>Thank you, <b>$name</b>, for registering.</p>";
        echo "<a href='index.php'>Register Another Student</a>";
    } else {
        echo "<p class='error'>Error: Unable to save registration.</p>";
        echo "<a href='index.php'>Try Again</a>";
    }
} else {
    echo "<p class='error'>Invalid Request.</p>";
    echo "<a href='index.php'>Go Back</a>";
}
?>
