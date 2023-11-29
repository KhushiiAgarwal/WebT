<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint System Home</title>
    <link rel="stylesheet" href="style.css">
    <!-- Add Bootstrap CSS and JS links here -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style>
        body {
            background-image: url('background-image.jpg'); /* Replace with your background image */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #fff;
        }

        .navbar {
            background-color: #007BFF;
        }

        .navbar-brand {
            color: #fff !important;
        }

        .navbar-toggler-icon {
            background-color: #fff;
        }

        .navbar-nav .nav-link {
            color: #fff !important;
        }

        .navbar-nav .nav-link:hover {
            color: #ffd700 !important;
        }

        .container {
            text-align: center;
            padding: 100px;
            background-color: rgba(0, 0, 0, 0.6); /* Semi-transparent black background */
            border-radius: 10px;
        }

        h2, p {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">Complaint System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="user_login.php">User Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user_signup.php">User Signup</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin_login.php">Admin Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h2>Welcome to the Complaint System</h2>
        <p>Submit your complaints and track their status.</p>
    </div>
</body>
</html>
