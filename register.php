
<html>
    <head>
<h2 style="background-color:lightblue;color:orange">Sign up page </h2>
<link rel="stylesheet"  href="css/1.css" />

    </head>
    <body style="background-color:lightblue;">

    <?php 
   session_start();
 
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
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $passwordconfirm = mysqli_real_escape_string($con, $_POST['passwordconfirm']);
    $phonenumber = mysqli_real_escape_string($con, $_POST['phonenumber']);
   
   // we validate data by using array_push func 
   if (empty($username)) { array_push($notify, "Username is required"); }
   
   if (empty($password)) { array_push($notify, "Password is required"); }
   if (empty($phonenumber)) { array_push($notify, "Phonenumber is required"); }
   if($password != $passwordconfirm){
    array_push($notify,"the two password are not match");
   }
   $sql="SELECT *FROM accounts WHERE username='$username'";
   $result=mysqli_query($con,$sql);
   $u= mysqli_fetch_assoc($result);
   if($u){
    if($u['username']===$username){
        array_push($notify, "Username already exists");
        
      
    }
}
   if (count($notify) == 0 ) {
    $password = md5($password);//encrypt the password before saving in the database
  
    $db_query = "INSERT INTO accounts (username, email, password,phonenumber) 
              VALUES('$username', '$email', '$password','$phonenumber')";
    $u_query=mysqli_query($con, $db_query);
    if ($u_query) {
        echo'<div style="color:olive;text-transform:uppercase;background-color:orange;text-align:center;"><b>Register successfully </b></div>';
        }else{
        
            echo'<div style="color:red;text-transform:uppercase;background-color:orange;text-align:center;"><b>Fail to register </b></div>';
         
        }
    
      
       
    }else{
        print_r($notify);
        echo'<div style="color:red;text-transform:uppercase;background-color:salmon;text-align:center;"><b>Fail to register </b></div>';
    }
    }
  
    


   ?>
    
        <div class="col-md-6 col-md-offset-3"style="background-color:lightblue;">
	<div class="alert alert-info">
    <img src="img/banner.jpg" alt="bannerofwebsite" >
	</div ><br>
    <div class=panel panel-primary style="padding:10px 10px 10px 10px; border-style:outset ;text-align:center;">
<div class="panel-body">
    <div class="from-group">
    <form action="register.php" method="post" class="form">
       
        <label for="username"style="color:olive;">Name</label><br>
        <input type="text" class="form-control" name="username" placeholder="Enter your name ..."/>
			</div>
            <div class="from-group">
        <label for="password"style="color:olive;">Password</label><br>
        <input type="password" class="form-control" name="password" placeholder="Enter your password ..."/>

            </div>
            <div class="from-group">
        <label for="passwordconfirm"style="color:olive;">Comfirm password </label><br>
        <input type="password" class="form-control" name="passwordconfirm" placeholder="Enter your password ..."/>

            </div>
            <div class="from-group">
        <label for="phonenumber"style="color:olive;">Phone number</label><br>
        <input type="tel" class="form-control" name="phonenumber" placeholder="Enter your phone number here  ...">

            </div>
            <div class="from-group">
        <label for="email"style="color:olive;">Email</label><br>
        <input type="text" class="form-control" name="email" placeholder="Enter your email here:  ..."notrequired>
        
            </div>
            <input type="submit"id="btn" name="accounts">   </input>
            <a class="active" href="login.php">Already have an account </a> 
         
</form>
</div>
</div>
</div>

        </body>
            </html>