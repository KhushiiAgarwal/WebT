<?php
session_start();

// Hardcoded admin credentials
$hardcoded_admin_username = "admin";
$hardcoded_admin_password = "pass";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_username = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];

    if ($admin_username == $hardcoded_admin_username && $admin_password == $hardcoded_admin_password) {
        $_SESSION['admin_id'] = 1; // You can set any value for the admin ID
        $_SESSION['admin_username'] = $admin_username;
        header("Location: admin_complaints.php");
        exit();
    } else {
        $login_error = "Invalid admin username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
    <h2>Admin Login</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label>Admin Username:</label>
        <input type="text" name="admin_username" required><br>
        <label>Admin Password:</label>
        <input type="password" name="admin_password" required><br>
        <input type="submit" value="Login">
    </form>

    <?php
    if (isset($login_error)) {
        echo "<p>$login_error</p>";
    }
    ?>
</body>
</html>
