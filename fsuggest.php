<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
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
<html style="background-color:pink;color:olive">
<head>
    <h2> THis is some food suggestion for enhace weight fitness demand </h2>
    <link rel="stylesheet" href="css/1.css" />
</head>
<body>
<div>
<img src="img/food.jpg" alt="foodofw">
    <form action="fsuggest.php" method="post"style="border:2px solid olive;margin:10px 10px 10px 10px;padding:10px 10px 10px 10px;">
<label for="timeperday">Timeperday</label><br>
<input type ="number" name="timeperday" placeholder="Enter your time(per mintues) you have spend to do exercises per a day here........"  >
<br>
<input type="submit" value="Submit" name="submit"></input><br>
<?php

if(isset($_POST['submit'])){
    
    $timeperday=$_POST['timeperday'];
    if($timeperday>=60 && $timeperday >0){
        echo"The time you have spend per a day for doing exercises will decide which food are proper for your fitness demand ";
        echo "<div class='col-lg-8' style='border-bottom:2px solid #b69f57; margin-top:2%; height:auto;padding:10px 10px 10px 10px'><br>";
      ;
        echo "You have spend enough :$timeperday (mintues) a day for fitness ";
        echo"</div>";
        echo" <label for='calories'>Calories For Food Suggestion</label><br>
    <input type ='number' name='calories' placeholder='Enter (>=200).......'  ><br><input type='submit' value='Submit' name='assign'></input><br>";
    }else{
        echo'<p style="color:red; text-transform:uppercase;">Not enough time for a day for a fitness(to acheive enhance weight fitness demand)<br> ...Please spend more time for doing exercises to get food suggestion</p> ';
    }
}
if(isset($_POST['assign'])){
    $kq=1;
    $error=array();
    $calories=$_POST['calories'];
    
    if($calories>=200 && $calories<400){
        echo'<p style="text-align:center; text-transform:uppercase; background-color:lightblue; ">The list of food below: </p>';
   
        $db="SELECT *FROM food WHERE calories>200";
        $db_q=mysqli_query($con,$db);
       
    }else{
       echo'<p style="color:red; text-transform:uppercase;"> (NOTIFY)  There is no food proper for enhace weight fitness demand if you have entered ( the calories <200 )</p>';
      
        die ( mysqli_connect_error());
       
    }
    $db_q=mysqli_query($con,$db);
    if(mysqli_num_rows($db_q) >0){
         
        while($row=mysqli_fetch_array($db_q)){
            echo '<div class="row" style="border:2px solid #b69f57;margin-top:20px;" >';
		echo '<div class="col-lg-12" style="margin-top:2%;">';
		echo '<div class="col-lg-4"  style="margin-top:3%;">';
		echo '<img src="img/'.$row['image'].'" style="float:left; height:380px; width:320px;padding:0 20px 10px 10px;margin:10px 20px 10px 10px;"/>';
		echo '</div>';
		echo '<div class="col-lg-8" style=" margin-top:2%; height:auto;">';
        echo '<h4 class="attribute">F.No: </h4> <h4 class="description">'.$kq.'</h4>';
        echo '<h4 class="attribute">Name: </h4> <h4 class="description">'.$row['name'].'</h4>';
		echo '<h4 class="attribute">type: </h4> <h4 class="description">'.$row['type'].'</h4>';
        echo '<h4 class="attribute">Calories: </h4> <h4 class="description">'.$row['calories'].'</h4>';
       
        echo '<h4 class="attribute">NumofGram: </h4> <h4 class="description">'.$row['numofGram'].'</h4>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
        $kq++;}
}
}



?>
</form>
</div>



</body>


</html>