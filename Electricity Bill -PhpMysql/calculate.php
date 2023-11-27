<?php
function calculateBill($units)
{
    $bill = 0;
    if ($units <= 50) {
        $bill = $units * 3.50;
    } else if ($units > 50 && $units <= 150) {
        $bill = (50 * 3.50) + (($units - 50) * 4.00);
    } else if ($units > 150 && $units <= 250) {
        $bill = (50 * 3.50) + (100 * 4.00) + (($units - 150) * 5.20);
    } else {
        $bill = (50 * 3.50) + (100 * 4.00) + (100 * 5.20) + (($units - 250) * 6.50);
    }
    return $bill;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $month = $_POST['month'];
    $units = $_POST['units'];
    $bill = calculateBill($units);

    echo "The electricity bill for $name for the month of $month, with a usage of $units units, is Rs. $bill";
}
?>