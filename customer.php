<?php
	$Customer_id = $_POST['Customer_id'];
	$c_pass = $_POST['c_pass'];
	$Name = $_POST['Name'];
	$Address = $_POST['Address'];
	$Pincode = $_POST['Pincode'];
	$Phone_number_s = $_POST['Phone_number_s'];
    $Cart_id = $_POST['Cart_id'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into customer(Customer_id, c_pass, Name, Address, Pincode, Phone_number_s, Cart_id) values(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssiis", $Customer_id, $c_pass, $Name, $Address, $Pincode, $Phone_number_s, $Cart_id);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>