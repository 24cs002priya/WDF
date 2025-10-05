<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Registration Form</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
  <h2>Student Registration</h2>
  <form action="submit.php" method="POST">
    <label for="name">Full Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="dept">Department:</label>
    <select id="dept" name="dept" required>
      <option value="">--Select--</option>
      <option value="CSE">CSE</option>
      <option value="ECE">ECE</option>
      <option value="IT">IT</option>
      <option value="EEE">EEE</option>
      <option value="ME">ME</option>
      <option value="CIVIL">CIVIL</option>
    </select>

    <label for="year">Year:</label>
    <select id="year" name="year" required>
      <option value="">--Select--</option>
      <option value="1st">1st</option>
      <option value="2nd">2nd</option>
      <option value="3rd">3rd</option>
      <option value="4th">4th</option>
    </select>

    <button type="submit">Register</button>
  </form>
</div>

</body>
</html>
