<!-- user_complaints.php -->
<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: user_login.php");
    exit();
}

require('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $complaint_text = $_POST['complaint_text'];
    $user_id = $_SESSION['user_id'];

    $query = "INSERT INTO complaints (user_id, complaint_text) VALUES ($user_id, '$complaint_text')";
    mysqli_query($conn, $query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Complaints</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['username']; ?></h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label>Complaint:</label>
        <textarea name="complaint_text" rows="4" cols="50" required></textarea><br>
        <input type="submit" value="Submit Complaint">
    </form>

    <br><br>
    <a href="user_logout.php">Logout</a>
</body>
</html>
