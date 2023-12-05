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
<html>
	<head>
		<meta charset="utf-8">
		<title> Admin Home Page</title>
       
		<link href="css/main.css" rel="stylesheet" >
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
	
	<style>
		.navtop{
    background-color:  #333;
    overflow: hidden;;
}
.navtop a {
    float: left;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
    
  }
  .navtop a:hover {
    background-color: #ddd;
    color: black;
  }
  .navtop a.active {
    background-color: #04AA6D;
    color: white;
  }
	</style>
	
	
	
	</head>
    <div class="container">
            <img src="img/banner.jpg" alt="bannerofwebsite">
            <div class="text-block">
                <h4>
                    Gym Website
                </h4>
				<p> Welcome, <?=$_SESSION['name']?> </p>
				<p>This is Admin Home Page </p>
			</div>
	<body class="loggedin"style="background-color:blanchedalmond;">
		<nav class="navtop">
			<div style="padding:10px 10px 10px 10px">
			
				<a href="profileforadmin.php"><i class="fas fa-user-circle"></i>AdminProfile |</a>
				<a href="accountsm.php">Manage User Accounts|</a>
				<a href="foodmanagement.php">Food management |</a>
                <a href="exercisemanagement.php">Exercise management |</a>
				<a href="admina.php">Admin accounts management|</a>
				<a href="member_c.php">Membership card management| </a>
				<a href="addeq.php">Add new fitness equipments|</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
                
			</div>
		</nav>
		
	</body>
</html>