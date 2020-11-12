<?php

	// Connection to database

	$host = "127.0.0.1";
	$user = "root";
	$password = "";
	$database = "sysadmins";

	$connect = mysqli_connect($host, $password, $database);

	if(mysqli_connect_errno()){
		die("Unable to connect to database: ".mysqli_connect_errno());
	}

	// Define query
	$query= "insert into login(username, password) values('".$_GET['username']."' , '".$_GET['password']."' )";
	$result = mysqli_query($connect, $query);

	if(! $result){
		$output = "{ 'msg' : 'query error' }";
	} else {
		$output = "{ 'msg' : 'user successefully inserted' }";
	}

	// Get data
	while($row = mysqli_fetch_assoc($result)){
		$output[] = $row;
	} 

	print(json_encode($output));

	mysqli_free_result($result);

	mysqli_close($connect); 

?>