<?php

	session_start();
	
	if((!isset($_POST['logUserName']))||(!isset($_POST['logPassword']))) {
	
		header('Location: login.php');
		exit();
	}
	
	require_once "connect.php";
	mysqli_report(MYSQLI_REPORT_STRICT);
	
	try {
	
		$connection=new mysqli($host, $db_user, $db_password, $db_name);
		
		if($connection->connect_errno!=0){
			echo "Error: ".$connection->connect_errno;
		} else {
			$logUserName=$_POST['logUserName'];
			$logPassword=$_POST['logPassword'];
			
			$logUserName=htmlentities($logUserName, ENT_QUOTES, "UTF-8");
				
			if ($result=$connection->query(
				sprintf("SELECT*FROM users WHERE username='%s'", 
				mysqli_real_escape_string($connection, $logUserName)))) {
			
				$how_many=$result->num_rows;
				
				if ($how_many>0) {
					
					$row=$result->fetch_assoc();
					
					if(password_verify($logPassword, $row['password'])) {
					
						$_SESSION['logged_in']=true;
						
						$_SESSION['user']=$row['username'];
						$_SESSION['id']=$row['id'];
						
						$user_id=mysqli_real_escape_string($connection, $_SESSION['id']);
						
						
						$query1="SELECT id, name FROM incomes_category_assigned_to_users WHERE user_id = '$user_id'";				
						$user_incomes_categories=[];
						$result1=$connection->query($query1);
						
						while($row1=$result1->fetch_assoc()) {
							$user_incomes_categories[]=$row1;
						}
						
						$_SESSION['user_incomes_categories']=$user_incomes_categories;
						
						
						$query2="SELECT id, name FROM expenses_category_assigned_to_users WHERE user_id = '$user_id'";				
						$user_expenses_categories=[];
						$result2=$connection->query($query2);
						
						while($row2=$result2->fetch_assoc()) {
							$user_expenses_categories[]=$row2;
						}
						
						$_SESSION['user_expenses_categories']=$user_expenses_categories;
						
						
						$query3="SELECT id, name FROM payment_methods_assigned_to_users WHERE user_id = '$user_id'";				
						$user_payment_methods=[];
						$result3=$connection->query($query3);
						
						while($row3=$result3->fetch_assoc()) {
							$user_payment_methods[]=$row3;
						}
						
						$_SESSION['user_payment_methods']=$user_payment_methods;
						

						unset($_SESSION['error']);
						$result->free();
						header('Location: menu.php');
					} else {
						$_SESSION['error']='<span style="color:red; margin-top:1rem; text-align:center;">Incorrect login or password.</span>';
						header('Location: login.php');
					}
					
				} else {
					$_SESSION['error']='<span style="color:red; margin-top:1rem; text-align:center;">Incorrect login or password.</span>';
					header('Location: login.php');			
				}
			}
			
			$connection->close();
		}
	} catch(Exception $e) {
		echo '<span class="mb-3" style="color: red; font-size: 1.5rem; text-align: center">Server failure. <br/> Please register another time.</span>';
		//echo '<br/><span class="mb-3" style="color: gold; text-align: center">Develope info: '.$e.'</span>';
	}
	
?>