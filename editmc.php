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
$query = "SELECT * from mem_card where id='".$id."'"; 
$status = mysqli_query($con, $query) or die ( mysqli_connect_error());
$row = mysqli_fetch_assoc($status);
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
	
       <h2 style="color:sandybrown;">Edit  Membership Cards Form</h2>
    
       <?php
       $results = "";
       if(isset($_POST['new']) && $_POST['new']==1)
       {
       $id=$_REQUEST['id'];
       
       $c_name =$_REQUEST['c_name'];
       $c_info =$_REQUEST['c_info'];
       $c_dtime =$_REQUEST['c_dtime'];
   
       $image=$_REQUEST['image'];
       $update="UPDATE food set
name='".$name."', type='".$type."',calories='".$calories."',numofGram='".$numofGram."',image='".$image."' where id='".$id."'";

mysqli_query($con, $update) or die(mysqli_connect_error());
$info = "Membership Card Have Been Updated Successfully. </br></br>
<a href='list_mc.php'>Details of Updated Membership Card </a>";
echo '<p style="color:#FF0000;">'.$info.'</p>';
}else {
       ?>
    </head>
    <body style="background-color:antiquewhite;color:sandybrown;padding:10px 10px;">
    
    <div class="from-group" style="text-align:center;  background-color:blanchedalmond">
    <img src="img/images.jpg" alt="foodofw" style="width:100%;height:300px;">
    <div style="border:2px solid pink;margin-top:10px">
        <form action="editmc.php" method="post">
            <input type="hidden" name="new" value="1"/>
        <label for="c_name"style="color:sandybrown;">Card name</label><br>
        <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
        <input type="text" class="form-control" name="c_name" placeholder="Enter the membership cards name  here:  ..."required value="<?php echo $row['c_name'];?>"><br>
        
        <label for="c_info"style="color:sandybrown;">Card Info</label><br>
        <input type="text" class="form-control" name="c_info" placeholder="Enter the membership cards info  here:  ..."required value="<?php echo $row['c_info'];?>"><br>
    
        <label for="c_dtime"style="color:sandybrown;">Card Datetime</label><br>
        <input type="datetime-local" class="form-control" name="c_dtime" placeholder="Enter the membership cards date time  here:  ..."required value="<?php echo $row['c_dtime'];?>"><br>
        
        <p><label for="image"style="">Card Image</label>
        <input type="file" name="image"required value="<?php echo $row['image'];?>"><br></p>
        <input type="submit" name="submit"value="Submit">
        <?php }?>
    </form>
    </div>
    </html>