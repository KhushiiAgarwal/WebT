<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION['visits'])) {
    $_SESSION['visits'] = 1;
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
    <br>
    <a href="visit.php">Count my Visits</a>
</body>

</html>
