<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "sms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rollNumber = $_POST["roll_number"];
    $year = $_POST["year"];

    // Fetch semester results for the entered roll number and year
    $sql = "SELECT semester, subject, marks FROM results WHERE roll_number = '$rollNumber' AND year = $year";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Semester Results for Roll Number $rollNumber, Year $year</h2>";
        echo "<table border='1'>
                <tr>
                    <th>Semester</th>
                    <th>Subject</th>
                    <th>Marks</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['semester']}</td>
                    <td>{$row['subject']}</td>
                    <td>{$row['marks']}</td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "No results found for the entered roll number and year.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semester Results</title>
</head>
<body>

<form action="" method="post">
    <label for="roll_number">Enter Roll Number:</label>
    <input type="text" id="roll_number" name="roll_number" required>
    
    <label for="year">Enter Year:</label>
    <input type="number" id="year" name="year" required>
    
    <button type="submit">Get Semester Results</button>
</form>

</body>
</html>
