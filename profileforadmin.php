<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'gymweb';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// We don't have the password or phonenumber info stored in sessions, so instead, we can get the results from the database.
$stmt = $con->prepare('SELECT password,username FROM admin WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $username);
$stmt->fetch();
$stmt->close();
?>
<!DOCTYPE html>
<html style="background-color:blanchedalmond;">
    <head>
	
	<link rel="stylesheet" href="css/profile.css">
    </head>
    <body>
	<div class="container">
            <img src="img/banner.jpg" alt="bannerofwebsite">
            <div class="text-block">
                <h4>
                    Gym Website
                </h4>
                <p> Welcome to visit our website </p>
            </div>
			<nav class="navtop">
			<div>
			
			<a href="adminhomepage.php">Admin homepage </a>


			</div>
				</nav>
        </div>
		<h2 style="background-color:blanchedalmond;color:brown">Admin Profile Page </h2>
	<div class="content">
    <img src="img/example.png" alt="exampleimage" >

        <p style="color:brown;">Your account details are below:</p>

		<table width="100%" border="1" style="border-collapse:collapse;">
					<tr style="color:orange;">
						<td >Username:</td>
						<td><?=$_SESSION['name']?></td>
					</tr>
					<tr style="color:orange;">
						<td>Password:</td>
						<td><?=$password?></td>
					</tr>
					
                  
				</table>
				
		</div>

</body>
        

        </html>
