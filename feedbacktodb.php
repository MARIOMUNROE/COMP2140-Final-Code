<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$feedback = $_POST['feedback'];


	// Database connection
	$conn = new mysqli('localhost','root','','projects');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die(" Failed to send : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into feedback(firstName, lastName, feedback) values(?, ?, ?)");
		$stmt->bind_param("sss", $firstName, $lastName, $feedback);
		$stmt->execute();
		
		echo "Feedback was sent successfully...";
		$stmt->close();
		$conn->close();
	}
?>