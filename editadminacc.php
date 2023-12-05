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
$query = "SELECT * FROM admin where id='".$id."'"; 
$status = mysqli_query($con, $query) or die ( mysqli_connect_error());
$row = mysqli_fetch_assoc($status);
?>
<html style="border:2px solid blanchedalmond;background-color:burlywood; padding:10px 10px 10px 10px;margin:10px 10px 10px 10px;">
<head>
    <link rel="stylesheet"  href="css/1.css" /> 
    <style>
img{
    width:100%;
    height:300px;
}
h2{
    text-transform:uppercase;
    
}
body{
    padding:10px 10px 10px 10px;
    text-align:center;
    color:brown;
}
form{
    border:2px solid brown;
    padding:10px 10px 10px;
    margin-top: 20px;
}

 </style>
</head>

    <h2>Edit Your Admin Accounts Info Page</h2>
    <img src="img/usera.jpg" alt="users" >
    <?php
    if(isset($_POST['new']) && $_POST['new']==1){
        $id=$_REQUEST['id'];
        $username=$_REQUEST['username'];
        $password=$_REQUEST['password'];
        
    $check="SELECT *FROM admin where username='$username'" ;
    $v_c=mysqli_query($con,$check);
    $notify= mysqli_fetch_assoc($v_c);
        if($notify){
            if($notify['username']===$username){
                echo'<p>The username has already exist, you cannot use this username more!... Please enter again<br></p>';
              $error="Failed to update";
              echo $error;
             
           
            }
        }else{
        $password=md5($password);
        $edit="UPDATE admin set
        username='".$username."', password='".$password."' where id='".$id."'";
    mysqli_query($con,$edit) or die(mysqli_connect_error());

$view='<div style="text-transform:uppercase;color:lightblue;">Edited the admin accounts succesfuly
<br><a href="list_aa.php">View the admin accounts list here </div>';
echo"<p>'.$view'</p>";}
    }else{

    
    
    
    ?>
    <body >
<form action="editadminacc.php" method="post">
            <input type="hidden" name="new" value="1"/>
        <label for="username">Admin UserName </label>
        <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
        <p><input type="text" name="username" placeholder="Enter Admin UserName here........." required value="<?php echo $row['username'];?>" /></p>
        <label for="password">Your Admin Password </label>
        <p><input type="password" name="password"  placeholder="Enter Your new password here..." required value="<?php echo $row['password'];?>"></p>
        <input type="submit" name="submit"value="Submit">
</form>
    <?php } ?>
</body>
</html>