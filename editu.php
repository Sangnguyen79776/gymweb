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
$query = "SELECT * from accounts where id='".$id."'"; 
$status = mysqli_query($con, $query) or die ( mysqli_connect_error());
$row = mysqli_fetch_assoc($status);
?>
<html>
    <head>
    <link rel="stylesheet"  href="css/1.css" />
    </head>
    <?php
    $kq="";
    if(isset($_POST['new']) && $_POST['new']==1)
       {
       $id=$_REQUEST['id'];
    $username=$_REQUEST['username'];
    $password=$_REQUEST['password'];
    $email=$_REQUEST['email'];
  
         
    $check="SELECT *FROM accounts where username='$username' OR email='$email'" ;
    $v_c=mysqli_query($con,$check);
    $notify= mysqli_fetch_assoc($v_c);
        if($notify){
            if($notify['username']===$username){
                echo'<p>The username has already exist, you cannot use this username more!...<br>Please enter again<br></p>';
              $error="Failed to update the user account information";
              echo $error;
             
           
            }
            if($notify['email']===$email){
                echo"the email you have edited is $email have already existed so you cannot use this email anymore....<br>Please enter again<br>";
                echo"Failed to update the user information   (email)" ;
            }
        }else{
            $password=md5($password);
    $update="UPDATE accounts set
    username='".$username."', password='".$password."',email='".$email."',phonenumber='".$phonenumber."' where id='".$id."'";
    
    
    mysqli_query($con, $update) or die(mysqli_connect_error());
$info = "User Account Updated Successfully. </br></br>
<a href='list_ua.php'>Details of Updated User Account </a>";
echo '<p style="color:#FF0000;">'.$info.'</p>';}
}else {
    
    
    
    
    ?>
       <body style="background-color:antiquewhite;text-align:center;color:sandybrown;">
    <div class="from-group">
    
    <div style="border:2px solid salmon;">
        <form action="editu.php" method="post">
            <input type="hidden" name="new" value="1"/>
        <label for="username">Username </label>
        <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
        <p><input type="text" name="username" placeholder="Enter Name" required value="<?php echo $row['username'];?>" /></p>
        <label for="password">Password </label>
        <p><input type="password" name="password" style="height:200px;" placeholder="Enter Password here......" 
required value="<?php echo $row['password'];?>" /></p>
<label for="email">Email </label>
<p><input type="text" name="email " placeholder="Enter user account email:" required value="<?php echo $row['email'];?>" /></p>
<label for="phonenumber">Phone number </label>
<p><input type="tel" name="phonenumber" placeholder="Enter phonenumber" required value="<?php echo $row['phonenumber'];?>" /></p>

<p><input name="submit" type="submit" value="Update" /></p> 
          
        </form>
        <?php } ?>
        </div>
        </div>
    </body>
</html>