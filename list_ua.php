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



?>
<html>
    <head>
<style>
    th{
        padding:10px 10px 10px 10px;
    }
    tr td{
        padding:10px 10px 10px 10px;
    }
    h1{
        text-align:center;
        color:brown;
        background-color:olive;
        padding:10px 10px 10px 10px;
    }
</style>
    </head>
   
    <body class="loggedin"style="background-color:lightblue;">
  
		<nav class="navtop">
			<div>
			<img src="img/browse-users.png" alt="usera"style="width:100%;height:300px;">
				<div >
                <a href="accountsm.php">User Accounts management |</a>
            <a href="foodmanagement.php">Food management |</a>
                <a href="exercisemanagement.php">Exercise management |</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
                
				<h1 > Details of users accounts are below: </h1></div>
				<table width="100%" border="1" style="border-collapse:collapse;height:300px;padding:10px 10px 10px 10px;">
                <thead>
<tr>
<th ><strong>S.No</strong></th>
<th><strong>Username</strong></th>
<th><strong>Password</strong></th>
<th><strong>Email</strong></th>
<th><strong>Phonenumber</strong></th>

<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>

                </thead>
<tbody>
<?php
$count=1;
$sel_query="SELECT * FROM accounts ORDER BY id desc;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td style="background-color:lightblue;"><?php echo $count; ?></td>
<td style="background-color:lightblue;"><?php echo $row["username"]; ?></td>
<td style="background-color:lightblue;"><?php echo $row["password"]; ?></td>
<td style="background-color:lightblue;"><?php echo $row["email"]; ?></td>
<td style="background-color:lightblue;"><?php echo $row["phonenumber"];?></td>



<td style="background-color:red;">
<a href="editu.php?id=<?php echo $row["id"]; ?>">Edit</a>
</td>
<td style="background-color:red;">
<a href="deleteu.php?id=<?php echo $row["id"]; ?>">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</table>
</tbody>
    </body>
</html>