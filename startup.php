<?php

// database credentials
$mysql_host = "localhost";
$mysql_database = "nla2";
$mysql_user = "nla2";
$mysql_password = "nla2";
	
// database connection string  
$connection = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_database);
mysqli_set_charset($connection,"utf8");
	
if(!$connection) {
	die('Unable to connect to database'.mysqli_connect_error());
}

// get data from the SQL file
$query = file_get_contents("startup.sql");

// execute the SQL
if (mysqli_multi_query($connection, $query)){
	echo "Success";
}
else {
	echo "Fail";
}
?>