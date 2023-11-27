<?php
session_start();

if (!isset($_SESSION['visits'])) {
    $_SESSION['visits'] = 1;
} else {
    $_SESSION['visits']++;
    header("Location: home.php");
    exit();
}

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Home Page</title>
</head>

<body>
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
    <p>Number of visits: <?php echo $_SESSION['visits']; ?></p>
    <a href="logout.php">Logout</a>
</body>

</html>
