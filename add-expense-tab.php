<?php

	session_start();
	
	if(!isset($_SESSION['logged_in'])) {
		
		header('Location: login.php');
		exit();
	}
	
		$userId=$_SESSION['id'];
		
	if(isset($_POST['expenseValue'])) {
	
		$all_good=true;
		$expenseValue=$_POST['expenseValue'];
		
		if(($expenseValue)<=0) {
			$all_good=false;
			$_SESSION['e_value']='<div class="mt-2" style="color:red; font-size: 0.88rem">The value must be greater than 0.</div>';
		}
		
		$_SESSION['r_eValue']=$expenseValue;
		
		if(isset($_POST['expenseCategory'])) {
			
			$expenseCategoryString=$_POST['expenseCategory'];
			$expenseCategoryArray=explode(", ", $expenseCategoryString);

			$expenseCategory=$expenseCategoryArray[0];

			$_SESSION['r_eCategory']=$expenseCategory;
			$_SESSION['r_eCategoryName']=$expenseCategoryArray[1];
			
		} else {
			$all_good=false;
			$_SESSION['e_category']='<div class="mt-2" style="color:red; font-size: 0.88rem">A category must be set.</div>';
		}
		
		if(isset($_POST['paymentMethod'])) {
			
			$paymentMethodString=$_POST['paymentMethod'];
			$paymentMethodArray=explode(", ", $paymentMethodString);

			$paymentMethod=$paymentMethodArray[0];

			$_SESSION['r_eMethod']=$paymentMethod;
			$_SESSION['r_eMethodName']=$paymentMethodArray[1];
			
		} else {
			$all_good=false;
			$_SESSION['e_method']='<div class="mt-2" style="color:red; font-size: 0.88rem">You need to set your payment method.</div>';
		}
		
		if(!empty($_POST['expenseDate'])) {
			$expenseDate=$_POST['expenseDate'];
			$currentTime=new DateTime();
			
			if (new DateTime($expenseDate)>$currentTime) {
				$all_good=false;
				$_SESSION['e_date']='<div class="mt-2" style="color:red; font-size: 0.88rem">The date cannot be later than today.</div>';
			}
			
			if (new DateTime($expenseDate)<new DateTime('2000-01-01')) {
				$all_good=false;
				$_SESSION['e_date']='<div class="mt-2" style="color:red; font-size: 0.88rem">The date cannot be earlier than 01.01.2000.</div>';
			}
			
			$_SESSION['r_eDate']=$expenseDate;

		} else {
			$all_good=false;
			$_SESSION['e_date']='<div class="mt-2" style="color:red; font-size: 0.88rem">A date must be set.</div>';
		}
		
		$expenseComment="";

		if(!empty($_POST['expenseComment'])) {
			$expenseComment=$_POST['expenseComment'];
			$_SESSION['r_eComment']=$expenseComment;
		}
		
	
		if ($all_good==true) {
		
			require_once "connect.php";
			mysqli_report(MYSQLI_REPORT_STRICT);
			
			try {
				$connection=new mysqli($host, $db_user, $db_password, $db_name);
				if($connection->connect_errno!=0){
					throw new Exception(mysqli_connect_errno());
				} else {
					$result=$connection->query("INSERT INTO expenses VALUES (NULL, '$userId', '$expenseCategory', '$paymentMethod', '$expenseValue', '$expenseDate', '$expenseComment')");
					if(!$result) throw new Exception($connection->error);
					
					$_SESSION['addSuccess']=true;
					header('Location: add-success.php');
					
					$connection->close();
				}
				
			} catch(Exception $e) {
				echo '<span class="mb-3" style="color: red; font-size: 1.5rem; text-align: center">Server failure.<br/>Please try another time.</span>';
				//echo '<br/><span class="mb-3" style="color: gold; text-align: center">Develope info: '.$e.'</span>';
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Main menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css"/>
</head>

<body class="menu">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTabs"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTabs">
                <ul class="nav nav-tabs">
                    
                    <li class="nav-item">
                        <a class="nav-link" id="start-tab" href="./menu.php">

                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16" style="margin-right: 5px; margin-left: -5px;">
                                <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
                            </svg>

                        Start page</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="incomes-tab" href="./add-income-tab.php">

                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16" style="margin-right: 5px; margin-left: -5px;">
                                <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8m5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0"/>
                                <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195z"/>
                                <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083q.088-.517.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1z"/>
                                <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 6 6 0 0 1 3.13-1.567"/>
                            </svg>
                            
                        Add income</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" id="expenses-tab">

                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16" style="margin-right: 5px; margin-left: -5px;">
                                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
                            </svg>                          
                            
                        Add expense</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="balance-tab" href="./view-balance-tab.php">

                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-graph-up" viewBox="0 0 16 16" style="margin-right: 5px; margin-left: -5px;">
                            <path fill-rule="evenodd" d="M0 0h1v15h15v1H0zm14.817 3.113a.5.5 0 0 1 .07.704l-4.5 5.5a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61 4.15-5.073a.5.5 0 0 1 .704-.07"/>
                            </svg>                    
                            
                        View balance</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="settings-tab" href="./settings-tab.php">

                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16" style="margin-right: 5px; margin-left: -5px;">
                                <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0"/>
                                <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115z"/>
                            </svg>
                            
                        Settings</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="log-out-tab" href="./logout.php">
                        
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16" style="margin-right: 5px; margin-left: -5px;">
                                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
                            </svg>

                        Log out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="tab-content container mt-5 mb-5">
        <div class="tab-pane active">

            <h1>Add expense</h1>
            <div class="container mt-5">
                <form method="post" id="expenseForm">
                    <div class="mb-3">
                        <label class="form-label">Enter amount [zł]</label>
                        <div class="input-group">
                            <input type="number" class="form-control" placeholder="Amount" step="0.01" value="<?php 
								if(isset($_SESSION['r_eValue'])) {
									echo $_SESSION['r_eValue'];
									unset($_SESSION['r_eValue']);
								}
							?>" name="expenseValue">
                        </div>
						<?php
							if (isset($_SESSION['e_value'])){
								echo $_SESSION['e_value'];
								unset($_SESSION['e_value']);
							}
						?>
                    </div>
				
                    <div class="mb-3">
                        <label class="form-label">Select Date</label>
                        <input type="date" class="form-control" value="<?php 
							if(isset($_SESSION['r_eDate'])) {
								echo $_SESSION['r_eDate'];
								unset($_SESSION['r_eDate']);
							}
						?>" name="expenseDate">
						<?php
							if (isset($_SESSION['e_date'])){
								echo $_SESSION['e_date'];
								unset($_SESSION['e_date']);
							}
						?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Select category</label>
                        <select class="form-select" name="expenseCategory">
							<?php
								if(isset($expenseCategoryArray)) {
									echo '<option value="'.$_SESSION['r_eCategory'].', '.$_SESSION['r_eCategoryName'].'">'.$_SESSION['r_eCategoryName'].'</option>';
									unset($expenseCategoryArray);
									foreach ($_SESSION['user_expenses_categories'] as $category) {
										echo '<option value="'.$category['id'].', '.$category['name'].'">'.$category['name'].'</option>';
									}
								} else {
									echo '<option value="" selected disabled>Select category</option>';
									foreach ($_SESSION['user_expenses_categories'] as $category) {
										echo '<option value="'.$category['id'].', '.$category['name'].'">'.$category['name'].'</option>';
									}
								}
							?>
                        </select>
						<?php
							if (isset($_SESSION['e_category'])){
								echo $_SESSION['e_category'];
								unset($_SESSION['e_category']);
							}
						?>				
                    </div>
					
					<div class="mb-3">
                        <label class="form-label">Payment method</label>
                        <select class="form-select" name="paymentMethod">
							<?php
								if(isset($paymentMethodArray)) {
									echo '<option value="'.$_SESSION['r_eMethod'].', '.$_SESSION['r_eMethodName'].'">'.$_SESSION['r_eMethodName'].'</option>';
									unset($paymentMethodArray);
									foreach ($_SESSION['user_payment_methods'] as $method) {
										echo '<option value="'.$method['id'].', '.$method['name'].'">'.$method['name'].'</option>';
									}
								} else {
									echo '<option value="" selected disabled>Select method</option>';
									foreach ($_SESSION['user_payment_methods'] as $method) {
										echo '<option value="'.$method['id'].', '.$method['name'].'">'.$method['name'].'</option>';
									}
								}
							?>
                        </select>
						<?php
							if (isset($_SESSION['e_method'])){
								echo $_SESSION['e_method'];
								unset($_SESSION['e_method']);
							}
						?>				
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Comment</label>
                        <input type="text" class="form-control"
                        placeholder="Enter your message or another category" value="<?php 
							if(isset($_SESSION['r_eComment'])) {
								echo $_SESSION['r_eComment'];
								unset($_SESSION['r_eComment']);
							}
						?>" name="expenseComment">
                    </div>

                    <div class="d-flex justify-content-center" style="margin-top: 50px">
                        <button type="submit" class="btn btn-primary add">Add</button>
                        <a href="./menu.php" class="btn btn-secondary cancel">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>
</html>