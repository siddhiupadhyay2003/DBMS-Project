<?php
	$Cart_id = $_POST['Cart_id'];
	
	

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into cart(Cart_id) values(?)");
		$stmt->bind_param("s", $Cart_id);
		$execval = $stmt->execute();
		echo $execval;
		echo "Cart Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>