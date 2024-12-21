<?php

	session_start();
	
	if((!isset($_SESSION['registrationSuccess']))) {
		header('Location: index.php');
		exit();
	} else {
		unset($_SESSION['registrationSuccess']);
	}
	
	if(isset($_SESSION['r_username'])) unset($_SESSION['r_username']);
	if(isset($_SESSION['r_email'])) unset($_SESSION['r_email']);
	if(isset($_SESSION['r_rules'])) unset($_SESSION['r_rules']);
	
	if(isset($_SESSION['e_username'])) unset($_SESSION['e_username']);
	if(isset($_SESSION['e_email'])) unset($_SESSION['e_email']);
	if(isset($_SESSION['e_pass'])) unset($_SESSION['e_pass']);
	if(isset($_SESSION['e_passR'])) unset($_SESSION['e_passR']);
	if(isset($_SESSION['e_rules'])) unset($_SESSION['e_rules']);
	if(isset($_SESSION['e_bot'])) unset($_SESSION['e_bot']);
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body class="welcome">

	<div class="input-group" style="width: 300px">
		<h1 class="h3 mb-3 fw-normal" style="text-align: center; color: gold; font-size: 1.8rem">Welcome to the group of website users.</h1>
		<a href="./login.php" class="btn btn-primary w-100 mt-3">Log in here</a>
	</div>
	
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>