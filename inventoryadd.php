<?php
	$id = $_POST['id'];
	$name = $_POST['name'];
	$image = $_POST['image'];
	$price = $_POST['price'];


	// Database connection
	$conn = new mysqli('localhost','root','','projects');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die(" Failed to connect : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into projects(id, name, image, price) values(?, ?, ?, ?)");
		$stmt->bind_param("sssi", $id, $name, $image, $price);
		$stmt->execute();
		
		echo "Item was added successfully...";
		$stmt->close();
		$conn->close();
	}
?>