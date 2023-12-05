<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}




?>
<html>
    <head>
    <link rel="stylesheet"  href="css/manage.css" /> 
       <style>
        h4{
            color:brown;
        }
        p{
            color:brown;
        }
       </style>
    </head>
    <body style="background-color:blanchedalmond;color:brown">
    <div class="container">
            <img src="img/usera.jpg" alt="bannerofwebsite" width="100%", height="600px">
            <div class="text-block">
                <h4>
                    Gym Website
                </h4>
                <p>This is user accounts management page  </p>
                </div>
                <nav class="navtop">
			<div style="padding:10px 10px 10px 10px;">
				<a href="exercisemanagement.php">Exercise management|
            
                </a>
                <a href="foodmanagement.php">Food management |</a>
                <a href="adminhomepage.php">Admin Home Page  </a><br>
                </div> 
    </nav>
    </div>
        <div style="border:2px solid brown;padding:10px 10px 10px 10px;">  
        <p>If you want to view all users info ... Please click here <a href="list_ia.php">List of users information</a></p>
            <p>If you want to view all users account ... Please click here <a href="list_ua.php">List of users account</a></p>
        </div>
    </body>
</html>