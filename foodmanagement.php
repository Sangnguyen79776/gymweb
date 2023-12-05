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
    
        <div class="container" style="background-color:blanchedalmond;color:brown">
            <img src="img/food.jpg" alt="foodofw" width="100%", height="300px">
            <div class="text-block" >
                <h4>
                    Gym Website
                </h4>
                <p>This is food management page  </p>
                  </div>
                <nav class="navtop">
			<div>
				
                <a href="exercisemanagement.php">Exercise management |</a>
                <a href="adminhomepage.php">Admin Home Page  </a><br>
</div>
</div>
<div style="background-color:blanchedalmond;color:brown">
<div> If you want to add new food .... Please click here ...<a class="active" href="addfood.php">Add new food </a></div>
<div> If you want to see details of food .... Please click here ...<a class="active" href="detailsfood.php">List of Food Details </a></div>
</div >
<div style="margin:10px 10px 10px 10px  ; height:auto;background-color:blanchedalmond;color:brown;padding:10px 10px 10px 10px;">
<div class="col-lg-8" style="border:2px solid #b69f57; margin-top:2%; height:auto;padding:10px 10px 10px 10px;">               
<img  src ="img/food1.jpg" alt="food01" width="220px" height="300px;"> </div> <br>
               
                
<div class="col-lg-8" style="border:2px solid #b69f57; margin-top:2%; height:auto;padding:10px 10px 10px 10px;">

                <img  src ="img/food2.jpg" alt="ex02"width="220px" height="300px"> </div>  
               
                </div>       
              
          
            
           
       
    </body>
</html>