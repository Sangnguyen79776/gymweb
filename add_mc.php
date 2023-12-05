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
$notify=array();
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
if(isset($_POST['new']) && $_POST['new']==1){
    $c_name=mysqli_real_escape_string($con, $_POST['c_name']);
    if(empty($c_name))
    {
        array_push($notify,"Membership cards name is required");
    }
    $c_info=mysqli_real_escape_string($con, $_POST['c_info']);
    if(empty($c_info))
    {
        array_push($notify,"Membership cards info is required");
    }
    $c_dtime=mysqli_real_escape_string($con, $_POST['c_dtime']);
    if(empty($c_info))
    {
        array_push($notify,"Membership cards date time is required");
    }
    $image=mysqli_real_escape_string($con, $_POST['image']);
    if(empty($c_info))
    {
        array_push($notify,"Membership cards image is required");
    }
    $sql="SELECT *FROM mem_card WHERE image='$image'";
    $db_c=mysqli_query($con,$sql);
    $print= mysqli_fetch_assoc($db_c);
    if($print){
        if($print['image']===$image){
            echo"Your selected image is $image has already existed .... PLease try again!";
            die(mysqli_connect_error());
        }
    }
    if(count($notify)==0){
        $db_query = "INSERT INTO mem_card (c_name, c_info, c_dtime,image) 
        VALUES('$c_name', '$c_info', '$c_dtime','$image')";
$u_query=mysqli_query($con, $db_query); 
if ($u_query) {
    echo'<div style="color:olive;text-transform:uppercase;background-color:orange;text-align:center;"><b>Add successfully </b></div>';
    header("location:list_mc.php");
    }else{
    
        echo'<div style="color:red;text-transform:uppercase;background-color:orange;text-align:center;"><b>Failed to Add </b></div>';
     
    }

  
   
}else{
    print_r($notify);
    echo'<div style="color:red;text-transform:uppercase;background-color:salmon;text-align:center;"><b>Failed to Add </b></div>';
}
}



?>
<html>
    <head>
<meta charset="utf-8" />
		
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet"  href="css/1.css" />
        <style>
            input[type=datetime-local]{
                width:50%;
                padding:10px 10px;
            }
        </style>
	
       <h2 style="color:sandybrown;">Add New Membership Cards Form</h2>
    </head>
    <body style="background-color:antiquewhite;color:sandybrown;padding:10px 10px;">
    <div class="from-group" style="text-align:center;  background-color:blanchedalmond">
    <img src="img/images.jpg" alt="foodofw" style="width:100%;height:300px;">
    <div style="border:2px solid pink;margin-top:10px">
        <form action="add_mc.php" method="post">
            <input type="hidden" name="new" value="1"/>
        <label for="c_name"style="color:sandybrown;">Card name</label><br>
        <input type="text" class="form-control" name="c_name" placeholder="Enter the membership cards name  here:  ..."><br>
        
        <label for="c_info"style="color:sandybrown;">Card Info</label><br>
        <input type="text" class="form-control" name="c_info" placeholder="Enter the membership cards info  here:  ..."><br>
    
        <label for="c_dtime"style="color:sandybrown;">Card Datetime</label><br>
        <input type="datetime-local" class="form-control" name="c_dtime" placeholder="Enter the membership cards date time  here:  ..."><br>
        
        <p><label for="image"style="">Card Image</label>
        <input type="file" name="image"><br></p>
        <input type="submit" name="submit"value="Submit">
    </form>
    </div>
    </html>