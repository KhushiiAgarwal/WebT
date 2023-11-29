<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Summary</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <h1>Order Summary</h1>

    <?php
    // Retrieve the submitted form data
    $burgerQuantity = isset($_POST['burger']) ? (int)$_POST['burger'] : 0;
    $pizzaQuantity = isset($_POST['pizza']) ? (int)$_POST['pizza'] : 0;
    $pastaQuantity = isset($_POST['pasta']) ? (int)$_POST['pasta'] : 0;

    // Calculate total cost
    $burgerPrice = 5.00;
    $pizzaPrice = 8.00;
    $pastaPrice = 10.00;

    $totalCost = ($burgerQuantity * $burgerPrice) + ($pizzaQuantity * $pizzaPrice) + ($pastaQuantity * $pastaPrice);

    // Display order summary
    echo "<p>Burger: $burgerQuantity x $burgerPrice = $" . number_format($burgerQuantity * $burgerPrice, 2) . "</p>";
    echo "<p>Pizza: $pizzaQuantity x $pizzaPrice = $" . number_format($pizzaQuantity * $pizzaPrice, 2) . "</p>";
    echo "<p>Pasta: $pastaQuantity x $pastaPrice = $" . number_format($pastaQuantity * $pastaPrice, 2) . "</p>";
    echo "<h2>Total Cost: $" . number_format($totalCost, 2) . "</h2>";
    ?>

</body>
</html>
