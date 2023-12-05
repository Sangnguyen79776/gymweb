<?php

session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'gymweb';
$results="";
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
$id=$_REQUEST['id'];

$query = "SELECT *FROM equipments WHERE id='$id'" ; 
$result = mysqli_query($con,$query) or die ( mysqli_connect_error());
$q=mysqli_fetch_array($result);?>
<html>
    <body>
<input type="hidden" name="id" value="<?php echo $q['id']?>">
<img src="img/<?php echo $q['image']?>" style="width:200px; height:300px">

<p>Name : <?php echo $q['name']?></p>
</body>
</html>