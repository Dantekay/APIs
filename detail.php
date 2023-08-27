<?php 
 
	require_once 'DbConnect.php';

	//creating a query
	$stmt = $conn->prepare("SELECT id, name, username, email, specification, city, phone FROM users;");
	
	//executing the query 
	$stmt->execute();
	
	//binding results to the query 
	$stmt->bind_result($id, $name, $username, $email, $specification, $city, $phone);
	
	$users = array(); 
	
	//traversing through all the result 
	while($stmt->fetch()){
		$temp = array();
		$temp['id'] = $id; 
		$temp['name'] = $name; 
		$temp['username'] = $username; 
		$temp['email'] = $email; 
		$temp['specification'] = $specification; 
		$temp['city'] = $city; 
		$temp['phone']= $phone;
		array_push($users, $temp);
	}
	
	//displaying the result in json format 
	echo json_encode($users);