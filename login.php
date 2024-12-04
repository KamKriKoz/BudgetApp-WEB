<?php

	session_start();
	
	if((isset($_SESSION['logged_in']))&&($_SESSION['logged_in']==true)) {
	
		header('Location: menu.php');
		exit();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>

<body class="login">
    <form id="myLogForm" style="display: grid; justify-content: center; margin-top: 50px" action="logging_in.php" method="post">
        <h1 class="h3 mb-3 fw-normal" style="text-align: center; color: gold; font-size: 2rem">LOGGING IN</h1>
        <div class="input-group has-validation mb-3" style="width: 300px">
            <span class="input-group-text">🧑‍💻</span>
            <div class="form-floating">
                <input type="text" class="form-control" placeholder="Username" name="logUserName">
                <label>Username</label>
            </div>
        </div>
        <div class="input-group has-validation mb-3" style="width: 300px">
            <span class="input-group-text">🔐</span>
            <div class="form-floating">
                <input type="password" class="form-control" id="logPassword" placeholder="Password" name="logPassword">
                <label for="logPassword">Password</label>
            </div>
        </div>
        <button id="main_sub" class="btn btn-primary w-100 py-2" type="submit">Log in</button>
    </form>
	
	<?php
		if(isset($_SESSION['error'])) echo $_SESSION['error'];
	?>
	
    <a href="./register.php" class="btn btn-secondary mt-3 alternative">Register</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>