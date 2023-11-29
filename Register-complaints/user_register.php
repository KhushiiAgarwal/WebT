<!-- user_signup.php -->
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require('config.php');

    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        mysqli_query($conn, $query);
        header("Location: user_login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Signup</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>User Registration</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label>Username:</label>
            <input type="text" name="username" required><br>
            <label>Password:</label>
            <input type="password" name="password" required><br>
            <input type="submit" name="register" value="Sign Up">
        </form>

        <p>Already have an account? <a href="user_login.php">Login here</a></p>
    </div>
</body>
</html>
