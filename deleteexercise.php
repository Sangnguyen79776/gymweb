<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'gymweb';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
$id=$_REQUEST['id'];
//process of delete ex by id 
$query = "DELETE FROM exercise WHERE id=$id" ; 
$result = mysqli_query($con,$query) or die ( mysqli_connect_error());
header("Location: detailsexercise.php"); 
?>