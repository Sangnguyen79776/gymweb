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
$stmt = $con->prepare('SELECT password, email ,phonenumber FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email,$phonenumber);
$stmt->fetch();
$stmt->close();
?>
<!DOCTYPE html>
<html style="background-color:lightblue;">
	<head>
		<style>
			tr{
				color:orange;
				height: 70px;
			
			}
		</style>
	</head>
	<img src="img/pp.jpg" alt="profilex" width='100%' height='300px'>
	<h2 style="text-align:center;color:rebeccapurple; border-bottom:2px solid pink;">Profile Page </h2>
<div class="content" style="border:2px solid pink;padding:20px 20px 20px 20px;">

        <p style="color:olive;">Your account details are below:</p>
		<div class="col-lg-8" style=" margin-top:2%; height:auto;"></div> 
		<img src="img/example.png" alt="exampleimage" style="float:center;"  >
		
		<table width="100%" border="1" style="border-collapse:collapse;margin-left:10px;">
			<tr>
			<td>Your account id</td>
			<td><?=$_SESSION['id']?></td>
			</tr>
		<tr>
			
						<td>Username:</td>
						<td><?=$_SESSION['name']?></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><?=$password?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?=$email?></td>
                        
					</tr>
                    <tr>
                    <td>Phonenumber:</td>
                        <td><?=$phonenumber?></td>
                    </tr>
					
				</table><br>
				
		</div>
		<div class="col-lg-8" style="border:2px solid #b69f57; margin-top:2%; height:auto;color:purple;"> 
                Before choosing the fitness demand  .......Please click here? <a class="active" href="assignpersonalinfo.php"style="padding:10px 10px 10px 10px;">Assign personal info  </a><br>
			<br>
				Go back to user home page......please click here? <a href="homepage.php"style="padding:10px 10px 10px 10px;">User Home Page </a>
				</div>
        </html>
