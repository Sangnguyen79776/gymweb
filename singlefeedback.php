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
$id=$_REQUEST['id'];

$query = "SELECT *FROM feedback WHERE id='$id'" ; 
$result = mysqli_query($con,$query) or die ( mysqli_connect_error());
$q=mysqli_fetch_array($result);
?>
<div style="border:1px solid black" >

<h2 style="border-bottom:2px solid yellow">Your given feedback  :
    
</h2>




 <p>Your given score :<?php echo $q['score']?></p>
 <p>Your given feedback_info:<?php echo $q['feedback_info']?></p>
 



 </div>
 <form action="singlefeedback.php?id=" method="post"style="padding-left:20px;">
 <label for ="yourscore">Your score</label>
 <input type="hidden" name="id" value="<?php echo $q['id']?>">
 <input type="number" name="score" min="0" max="5" value="<?php echo $q['score']?>">

     </form>
</div>
</body>