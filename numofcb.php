<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'gymweb';
$notify=array();
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if ( mysqli_connect_errno() ) {
    // If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
if(isset($_POST['submit'])){

$NumofCaloBurned_goal=$_POST['NumofCaloBurned_goal'];
$req="SELECT NumofCaloBurned_goal*FROM users WHERE id='".$id."'";
echo"1213";
}
?>
<html>
<head>

</head>
<body>
    <div>
        <h2>Calculate the caloburn per day </h2>
        <form action="numofcb.php"method="post">
            <label for="numofcaloburngoal">Number of Your Calo Burn Goal Per Fitness</label><br>
        <input type="number" style="width:200px;"name="NumofCaloBurned_goal"placeholder="Enter your numofcaloburngoal that you want to burn per fitness......">
    <input type="submit" name="submit" value="Submit">     
    </form>
    </div>
</body>



</html>