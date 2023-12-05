
<html>
    <head>
<h2 style="color:orange">Register new admin accounts page </h2>
<link rel="stylesheet"  href="css/1.css" />

    </head>
    <body style="background-color:blanchedalmond;">

    <?php 
   session_start();
   if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;}
   $DATABASE_HOST = 'localhost';
   $DATABASE_USER = 'root';
   $DATABASE_PASS = '';
   $DATABASE_NAME = 'gymweb';
   $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
   $notify=array();
   if (mysqli_connect_errno()) {
       exit('Failed to connect to MySQL: ' . mysqli_connect_error());
   }
   if(isset($_REQUEST['accounts'])){

    // we receive all the input value from the form 
    
    $username = mysqli_real_escape_string($con, $_POST['username']);

    $password = mysqli_real_escape_string($con, $_POST['password']);
    $passwordconfirm = mysqli_real_escape_string($con, $_POST['passwordconfirm']);

   
   // we validate data by using array_push func 
   if (empty($username)) { array_push($notify, "Username is required"); }
   
   if (empty($password)) { array_push($notify, "Password is required"); }

   if($password != $passwordconfirm){
    array_push($notify,"the two password are not match");
   }
   $sql="SELECT *FROM admin WHERE username='$username'";
   $result=mysqli_query($con,$sql);
   $u= mysqli_fetch_assoc($result);
   if($u){
    if($u['username']===$username){
        array_push($notify, "Username already exists");
        
      
    }
}
   if (count($notify) == 0 ) {
  
    $password = md5($password);//encrypt the password before saving in the database
  
    $db_query = "INSERT INTO admin (username,password) 
              VALUES('$username', '$password')";
    $u_query=mysqli_query($con, $db_query);
    if ($u_query) {
        echo'<div style="color:olive;text-transform:uppercase;background-color:orange;text-align:center;"><b>Register successfully </b>
        <br><a href="list_aa.php" style="padding-left:10px;">List of admin account</a></div>';

        }else{
        
            echo'<div style="color:red;text-transform:uppercase;background-color:orange;text-align:center;"><b>Fail to register </b></div>';
         
        }
   
      
       
    }else{
        print_r($notify);
        echo'<div style="color:red;text-transform:uppercase;background-color:salmon;text-align:center;"><b>Fail to register </b></div>';
    }
    }
  
    


   ?>
    
        <div class="col-md-6 col-md-offset-3">
	<div class="alert alert-info">
    <img src="img/usera.jpg" alt="bannerofwebsite" width="100%", height="600px">
	</div ><br>
    <div class=panel panel-primary style="padding:10px 10px 10px 10px; border:2px solid brown ;text-align:center;">
<div class="panel-body">
    <div class="from-group">
    <form action="add_na.php" method="post" class="form">
       
        <label for="username"style="color:olive;">Admin Username</label><br>
        <input type="text" class="form-control" name="username" placeholder="Enter your admin username here  ..."/>
			</div>
            <div class="from-group">
        <label for="password"style="color:olive;">Password</label><br>
        <input type="password" class="form-control" name="password" placeholder="Enter your admin account password here ..."/>

            </div>
            <div class="from-group">
        <label for="passwordconfirm"style="color:olive;">Comfirm password </label><br>
        <input type="password" class="form-control" name="passwordconfirm" placeholder="Enter your confirm password here ..."/>

            </div>
          
  
            <input type="submit"id="btn" name="accounts">   </input>
          
         
</form>
</div>
</div>
</div>

        </body>
            </html>