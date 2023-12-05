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

$query = "SELECT *FROM exercise WHERE id='$id'" ; 
$result = mysqli_query($con,$query) or die ( mysqli_connect_error());
$q=mysqli_fetch_array($result);

if(isset($_POST['addtoh'])){
    if (isset($_POST['id'], $_POST['quantity']) && is_numeric($_POST['id']) && is_numeric($_POST['quantity'])) {
        $id=(int)$_POST['id'];
        $quantity=(int)$_POST['quantity'];
        $stmt = $pdo->prepare('SELECT * FROM exercise WHERE id =?');
        $stmt->execute([$_POST['id']]);
        $q=$stmt->fetch(PDO::FETCH_ASSOC);
        if ($q && $quantity > 0) {
            // Product exists in database, now we can create/update the session variable for the cart
            if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                if (array_key_exists($id, $_SESSION['cart'])) {
                    // Product exists in cart so just update the quanity
                    $_SESSION['cart'][$id] += $quantity;
                } else {
                    // Product is not in cart so add it
                    $_SESSION['cart'][$id] = $quantity;
                }
            } else {
                // There are no products in cart, this will add the first product to cart
                $_SESSION['cart'] = array($id => $quantity);
            }
        }
        // Prevent form resubmission...
    
 }
}
?>
<head>
    <style>
        tr td {
            margin:10px 10px 10px 10px;
            padding:10px 10px 10px   10px;
            width:100%;
            height:100px;
            color:brown;
        }
        table{
            color:olive;
            border:2px solid olive;
        }
    </style>
</head>
<body style="background-color:lightblue;">
   
<div style="float:left;width:70%;height:900px;margin-right:5px;margin-bottom:10px;">
<h2 style="text-transform:uppercase;text-align:center;color:olive "> Decide on your fitness demand , during your training you need to spend to (at least 3 times) to do each exercises .  </h2>
<h4 style="color:red;">Posted by Sang Nguyen - March ,2023 In Viet Nam </h4>
<h3>Part 1: How often to do the exercises :</h3>

<table width="100%" border="2px solid brown;" style="border-collapse:collapse; ">
<thead>
    <tr>
        <th>
            <strong>The choice workout schedule per a month for you to decide on keeping doing workout or rest :</strong>
        </th>
        <th>
            <label for ="date">Check the schedule:</label>
            <input type="date" name="syt" >

        </th>
       

        <ul><li>
            Your training age , status including your max heart rate during your training 
        </li></ul>
        <ul>
            <li>Your schedule and how many days you can commit to </li>
        </ul>
        
        <p style="padding-left:10px;">In genreral, 3 days per week is considered the healthy minumum , the ideal traning schedule is important to reach the goals and maintain the fitness </p>
        
<h3 style="padding-left:10px;">Fitness Level Workouts Per Week</h3>

<ul><li>Beginner: 3 workouts; 2 strength training, 1 stretching</li></ul>



<ul><li>Intermediate: 4 workouts; 2-3 strength training, 1-2 stretching</li></ul>

<ul><li>Advanced: 5 workouts; 3-4 strength training, 1-2 stretching </li></ul>

<p style="text-transform:uppercase;margin-left:10px;">-> (Remind):During your training , stretching exercises are important to help you for preventing of injuries</p>
<h3>Part 2: Be Scheduled your training plan </h3>
        <tr>
            <tr>
            <td>Monday: <br>
          
                    <input type="text" placeholder="SELECT your time : REST/ Do workout" style ="width:400px;margin-left:10px;margin-bottom:10px;"><br>
                  
                    <input type="number" placeholder="SELECT your workout routine : 1/2/3/4/5 day routine" style ="width:400px;margin-left:10px; ">

            </td>
            </tr>
            <tr>   <td>Thursday:<br>
            <input type="text" placeholder="SELECT your time : REST/ Do workout" style ="width:400px;margin-left:10px;margin-bottom:10px;"><br>
                   
                    <input type="number" placeholder="SELECT your workout routine : 1/2/3/4/5 day routine" style ="width:400px;margin-left:10px; ">

        
        
        </td></tr>
           <tr><td>Wednesday:<br>
           <input type="text" placeholder="SELECT your time : REST/ Do workout" style ="width:400px;margin-left:10px;;margin-bottom:10px;"><br>
                    
                    <input type="number" placeholder="SELECT your workout routine : 1/2/3/4/5 day routine" style ="width:400px; margin-left:10px;">



           </td></tr>
         
           <tr><td>Thursday:<br>
            
           <input type="text" placeholder="SELECT your time : REST/ Do workout" style ="width:400px;margin-left:10px;;margin-bottom:10px;"><br>
                  
                    <input type="number" placeholder="SELECT your workout routine : 1/2/3/4/5 day routine" style ="width:400px;margin-left:10px; "></td></tr>
         
            <td>Friday:
                <br>
                <input type="text" placeholder="SELECT your time : REST/ Do workout" style ="width:400px;margin-left:10px;;margin-bottom:10px;"><br>
                    
                    <input type="number" placeholder="SELECT your workout routine : 1/2/3/4/5 day routine" style ="width:400px;margin-left:10px; "></td></tr>
         
        </td>
            <tr><td>Saturday:<br>
            <input type="text" placeholder="SELECT your time : REST/ Do workout" style ="width:400px;margin-left:10px;;margin-bottom:10px;"><br>
                  
                    <input type="number" placeholder="SELECT your workout routine : 1/2/3/4/5 day routine" style ="width:400px;margin-left:10px; "></td></tr>
         
        </td></tr>
            <td>Sunday:<br>
            <input type="text" placeholder="SELECT your time : REST/ Do workout" style ="width:400px;margin-left:10px;;margin-bottom:10px;"><br>
                  
                    <input type="number" placeholder="SELECT your workout routine : 1/2/3/4/5 day routine" style ="width:400px;margin-left:10px; "></td></tr>
         
        </td>
            </tr>
       
    </thead>
</table>

<h3>Part 3: Each benefits can brings during your physical activites:</h3>
 <table width="100%" border="1" style="border-collapse:collapse;">
<tr style="text-align:center;">
    <td >Number of REST days</td>
    <td>The adavantages of REST days</td>
</tr> 
<tr>
    <td style="padding-left:10px;">
       <ul>
        <li> 1 day per week</li><br>
        <li>2 days per week</li>
       </ul>
       
    </td>
    
<td>
    <ul>
        <li>
           allow times to recovery
        </li><br>
        <li>reduce risk of injuries</li><br>
        <li>Give your muscles chance to grow</li>
    </ul>
</td>
</tr>
<tr style="text-align:center;">
    <td>Number of Day Routine</td>
    <td>The adavantages of Day Routine</td>
</tr>
<tr>
    <td>
    <ul>
        <li>From 3 to 5 days per week</li><br>
        <li>No REST days (or 7 days for keeping day routine)</li>
    </ul>
    </td>
    <td>
        <ul>
            <li>
                increased energy level
            </li><br>
            <li>
                improved muscular strength 
            </li><br>
            <li>
                weight management 
            </li>
        </ul>
    </td>

</tr>
</table><br>

<div style="border:1px solid black" >

<h2 style="border-bottom:2px solid yellow">An exercise details :
    
</h2>
<img src="img/<?php echo $q['image']?>" style="width:200px; height:300px">

<p>Name : <?php echo $q['name']?></p>

 <p>Exercise instruction :<?php echo $q['instruction']?></p>
 <p>Calories:<?php echo $q['calories']?></p>
 <p> Exercise Category:<?php echo $q['category']?></p>
 <p>Type of exercise: <?php echo $q['type']?></p><br>
 <p>Quantity of exercise:<?php echo $q['quantity']?></p>
 <p>Reps to do 1 exercise /1 times:<?php echo $q['reps']?></p>



 </div>
 <form action="singleview.php?id=" method="post"style="padding-left:20px;">
 <label for ="yourquantity">Your quantity</label>
 <input type="hidden" name="id" value="<?php echo $q['id']?>">
 <input type="number" name="quantity" min="0" max="5" value="<?php echo $q['quantity']?>">
    <input type="submit" style="width:100px;    background-color: #04AA6D;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
  
    text-transform: uppercase;"name="addtoh" value="Addtoh">
     </form>
</div>
</body>