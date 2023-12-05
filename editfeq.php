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
$query = "SELECT *From equipments where id='".$id."'"; 
$status = mysqli_query($con, $query) or die ( mysqli_connect_error());
$row = mysqli_fetch_assoc($status);
?>
<html>
    <head>
    <link rel="stylesheet"  href="css/1.css" />
    <style>
        select[name=moneytaryunit]{
            width:50%;
            padding:10px 10px;
        }
    </style>
    </head>
    <?php
    $kq="";
    if(isset($_POST['new']) && $_POST['new']==1)
       {
       $id=$_REQUEST['id'];
    $name=$_REQUEST['name'];
    $price=$_REQUEST['price'];
  
    $image=$_REQUEST['image'];
    $description=$_REQUEST['description'];
    $m_unit=$_REQUEST['moneytaryunit'];
    $check="SELECT *FROM equipments where name='$name' OR description='$description'" ;
    $v_c=mysqli_query($con,$check);
    $notify= mysqli_fetch_assoc($v_c);
        if($notify){
            if($notify['name']===$name){
                echo'<p>The name you have selected is '.$name.' has already exist, you cannot use this name more!...<br>Please enter again<br></p>';
              $error="Failed to update the fitness equipment name information";
              echo $error;
             
           
            }
            if($notify['description']===$description){
                echo"the description you have edited is $description have already existed so you cannot use this description anymore....<br>Please enter again<br>";
                echo"Failed to update the  fitness equipment information (description)" ;
            }
        }else{
           switch($m_unit){
                case'vnd':
    if($price<1000 || $price==0){
        echo"your selected price is $price is not proper for your moneytary unit is $m_unit<br>";
        echo"Failed to edit the  fitness equipment!....";
      
      die(mysqli_connect_error());
    }else{
        $update="UPDATE equipments set
        name='".$name."', price='".$price."',image='".$image."',description='".$description."' ,moneytaryunit='".$m_unit."'where id='".$id."'";
    }
    case'dollars':
        if($price!=0){
            $update="UPDATE equipments set
            name='".$name."', price='".$price."',image='".$image."',description='".$description."' ,moneytaryunit='".$m_unit."'where id='".$id."'";
        }
    
        case'euro':
            if($price!=0){
                $update="UPDATE equipments set
                name='".$name."', price='".$price."',image='".$image."',description='".$description."' ,moneytaryunit='".$m_unit."'where id='".$id."'";
            }
           }
    
    
    
    mysqli_query($con, $update) or die(mysqli_connect_error());
$info = "Fitness Equipment Updated Successfully. </br></br>
<a href='viewfitnesseq.php'>Details of Updated fitness equipment  </a>";
echo '<p style="color:#FF0000;">'.$info.'</p>';}
}else {
    
    
    
    
    ?>
       <body style="background-color:antiquewhite;text-align:center;color:sandybrown;">
    <div class="from-group">
    
    <div style="border:2px solid salmon;">
        <form action="editfeq.php" method="post">
            <input type="hidden" name="new" value="1"/>
        <label for="name">Fitness Equipment Name </label>
        <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
        <p><input type="text" name="name" placeholder="Enter Name" required value="<?php echo $row['name'];?>" /></p>
        <label for="price">Fitness Equipment Price </label>
        <p><input type="number" name="price" placeholder="Enter price here......" 
required value="<?php echo $row['price'];?>" /></p>

<label for="description">Fitness Equipment Description </label>
<p><input type="text" name="description " style="height:200px"placeholder="Enter description  :" required value="<?php echo $row['description'];?>" /></p>

<label for="image">Fitness Equipment Image </label>
<p><input type="file" name="image" required value="<?php echo $row['image'];?>" /></p>
<label for="moneytaryunit">Fitness Equipment Monetary unit</label><br>
        <select name="moneytaryunit"required value="<?php echo $row['moneytaryunit'];?>">
            <option value="dollars">$
            </option>
            <option value="vnd">VND</option>
            <option value="euro">€</option>
        </select><br>   
<p><input name="submit" type="submit" value="Update" /></p> 
          
        </form>
        <?php } ?>
        </div>
        </div>
    </body>
</html>