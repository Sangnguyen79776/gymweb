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
$error=array();
if(isset($_POST['new']) && $_POST['new']==1){
    $name=mysqli_real_escape_string($con, $_POST['name']);if(empty($name)){array_push($error,"Fitness Equipment name is required");}
    $price=mysqli_real_escape_string($con, $_POST['price']);if(empty($price)){array_push($error,"Fitness Equipment price is required");}
    $image=mysqli_real_escape_string($con, $_POST['image']);if(empty($image)){array_push($error,"Fitness Equipment image is required");}
    $description=mysqli_real_escape_string($con, $_POST['description']);if(empty($description)){array_push($error,"Fitness Equipment description is required");}
$m_unit=mysqli_real_escape_string($con,$_POST['moneytaryunit']);if(empty($m_unit)){array_push($error,"Fitness equipment moneytary unit is required");}
$sql="SELECT *FROM equipments where name='$name' OR image='$image' OR description='$description'";
$query=mysqli_query($con,$sql);
$u= mysqli_fetch_assoc($query);
if($u){
    if($u['name']===$name){
        array_push($error,'Fitness equipment name is already exist.....! Please enter again...');
    }
    if($u['image']===$image){
        array_push($error,'Fitness equipment image is already exist.....! Please enter again...');
    }
    if($u['description']===$description){
        array_push($error,'Fitness equipment description is already exist.....! Please enter again...');
    }
}



    if(count($error)==0){
      
        switch($m_unit){
            case'vnd':
                if($price<1000 || $price==0){
                    echo"your selected price is $price is not proper for your moneytary unit is $m_unit<br>";
                    echo"Failed to add the new fitness equipment!....";
                  
                  die(mysqli_connect_error());
                }else{
                   
                    $add="INSERT INTO equipments(name,price,image,description,moneytaryunit) VALUES('$name','$price','$image','$description','$m_unit')";
                }
                case'dollars':
                    if($price!=0){
                        $add="INSERT INTO equipments(name,price,image,description,moneytaryunit) VALUES('$name','$price','$image','$description','$m_unit')";
                    }
                case'euro':
                    if($price!=0){
                        $add="INSERT INTO equipments(name,price,image,description,moneytaryunit) VALUES('$name','$price','$image','$description','$m_unit')";
                    }

        }

    $kq=mysqli_query($con,$add);
if($kq){
    echo"You have been added the new fitness equipment into";
    header('location:viewfitnesseq.php');
}else{
    echo"Failed to add the new fitness equipment";
}
}else{
    print_r($error);
    echo"Failed to add! Please enter again......    ";
}




}
?>
<html>
    <head>
<meta charset="utf-8" />
		
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet"  href="css/1.css" />
        <style>
            input[type=datetime-local],select[name=moneytaryunit]{
                width:50%;
                padding:10px 10px;
            }
        </style>
	
       <h2 style="color:sandybrown;">Add New Fitness Equipments Form</h2>
    </head>
    <body style="background-color:antiquewhite;color:sandybrown;padding:10px 10px;">
 
    <div class="from-group" style="text-align:center;  background-color:blanchedalmond">
    <img src="img/gymep.jpg" alt="foodofw" style="width:100%;height:300px;">
    <div style="padding:10px 10px"><a href="adminhomepage.php">Admin homepage|</a>
    <a href="viewfitnesseq.php">List of fitness equipments|</a><br></div>
    <div style="border:2px solid pink;margin-top:10px">
        <form action="addeq.php" method="post">
    
            <input type="hidden" name="new" value="1"/>
        <label for="name"style="color:sandybrown;">Fitness equipment name</label><br>
        <input type="text" class="form-control" name="name" placeholder="Enter the fitness equipment name  here:  ..."><br>
        <label for="moneytaryunit">Monetary unit</label><br>
        <select name="moneytaryunit">
            <option value="dollars">$
            </option>
            <option value="vnd">VND</option>
            <option value="euro">€</option>
        </select><br>   
        <label for="price"style="color:sandybrown;">Fitness equipment price </label><br>
        <input type="number" class="form-control" name="price" placeholder="Enter the Fitness equipment price here:  ..."><br>
    
        <p><label for="image"style="color:sandybrown;">Fitness equipment image</label><br>
        <input type="file" class="form-control" name="image" ><br></p>
        
        <label for="description"style="color:sandybrown;">Fitness equipment description</label><br>
        <input type="text" class="form-control" name="description" style="height:200px"placeholder="Enter the Fitness equipment description  here:  ..."><br>
        <input type="submit" name="submit"value="Submit">
    </form>
    </div>
    </div>
    </body>
    </html>