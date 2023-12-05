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
<html style="background-color:lightblue;color:brown">
<head>
    <h2 > THis is some food suggestion for loss weight fitness demand </h2>
    <link rel="stylesheet" href="css/assign.css" />
    </head>
    <body>
    
</head>
<body>

<img src="img/food.jpg" alt="foodofw">
            <div>
    <form action="foodsuggestion.php" method="post" style="border:2px solid brown;margin:10px 10px 10px 10px;padding:10px 10px 10px 10px;">
<label for="timeperday "style="text-align:center;">Timeperday</label><br>

<br>
<input type ="number" style="width:50%;"name="timeperday" placeholder="Enter your time(per mintues) you have spend to do exercises per a day here........"  >

<br>
<input type="submit" value="Submit" name="submit"></input><br>
<?php
 
if(isset($_POST['submit'])){

    $timeperday=$_POST['timeperday'];
    if($timeperday>=90 && $timeperday <480){
        echo"The time you have spend per a day for doing exercises will decide which food are proper for your fitness demand <br>";
        echo "<div class='col-lg-8' style='border-bottom:2px solid #b69f57; margin-top:2%; height:auto;padding:10px 10px 10px 10px;margin:0 20px 10px 10px;'>";
      
        echo "You have spend enough :$timeperday (mintues) a day for fitness <br>";
        echo"</div>";
        echo" <label for='calories'>Calories For Food Suggestion </label><br>
    <input type ='number' name='calories' placeholder='Enter (<=200).......'  ><br><input type='submit' value='Submit' name='assign'></input><br>";
}elseif($timeperday>=480){
    echo"The timeperday you have selected is too high for ($timeperday) mintues so the website does not recommend the extremly high training performance to suggest the proper food ";

}

else{
    echo'<p style="color:red; text-transform:uppercase;text-align:center;">Not enough time for a day for a fitness (to acheive the loss weight fitness demand) ...<br>Please spend more time for doing exercises to get food suggestion</p> ';
    }
   
}
if(isset($_POST['assign'])){
    $num=1;
    $error=array();
    $calories=$_POST['calories'];
    //check calories value to show the food suggestion 
    if(empty($calories)|| $calories==0){
        array_push($error,'calories is required');
        print_r($error) ;
    echo'<p style="text-transform:uppercase;color:red">(EROR MESSAGE) Please enter the calories (>0).......The calories you have enter will decide which food are proper for your fitness demand(loss weight) ......<br></p>';
        die ( mysqli_connect_error());

    }elseif($calories<=200){
      echo'<p style="text-align:center; text-transform:uppercase; background-color:orange; ">The list of food below: </p>';
        $db="SELECT *FROM food WHERE calories<200";
        $db_q=mysqli_query($con,$db);
       
  
       
    }
    else{
        echo"There is no proper foods for loss weight fitness demand if you have entered ( the calories >200 ) ";
        die ( mysqli_connect_error());
       
    }
    $db_q=mysqli_query($con,$db);
    if(mysqli_num_rows($db_q) >0){
         
        while($row=mysqli_fetch_array($db_q)){
            echo '<div class="row"style="border:2px solid #b69f57 ;margin-top:20px">';
		echo '<div class="col-lg-12" style="margin-top:2%;">';
		echo '<div class="col-lg-4"  style="margin-top:3%;">';
		echo '<img src="img/'.$row['image'].'" style="float:left; height:380px; width:320px;padding:0 20px 10px 10px ; margin:10px 10px 10px 10px;"/>';
		echo '</div>';
		echo '<div class="col-lg-8" style=" margin-top:2%; height:auto;">';
        echo '<h4 class="attribute">F.No: </h4> <h4 class="description">'.$num.'</h4>';
        echo '<h4 class="attribute">Name: </h4> <h4 class="description">'.$row['name'].'</h4>';
		echo '<h4 class="attribute">type: </h4> <h4 class="description">'.$row['type'].'</h4>';
        echo '<h4 class="attribute">Calories: </h4> <h4 class="description">'.$row['calories'].'</h4>';
       
        echo '<h4 class="attribute">NumofGram: </h4> <h4 class="description">'.$row['numofGram'].'</h4>';
        echo' <a class="active "href="sviewf.php?id= '.$row['id'].'">READ BLOG MORE </a>'; 
		echo '</div>';
		echo '</div>';
		echo '</div>';
        $num++;}
    
}
}




?>
</form>
</div>



</body>


</html>