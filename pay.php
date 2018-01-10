<?php
	session_start();
	require "./config/db.php";

	$price = $_SESSION["price"];
	$passenger_no = $_SESSION["passenger_no"];

	$amount = $price * $passenger_no;		
				
	$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

	$owner = ucwords(trim($_POST["owner"]));
	$cvv = $_POST["pin"];
	$cardno = $_POST["cardno"];
	$expire_date = $_POST["month"]." ".$_POST["year"];
	$ticket_no = $_SESSION["ticket_no"];

	$sql = "INSERT INTO payment VALUES('', '$owner', '$cardno', '$cvv', '$expire_date', '$ticket_no', '$amount')";

	if (mysqli_query($dbc, $sql)) {
		unset($_SESSION["price"]);
		unset($_SESSION["passenger_no"]);
		header("location: ticket-result.php");
	}else{
		echo "ERROR ".mysqli_error($bdc);
	}

?>