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

if(isset($_POST['new']) && $_POST['new']==1){
    $name=$_REQUEST['name'];
    $type=$_REQUEST['type'];
    $calories=$_REQUEST['calories'];
    $numofGram=$_REQUEST['numofGram'];
    $image=$_REQUEST['image'];

    $check="SELECT *FROM food where name='$name' OR imgae='$image'" ;
    $v_c=mysqli_query($con,$check);
    $notify= mysqli_fetch_assoc($v_c);
    if($calories>=300 &&$numofGram<=100){
        echo'<p style="text-align:center;text-transform:uppercase;color:red;">Please check the information carefully before going to add.....!
        <br>Enter again (Resubmitssion) <br>
        <br> The calories and the number of food gram should need to be accepted...<br>
        <a href="addfood.php">Add new food form</a></p>';
        
        die(mysqli_connect_error());
        
       
    }
    elseif($calories==0){
        echo"Failed to add due to the calories of food cannot equal to 0 ";
        die(mysqli_connect_error());
    }

    if($notify){
        if($notify['name']===$name){
            echo'<p style="text-align:center;text-transform:uppercase;color:red">(ERROR MSG) The food name has already exist!...... To add the new food , please enter the new food name </p>';
        }
        if($notify['image']===$image){
            echo"your selected image  is $image has already existed.... You cannot use this image anymore.....Failed to add";
        }
     
    }else{
    $add_q="INSERT INTO food(name,type,calories,numofGram,image) VALUES('$name','$type','$calories','$numofGram','$image')";
  mysqli_query($con,$add_q) or die ( mysqli_connect_error());
  
    $results="New food added successfully.
  </br><a href='detailsfood.php'>View Inserted Food Here </a>";}
}
?>
<!DOCTYPE html>
<html>
    <head >
   
		<meta charset="utf-8" />
		
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet"  href="css/1.css" />
	
       <h2 style="color:sandybrown;">Add New food Form</h2>
    </head>
    <body style="background-color:antiquewhite;">
    <div class="from-group" style="text-align:center;  background-color:blanchedalmond">
    <img src="img/food.jpg" alt="foodofw" style="width:100%;height:300px;">
    <div style="border:2px solid pink">
        <form action="addfood.php" method="post">
            <input type="hidden" name="new" value="1"/>
        <label for="name"style="color:sandybrown;">Name</label><br>
        <input type="text" class="form-control" name="name" placeholder="Enter the food name  here:  ..."required>
        
            
            <div class="from-group">
        <label for="type"style="color:sandybrown;">Type</label><br>
        <input type="text" style="height:200px;"class="form-control" name="type" placeholder="Enter the food type  here:  ..."required>
        
            </div>
            <div class="from-group">
        <label for="calories"style="color:sandybrown;">Calories</label><br>
        <input type="number" class="form-control" name="calories" placeholder="Enter the calories of food here:  ..."required>
        
            </div>
            <div class="from-group">
        <label for="calories"style="color:sandybrown;">NumofGram</label><br>
        <input type="number" class="form-control" name="numofGram" min="30" max="200" placeholder="Enter the Number of food/gram   here:  ..."required>
        
            </div>
           <div class="from-group">
        <label for="file"style="color:sandybrown;">File</label><br>
        <input type="file" class="form-control" name="image"required >
        </div>
        <input type="submit" name="submit"value="Submit">
        <p style="color:#FF0000;"><?php echo $results; ?></p>
        </form>
        </div>
        </div>
    </body>
</html>
</html>