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
$query = "SELECT * from users where id='".$id."'"; 
$status = mysqli_query($con, $query) or die ( mysqli_connect_error());
$row = mysqli_fetch_assoc($status);







?>
<html style="border:2px solid brown; background-color:blanchedalmond;text-align:center;color:brown">
    <head>
    <link rel="stylesheet"  href="css/1.css" />
    </head>

    <body>
        <h2>Edit User Information Page</h2>
        <img src="img/profile.png"alt="profile">
        <?php 
        if(isset($_POST['new']) && $_POST['new']==1){
            $id=$_REQUEST['id'];
            $height=$_REQUEST['height'];
            $weight_current=$_REQUEST['weight_current'];
            $weight_goal=$_REQUEST['weight_goal'];
            $sex=$_REQUEST['sex'];
            $age=$_REQUEST['age'];
            $NumofCaloBurned_goal=$_REQUEST['NumofCaloBurned_goal'];
            if($age>=38 ){
                echo'<p style="background-color:lightblue;text-transform:uppercase;">';
                echo"You have edited the user age is $age<br>";
                echo"The age too high for training....This will cause some injuries if you have doing the physical exercises<br>";
                echo"Failed to update the user information (age)<br>";
                echo"</p>";
         
       
        }
        elseif($age<=18 ){
            echo"the age is too young to do the physical training";
            echo"failed to edit user information (age) ";
        }
        elseif($weight_goal==$weight_current){
            echo'<p style="text-transform:uppercase;color:red;">You have edited the user weight goal is '.$weight_goal.' and the user weight current is: '.$weight_current.' <br>
            no acceptable for any fitness demand..... You can not modify<br>
                Failed to update the user weight<br></p>';
                }
        elseif($height<=153 && $height>=190){
            echo'<p style="border:2px solid lightblue;padding:10px 10px">You have selected the user height to edit is '.$height.'
            <br>
            Cannot updated for the user height .....<br>
            Enter again!  
            
            </p>';
        }
            else{
           
            $modify="UPDATE users set 
            height='".$height."', weight_current='".$weight_current."',weight_goal='".$weight_goal."',sex='".$sex."',age='".$age."',NumofCaloBurned_goal='".$NumofCaloBurned_goal."'where id='".$id."'";
             
    mysqli_query($con, $modify) or die(mysqli_connect_error());
            $info = "User Information Updated Successfully. </div></br>
            <a href='list_ia.php'>Details of Updated User Information </a>";
            echo '<p style="color:#FF0000;">'.$info.'</p>';}
            }else {
       
        
        
        
        ?>
    <form action="edituserinfo.php" method="post">
            <input type="hidden" name="new" value="1"/>
        <label for="height">User Height </label>
        <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
        <p><input type="number" name="height" placeholder="Enter the height here........." min="150" max="200"required value="<?php echo $row['height'];?>" /></p>
        <label for="weight_current">User weight current </label>
        <p><input type="number" name="weight_current"  placeholder="Enter weight_current here..." min="50" max="200"required value="<?php echo $row['weight_current'];?>"></p>
        <label for="weight_goal">User weight goal </label>
        <p><input type="number" name="weight_goal"  placeholder="Enter Your goal here..." min="50" max="200 "required value="<?php echo $row['weight_goal'];?>"></p>
        <label for="sex" >Sex</label><br>
<select id="sex" name="sex" min=""required value="<?php echo $row['sex'];?>">
    <option value="male">Male</option>
    <option value="female">Female</option>
    
</select><br>
<label for="age">User age</label>
        <p><input type="number" name="age"  placeholder="Enter Your age here..." min="16" max="40"required value="<?php echo $row['age'];?>"></p>
<label for="NumofCaloBurned_goal">User number of caloburn goal </label>
        <p><input type="number" name="NumofCaloBurned_goal" min="1000" max="3100"  placeholder="Enter Your goal here..." required value="<?php echo $row['NumofCaloBurned_goal'];?>"></p>
        
        
        
        
        
        <input type="submit" name="submit"value="Submit">
        <?php } ?>
</form>
    </body>
</html>