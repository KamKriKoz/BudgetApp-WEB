<?php

	session_start();
	
	unset($_SESSION['error']);
	
	if (isset($_POST['regUsername'])) {
		
		$all_good=true;
		$regUsername=$_POST['regUsername'];
		$regEmail=$_POST['regEmail'];
		$regEmail_S=filter_var($regEmail, FILTER_SANITIZE_EMAIL);
		$regPass=$_POST['regPass'];
		$regPassR=$_POST['regPassR'];
		$regPassHash=password_hash($regPass, PASSWORD_DEFAULT);
		
		$secretCaptcha='6Lcun1sqAAAAAJx_J2kJ-hIXP2R0-t45XfAQYst2';
		$checkCaptcha=file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretCaptcha.'&response='.$_POST['g-recaptcha-response']);
		$answer=json_decode($checkCaptcha);
		
		if ((strlen($regUsername)<3) || (strlen($regUsername)>20)) {
			$all_good=false;
			$_SESSION['e_username']='<span style="color:red; margin-top: 0.5rem; font-size: 0.78rem">Username must be between 3 and 20 characters long.</span>';
		}
		
		if (ctype_alnum($regUsername)==false) {
			$all_good=false;
			$_SESSION['e_username']='<span style="color:red; margin-top: 0.5rem; font-size: 0.78rem">Only Latin alphabet letters and numbers are allowed.</span>';
		}
		
		if ((filter_var($regEmail_S, FILTER_VALIDATE_EMAIL)==false) || ($regEmail_S!=$regEmail)){
			$all_good=false;
			$_SESSION['e_email']='<span class="mb-3" style="color: red; font-size: 0.78rem; margin-top: -0.5rem">Email address is invalid.</span>';
		}
		
		if ((strlen($regPass)<8) || (strlen($regPass)>20)) {
			$all_good=false;
			$_SESSION['e_pass']='<span style="color:red; margin-top: 0.5rem; font-size: 0.78rem">Password must be between 8 and 20 characters long.</span>';
		}
		
		if($regPass!=$regPassR) {
			$all_good=false;
			$_SESSION['e_passR']='<span class="mb-3" style="color: red; font-size: 0.78rem; margin-top: -0.5rem">Passwords must be same.</span>';
		}
		
		if(!isset($_POST['rules'])) {
			$all_good=false;
			$_SESSION['e_rules']='<span class="mb-2" style="color: red; font-size: 0.78rem; margin-top: 0rem">Accept rules.</span>';
		}
		
		if(!($answer->success)){
			$all_good=false;
			$_SESSION['e_bot']='<span class="mb-3" style="color: red; font-size: 0.78rem; margin-top: -0.5rem">Please confirm you are not a bot.</span>';
		}
	
		
		$_SESSION['r_username']=$regUsername;
		$_SESSION['r_email']=$regEmail;
		if(isset($_POST['rules'])) $_SESSION['r_rules']=true;
	
		
		require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try {
			$connection=new mysqli($host, $db_user, $db_password, $db_name);
			if($connection->connect_errno!=0){
				throw new Exception(mysqli_connect_errno());
			} else {
				$result=$connection->query("SELECT id FROM users WHERE email='$regEmail'");
				if(!$result) throw new Exception($connection->error);
				$howManyEmails=$result->num_rows;
				if($howManyEmails>0) {
					$all_good=false;
					$_SESSION['e_email']='<span class="mb-3" style="color: red; font-size: 0.78rem; margin-top: -0.5rem">This email is already in use.</span>';
				}
				
				$result=$connection->query("SELECT id FROM users WHERE username='$regUsername'");
				if(!$result) throw new Exception($connection->error);
				$howManyUsernames=$result->num_rows;
				if($howManyUsernames>0) {
					$all_good=false;
					$_SESSION['e_username']='<span style="color:red; margin-top: 0.5rem; font-size: 0.78rem">This username is already taken. Enter another one.</span>';
				}
								
				if ($all_good==true) {
					$connection->autocommit(false);
					
					$query1="INSERT INTO users VALUES (NULL, '$regUsername', '$regPassHash', '$regEmail')";
					if(!$connection->query($query1)) {
						throw new Exception($connection->error);
					}
					
					$newUserId=$connection->insert_id;
					
					$query2="INSERT INTO incomes_category_assigned_to_users (`user_id`, `name`)
							SELECT '$newUserId', `name` FROM incomes_category_default";
					if(!$connection->query($query2)) {
						throw new Exception($connection->error);
					}
					
					$query3="INSERT INTO expenses_category_assigned_to_users (`user_id`, `name`)
							SELECT '$newUserId', `name` FROM expenses_category_default";
					if(!$connection->query($query3)) {
						throw new Exception($connection->error);
					}
					
					$query4="INSERT INTO payment_methods_assigned_to_users (`user_id`, `name`)
							SELECT '$newUserId', `name` FROM payment_methods_default";
					if(!$connection->query($query4)) {
						throw new Exception($connection->error);
					}
					
					$connection->commit();
					$_SESSION['registrationSuccess']=true;
					header('Location: welcome.php');
				}
				$connection->close();
			}
			
		} catch(Exception $e) {
			echo '<span class="mb-3" style="color: red; font-size: 1.5rem; text-align: center">Server failure. <br/> Please register another time.</span>';
			//echo '<br/><span class="mb-3" style="color: gold; text-align: center">Develope info: '.$e.'</span>';
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
	<script src="https://www.google.com/recaptcha/api.js"></script>
</head>

<body class="register">
    <form method ="post" id="myForm" style="display: grid; justify-content: center; margin-top: 0rem">
        <h1 class="h3 mb-3 fw-normal" style="text-align: center; color: gold; font-size: 2rem">REGISTRATION</h1>
		<div class="input-group has-validation mb-3" style="width: 300px">
            <span class="input-group-text">🧑‍💻</span>
            <div class="form-floating">
                <input type="text" class="form-control" placeholder="Username" value="<?php 
				if(isset($_SESSION['r_username'])) {
					echo $_SESSION['r_username'];
					unset($_SESSION['r_username']);
				}
				?>" name="regUsername">
                <label>Username</label>
            </div>
			<?php
				if (isset($_SESSION['e_username'])){
					echo $_SESSION['e_username'];
					unset($_SESSION['e_username']);
				}
			?>
        </div>
        <div class="input-group has-validation mb-3" style="width: 300px">
            <span class="input-group-text">📧</span>
            <div class="form-floating">
                <input type="text" class="form-control" placeholder="Email Address" value="<?php 
				if(isset($_SESSION['r_email'])) {
					echo $_SESSION['r_email'];
					unset($_SESSION['r_email']);
				}
				?>" name="regEmail">
                <label>Email Address</label>
            </div>
        </div>
		<?php
			if (isset($_SESSION['e_email'])){
				echo $_SESSION['e_email'];
				unset($_SESSION['e_email']);
			}
		?>
        <div class="input-group has-validation mb-3" style="width: 300px">
            <span class="input-group-text">🔏</span>
            <div class="form-floating">
                <input type="password" class="form-control" placeholder="Password" name="regPass">
                <label>Password</label>
            </div>
			<?php
				if (isset($_SESSION['e_pass'])){
					echo $_SESSION['e_pass'];
					unset($_SESSION['e_pass']);
				}
			?>
        </div>

        <div class="input-group has-validation mb-3" style="width: 300px">
            <span class="input-group-text">🔏</span>
            <div class="form-floating">
                <input type="password" class="form-control" placeholder="Repeat password" name="regPassR">
                <label>Repeat password</label>
            </div>
        </div>
		<?php
			if (isset($_SESSION['e_passR'])){
				echo $_SESSION['e_passR'];
				unset($_SESSION['e_passR']);
			}
		?>
		
        <div class="input-group has-validation mb-2" style="width: 300px">
            <span class="input-group-text">
				<input style="justify-content: center; width: 1.3rem; height: 0.9rem;" type="checkbox" name="rules" <?php
					if(isset($_SESSION['r_rules'])) {
						echo "checked";
						unset($_SESSION['r_rules']);
					}
				?>>
			</span>
            <div class="form-control">
				<a href="./rules.php" target="_blank" style="text-decoration: none; color: rgb(109, 22, 22)">Accept rules</a>
			</div>
        </div>
		<?php
			if (isset($_SESSION['e_rules'])){
				echo $_SESSION['e_rules'];
				unset($_SESSION['e_rules']);
			}
		?>
		
		<div style="transform:scale(1, 0.8);">
			<div class="g-recaptcha mb-2" data-sitekey="6Lcun1sqAAAAAKXtow3qQPHSjEpQlE0ikkggHz5D"></div>
		</div>
		<?php
			if (isset($_SESSION['e_bot'])){
				echo $_SESSION['e_bot'];
				unset($_SESSION['e_bot']);
			}
		?>
		
        <button id="main_sub" class="btn btn-primary w-100 py-2" type="submit">Create account</button>
    </form>  
    <a href="./login.php" class="btn btn-secondary mt-3 mb-5 alternative">Log in</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>