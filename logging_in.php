<?php

	session_start();
	
	if((!isset($_POST['logUserName']))||(!isset($_POST['logPassword']))) {
	
		header('Location:login.php');
		exit();
	}
	
	require_once "connect.php";
	
	$connection=new mysqli($host, $db_user, $db_password, $db_name);
	
	$logUserName=$_POST['logUserName'];
	$logPassword=$_POST['logPassword'];
	
	$logUserName=htmlentities($logUserName, ENT_QUOTES, "UTF-8");
	$logPassword=htmlentities($logPassword, ENT_QUOTES, "UTF-8");
	
	
	$sql="SELECT*FROM users WHERE username='$logUserName' AND password='$logPassword'";
	
	if ($result=$connection->query(
		sprintf("SELECT*FROM users WHERE username='%s' AND password='%s'", 
		mysqli_real_escape_string($connection, $logUserName),
		mysqli_real_escape_string($connection, $logPassword)))) {
	
		$how_many=$result->num_rows;
		
		if ($how_many>0) {
			
			$_SESSION['logged_in']=true;
			
			$row=$result->fetch_assoc();
			$_SESSION['user']=$row['username'];
			$_SESSION['id']=$row['id'];
			
			unset($_SESSION['error']);
			$result->free();
			header('Location: menu.php');
			
		} else {
			
			$_SESSION['error']='<span style="color:red; margin-top:1rem; text-align:center;">Incorrect login or password.</span>';
			header('Location: login.php');			
		}
	
	}
	
	$connection->close();

?>