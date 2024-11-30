<?php

	session_start();
	
	unset($_SESSION['error']);
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>

<body class="register">
    <form method ="post" id="myForm" style="display: grid; justify-content: center; margin-top: 0rem">
        <h1 class="h3 mb-3 fw-normal" style="text-align: center; color: gold; font-size: 2rem">REGISTRATION</h1>
		<div class="input-group has-validation mb-3" style="width: 300px">
            <span class="input-group-text">🧑‍💻</span>
            <div class="form-floating">
                <input type="text" class="form-control" placeholder="Username" name="regUserName" required>
                <label>Username</label>
            </div>
        </div>
        <div class="input-group has-validation mb-3" style="width: 300px">
            <span class="input-group-text">📧</span>
            <div class="form-floating">
                <input type="email" class="form-control" id="email" placeholder="Email Address" required>
                <label for="email">Email Address</label>
            </div>
        </div>
        <div class="input-group has-validation mb-3" style="width: 300px">
            <span class="input-group-text">🔏</span>
            <div class="form-floating">
                <input type="password" class="form-control" id="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>
        </div>

        <div class="input-group has-validation mb-3" style="width: 300px">
            <span class="input-group-text">🔏</span>
            <div class="form-floating">
                <input type="password" class="form-control" id="repeatPassword" placeholder="Repeat password" required>
                <label for="password">Repeat password</label>
            </div>
        </div>
        <div class="input-group has-validation mb-3" style="width: 300px">
            <span class="input-group-text">
				<input style="justify-content: center; width: 1.3rem; height: 0.9rem;" type="checkbox" name="rules_checkbox" required>
			</span>
            <label class="form-control">
				<a href="./rules.html" style="text-decoration: none; color: rgb(109, 22, 22);">Accept rules</a>
			</label>
        </div>
        
        <button id="main_sub" class="btn btn-primary w-100 py-2" type="submit">Create account</button>
    </form>  
    <a href="./login.php" class="btn btn-secondary mt-3 alternative">Log in</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>