<!-- admin_complaints.php -->
<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

require('config.php');

$query = "SELECT complaints.*, users.username FROM complaints JOIN users ON complaints.user_id = users.id";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Complaint Dashboard</title>
</head>
<body>
    <h2>Welcome, Admin <?php echo $_SESSION['admin_username']; ?></h2>
    <table border="1">
        <tr>
            <th>User</th>
            <th>Complaint</th>
            <th>Timestamp</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['username']}</td>";
            echo "<td>{$row['complaint_text']}</td>";
            echo "<td>{$row['timestamp']}</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <br><br>
    <a href="admin_logout.php">Logout</a>
</body>
</html>
