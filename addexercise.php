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
    $instruction=$_REQUEST['instruction'];
    $calories=$_REQUEST['calories'];
    $image=$_REQUEST['image'];
    $category=$_REQUEST['category'];
    $type=$_REQUEST['type'];
    $quantity=$_REQUEST['quantity'];
    $reps=$_REQUEST['reps'];
    if($calories>300 || $quantity>3 || $reps>20 || $calories==0){
        echo'<p style=" color:red; padding:10px 10px;x">(ERROR MSG)';
        echo"The exercise page for user does not recommend too much calories burned per 1 exercises <br>
        and does not required the quantity( the times to do the exercises)<br>
        does not recommend the reps to do per exercises to much because of training at extremly harded performance can be caused the injuries.....<br>";
        echo"Failed to add the exercise.... Enter again (calories <=300 or calories>0 or quantity <=3 or reps <=20)";
       echo'</p>';
        die ( mysqli_connect_error());
    }
    
    
    $val="SELECT *FROM exercise where name='$name' OR image='$image' OR instruction='$instruction'";
    $db_c=mysqli_query($con,$val);
    $notify= mysqli_fetch_assoc($db_c);
   if($notify){
    if($notify['name']===$name){
        
        echo'<p style="color:red;text-align:center;text-transform:uppercase;">(ERROR MSG)The exercise name is'.$name.'has already exist! Please try to enter the new exercise name.....</p>';
   
    }
    if($notify['image']===$image){
        echo'<p style="color:brown;text-align:center;text-transform:uppercase;border:2px solid sandybrown;padding:10px 10px">';
        echo"your selected image is $image has already existed .... So you cannot use this image anymore<br>
        Please enter again!";
        echo'</p>';
    }
    if($notify['instruction']===$instruction){
        echo'<p style="color:sandybrown;text-align:center;text-transform:uppercase;border:2px solid pink;padding:10px 10px">';
        echo"Your exercise instruction you have entered is $instruction might to be existed from the DB...<br> 
        To be addded succesfully, Please enter the other new exercise instruction";
        echo'</p>';
    }
   }else{
    $ins_query="INSERT INTO exercise(name,instruction,calories,category,image,type,quantity,reps) VALUES('$name','$instruction','$calories','$category','$image','$type','$quantity','$reps')";
  mysqli_query($con,$ins_query) or die ( mysqli_connect_error());
  
    $results="New exercise added successfully.
    </br><a href='detailsexercise.php'>View Inserted Exercise Here </a>";}
}
?>
<!DOCTYPE html>
<html>
    <head>
   
		<meta charset="utf-8" />
		
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="css/1.css" />
       <p style="color:brown;text-transform:uppercase;">Add New exercise Form</p>
    </head>
    <body style="background-color:antiquewhite;text-align:center;  ">
    <div class="from-group">
    <img src="img/bofpex.png" alt="bannerofwebsite" style="width:100%;height:400px;">
    <div style="border:2px solid salmon;color:sandybrown;">
        <form action="addexercise.php" method="post">
            <input type="hidden" name="new" value="1"/>
        <label for="name">Name</label><br>
        <input type="text" class="form-control" name="name" placeholder="Enter the exercise name  here:  ..."required>
        
            
            <div class="from-group">
        <label for="instruction">Instruction</label><br>
        <input type="text" style="height:200px;"class="form-control" name="instruction" placeholder="Enter the exercise instruction  here:  ..."required>
        
            </div>
            <div class="from-group">
        <label for="calories">Calories</label><br>
        <input type="number" class="form-control" name="calories" placeholder="Enter the exercise calories  here:  ..."required>
        
            </div>
            <div class="from-group">
            <label for="category">Category</label><br>
                <select name="category" style="width:50%;padding:10px 10px 10px 10px;" >
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
                          
        </select>        
    </div><br>
   
           
           <div class="from-group">
        <label for="image">File</label>
        <input type="file" class="form-control" name="image"required>
        </div>
        <label for="type">Type</label><br>
      <p><select name="type" style="width:50%;padding:10px 10px 10px 10px;">
      <option value="easy">
                            Easy
                        </option>
                        <option value="tb">
                            Medium
                        </option>
                        <option value="hard">Hard</option>
      </select></p><br>
      <div class="form-group">
        <label for="quantity">Quantity</label><br>
        <input type="number" name="quantity" min="1" max="5">
      </div>
      <div class="form-group">
        <label for="reps">Reps</label><br>
        <input type="number"name="reps" min="5" max="30">
      </div>
        <input type="submit" name="submit"value="Submit">
        <p style="color:#FF0000;"><?php echo $results; ?></p>
        </form>
        </div>
        </div>
        
        </div>
        
    </body>
</html>
</html>