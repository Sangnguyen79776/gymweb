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
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}


$img_details=mysqli_query($con,"SELECT *FROM food");
while($row=mysqli_fetch_array($img_details)){
  
}
?>
<!DOCTYPE html>
<html style="background-color:blanchedalmond ;">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
<style>
	img{
		width:100%;
		height:200px;
	}
	th{
		background-color: aqua;
	}
	h1{
		text-align:center;
		color:sandybrown;
	}
</style>
</head>
<body>
<body class="loggedin">
		<nav class="navtop">
			<div>
			<div >
			<img src="img/food.jpg" alt="foodofw" >
            <a href="foodmanagement.php">Food management |</a>
                <a href="exercisemanagement.php">Exercise management |</a>
				
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
				
                
				<h1> Details of food are below: </h1></div>
				<table width="100%" border="1" style="border-collapse:collapse;">
                <thead>
<tr>
<th><strong>S.No</strong></th>
<th><strong>Name</strong></th>
<th><strong>Type</strong></th>
<th><strong>Calories</strong></th>
<th><strong>NumofGram</strong></th>
<th><strong>Image</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="SELECT * FROM food ORDER BY id desc;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td style="background-color:lightblue;"><?php echo $count; ?></td>
<td style="background-color:lightblue;"><?php echo $row["name"]; ?></td>
<td style="padding-left:10px; width:30%;background-color:lightblue;"><?php echo $row["type"]; ?></td>
<td style="background-color:lightblue;"><?php echo $row["calories"]; ?></td>

<td style="background-color:lightblue;"><?php echo $row["numofGram"]; ?></td>
<td ><?php echo "<img src ='img/".$row['image']."'>"?></td>
<td style="background-color:red;">
<a href="editfood.php?id=<?php echo $row["id"]; ?>">Edit</a>
</td>
<td style="background-color:red;">
<a href="deletefood.php?id=<?php echo $row["id"]; ?>">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>

			</div>
		</nav>
		
	</body>


                </html>