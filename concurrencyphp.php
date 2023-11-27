<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Converter</title>
</head>

<body>
    <h2>Currency Converter</h2>

    <?php
    // Function to convert USD to INR
    function convertUSDToINR($usdAmount)
    {
        // Fixed conversion rate (for example purposes)
        $conversionRate = 75.0;
        return $usdAmount * $conversionRate;
    }

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the USD amount from the form
        $usdAmount = $_POST["usd_amount"];

        // Validate the input (for demonstration purposes)
        if (!empty($usdAmount) && is_numeric($usdAmount)) {
            // Convert USD to INR
            $inrAmount = convertUSDToINR($usdAmount);

            // Display the result
            echo "<p>$usdAmount USD is equal to $inrAmount INR</p>";
        } else {
            echo "<p>Please enter a valid USD amount.</p>";
        }
    }
    ?>

    <!-- Currency conversion form -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="usd_amount">Enter USD amount:</label>
        <input type="text" name="usd_amount" id="usd_amount" required>
        <input type="submit" value="Convert">
    </form>
</body>

</html>
