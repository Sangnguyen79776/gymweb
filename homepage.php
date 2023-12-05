<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
?>
<!DOCTYPE html>
<html style="background-color:lightblue">
	<head>
		<style>
			.top-nav{
    background-color:  #333;
    overflow: hidden;;
}
.top-nav a {
    float: left;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
    
  }
  .top-nav a:hover {
    background-color: #ddd;
    color: black;
  }
  .top-nav a.active {
    background-color: #04AA6D;
    color: white;
  }
		</style>
		<meta charset="utf-8">
		<div class="container">
            <img src="img/banner.jpg" alt="bannerofwebsite">
            <div class="text-block">
                <h4>
                    Gym Website
                </h4>
				<p>Welcome,<?=$_SESSION['name']?></p>
				<p>This is User Home Page</p>
            </div>
        </div>
	
		<link href="css/main.css" rel="stylesheet" >
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
	</head>
	<body class="loggedin">
	<div class="top-nav">
			<div style="padding:10px 10px;">
				
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile|</a>
				<a href="feedback.php">Give a feedback|</a>
				<a href="contactus.php">Contact us|</a>
				<a href="gymeq.php">Fitness equipments|</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout|</a>
               
			</div>
</div>
		
	</body>
</html>