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

// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
$id=$_REQUEST['id'];
$query = "SELECT * from exercise where id='".$id."'"; 
$status = mysqli_query($con, $query) or die ( mysqli_connect_error());
$row = mysqli_fetch_assoc($status);
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8" />
		
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet"  href="css/1.css" />
        <style>
        img{
                width:100%;
                height:400px;
            }
        
            </style>
    </head>
   
		
		
       <h2>Edit exercise Form</h2>
       <?php
       $results = "";
       if(isset($_POST['new']) && $_POST['new']==1)
       {
       $id=$_REQUEST['id'];
       
       $name =$_REQUEST['name'];
       $instruction =$_REQUEST['instruction'];
       $calories =$_REQUEST['calories'];
       $image=$_REQUEST['image'];
       $quantity=$_REQUEST['quantity'];
       $reps=$_REQUEST['reps'];
       if($calories >300 || $reps >20 || $quantity >3){
        echo"You cannot updated the exercise information<br> because of (calories need <=300  or reps need <=20 or quantity need <=3)<br>";
        die(mysqli_connect_error());
       }
       elseif($calories==0){
        echo"the calories cannot equal to 0 ";
        die(mysqli_connect_error());
       }






       $val="SELECT *FROM exercise where name='$name' OR instruction='$instruction' OR image='$image'";
       $db_c=mysqli_query($con,$val);
       $notify= mysqli_fetch_assoc($db_c);
       if($notify){
        if($notify['name']===$name){
   
            echo"You have selected the name is $name that is existed ....So you cannot use this name anymore....<br>Please enter again";
            die(mysqli_connect_error());
           
        }
        if($notify['instruction'===$instruction]){
            echo"You have selected the instruction of the exercise is $instruction.....So you need to use the other instructions <br> Please enter again!";
        
        }
        if($notify['image']===$image){
            echo"You have selected the image is $image that have already existed from the database....<br>Failed to update! ";
           
        }
       }else{
       $update="UPDATE exercise set
name='".$name."', instruction='".$instruction."',calories='".$calories."',image='".$image."' ,quantity='".$quantity."',reps='".$reps."'where id='".$id."'";

mysqli_query($con, $update)or die(mysqli_connect_error());;
    $info = "Exercise Updated Successfully. </br></br>
    <a href='detailsexercise.php'>Details of Updated exercise </a>";
    echo '<p style="color:#FF0000;">'.$info.'</p>';}
}else {
       ?>
    
    <body style="background-color:antiquewhite;text-align:center;color:sandybrown;">
    <div class="from-group">
    				
    <img src="img/bofpex.png" alt="bannerofwebsite">
    <div style="border:2px solid salmon">
        <form action="editexercise.php" method="post">
            <input type="hidden" name="new" value="1"/>
        <label for="name">Name </label>
        <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
        <p><input type="text" name="name" placeholder="Enter Name" required value="<?php echo $row['name'];?>" /></p>
        <label for="instruction">Instruction </label>
        <p><input type="text" name="instruction" style="height:200px;"placeholder="Enter Instruction" 
required value="<?php echo $row['instruction'];?>" /></p>
<label for="calories">Calories </label>
<p><input type="number" name="calories" placeholder="Enter Calories" required value="<?php echo $row['calories'];?>" /></p>
<label for="category">Category </label>
<p><select name="category" style="width:50%; padding:10px 10px;" required value="<?php echo $row['category'];?>">
                <option value="warmupex">
                                Warmingup 
                            </option>
                            <option value="stretchingex">
                            Stretching 
                            </option>
                            <option value="wfex">
                            Weightlifting exercises
                            </option>
                            <option value="w_wfex">
                            Without Weightlifting exercises
                            </option>
                            <option value="cardio">
                           Cardio
                            </option>
                          
        </select></p><br>
<label for="image"> Image</label>
<input type="file" name="image" required value ="<?php echo $row['image'];?>"><br>
<label for="type" >Type </label><br>
<select name="type" style="width:50%;padding:10px 10px;"required value="<?php echo $row['type'];?>">
<option value="easy">
                            Easy
                        </option>
                        <option value="tb">
                            Medium
                        </option>
                        <option value="hard">Hard</option>
</select><br>
<label for="quantity">Quantity </label>
<p><input type="number" name="quantity" min="1" max="5"placeholder="Enter quantity" required value="<?php echo $row['quantity'];?>" /></p>
<label for="reps">Reps per 1 time to do 1 exercise </label>
<p><input type="number" name="reps" placeholder="Enter reps" min="8" max="30" required value="<?php echo $row['reps'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p> 
          
        </form>
        <?php } ?>
    </div>
        </div>
        
    </body>
</html>
