<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mark Attendance</title>
</head>
<body>

<h2>Mark Attendance</h2>

<?php
$conn = mysqli_connect("localhost", "root", "root", "attendance");

// Process student registration
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register_student"])) {
    $name = isset($_POST["name"]) ? $_POST["name"] : '';
    $roll_number = isset($_POST["roll_number"]) ? $_POST["roll_number"] : '';

    // Validate form input
    if (!empty($name) && !empty($roll_number)) {
        $sql_register = "INSERT INTO students (name, roll_number) VALUES ('$name', '$roll_number')";

        if (mysqli_query($conn, $sql_register)) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql_register . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Name and Roll Number are required for registration.";
    }
}

// Fetch the list of registered students
$sql_students = "SELECT id, name, roll_number FROM students";
$result_students = mysqli_query($conn, $sql_students);

// Process attendance marking
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['mark_attendance'])) {
    if(isset($_POST['students'])) {
        $selected_students = $_POST['students'];

        foreach ($selected_students as $student_id) {
            $sql_mark_attendance = "INSERT INTO attendance (student_id) VALUES ('$student_id')";

            if (!mysqli_query($conn, $sql_mark_attendance)) {
                echo "Error: " . $sql_mark_attendance . "<br>" . mysqli_error($conn);
            }
        }

        echo "Attendance marked successfully!";
    } else {
        echo "No students selected.";
    }
}
?>

<!-- Student Registration Form -->
<h3>Student Registration</h3>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="name">Name:</label>
    <input type="text" name="name" required><br>

    <label for="roll_number">Roll Number:</label>
    <input type="text" name="roll_number" required><br>

    <input type="submit" name="register_student" value="Register">
</form>

<!-- Mark Attendance Form -->
<h3>Mark Attendance</h3>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label>Select students for attendance:</label><br>

    <?php
    while ($row = mysqli_fetch_assoc($result_students)) {
        echo '<input type="checkbox" name="students[]" value="' . $row['id'] . '"> ' . $row['name'] . ' (' . $row['roll_number'] . ')<br>';
    }
    ?>

    <br>
    <input type="submit" name="mark_attendance" value="Mark Attendance">
</form>

</body>
</html>
