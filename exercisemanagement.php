<?php

session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}




?>
<!DOCTYPE html >
<html>
	<head>
		<meta charset="utf-8" />
		
        <meta name="viewport" content="width=device-width, initial-scale=1">
      
		  <link rel="stylesheet"  href="css/manage.css" /> 
       
    </head>
    <body style="background-color:antiquewhite;">
    
        <div class="container"style="background-color:blanchedalmond;color:brown">
            <img src="img/bofpex.png" alt="bannerofwebsite" width="100%", height="600px">
            <div class="text-block">
                <h4>
                    Gym Website
                </h4>
                <p>This is exercise management page  </p>
                </div>
                <nav class="navtop">
			<div style="padding:10px 10px;">
                <a href="admina.php">Admin accounts management|</a>
				<a href="accountsm.php">Mange User Accounts|</a>
                <a href="foodmanagement.php">Food management |</a>
                <a href="adminhomepage.php">Admin Home Page  </a><br>
</div>
</div>
<div style="background-color:blanchedalmond;color:brown">
<div> If you want to add new exercise .... Please click here ...<a class="active" href="addexercise.php">Add new exercise </a></div>
<div> If you want to see details of  exercise .... Please click here ...<a class="active" href="detailsexercise.php">List of  exercise details   </a></div>
</div>
<div class="col-lg-8" style=" margin:10px 10px 10px 10px; height:auto;background-color:blanchedalmond;color:brown;padding-left:10px;">
<div style="background-color:blanchedalmond;color:brown;margin-top:10px;border:2px solid #b69f57;padding:10px 10px 10px 10px;">
                <img  src ="img/01.png" alt="ex01"width="220px" height="300px "></div> 
               
                <div class="col-lg-8" style="border:2px solid #b69f57;; margin-top:2%; height:auto;padding:10px 10px 10px 10px;">
               

                <img  src ="img/02.png" alt="ex02"width="220px" height="300px"> </div>
                </div>               
               
                
           
            
           
      
    </body>
</html>