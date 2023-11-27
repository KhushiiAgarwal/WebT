<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String Transformation</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        form {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-size: 18px;
            display: block;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            margin-bottom: 20px;
            padding: 10px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            cursor: pointer;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            margin-top: 20px;
        }

        button:hover {
            background-color: #45a049;
        }

        #result {
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <form action="" method="post">
        <label for="inputString">Enter a String:</label>
        <input type="text" id="inputString" name="inputString" required>
        
        <label for="transformation">Select Transformation:</label>
        <select id="transformation" name="transformation" required>
            <option value="uppercase">Uppercase</option>
            <option value="lowercase">Lowercase</option>
            <option value="capitalize">Capitalize First Letter</option>
        </select>
        <br>
        <button type="submit">Transform</button>
    </form>

    <div id="result">
        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Get user input
            $inputString = $_POST["inputString"];
            $transformation = $_POST["transformation"];

            // Perform the selected transformation
            switch ($transformation) {
                case 'uppercase':
                    $result = strtoupper($inputString);
                    break;
                case 'lowercase':
                    $result = strtolower($inputString);
                    break;
                case 'capitalize':
                    $result = ucwords(strtolower($inputString));
                    break;
                default:
                    $result = 'Invalid Transformation';
            }

            // Display the result
            echo "<p>Original String: $inputString</p>";
            echo "<p>Transformed String: $result</p>";
        }
        ?>
    </div>
</div>

</body>
</html>
