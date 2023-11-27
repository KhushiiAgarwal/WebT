<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['units'])) {
    $units = intval($_POST['units']);
    $rate = 0;

    if ($units <= 50) {
        $rate = $units * 3.5;
    } else if ($units <= 150) {
        $rate = 50 * 3.5 + ($units - 50) * 4;
    } else if ($units <= 250) {
        $rate = 50 * 3.5 + 100 * 4 + ($units - 150) * 5.2;
    } else {
        $rate = 50 * 3.5 + 100 * 4 + 100 * 5.2 + ($units - 250) * 6.5;
    }

    echo "Total Bill: Rs. " . number_format($rate, 2);
} else {
    echo " ";
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Electricity Bill Calculator</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <h2>Electricity Bill Calculator</h2>
    <form id="billForm" method="post" action="bill.php">
        <label for="units">Enter number of units:</label><br>
        <input type="number" id="units" name="units" required><br><br>
        <input type="submit" id="calculate" value="Calculate Bill">
    </form>
    <br><br>
    <div id="result"></div>

    <script>
        $(document).ready(function () {
            $('#billForm').submit(function (event) {
                event.preventDefault();
                var units = parseInt($('#units').val());
                if (units <= 0 || isNaN(units)) {
                    alert('Please enter a valid number of units consumed.');
                    return;
                }
                this.submit();
            });
        });
    </script>
</body>

</html>
