<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$orderdesc = $_POST['orderdesc'];


	// Database connection
	$conn = new mysqli('localhost','root','','projects');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die(" Failed to send : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into orders(firstName, lastName, orderdesc) values(?, ?, ?)");
		$stmt->bind_param("sss", $firstName, $lastName, $orderdesc);
		$stmt->execute();
		
		echo "Order was made successfully...";
		$stmt->close();
		$conn->close();
	}
?>