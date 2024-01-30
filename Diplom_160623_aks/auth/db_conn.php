<?php  

$sname = "localhost";
$uname = "root";
$password = "mysqlachyl1";

$db_name = "mydb";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection Failed!";
	exit();
}