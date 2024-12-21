<?php

	session_start();

	if((!isset($_SESSION['addSuccess']))) {
		header('Location: menu.php');
		exit();
	} else {
		unset($_SESSION['addSuccess']);
	}

	if(isset($_SESSION['r_iValue'])) unset($_SESSION['r_iValue']);
	if(isset($_SESSION['r_iCategory'])) unset($_SESSION['r_iCategory']);
	if(isset($_SESSION['r_iCategoryName'])) unset($_SESSION['r_iCategoryName']);
	if(isset($_SESSION['r_iDate'])) unset($_SESSION['r_iDate']);
	if(isset($_SESSION['r_iComment'])) unset($_SESSION['r_iComment']);
	
	if(isset($_SESSION['e_value'])) unset($_SESSION['e_value']);
	if(isset($_SESSION['e_category'])) unset($_SESSION['e_category']);
	if(isset($_SESSION['e_date'])) unset($_SESSION['e_date']);
		
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add success</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body class="add-success">

	<div class="tab-content container mt-5">
        <div class="tab-pane active">
            <h1 class="h3 mb-3 fw-normal" style="text-align: center; color: gold; font-size: 1.8rem">The data has been correctly added.</h1>
			<img class="mb-5 mt-5" id="m-img" src="./images/success-image.jpg" style="display: block; margin: 0 auto;">
			<a href="./menu.php" class="btn btn-primary w-100 mt-3">Go back to start page</a>
        </div>
    </div>
	
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>