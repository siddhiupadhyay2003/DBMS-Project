<?php
	$Quantity_wished = $_POST['Quantity_wished'];
	$Date_Added = $_POST['Date_Added'];
	$Cart_id = $_POST['Cart_id'];
	$Product_id = $_POST['Product_id'];
	

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into cart_item(Quantity_wished, Date_Added, Cart_id, Product_id) values(?, ?, ?, ?)");
		$stmt->bind_param("isss", $Quantity_wished, $Date_Added, $Cart_id, $Product_id);
		$execval = $stmt->execute();
		echo $execval;
		echo "Seller Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>