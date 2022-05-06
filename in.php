<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$country = $_POST['country'];
	$gender = $_POST['gender'];

	// Database connection
	$conn = new mysqli('localhost','root','','test1');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into application(name, email, mobile, country, gender) values(?, ?, ?, ?, ?, )");
		$stmt->bind_param("ssiss", $name, $email, $mobile, $country, $gender);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>