
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
<html>
   <head>

	<h2 >This is some exercise for loss weight fitness demand Page </h2>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/ex.css">
    <link rel="stylesheet" href="css/assign.css">
   
    </head>
    <body style="background-color:lightblue;color:brown;">
    <div class="container">
    <img src="img/bofpex.png" alt="bannerofwebsite" >
            <div class="text-block">
                <h4>
                    Gym Website
                </h4>
                <p> Welcome to visit our website </p>
                If you want to estimate the calories  intake ......Please click here? <a class="active" href="calculate.php">Calculator Calories Form</a>
            </div>
        </div>
        
        <h2 >Exercise categories List</h2>
        <div style="border:2px solid brown;padding:10px 10px 10px 10px;margin:10px 10px 10px 10px ">
        <p>There are 2 function of search that demonstrating below: </p>

                    <form action="choosingexforlossweight.php" method="post">
                        <label for="cat_ex" >Categories of fitness</label>
                        <select id="cat_ex" name="category">
                            <option value="warmupex">
                                Warmingup 
                            </option>
                            <option value="stretchingex">
                            Stretching 
                            </option>
                            <option value="wfex">
                            Weightlifting exercises
                            </option>
                            <option value="w_wfex">
                            Without Weightlifting exercises
                            </option>
                            <option value="cardio">
                           Cardio
                            </option>
                        </select>
                     
                       
                     
                     
                     
                     
                     
                     
                      
                          


                        
                        <button type="submit"name="search">Search<i class="fa fa-search"></i></button><br>
                        
                        <label for="level">Category level</label>
                       <select id="level" name="type" style="margin-top:20px;">
                        <option value="easy">
                            Easy
                        </option>
                        <option value="tb">
                            Medium
                        </option>
                        <option value="hard">Hard</option>
                       






                       </select>
                       <button type="submit"name="assign">Search<i class="fa fa-search"></i></button><br>
                       
                       </div>
                      
                                               <div class="col-md-4" style="margin-top:10px;">

      <br>
      
       
<?php

if(isset($_POST['search'])){
    $return=1;
    $category=$_POST['category'];
    if($category=='wfex'){
        echo'<p style="background-color:salmon;padding:10px 10px 10px 10px;color:brown;">Notify: You have select category of exercise is: '.$category.'   .......There are some exercises below:</p>';
        $query="SELECT *FROM exercise WHERE category='Weightlifting exercises'";
       
}elseif($category=='cardio'){
    echo'<p style="background-color:pink;padding:10px 10px 10px 10px;color:brown;">Notify: You have select category of exercise is: '.$category.'   .......There are some exercises below:</p>';
    $query="SELECT *FROM exercise WHERE category='Cardio'";

}elseif($category=='warmupex'){
    echo'<p style="background-color:olive;padding:10px 10px 10px 10px;color:purple;">Notify: You have select category of exercise is: '.$category.'   .......There are some exercises below:</p>';
    $query="SELECT *FROM exercise WHERE category='warmingup'";
}elseif($category=='w_wfex'){
    echo'<p style="background-color:aqua;padding:10px 10px 10px 10px;color:orange;">Notify: You have select category of exercise is: '.$category.'   .......There are some exercises below:</p>';
    $query="SELECT *FROM exercise WHERE category='Without weightlifting exercises'";
}
elseif($category=='stretchingex'){
    echo'<p style="background-color:orange;padding:10px 10px 10px 10px;color:blue;">Notify: You have select category of exercise is: '.$category.'   .......There are some exercises below:</p>';
    $query="SELECT *FROM exercise WHERE category='stretching'";
}
else{$query="SELECT *FROM exercise ";}
    
$db_q=mysqli_query($con,$query);
    if(mysqli_num_rows($db_q) >0){
         
        while($row=mysqli_fetch_array($db_q)){
            echo '<div class="row" style="border:2px solid #b69f57; margin-bottom:10px;>';
		echo '<div class="col-lg-12" style="margin-top:2%;">';
		echo '<div class="col-lg-4"  style="margin-top:3%;">';
		echo '<img src="img/'.$row['image'].'" style="float:left; height:300px; width:320px;border-right:1px solid black ; margin:10px 10px 10px 10px;padding:10px 10px 10px 10px ;""/>';
		echo '</div>';
		echo '<div class="col-lg-8" style=" margin-top:2%; height:auto;">';
        echo '<h4 class="attribute">Ex.No: '.$return.'</h4>';
        echo '<h4 class="attribute">Name of exercise : '.$row['name'].'</h4>';
		echo '<h4 class="attribute">Exercise instruction: '.$row['instruction'].'</h4>';
        echo '<h4 class="attribute">Exercise category: '.$row['category'].'</h4>';
       
        echo '<h4 class="attribute">Calories estimate per 1 time (reps) training :'.$row['calories'].'</h4>';
        echo '<h4 class="attribute">Type(easy/medium/hard): '.$row['type'].'</h4>';
        echo '<h4 class="attribute">Quantity(0->5): '.$row['quantity'].'</h4>';
        echo '<h4 class="attribute"style="padding-left:350px;">Reps(8->30): '.$row['reps'].'</h4>';
        echo' <a class="active "href="singleview.php?id= '.$row['id'].'">READ MORE </a>'; 
		echo '</div>';
		echo '</div>';
		echo '</div>';
        $return++;}
        
        }
    
    } 
   
   
    if(isset($_POST['assign'])) {
        $count=1; 
        $type=$_POST['type'];
        if($type =='easy'){ 
            echo'<p style="background-color:salmon;padding:10px 10px 10px 10px;color:brown;">Notify: You have select type of exercise is: '.$type.'   .......There are some exercises below:</p>';
            $key="SELECT *FROM exercise WHERE type='easy'";
        }elseif($type=='tb'){
            echo'<p style="background-color:olive;padding:10px 10px 10px 10px;color:blue;">Notify: You have select type of exercise is: '.$type.'   .......There are some exercises below:</p>';
            $key="SELECT *FROM exercise WHERE type='medium'";
        }elseif($type=='hard'){
            echo'<p style="background-color:aqua;padding:10px 10px 10px 10px;color:orange;">Notify: You have select type of exercise is: '.$type.'   .......There are some exercises below:</p>';
            $key="SELECT *FROM exercise WHERE type='hard'";
        }else{
            $key="SELECT *FROM exercise ";
        }
        $kq=mysqli_query($con,$key);
        if(mysqli_num_rows($kq) >0){
             
            while($row=mysqli_fetch_array($kq)){

               echo '<div class="row" style="border:2px solid #b69f57; margin-bottom:10px;>';
            echo '<div class="col-lg-12" style="margin-top:2%;">';
            echo '<div class="col-lg-4"  style="margin-top:3%;">';
            echo '<img src="img/'.$row['image'].'" style="float:left; height:300px; width:320px;border-right:1px solid black ; margin:10px 10px 10px 10px;padding:10px 10px 10px 10px ;"/>';
            echo '</div>';
         
            echo '<div class="col-lg-8" style=" margin-top:2%; height:auto;">';
            echo '<h4 class="attribute">EX.No:'.$count.'</h4>';
            echo '<h4 class="attribute">Name of exercise: '.$row['name'].'</h4>';

            echo '<h4 class="attribute">Exercise instruction: '.$row['instruction'].'</h4>';
            echo '<h4 class="attribute">Exercise category : '.$row['category'].'</h4>';
           
            echo '<h4 class="attribute">Calories estimated per 1 time (reps) training  :'.$row['calories'].'</h4>';
            echo '<h4 class="attribute">Type of exercise(easy/medium/hard): '.$row['type'].'</h4>';
            echo '<h4 class="attribute">Quantity(0->5): '.$row['quantity'].'</h4>';
            echo '<h4 class="attribute"style="padding-left:350px;">Reps(8->30): '.$row['reps'].'</h4>';
            echo' <a class="active "href="singleview.php?id= '.$row['id'].'">READ MORE </a>'; 
            echo '</div>';
            echo '</div>';
            echo '</div>';
            $count++;}
            
            }

              }
              echo '<div class="col-lg-8" style="border:2px solid #b69f57; margin-top:2%; height:auto;padding:10px 10px 10px 10px;">';
              echo' <p >Here is the food page link <a class="active" style="padding:10px 10px 10px 10px"href="foodsuggestion.php">Food suggesstion for loss weight fitness demand </a></p>';
              
          echo'</div>';


         ?>
   <tr>
    
   </tr>


     
      </div>
   
  </div>
                
  </form>            
        </body>
</html>