<?php

	session_start();
	
	unset($_SESSION['error']);
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budget App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="all-over">
        <h1>CA$H CONTROL</h1>
        <p>Control your budget to make your dreams come true.</p>
        <div class="start-grid">       
            <div class="container">
                <div class="card" style="width: 20rem; margin: 30px; border: none">
                <img src="./images/register-image.jpg" class="card-img-top">
                    <a href="./register.php" class="btn btn-primary">Register</a>
                </div>
            </div>
            <div class="container">
                <div class="card" style="width: 20rem; margin: 30px; border: none">
                <img src="./images/login-image.jpg" class="card-img-top">
                    <a href="./login.php" class="btn btn-primary">Login</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>