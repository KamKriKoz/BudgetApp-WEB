<?php

	session_start();
	
	if(!isset($_SESSION['logged_in'])) {
		
		header('Location:login.php');
		exit();
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
	<style>
		
	</style>
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
                        <a class="nav-link" id="expenses-tab" href="./add-expense-tab.php">

                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16" style="margin-right: 5px; margin-left: -5px;">
                                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
                            </svg>                          
                            
                        Add expense</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" id="balance-tab">

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

            <h1>View balance section</h1>
            <div class="container mt-4">

                <div class="mb-3">
					<form method="post" style="display: flex; justify-content: center; flex-wrap: wrap">
						<label style="color: gold; font-size:1.2rem; margin-right: 12px">Select date range:</label>
						
						<input type="date" style="width: 6.5rem; border-radius: 0.5rem; padding-left: 4px" name="startDate">
        
						<input type="date" style="width: 6.5rem; border-radius: 0.5rem; padding-left: 4px" name="endDate">
						
						<button style="width: 58%; border-radius:1rem" type="submit" class="btn btn-primary add mt-3">Confirm / Reset</button>
					</form>
                </div>
                
				<div>
					<p style="font-weight: bold; font-style: normal; font-size: 1.2rem">
					Time period:
						<?php
							$currentDate=new DateTime();
							$userId=$_SESSION['id'];
						
							if((!empty($_POST['startDate'])) && (!empty($_POST['endDate']))) {
								$startDate=$_POST['startDate'];
								$endDate=$_POST['endDate'];
								echo $startDate." - ".$endDate;
							} else {
								$startDate='2000-01-01';
								$endDate = $currentDate->format('Y-m-d');
								echo "for all dates";	
							}
						?>
					</p>
				</div>
				
				
				<?php
					require_once "connect.php";
					mysqli_report(MYSQLI_REPORT_STRICT);
					
					try {
						$connection=new mysqli($host, $db_user, $db_password, $db_name);
						if($connection->connect_errno!=0){
							throw new Exception(mysqli_connect_errno());
						} else {
							
							$query1="SELECT income.name AS income_category_name, inc.amount, inc.date_of_income, inc.income_comment
									FROM incomes inc
									JOIN incomes_category_assigned_to_users income ON inc.income_category_assigned_to_user_id = income.id
									WHERE inc.user_id = '$userId' AND inc.date_of_income BETWEEN '$startDate' AND '$endDate'
									ORDER BY inc.date_of_income DESC
									";				
							$user_incomes=[];
							$result1=$connection->query($query1);
							
							while($row1=$result1->fetch_assoc()) {
								$user_incomes[]=$row1;
							}
							
							$query2="SELECT expense.name AS expense_category_name,
											payment.name AS payment_method,
											ex.amount, ex.date_of_expense, ex.expense_comment
									FROM expenses ex
									JOIN expenses_category_assigned_to_users expense ON ex.expense_category_assigned_to_user_id = expense.id
									JOIN payment_methods_assigned_to_users payment ON ex.payment_method_assigned_to_user_id = payment.id
									WHERE ex.user_id = '$userId' AND ex.date_of_expense BETWEEN '$startDate' AND '$endDate'
									ORDER BY ex.date_of_expense DESC
									";				
							$user_expenses=[];
							$result2=$connection->query($query2);
							
							while($row2=$result2->fetch_assoc()) {
								$user_expenses[]=$row2;
							}
							
							$query3="
								SELECT incomes_category_assigned_to_users.name AS category,
								SUM(incomes.amount) AS amount
								FROM incomes_category_assigned_to_users
								INNER JOIN incomes ON incomes.income_category_assigned_to_user_id = incomes_category_assigned_to_users.id
								WHERE incomes.user_id = $userId AND incomes.date_of_income BETWEEN '$startDate' AND '$endDate'
								GROUP BY incomes.income_category_assigned_to_user_id
								ORDER BY amount DESC
							";				
							$user_incomes_by_category=[];
							$result3=$connection->query($query3);
							
							while($row3=$result3->fetch_assoc()) {
								$user_incomes_by_category[]=$row3;
							}
							
							$query4="
								SELECT expenses_category_assigned_to_users.name AS category,
								SUM(expenses.amount) AS amount
								FROM expenses_category_assigned_to_users
								INNER JOIN expenses ON expenses.expense_category_assigned_to_user_id = expenses_category_assigned_to_users.id
								WHERE expenses.user_id = $userId AND expenses.date_of_expense BETWEEN '$startDate' AND '$endDate'
								GROUP BY expenses.expense_category_assigned_to_user_id
								ORDER BY amount DESC
							";				
							$user_expenses_by_category=[];
							$result4=$connection->query($query4);
							
							while($row4=$result4->fetch_assoc()) {
								$user_expenses_by_category[]=$row4;
							}
						
							$query5="SELECT SUM(amount) AS incomesSum FROM incomes WHERE user_id='$userId'";
							$result5=$connection->query($query5);
							$row5=$result5->fetch_assoc();
							$incomesSum=$row5['incomesSum'];

							$query6="SELECT SUM(amount) AS expensesSum FROM expenses WHERE user_id='$userId'";
							$result6=$connection->query($query6);
							$row6=$result6->fetch_assoc();
							$expensesSum=$row6['expensesSum'];

							$balance=$incomesSum-$expensesSum;
							
							$query7="SELECT SUM(amount) AS periodIncomesSum FROM incomes WHERE user_id='$userId' AND date_of_income BETWEEN '$startDate' AND '$endDate'";
							$result7=$connection->query($query7);
							$row7=$result7->fetch_assoc();
							$periodIncomesSum=$row7['periodIncomesSum'];

							$query8="SELECT SUM(amount) AS periodExpensesSum FROM expenses WHERE user_id='$userId' AND date_of_expense BETWEEN '$startDate' AND '$endDate'";
							$result8=$connection->query($query8);
							$row8=$result8->fetch_assoc();
							$periodExpensesSum=$row8['periodExpensesSum'];

							if(!$result1) throw new Exception($connection->error);
							if(!$result2) throw new Exception($connection->error);
							if(!$result3) throw new Exception($connection->error);
							if(!$result4) throw new Exception($connection->error);
							if(!$result5) throw new Exception($connection->error);
							if(!$result6) throw new Exception($connection->error);
							if(!$result7) throw new Exception($connection->error);
							if(!$result8) throw new Exception($connection->error);
							
							$result1->free();
							$result2->free();
							$result3->free();
							$result4->free();
							$result5->free();
							$result6->free();
							$result7->free();
							$result8->free();

							$connection->close();
						}
						
					} catch(Exception $e) {
						echo '<span class="mb-3" style="color: red; font-size: 1.5rem; text-align: center">Server failure.<br/>Please try another time.</span>';
						//echo '<br/><span class="mb-3" style="color: gold; text-align: center">Develope info: '.$e.'</span>';
					}
				?>

				<div class="row mb-4">
					<div class="col">
						<table class="table table-bordered" style="border-radius: 15px; overflow: hidden; width: 95%">	
							<thead>
								<tr>
									<th style="font-size: 1.1rem" colspan="4">Incomes</th>
								</tr>
								<tr>
									<th style="text-decoration: none; font-size: 0.7rem">Category</th>
									<th style="text-decoration: none; font-size: 0.7rem">Amount</th>
									<th style="text-decoration: none; font-size: 0.7rem">Date</th>
									<th style="text-decoration: none; font-size: 0.7rem">Comment</th>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach ($user_incomes as $row) {
										echo "<tr>";
											echo "<td style='font-size: 0.7rem'>".$row['income_category_name']."</td>";
											echo "<td style='font-size: 0.7rem'>".$row['amount']."</td>";
											echo "<td style='font-size: 0.7rem'>".$row['date_of_income']."</td>";
											echo "<td style='font-size: 0.7rem'>".$row['income_comment']."</td>";
										echo "</tr>";
									}										
								?>
							</tbody>
							<tr>
								<th style="font-size: 0.8rem; display: flex; justify-content: center" colspan="1">Sum</th>
								<th colspan="3"><?php echo "<h2 class='mb-0 pt-1' style='font-size: 0.8rem'>".$periodIncomesSum." zł"."</h2>"; ?></th>
							</tr>
						</table>
					</div>
				
					<div class="col">
						<table class="table table-bordered" style="border-radius: 15px; overflow: hidden; width: 110%; margin-left: -10%">
							<thead>
								<tr>
									<th style="font-size: 1.1rem" colspan="5">Expenses</th>
								</tr>
								<tr>
									<th style="text-decoration: none; font-size: 0.7rem">Category</th>
									<th style="text-decoration: none; font-size: 0.7rem">Payment</th>
									<th style="text-decoration: none; font-size: 0.7rem">Amount</th>
									<th style="text-decoration: none; font-size: 0.7rem">Date</th>
									<th style="text-decoration: none; font-size: 0.7rem">Comment</th>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach ($user_expenses as $row) {
										echo "<tr>";
											echo "<td style='font-size: 0.7rem'>".$row['expense_category_name']."</td>";
											echo "<td style='font-size: 0.7rem'>".$row['payment_method']."</td>";
											echo "<td style='font-size: 0.7rem'>".$row['amount']."</td>";
											echo "<td style='font-size: 0.7rem'>".$row['date_of_expense']."</td>";
											echo "<td style='font-size: 0.7rem'>".$row['expense_comment']."</td>";
										echo "</tr>";
									}										
								?>
							</tbody>
							<tr>
								<th style="font-size: 0.8rem; display: flex; justify-content: center" colspan="1">Sum</th>
								<th colspan="4"><?php echo "<h2 class='mb-0 pt-1' style='font-size: 0.8rem'>".$periodExpensesSum." zł"."</h2>"; ?></th>
							</tr>
						</table>
					</div>
				</div>
					
				
				<div class="row mb-4" style="display: flex; justify-content: center; border-radius: 15px; overflow: hidden; width: 100%; background-color: white; margin-left: 2px">
					
					<!---<div class="col">
						<table class="table" style="border-radius: 15px; overflow: hidden; width: 100%">	
							<thead>
								<tr>
									<th style="font-size: 1.1rem" colspan="2">Incomes by category</th>
								</tr>
								<tr>
									<th style="text-decoration: none; font-size: 0.7rem">Category</th>
									<th style="text-decoration: none; font-size: 0.7rem">Amount</th>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach ($user_incomes_by_category as $row) {
										echo "<tr>";
											echo "<td style='font-size: 0.7rem'>".$row['category']."</td>";
											echo "<td style='font-size: 0.7rem'>".$row['amount']."</td>";
										echo "</tr>";
									}										
								?>
							</tbody>
							<tr>
								<th style="font-size: 0.7rem">Sum</th>
								<th style="font-size: 0.7rem"><?php echo $periodIncomesSum; ?></th>
							</tr>
						</table>
					</div>--->
					
					<div class="col" style="display: flex; justify-content: center; align-items: center">
						<table style="overflow: hidden; width: 100%; margin: 20px; text-align: center">
							<thead>
								<tr>
									<th style="font-size: 1.1rem" colspan="2">Incomes by category</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="2">
										<div class="chart-container">
											<div class="pie" style="
												<?php
													$cumulativePercentage = 0;
													$colors = ['red', 'blue', 'green', 'yellow', 'purple', 'orange', 'pink', 'brown', 'cyan', 'lime', 'teal', 'magenta'];
													$styles = '';
													foreach ($user_incomes_by_category as $index=>$income) {
														$percentage=($income['amount']/$periodIncomesSum)*100;
														$cumulativePercentage += $percentage;
														
														$styles .= "--color".($index+1).": ".$colors[$index%count($colors)].";";
														$styles .= "--percentage".($index+1).": $cumulativePercentage%;";
													}
													echo $styles;
												?>
											"></div>
											<ul class="legend">
												<?php
													foreach ($user_incomes_by_category as $index=>$income) {
														$percentage=number_format(($income['amount']/$periodIncomesSum)*100, 2);										
														 echo "<li><span class='color-box' style='background-color: ".$colors[$index % count($colors)].";'></span>".$income['category']." $percentage%</li>";
													}
												?>
											</ul>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
						
					<div class="col" style="display: flex; justify-content: center; align-items: center">
						<table style="overflow: hidden; width: 100%; margin: 20px; text-align: center">
							<thead>
								<tr>
									<th style="font-size: 1.1rem" colspan="2">Expenses by category</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="2">
										<div class="chart-container">
											<div class="pie" style="
												<?php
													$cumulativePercentage = 0;
													$colors = ['magenta', 'teal', 'lime', 'cyan', 'brown', 'pink', 'orange', 'purple', 'yellow', 'green', 'blue', 'red'];
													$styles = '';
													foreach ($user_expenses_by_category as $index=>$expense) {
														$percentage=($expense['amount']/$periodExpensesSum)*100;
														$cumulativePercentage += $percentage;

														$styles .= "--color".($index+1).": ".$colors[$index%count($colors)].";";
														$styles .= "--percentage".($index+1).": $cumulativePercentage%;";
													}
													echo $styles;
												?>
											"></div>
											<ul class="legend">
												<?php
													foreach ($user_expenses_by_category as $index=>$expense) {
														$percentage=number_format(($expense['amount']/$periodExpensesSum)*100, 2);										
														 echo "<li><span class='color-box' style='background-color: ".$colors[$index%count($colors)].";'></span>".$expense['category']." $percentage%</li>";
													}
												?>
											</ul>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>	
				
					<!---<div class="col">
						<table class="table" style="border-radius: 15px; overflow: hidden; width: 100%">
							<thead>
								<tr>
									<th style="font-size: 1.1rem" colspan="2">Expenses by category</th>
								</tr>
								<tr>
									<th style="text-decoration: none; font-size: 0.7rem">Category</th>
									<th style="text-decoration: none; font-size: 0.7rem">Amount</th>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach ($user_expenses_by_category as $row) {
										echo "<tr>";
											echo "<td style='font-size: 0.7rem'>".$row['category']."</td>";
											echo "<td style='font-size: 0.7rem'>".$row['amount']."</td>";
										echo "</tr>";
									}										
								?>
							</tbody>
							<tr>
								<th style="font-size: 0.7rem">Sum</th>
								<th style="font-size: 0.7rem"><?php echo $periodExpensesSum; ?></th>
							</tr>
						</table>
					</div>--->
					
				</div>
				
				<div class="mt-5" style="display: flex; justify-content: center">
					<table class="table table-bordered" style="width: 100%; border-radius: 15px; overflow: hidden;">
					<thead>
						<tr>
							<th style="display: flex; justify-content: center; font-size: 1.1rem">General account balance</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td style="display: flex; justify-content: center; font-weight: 700; font-size: 1.1rem"><?php
										echo number_format($balance, 2, ',', '')." zł";						
									?></td>
						</tr>
					</tbody>
					</table>
				</div>
				
            </div>  
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>
</html>