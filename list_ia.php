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
 


?>		


<!DOCTYPE html>
<html style="background-color:blanchedalmond ;">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
<style>
	th{
		background-color: aqua;
	}
	h1{
		text-align:center;
		color:sandybrown;
	}
	img{
		width:100%;
		height:300px;
	}
</style>
</head>
<body>
<body class="loggedin">
		<nav class="navtop">
			<div>
			<img src="img/profile.png"alt="profile">
				<div style="text-align:center;padding-left:10px;" >
				<form action="list_ia.php"method="post">
					<a href="accountsm.php">User accounts management|</a>
            <a href="foodmanagement.php">Food management |</a>
                <a href="exercisemanagement.php">Exercise management |</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a><br>
				<div style="padding:10px 10px 10px 10px;border:2px solid brown;">
				<label for="usersex">Search user sex</label>
				<select name="sex">  
					 <option value="male">Male</option>
    				<option value="female">Female</option>
				</select>
	
	<button type="submit"name="assign">Search<i class="fa fa-search"></i></button><br>
	<div style="padding-top:10px;">
	<label for="userheight">Search by user height (Seacrch by Approximately values[->] )</label>
	<input type="number"name="height"placeholder="Enter your height you want to looking for....." style="width:300px;padding:10px 10px 10px 10px;"min="140" max="180" >
	<button type="submit"name="search">Search<i class="fa fa-search"></i></button><br></div>
	<div style="padding-top:10px;">
		<label for="NumofCaloBurned_goal">Search by user number of calo burn goal (Seacrch by Approximately values[->] )</label>
	<input type="number"name="NumofCaloBurned_goal"placeholder="Enter your numberofcaloburngoal you want to looking for....." style="width:300px;padding:10px 10px 10px 10px;"min="0" max="4000" >
	<button type="submit"name="lists">Search<i class="fa fa-search"></i></button><br></div>
	<?php
if(isset($_POST['lists'])){
		$c=1;
		$NumofCaloBurned_goal=$_POST['NumofCaloBurned_goal'];
		if($NumofCaloBurned_goal==0 || $NumofCaloBurned_goal<1000){
			echo'<p style="background-color:red;text-transform:uppercase;padding:10px 10px;">';
			echo"no matching information you looking for if you have entered the values of (0 or <1000) into...!";
			echo'</p>';
			die(mysqli_connect_error());

		}elseif($NumofCaloBurned_goal>=1000 && $NumofCaloBurned_goal<=1500){
			echo'<p style="text-align:center; text-transform:uppercase; background-color:orange; ">The list of users information  below: </p>';
			$val_d="SELECT *FROM users WHERE NumofCaloBurned_goal<1500";
			$val_s=mysqli_query($con,$val_d);

		}elseif($NumofCaloBurned_goal>1500 && $NumofCaloBurned_goal<3100){
			echo'<p style="text-align:center; text-transform:uppercase; background-color:orange; ">The list of users information selected NumofCaloBurned_goal by your approximately values of '.$NumofCaloBurned_goal.' below: </p>';
			$val_d="SELECT *FROM users WHERE NumofCaloBurned_goal>1500";
			$val_s=mysqli_query($con,$val_d);

		}else{
			echo'<p style="background-color:red;text-transform:uppercase;padding:10px 10px;">';
			echo"(ERROR MSG) The website does not allow for trainer who have decide to train more than 3100 calories burn per a day!<br> please enter again!";
			echo'</p>';
			die(mysqli_connect_error());
		}
		$val_s=mysqli_query($con,$val_d);
		if(mysqli_num_rows($val_s) >0){
			while($row=mysqli_fetch_array($val_s)){
			echo '<div class="row" style="border:2px solid #b69f57; margin-bottom:10px;padding-right:90px;">';
			echo '<div class="col-lg-12" style="margin-top:2%;">';
			echo '<div class="col-lg-4"  style="margin-top:3%;">';
			echo '<h4 class="attribute">User.No:  '.$c.'</h4>';
			echo '<h4 class="attribute">User.Height: '.$row['height'].'</h4>';
			echo '<h4 class="attribute">User.weight_current: '.$row['weight_current'].'</h4>';
			echo '<h4 class="attribute">User.weight_goal: '.$row['weight_goal'].'</h4>';
			echo '<h4 class="attribute">User.age: '.$row['age'].'</h4>';
			echo '<h4 class="attribute">User.sex: '.$row['sex'].'</h4>';
			echo '<h4 class="attribute">User.NumofCaloBurned_goal: '.$row['NumofCaloBurned_goal'].'</h4>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			   $c++;}
			}
	}
		if(isset($_POST['search'])){
			$count=1;

			$height=$_POST['height'];
			
		if($height>=150 && $height<160){
			echo'<p style="text-align:center; text-transform:uppercase; background-color:lightblue; ">The list of users information  below: </p>';
   
			$s="SELECT *FROM users WHERE height<160";
	
		$q=mysqli_query($con,$s);
			
			
		}elseif($height>=160 && $height<=170 ){
			echo'<p style="text-align:center; text-transform:uppercase; background-color:lightblue; ">The list of users information below: </p>';
			$s="SELECT *FROM users WHERE height<170";
			$q=mysqli_query($con,$s);

		}elseif($height>170 && $height<=180){
			echo'<p style="text-align:center; text-transform:uppercase; background-color:lightblue; ">The list of users information below: </p>';
			$s="SELECT *FROM users WHERE height>170";

			$q=mysqli_query($con,$s);
		}else{
			echo"No matching information ";
			die(mysqli_connect_error());
		}
		$q=mysqli_query($con,$s);
		if(mysqli_num_rows($q) >0){
			while($row=mysqli_fetch_array($q)){
			echo '<div class="row" style="border:2px solid #b69f57; margin-bottom:10px;padding-right:90px;">';
			echo '<div class="col-lg-12" style="margin-top:2%;">';
			echo '<div class="col-lg-4"  style="margin-top:3%;">';
			echo '<h4 class="attribute">User.No:  '.$count.'</h4>';
			echo '<h4 class="attribute">User.Height: '.$row['height'].'</h4>';
			echo '<h4 class="attribute">User.weight_current: '.$row['weight_current'].'</h4>';
			echo '<h4 class="attribute">User.weight_goal: '.$row['weight_goal'].'</h4>';
			echo '<h4 class="attribute">User.age: '.$row['age'].'</h4>';
			echo '<h4 class="attribute">User.sex: '.$row['sex'].'</h4>';
			echo '<h4 class="attribute">User.NumofCaloBurned_goal: '.$row['NumofCaloBurned_goal'].'</h4>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			   $count++;}
			}
		}
		if(isset($_POST['assign'])){
			$return=1;
			$sex=$_POST['sex'];
		
			if($sex=='male'){
				echo'<p style="text-transform:uppercase;color:brown;background-color:lightblue;">The list of users selected by '.$sex.' is:</p>';
		
				$dbq="SELECT *FROM users WHERE sex='male'";
		
			}
			if($sex=='female'){
				echo'<p style="text-transform:uppercase;color:brown;background-color:lightblue;">The list of users selected by '.$sex.' is:</p>';
				$dbq="SELECT *FROM users WHERE sex='female'";
			}else{$query="SELECT *FROM users ";}
			$db_q=mysqli_query($con,$dbq);
		if(mysqli_num_rows($db_q) >0){
			while($row=mysqli_fetch_array($db_q)){
			
			echo '<div class="row" style="border:2px solid #b69f57; margin-bottom:10px;padding-right:90px;">';
			echo '<div class="col-lg-12" style="margin-top:2%;">';
			echo '<div class="col-lg-4"  style="margin-top:3%;">';
			echo '<h4 class="attribute">User.No:  '.$return.'</h4>';
			echo'<h4 class="attribute">User.Sex : '.$sex.'</h4>';
			echo '<h4 class="attribute">User.Height: '.$row['height'].'</h4>';
			echo '<h4 class="attribute">User.weight_current: '.$row['weight_current'].'</h4>';
			echo '<h4 class="attribute">User.weight_goal: '.$row['weight_goal'].'</h4>';
			echo '<h4 class="attribute">User.age: '.$row['age'].'</h4>';
			echo '<h4 class="attribute">User.NumofCaloBurned_goal: '.$row['NumofCaloBurned_goal'].'</h4>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
		
			$return++;}
			
			}
			
		}
		
		
		
		?>
		</div>
				<h1 style="text-align:center;"> Details of User information are below: </h1>
				<table width="100%" border="1" style="border-collapse:collapse;height:200px;">
                <thead>
<tr>
<th ><strong>S.No</strong></th>

<th><strong>User Height</strong></th>
<th><strong>User weight_current</strong></th>
<th><strong>User weight_goal</strong></th>
<th><strong>User Sex</strong></th>
<th><strong>User Age</strong></th>
<th><strong>User NumofCaloBurn_Goal</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
                </thead>
<tbody>
<?php
$count=1;
$sel_query="SELECT * FROM users ORDER BY id desc;";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td style="background-color:lightblue;"><?php echo $count; ?></td>
<td style="background-color:lightblue;"><?php echo $row["height"]; ?></td>
<td style="background-color:lightblue;"><?php echo $row["weight_current"]; ?></td>
<td style="background-color:lightblue;"><?php echo $row["weight_goal"]; ?></td>
<td style="background-color:lightblue;"><?php echo $row["sex"];?></td>
<td style="background-color:lightblue;"><?php echo $row["age"];?></td>
<td style="background-color:lightblue;"><?php echo $row["NumofCaloBurned_goal"];?></td>

<td style="background-color:red;">
<a href="edituserinfo.php?id=<?php echo $row["id"]; ?>">Edit</a>
</td>
<td style="background-color:red;">
<a href="deleteuserinfo.php?id=<?php echo $row["id"]; ?>">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</form>
			</div>
		</nav>
		
	</body>



                </html>