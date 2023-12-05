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
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if(isset($_REQUEST['addtocart'])){
$id=$_REQUEST['id'];
  $db="SELECT *FROM equipments where id='$id'";
  $notify=mysqli_query($con,$db) or die(mysqli_connect_error());
  $q  =mysqli_fetch_array($notify);

}
$img_details=mysqli_query($con,"SELECT *FROM equipments");
while($row=mysqli_fetch_array($img_details)){
  
}
?>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
        <style>
    article h3{
    text-align: center;
    padding :15px 0;
    font-size:20px;
    color:#272f54;
    text-transform: uppercase;
    font-weight: bold;
  }
  .text-block{
    position: absolute;
    color: white;
    top:50%;
    left: 50%;
    transform: translate(-50%,-50%);
   


}
.container{
    position: relative;
    text-align: center;
    color: white;
    font-family: sans-serif;
  

}
body{
    background-color: burlywood;
}

.top-nav{
    background-color:  #333;
    overflow: hidden;;
}
.top-nav a {
    float: left;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
    
  }
  .top-nav a:hover {
    background-color: #ddd;
    color: black;
  }
  .top-nav a.active {
    background-color: #04AA6D;
    color: white;
  }
  article h3{
    text-align: center;
    padding :15px 0;
    font-size:20px;
    color:#272f54;
    text-transform: uppercase;
    font-weight: bold;
  }
  article .new_list .news_item{
    width: 28%;
    padding:2%;
    float: left;
    border: 2px solid #ccc;

  }
  img{
    width:100%;
    height:200px;
  }

  input[type=submit]{
    background-color: #04AA6D;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 200px;
    text-transform: uppercase;

  
   
}
</style>
    </head>
    <body>
    <form action="gymeq.php" method="post">
    <div class="container">
            <img src="img/gymep.jpg" alt="equipmentsex" style="width:100%;height:70%">
            <div class="text-block">
                <h4>
                    Gym Website
                </h4>
                <p> Welcome to visit our website for fitness equipements  </p>
            </div>
            
        </div>
        <div class="top-nav">
        <a href="profile.php"><i class="fas fa-user-circle"></i>Profile|</a>
            <a class="active" href="homepage.php" >Homepage|</a>
            <a class="active" href="assignpersonalinfo.php" >Assignpersonalinfo|</a>
            <a class="active" href="calculate.php" >Calories Intake Calculator|</a>
            <a class="active" href="feedback.php" >Give a feedback|</a>
            <a class="active" href="contactus.php" >Contact us |</a>
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout|</a>
            
           
            
        </div>
        <div class="text-block">
           Our gym website is a proper place for user who have clearly fitness demand (to enhance their weight or loss their weight) by providing different exercises. Moreover, we have a functionality for user to help them caculate their calories intake per a day with different fitness level . We wish all the best will come to all people and help them to gain more experinces.
         
        </div>
        <article>
        <h3 style="color:brown;">Be training hard with different kinds of fitness equipments depend on your fitness demand </h3> 
  <?php
  $count=1;
  $sql="SELECT *FROM equipments ORDER BY id desc;";

  $result = mysqli_query($con,$sql);
while($row = mysqli_fetch_assoc($result)) { ?>
  
  
  
 
        <div class="new_list">
                <div class="news_item">
             
              <h4>Fitness equipment number:<?php echo $count; ?></h4>  
                    <h4>Name: <?php echo $row['name'];?></h4>
                    <h4><?php echo  "<img src ='img/".$row['image']."'>"; ?></h4>
                    <h4>Price:<?php echo $row['price']?></h4>
                    <div class="content">
                       Description:<?php echo $row['description'];?>
                    </div>
                   <h4>Moneytaryunit:<?php echo $row['moneytaryunit']?></h4>
                 <a href="gymeq.php?id=<?php echo $row['id'];?>"><input type="submit" value="Addtocart" name="addtocart"></a>  
                </div>
            </div>
 
        
            <?php $count++;} ?>
            </form>
        </article>
      <?php
      $sql="SELECT *FROM equipments where price>200";
      $a=mysqli_query($con,$sql);
    $req="SELECT *FROM equipments where price<50";
    $a=mysqli_query($con,$sql);
      $ins="SELECT CONCAT(equipments.name,equipments.price,equipments.image,equipments.description,equipments.moneytaryunit) 
      
      AS equipments.name,equipments.price,equipments.image,equipments.description,equipments.moneytaryunit,fitnesscategories.name,fitnesscategories.description,fitnesscategories.level 
      FROM equipments INNER JOIN fitnesscategories ON equipments.id=fitnesscategories.id";
         $a=mysqli_query($con,$ins);
         if(mysqli_num_rows($a)>0){
             while($q=mysqli_fetch_array($a)){
              echo'<h4>Equipment name:'.$q['name'].'</h4>';
              echo'<h4>Equipment price:'.$q['price'].'</h4>';
              echo'<h4>Equipment image:'.$q['image'].'</h4>';
              echo'<h4>Equipment description:'.$q['description'].'</h4>';
              echo'<h4>Equipment moneytary unit : '.$q['moneytaryunit'].'</h4>';
              echo'<h4>Fitness Categories Name:'.$q['name'].'</h4>';
              echo'<h4>fitness category description:'.$q['description'].'</h4>';
              echo'<h4>fitness category level:'.$q['level'].'</h4>';
              



             }
            
            
            
            
            }
      ?>


    
    </form>
 
    </body>
</html>