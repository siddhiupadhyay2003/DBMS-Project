<?php
	$Phone_num = $_POST['Phone_num'];
    $Seller_id = $_POST['Seller_id'];
	
	

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into seller_phone_num(Phone_num, Seller_id) values(?, ?)");
		$stmt->bind_param("is", $Phone_num, $Seller_id);
		$execval = $stmt->execute();
		echo $execval;
		echo "Cart Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>