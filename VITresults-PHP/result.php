<?php
        
    $osMSE = (int)$_POST["subject1MSE"];
    $osESE = (int)$_POST["subject1ESE"];
    $osTotal = $osMSE + $osESE;
    
    $cnMSE = (int)$_POST["subject2MSE"];
    $cnESE = (int)$_POST["subject2ESE"];
    $cnTotal = $cnMSE + $cnESE;
    
    $csMSE = (int)$_POST["subject3MSE"];
    $csESE = (int)$_POST["subject3ESE"];
    $csTotal = $csMSE + $csESE;
    
    $aiMSE = (int)$_POST["subject4MSE"];
    $aiESE = (int)$_POST["subject4ESE"];
    $aiTotal = $aiMSE + $aiESE;

    $totalMarks = $osTotal + $cnTotal + $csTotal + $aiTotal;
    $percentage = ($totalMarks / 400) * 100;
    $cgpa = round(($percentage / 10), 2);

    // MySQL Configuration
    $server = "localhost";
    $username = "root";
    $password = "Shreyansh_07";
    $database = "vit";

    $mysql_connection = mysqli_connect($server, $username, $password, $database);
    if (!$mysql_connection)
    {
        echo '<div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Failed to connect to database ... ' . mysqli_connect_error() . ' !!! </h4></div>';
        die();
    }

    $sql_query = "INSERT INTO results(OS, CN, CS, AI, CGPA) VALUES($osTotal, $cnTotal, $csTotal, $aiTotal, $cgpa)";
    if (!mysqli_query($mysql_connection, $sql_query))
    {
        echo '<div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Failed to insert data to database !!! </h4></div>';
        die();
    }

    $sql_query = "SELECT * from results";
    $result = mysqli_query($mysql_connection, $sql_query);

    mysqli_close($mysql_connection);
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <style>

        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }
 
        h3 {
            display: table;
            margin: 0px auto 0px auto;
            padding: 5px;
            padding-left: 80px;
            padding-right: 80px;
            text-align: center;
            border-radius: 5px;
            background-color: rgb(14, 84, 205);
            color: aliceblue;
            text-decoration: underline;

        }

        th {
            background-color: rgb(158, 213, 255);
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
 
        td {
            border: 1px solid black;
        } 

    </style>

</head>

<body>

    <section class="text-center">
        <div class="text-center" style="margin-bottom: 10px;">
                <img src="vit.jpg" alt="Error While Displaying Image !" class="img-fluid" width="550">
        </div>
        <h3><u>Semester Results</u></h3>
        <br>
        <table>
            <tr>
                <th>Roll No.</th>
                <th>Operating System</th>
                <th>Computer Networks</th>
                <th>Cyber Security</th>
                <th>Artificial Intelligence</th>
                <th>CGPA</th>
            </tr>

            <!-- Fetch MySQL Table Data -->
            <?php
                if (mysqli_num_rows($result) > 0)
                {
                    while($rows = $result->fetch_assoc())
                    {
            ?>
                    <tr>
                        <td><?php echo $rows["RollNo"];?></td>
                        <td><?php echo $rows["OS"];?></td>
                        <td><?php echo $rows["CN"];?></td>
                        <td><?php echo $rows["CS"];?></td>
                        <td><?php echo $rows["AI"];?></td>
                        <td><?php echo $rows["CGPA"];?></td>
                    </tr>
            <?php
                    }
                }
            ?>

        </table>
    </section>
    
</body>
</html>