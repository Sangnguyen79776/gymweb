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
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}



?>
<html>
    <head>
<style>
    .pic{
        text-align:left;
      width:25%;
      
      
    }
    *{box-sizing:border-box;}
    body{
        color:#333;
        font-size:14px;
        padding:100px;
        background-color: #dadada;
     
    }
    .form_box{
        width:400px;
        padding:10px;
        background-color:lightblue
    }
    input{
        padding:5px;
        margin-bottom:5px;
    }
    input[type=submit]{
        border:none;
        outline: none;
        color:white;
        background-color:sandybrown
    }
    .heading{
        background-color:#ac1219; color:white; height:40px; width:100%; line-height:40px; text-align:center;
    }
    .shadow{
  -webkit-box-shadow: 0px 0px 17px 1px rgba(0,0,0,0.43);
-moz-box-shadow: 0px 0px 17px 1px rgba(0,0,0,0.43);
box-shadow: 0px 0px 17px 1px rgba(0,0,0,0.43);}
</style>
    </head>
    <body>
        <div class="form_box shadow">
            <form action="feedback.php" method="post">
        <div class="heading">
           User Feedback Page
        </div><br>
        <p>What have you thought about the quality of our features and blogs?</p>
        
    <div class="pic">
        <img src="img/bad.png" alt="badimg"><br>
        <input type="radio" name="score" value="0">Bad

    </div>
    <div class="pic">
        <img src="img/poor.png" alt="poorimg"><br>
        <input type="radio" name="score"value="1">Poor
    </div>
    <div class="pic">
        <img src="img/avg.jpg" alt="avgimg"><br>
        <input type="radio" name="score" value="2">Average
    </div>
    <div class="pic">
        <img src="img/good.jpg"alt="goodimg"><br>
        <input type="radio" name="score"value="3">Good
    </div>
    <div class="pic">
        <img src="img/excellent.jpg"alt="excellentimg"><br>
        <input type="radio" name="score"value="4">Excellent
    </div>
    <p>Do you have any suggestion for us for future improvements?</p>
    <textarea name="feedback_info" rows="8" cols="40"></textarea>
    <input type="submit" name="submit"value="Submit">
    <label for="search">Search by feedback score</label>
    <input type="number" name="score"max="4" height="100px"placeholder="Enter the feedback score you want to search here......">
    <input type="submit" name="searchbyid" value="Search">
    <?php
    
    $error=array();
    if(isset($_REQUEST['submit'])){
    $count=1;
    $score=mysqli_real_escape_string($con,$_POST['score']);
    $txt_=mysqli_real_escape_string($con,$_POST['feedback_info']);
    if(empty($score)){array_push($error,"Score is required");}
    if(empty($txt_)){array_push($error,"feedback_txt is required");}
 if(count($error)!=0 ){
    print_r($error);
    echo'<br>';
    echo'<div style="color:red;text-transform:uppercase;background-color:orange;text-align:center;"><b>Something went wrong!.....Failed to submmited a feedback </b></div>';
}else{
   
    echo'<div style="color:olive;text-transform:uppercase;background-color:orange;text-align:center;"><b>Give a feedback successfully </b></div>';
    $result='<a href="singlefeedback.php?id=">View of your given feedback</a>';
    echo $result;
    $ins_query="INSERT INTO feedback(score,feedback_info) VALUES('$score','$txt_')";
    mysqli_query($con,$ins_query) or die(mysqli_connect_error());
}
    
     
    

       
    
    
       
 }



if(isset($_POST['searchbyid'])){
    $count=1;
    $score=mysqli_real_escape_string($con,$_POST['score']);
if(empty($score)){array_push($error,"Score cannot be empty...Please enter the score value before searching");}
if(count($error)!=0){
    print_r($error);
    echo"failed to search";
}else{
    if($score<0 ){
      echo"The values you have entered that not acceptable from the system requirements!.... Please enter again";
        die(mysqli_connect_error());
    }
    if($score==0){
        echo'<p style="text-transform:uppercase;">You have selected the given score is '.$score.'... Here is the given list of following feedback</p>';
        $sql="SELECT *FROM feedback where score=0";
       }
       if($score==1){
        echo'<p style="text-transform:uppercase;">You have selected the given score is '.$score.'... Here is the given list of following feedback</p>';
        $sql="SELECT *FROM feedback where score=1";
       }
       if($score==2){
        echo'<p style="text-transform:uppercase;">You have selected the given score is '.$score.'... Here is the given list of following feedback</p>';
        $sql="SELECT *FROM feedback where score=2";
       }
       if($score==3){
        echo'<p style="text-transform:uppercase;">You have selected the given score is '.$score.'... Here is the given list of following feedback</p>';
        $sql="SELECT *FROM feedback where score=3";
       }
       if($score==4){
        echo'<p style="text-transform:uppercase;">You have selected the given score is '.$score.'... Here is the given list of following feedback</p>';
        $sql="SELECT *FROM feedback where score=4";
       }
       $add=mysqli_query($con,$sql);
       if(mysqli_num_rows($add) >0){
            
           while($row=mysqli_fetch_array($add)){
               echo '<div class="row" style="border:2px solid #b69f57; margin-bottom:10px;>';
               echo '<div class="col-lg-12" style="margin-top:2%;">';
               echo '<div class="col-lg-4"  style="margin-top:3%;">';
            
          
            
               echo '<div class="col-lg-8" style=" margin-top:2%; height:auto;">';
               echo '<h4 class="attribute">Feedback.No:'.$count.'</h4>';
               echo '<h4 class="attribute">Your given score during your using : '.$row['score'].'</h4>';
               echo '<h4 class="attribute">Your given feedback about the system features for future improvements  : '.$row['feedback_info'].'</h4>';
            
               echo' <a class="active "href="singlefeedback.php?id= '.$row['id'].'">READ MORE DETAILS</a>'; 
               echo '</div>';
               echo '</div>';
               echo '</div>';
           $count++;}
       }
}
   
 
}
    
    
    
    
    ?>
            </form>
        </div>
    </body>
</html>