<!-- user_login.php -->
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require('config.php');

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);

        if ($row && password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            header("Location: user_complaints.php");
            exit();
        } else {
            $login_error = "Invalid username or password";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>User Login</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label>Username:</label>
            <input type="text" name="username" required><br>
            <label>Password:</label>
            <input type="password" name="password" required><br>
            <input type="submit" name="login" value="Login">
        </form>

        <?php
        if (isset($login_error)) {
            echo "<p class='error'>$login_error</p>";
        }
        ?>

        <p>Don't have an account? <a href="user_register.php">Sign Up here</a></p>
    </div>
</body>
</html>
