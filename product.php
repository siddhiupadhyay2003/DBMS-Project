<?php
	$Product_id = $_POST['Product_id'];
	$Type = $_POST['Type'];
	$Color = $_POST['Color'];
	$P_Size = $_POST['P_Size'];
	$Gender = $_POST['Gender'];
	$Commission = $_POST['Commission'];
    $Cost = $_POST['Cost'];
    $Quantity = $_POST['Quantity'];
    $Seller_id = $_POST['Seller_id'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into product(Product_id, Type, Color, P_Size, Gender, Commission, Cost, Quantity, Seller_id) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssiiis", $Product_id, $Type, $Color, $P_Size, $Gender, $Commission, $Cost, $Quantity, $Seller_id);
		$execval = $stmt->execute();
		echo $execval;
		echo "product Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>