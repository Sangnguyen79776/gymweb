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

if(isset($_POST['users'])){
    
    $sex = mysqli_real_escape_string($con, $_REQUEST['sex']);
    $height = mysqli_real_escape_string($con, $_REQUEST['height']);
    $weight_current = mysqli_real_escape_string($con, $_REQUEST['weight_current']);
    $age = mysqli_real_escape_string($con, $_REQUEST['age']);
    $weight_goal = mysqli_real_escape_string($con, $_REQUEST['weight_goal']);
    $NumofCaloBurned_goal=mysqli_real_escape_string($con,$_REQUEST['NumofCaloBurned_goal']);
    $timeperday=mysqli_real_escape_string($con,$_REQUEST['timeperday']);
    $fitnesslevel=mysqli_real_escape_string($con,$_REQUEST['fitnesslevel']);
    $fitnessdemand=mysqli_real_escape_string($con,$_REQUEST['fitnessdemand']);

    ///print info
    echo'<div style="border:2px solid lightblue;padding:15px 15px 15px 15px;margin:10px 10px 10px 10px">';
   
     echo '<p style="text-transfrom:uppercase;background-color:lightblue;;text-align:center;">Your member workout information  details are assign will show below:</p>';
    echo'<div style="border:1px solid brown;padding:10px 10px 10px 10px;">';
    echo "<p>--------------------------------------------------------------</p>";
    echo "<p>Your sex is: $sex</p>";
 echo "<p>Your height is: $height</p>";
  echo "<p>Your weight_current is: $weight_current</p>";
    echo "<p>Your weight you want to acheive is : $weight_goal</p>";
   echo "<p>Your age: $age</p>";
    echo "<p>Your fitnesslevel(the level you keep doing exercises per week ) is: $fitnesslevel</p>";
     echo "<p>Your timeperday(hours) that you will spend per a day for doing workout : $timeperday</p>";
     echo "<p>Your fitness demand is: $fitnessdemand</p>";
     echo "<p>Your number of caloburn you want to acheive per a day by fitness is : $NumofCaloBurned_goal</p>";
     echo "<p>--------------------------------------------------------------</p>";
     echo'</div>';
     echo'</div>';
     //check cases and print the proper link depend on fitness demand
     
   if($age<18){
    echo'<p style="color:red;text-align:center;text-transform:uppercase;">';
    echo"your age is too young to do the physical exercises, Please enter again (>=18)<br>";
    echo"The website required the trainer who have equal to 18 or more than to get the proper exercise page for their chosen fitness demand";
    echo'</p>';
    die(mysqli_connect_error());

   }
   elseif($age>38){
    echo"your age is not good for doing the hard physical exercises...... It will cause some injuries during your training.... Be carefull!<br>";
    echo"To get the proper exercise page based on your chosen fitness demand.... The website not recommend the higher age (>38)<br> ";
    echo"Please enter the age (<=38)";
    die(mysqli_connect_error());
   }else{
 
    $insert="INSERT INTO users(sex,height,weight_current,age,weight_goal,NumofCaloBurned_goal) VALUES('$sex','$height','$weight_current','$age','$weight_goal','$NumofCaloBurned_goal')";
   }
   if($height<=153){
    echo"your height is not acceptable to do the physical exercises.....<br>";
    echo"The website required the minimum of user height is 153 to get the proper exercise page based on your chosen fitness demand.... <br>Please enter again! ";
    die(mysqli_connect_error());
   }
   elseif($height>190){
    echo"the values of height you have enter is not acceptable..<br>  ";
    echo"The website only required the maximum of user height is 190 to get the proper exercise page based on your chosen fitness demand.... <br>Please enter again! ";
    die(mysqli_connect_error());

   }else{
    $insert="INSERT INTO users(sex,height,weight_current,age,weight_goal,NumofCaloBurned_goal) VALUES('$sex','$height','$weight_current','$age','$weight_goal','$NumofCaloBurned_goal')";
   }
   if($NumofCaloBurned_goal>3100){
    echo"The website does not reccomend the number of calories will burn per training for the trainer more than 3100 per a day ... 
    <br>So you need to be carefully entered the right number into a form to get the proper exercise page ...<br>";
    echo"PLease enter again!";
    die(mysqli_connect_error());
   }else{
    $insert="INSERT INTO users(sex,height,weight_current,age,weight_goal,NumofCaloBurned_goal) VALUES('$sex','$height','$weight_current','$age','$weight_goal','$NumofCaloBurned_goal')";
   }
   if($timeperday>=8){
    echo"the time per a day you will spend is too much for a training ...<br>....
    The website does not reccomend this value for equal or more than 8 hours per day for training....<br>
    Please enter again!";
    die(mysqli_connect_error());
   }
   if($weight_goal>100 || $weight_current>=170){
    echo"Your selected weight_goal is $weight_goal 
    OR Your weight current selected is $weight_current that not acceptable to get the proper exercise page!<br> 
    Please enter again(weight_goal <=100 AND weight_current<=170)";
    die(mysqli_connect_error());
   }
     switch($fitnesslevel){
        case'less':
            if($timeperday==0){
                echo"Your selected timeperday:$timeperday is not acceptable for your selected fitness level :$fitnesslevel........Try to enter again<br>";
                die(mysqli_connect_error());
              
            }elseif($timeperday>=1 && $timeperday<3){
                echo"Your selected timeperday:$timeperday is acceptable for your selected  fitness level: $fitnesslevel<br>";
                $insert="INSERT INTO users(sex,height,weight_current,age,weight_goal,NumofCaloBurned_goal) VALUES('$sex','$height','$weight_current','$age','$weight_goal','$NumofCaloBurned_goal')";
                break;
            }else{
                echo"Your selected timeperday :$timeperday is not acceptable for this fitness level is : $fitnesslevel......Try to enter again<br>";
                die(mysqli_connect_error());
              
            }  
            case'medium':
                if($timeperday>=3 && $timeperday<6){
                    echo"Your selected timeperday is $timeperday that is acceptable for your selected fitness level is $fitnesslevel<br>";
                    $insert="INSERT INTO users(sex,height,weight_current,age,weight_goal,NumofCaloBurned_goal) VALUES('$sex','$height','$weight_current','$age','$weight_goal','$NumofCaloBurned_goal')";
                    break;
                }else{
                    echo"Your selected timeperday is $timeperday that is not acceptable for the fitness level is $fitnesslevel<br>";
                    die(mysqli_connect_error());
                    
                }
                case'hard':
                    if($timeperday>=6){
                        echo"Your selected timeperday is $timeperday that is acceptable for your selected fitness level is $fitnesslevel<br>";
                        $insert="INSERT INTO users(sex,height,weight_current,age,weight_goal,NumofCaloBurned_goal) VALUES('$sex','$height','$weight_current','$age','$weight_goal','$NumofCaloBurned_goal')";
                    }else{
                        echo"Your selected timeperday is $timeperday that is not acceptable for the fitness level is $fitnesslevel<br>";
                    die(mysqli_connect_error());
                    }
                } 
                 
   
     switch($fitnessdemand){
        case'loss weight':
            if($weight_current>$weight_goal){
                $insert="INSERT INTO users(sex,height,weight_current,age,weight_goal,NumofCaloBurned_goal) VALUES('$sex','$height','$weight_current','$age','$weight_goal','$NumofCaloBurned_goal')";
                echo"Here is the page for your selected fitness demand is ($fitnessdemand)......Please click the link : ";

           echo'<a href="choosingexforlossweight.php"style="padding:10px 10px 10px 10px;">For loss weight fitness demand </a>';
        
           break;
            }
        case'enhance weight':
            
            if($weight_current<$weight_goal){
                $insert="INSERT INTO users(sex,height,weight_current,age,weight_goal,NumofCaloBurned_goal) VALUES('$sex','$height','$weight_current','$age','$weight_goal','$NumofCaloBurned_goal')";
                echo"Here is the page for your selected fitness demand is ($fitnessdemand) ......Please click the link : ";
                echo'<a href="choosingexforenhancew.php"style="padding:10px 10px 10px 10px;">For enhance weight fitness demand </a>';
         
            break;  
    }else{
        echo'<p style="text-align:center;text-transform:uppercase;background-color:red;">(ERROR MESSAGE)<br>The weight current and the weight goal you have entered is not accepted for the fitness demand : loss/ enhance weight... Please enter again </p>  ';
            die(mysqli_connect_error());
    }
}    




$kq=mysqli_query($con,$insert) ;

                        $add="SELECT  CONCAT(users.height,users.weight_current,users.weight_goal,users.sex,users.age,users.NumofCaloBurned_goal) 
                        AS accounts.username,accounts.email,accounts.phonenumber,users.height,user.weight_current,users.weight_goal,users.sex,users.age,users.NumofCaloBurned_Goal
                        
                        FROM users INNER JOIN accounts ON users.id=accounts.id";
                        $kq=mysqli_query($con,$add); 


    if(mysqli_num_rows($kq)>0){
        while($q=mysqli_fetch_array($kq)){
            if($_SESSION['id']===$id){
            echo'<h4>Name:'.$q['username'].'</h4>';
            echo '<h4>Email:'.$q['email'].'</h4>';
            echo'<h4>Phonenumber:'.$q['phonenumber'].'</h4>';
            echo'<h4>User height:'.$q['height'].'</h4>';
            echo'<h4>User weight current:'.$q['weight_current'].'</h4>';
            echo'<h4>User weight goal:'.$q['weight_goal'].'</h4>';
            echo'<h4>User sex:'.$q['sex'].'</h4>';
            echo'<h4>User age:'.$q['age'].'</h4>';
            echo'<h4>User NumofCaloBurned_goal:'.$q['NumofCaloBurned_goal'].'</h4>';
            }




        }
        }
    }




?>
<!DOCTYPE html >
<html style="border:2px solid olive; padding:20px 20px 20px 20px;text-align:center;background-color:lightblue;color:olive;">
    <head>
        <h2 >Providing some information before fitness form  </h2>
        <link rel="stylesheet" href="css/1.css" />
    </head>
    <body >
        <div>
        <img src="img/banner.jpg" alt="bannerofwebsite">
        
        <div >
            <form action="assignpersonalinfo.php" method="post">
<label for="sex" >Sex</label><br>
<select id="sex" name="sex" required>
    <option value="male">Male</option>
    <option value="female">Female</option>
</select><br>
<label for="fitnesslevel">Fitnesslevel</label><br>
<select id="fitnesslevel" name="fitnesslevel" required>
    <option value="less">Less</option>
    <option value="medium">Medium</option>
    <option value="hard">Hard</option>
</select><br>
<label for="height">Height</label><br>
<input type="number" class="form-control" name="height" min="150" max="200" placeholder="Enter your height here:  ..."required><br>
<label for="weight_current">Weight current </label><br>
<input type="number" class="form-control" name="weight_current" min="50" max="200"placeholder="Enter your weight_current here:  ..." required><br>
<label for="weight_goal">Weight goal </label><br>
<input type="number" class="form-control" name="weight_goal" min="50" max="200" placeholder="Enter your weight_goal here:  ..."required><br>
<label for="age">Age</label><br>
<input type="number" class="form-control" name="age"min="16" max="40" placeholder="Enter your age here:  ..."required><br>
<label for="timeperday">Time per a day</label><br>
<input type="number" class="form-control" name="timeperday" min ="0" max="10"placeholder="Enter your time that you will spend per a day for doing exercises here:  ..."required><br>
<label for="fitnessdemand">Fitness demand</label><br>
<select id="fitnessdemand"name="fitnessdemand" required >
    <option value="loss weight">Loss weight</option>
    <option value="enhance weight">Enhance weight </option>
</select><br>
<label for="NumofCaloBurned_goal">NumofCaloBurned_goal  </label><br>
<input type="number" class="form-control" name="NumofCaloBurned_goal" min="1000" max ="4000" placeholder="Enter your number of calo you want to burn per day by fitness here:  ..."required><br>
<input type="submit"id="btn"    name="users">   </input><br>
</div >
<div class="col-lg-8" style="border:2px solid lightblue; margin:10px 10px 10px 10px; height:auto;padding:10px 10px 10px 10px;">
If you want to return back to user homepage...... Please click the link here? <a href="homepage.php"style="padding:10px 10px 10px 10px;">User Home Page </a><br>
 
If you want to estimate the calories you should intake per a day ........Please click here ? <a class="active" href="calculate.php"style="padding:10px 10px 10px 10px;">Caluculator Calories Form  </a> <br>
<?php echo "----------------------------------------------------------------"?>
</div>

</form>

        </div>
        
    </body>
</html>
