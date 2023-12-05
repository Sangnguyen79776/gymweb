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
$notify=array();
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if ( mysqli_connect_errno() ) {
    // If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$id=$_REQUEST['id'];
$query = "SELECT * from food where id='".$id."'"; 
$status = mysqli_query($con, $query) or die ( mysqli_connect_error());
$row = mysqli_fetch_assoc($status);
?>

<!DOCTYPE html>
<html>
    <head></head>
   
		<meta charset="utf-8" />
		
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet"  href="css/1.css" />
		<style>
            img{
                width:100%;
                height:400px;
            }
        </style>
       <h2>Edit food Form</h2>
       <?php
       $results = "";
       if(isset($_POST['new']) && $_POST['new']==1)
       {
       $id=$_REQUEST['id'];
       
       $name =$_REQUEST['name'];
       $type =$_REQUEST['type'];
       $calories =$_REQUEST['calories'];
       $numofGram=$_REQUEST['numofGram'];
       $image=$_REQUEST['image'];





       if($calories>300  || $numofGram>180){
            echo" you cannot updated the food information due to the calories values you have enter too high (>300) <br>
            OR the numofGram is too hight(>180)<br>Failed to update";
            die(mysqli_connect_error());
        } elseif($calories==0){
            echo"the number of food calaories cannot equal to 0 ";
            die(mysqli_connect_error());
        }
    
       
       $val="SELECT *FROM food where name='$name' OR image='$image'";
       $db_c=mysqli_query($con,$val);
       $notify= mysqli_fetch_assoc($db_c);
       if($notify){
        if($notify['name']===$name){
            echo"The name of food you have entered is $name have already existed so you cannot use this name anymore....<br>
            Please enter again";
        }
        if($notify['image']===$image){
            echo"YOu have used the existed image is $image.... So you need to use the other images before going to update the food information!<br>
            Please enter again!....";
            die(mysqli_connect_error());
        }
       }else{
       $update="UPDATE food set
name='".$name."', type='".$type."',calories='".$calories."',numofGram='".$numofGram."',image='".$image."' where id='".$id."'";

mysqli_query($con, $update) or die(mysqli_connect_error());
$info = "Food Updated Successfully. </br></br>
<a href='detailsfood.php'>Details of Updated food </a>";
echo '<p style="color:#FF0000;">'.$info.'</p>';}
}else {
       ?>
    
    <body style="background-color:antiquewhite;text-align:center;color:sandybrown;">
    <div class="from-group">
    <img src="img/food.jpg" alt="foodofw" >
    <div style="border:2px solid salmon;">
        <form action="editfood.php" method="post">
            <input type="hidden" name="new" value="1"/>
        <label for="name">Name </label>
        <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
        <p><input type="text" name="name" placeholder="Enter Name" required value="<?php echo $row['name'];?>" /></p>
        <label for="type">Type </label>
        <p><input type="text" name="type" style="height:200px;" placeholder="Enter Type of food here......." 
required value="<?php echo $row['type'];?>" /></p>
<label for="calories">Calories </label>
<p><input type="number" name="calories" placeholder="Enter Calories" required value="<?php echo $row['calories'];?>" /></p>
<label for="numofGram">Number of Food/Gram  </label>
<p><input type="number" name="numofGram" placeholder="Enter Number Food/Gram" min="30" max="200" required value="<?php echo $row['numofGram'];?>" /></p>
<label for="image">Image   </label>
<input type="file" name="image" value="<?php echo $row['image'];?>" />
<p><input name="submit" type="submit" value="Update" /></p> 
          
        </form>
        <?php } ?>
        </div>
        </div>
    </body>
</html>
