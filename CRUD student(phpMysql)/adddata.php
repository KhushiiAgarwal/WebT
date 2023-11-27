<?php
    require_once "conn.php";
    if(isset($_POST['submit'])){

        $name = $_POST['name'];
        $grade = $_POST['grade'];
        $marks = $_POST['marks'];

        if($name != "" && $grade != "" && $marks != "" ){
            $sql = "INSERT INTO results (`name`, `class`, `marks`) VALUES ('$name', '$grade', $marks)";
            if (mysqli_query($conn, $sql)) {
                header("location: index.php");
            } else {
                 echo "Something went wrong. Please try again later.";
            }
        }else{
            echo "Name, Class and Marks cannot be empty!";
        }
    }
?>
