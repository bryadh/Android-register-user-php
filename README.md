# Android-register-user-php

## Presentation
this is a simple app to register users in a local database using WAMP ( PHP and MySql )

## Usage
Go to your local web server root directory and add this php script :
``` PHP
<?php
	// Connection to database
	$host="127.0.0.1";
	$user="root";
	$db_password="";
	$database="mydb"; 

	$connect= mysqli_connect($host, $user, $db_password, $database);

	if(mysqli_connect_errno()){
		die("Failed to connect to database : ".mysqli_connect_errno());
		return;
	}

	$user_name = $_GET['username'];
	$password = $_GET['password'];

	// Define query
	$query= "insert into login(username, password) values('".$user_name."' , '".$password."' )";
	$result = mysqli_query($connect, $query);

	if(! $result){
		$output = "{ 'msg' : 'failed to insert' }";
	} else {
		$output = "{ 'msg' : 'user successefully inserted' }";
	}

	print($output);

	mysqli_close($connect); 
?>
```

You might encounter some problems with the android emulator, since it does not know what "localhost" is.
Replace localhost with 10.0.2.2 in the url like so:
```JAVA
String url = "http://10.0.2.2/addUser.php?username="+username+"&password="+password";
```
if this does not get the problem fixed, try to look for you local ip address.
