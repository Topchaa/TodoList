<?php


$serverName = 'localhost';
$username = 'root';
$password = '';
$DBname = 'todolist';






$conn = mysqli_connect(  $serverName ,$username ,$password ,$DBname );
if ($conn) {
	//nothing
}else{

die("unable to connect to database.");
}









?>






