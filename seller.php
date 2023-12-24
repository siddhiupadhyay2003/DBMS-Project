<?php
	$Seller_id = $_POST['Seller_id'];
	$s_pass = $_POST['s_pass'];
	$Name = $_POST['Name'];
	$Address = $_POST['Address'];
	

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into Seller(Seller_id, s_pass, Name, Address) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $Seller_id, $s_pass, $Name, $Address);
		$execval = $stmt->execute();
		echo $execval;
		echo "Seller Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>