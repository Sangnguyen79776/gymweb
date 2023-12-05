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
$results="";
$VM="";
$PM="";
$BMR="";
$BMI="";

// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}


if (isset($_POST['calculate'])) {
$sex=$_POST['sex'];
$weight_current=$_POST['weight_current'];
$age=$_POST['age'];
$timeperday=$_REQUEST['timeperday'];
$height=$_POST['height'];
$fitnessdemand=$_POST['fitnessdemand'];
$fitnesslevel=$_POST['fitnesslevel'];
$weight_goal=$_POST['weight_goal'];
// check each conditions and cases to estimate each calories intake 
if($weight_current>=170 || $age< 18 || $height<153 || $timeperday>8|| $timeperday==0|| $age>=38){
   echo"your selected weight current is $weight_current / age is $age / height is $height / timeperday is $timeperday<br>";
    echo "PLease enter the website requirements for (weight_current <=170 /age >17 & age<38 /height>153 / timeperday <8 / timeperday!=0 )<br>";
    die(mysqli_connect_error());
}
if($weight_goal>=120 || $weight_current==$weight_goal){
    echo"Your selected values for the two weight data are not acceptable for the website requirements ";
}
switch($sex){
    case'female':
    $VM= (6.25*$height+10*$weight_current-5*$age-161);
	break;
	case 'male':
	$VM=(6.25*$height+10*$weight_current-5*$age+5);
	 break;
// calories intake without exercises to keep the weight current 
}
switch($sex){
    case'female':
    $PM= (9.99*$weight_current+6.25*$height-4.92*$age-161);
    break;
	case 'male':
	$PM=(9.99*$weight_current+6.25*$height-4.92*$age+5);
	 break;

// calories intake with doing exercises not daily  to keep the weight current 
}

switch($fitnesslevel){
    case'less':
       if($timeperday!=0 && $timeperday<=2){
    $BMR= ($PM*1.2);
    break;
}else{
    echo"Your selected timeperday is $timeperday that is not proper for the fitness level is $fitnesslevel..... Please enter again! ";
    die(mysqli_connect_error());
}
    case'medium':
        if($timeperday>2 && $timeperday <6){
    $BMR=($PM*1.35);
    break;}else{
        echo"You have selected the timeperday is $timeperday that is not acceptable for the fitness level is $fitnesslevel.....Try again!!";
        die(mysqli_connect_error());
    }

    case'hard':
        if($timeperday>=8){
            echo"the timeperday is $timeperday will not acceptable for the website requirements for the fitness level is $fitnesslevel.... Please enter again";

            die(mysqli_connect_error());
        } else{
    $BMR=($PM*1.9);
    break;
}
    }
// calories intake with each fitnesslevel per day   




switch($fitnessdemand){
    case'loss weight':
        if($weight_current>$weight_goal){
        $BMI=($BMR -500);
 
        break;}else{
        echo"Your selected weight current is $weight_current and weight_goal is $weight_goal are not acceptable for this case $fitnessdemand";
        die(mysqli_connect_error());}
    case'enahnce weight':
        if($weight_current<$weight_goal){  
        $BMI=($BMR +500);
       
        break;   }else{
            echo"Your selected weight current is $weight_current and weight_goal is $weight_goal are not acceptable for this case $fitnessdemand";
            die(mysqli_connect_error());
        }
}
// calories intake with each fitnessdemanad + fitnesslevel  per day   

}


?>

<!DOCTYPE html >
<html>
    <head>
        <h2>This is The Form of Calculator Calories Per day   </h2>
        <link rel="stylesheet" href="css/1.css" />
     
    </head>
    <body style="background-color:lightblue;color:olive;">
        
        <img src="img/calculator.jpg" alt="calculator" >
        <div style="border:2px solid lightblue; padding:20px 20px 20px 20px;text-align:center;">
<form action="calculate.php" method="post">
<label for="sex">Sex</label><br>
<select id="sex"name="sex">
    <option value="male">Male</option>
    <option value="female">Female</option>
</select><br>
<label for="fitnesslevel">Fitnesslevel</label><br>
<select id="fitnesslevel" name="fitnesslevel">
    <option value="less">Less</option>
    <option value="medium">Medium</option>
    <option value="hard">Hard</option>
</select><br>
<label for="height">Height</label><br>
<input type="number" class="form-control" name="height" min="150" max="190"placeholder="Enter your height here:  ..."required><br>
<label for="weight_current">Weight current </label><br>
<input type="number" class="form-control" name="weight_current" min="50" max="200"placeholder="Enter your weight_current here:  ..."required><br>

<label for="age">Age</label><br>
<input type="number" class="form-control" name="age" min="16" max="40" placeholder="Enter your age here:  ..."><br>
<label for="timeperday">Time per a day</label><br>
<input type="number" class="form-control" name="timeperday"min="0" max="10" placeholder="Enter your time that you will spend per a day for doing exercises here:  ..."notrequired><br >
<label for="fitnessdemand">Fitness demand</label><br>
<select id="fitnessdemand"name="fitnessdemand">
    <option value="loss weight">Loss weight</option>
    <option value="enhance weight">Enhance weight </option>
</select><br>
<label for="weight_goal">Weight_goal</label><br>
<input type="number" name="weight_goal"min="50" max="200" placeholder="Enter your weight_goal here......."required><br>
<input type="submit" id="btn" value="Calculate"name="calculate">
</div>
<div class="col-lg-8" style="border:2px solid #b69f57; height:auto;padding:10px 20px 20px 20px;margin:10px 10px 10px 20px;">
Calories Intake = <?php echo "This means that you need  roughly$VM calories intake per a day to maintain your current weight without no fitness ."?><br>
<div style="border-bottom:1px outset;margin-bottom:10px" ></div>
Calories Intake = <?php echo "This means that you need roughly $PM calories intake per a day to maintain your current weight if you have some activities   ."?><br>
<div style="border-bottom:1px outset;margin-bottom:10px" ></div>
Calories Intake = <?php echo "Your calories you should need per a day with your $fitnesslevel fitness level rate is : $BMR   ."?><br>
<div style="border-bottom:1px outset;margin-bottom:10px;" ></div>
Calories Intake = <?php echo "This means that you need roughly $BMI calories intake per a day with your $fitnessdemand fitnessdemand rate    ."?><br>
<div style="border-bottom:1px outset;margin-bottom:10px;" ></div>
</div>
</form>

        
    </body>
</html>