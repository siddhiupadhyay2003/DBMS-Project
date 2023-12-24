<?php
	$payment_id = $_POST['payment_id'];
	$payment_date = $_POST['payment_date'];
	$Payment_type = $_POST['Payment_type'];
	$Customer_id = $_POST['Customer_id'];
    $Cart_id = $_POST['Cart_id'];
    $total_amount = $_POST['total_amount'];
    

	

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into Payment(payment_id, payment_date, Payment_type, Customer_id, Cart_id, total_amount) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $payment_id, $payment_date, $Payment_type, $Customer_id, $Cart_id, $total_amount);
		$execval = $stmt->execute();
		echo $execval;
		echo "Payment Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>