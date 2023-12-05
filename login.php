<?php 
   session_start();     
?>
<html>
    <head >
   
<h2 style="color:orange;background-color:lightblue;">Sign in page for user</h2>

<link rel="stylesheet" href="css/1.css">
    </head>
    <body style="background-color:lightblue;">

        <div class="col-md-6 col-md-offset-3">
	<div class="alert alert-info">
    <img src="img/banner.jpg" alt="bannerofwebsite" >
	</div><br>
    <div class=panel panel-primary>
<div class="panel-body"style="padding:10px 10px 10px 10px; border-style:outset ;text-align:center;">
    <div class="from-group" >
    <form action="authentication.php" method="post" class="form">
        <label for="username"style="color:olive">Name</label><br>
        <input type="text" class="form-control" name="username" placeholder="Enter your name ..."required/>
			</div>
            <div class="from-group">
        <label for="password"style="color:olive">Password</label><br>
        <input type="password" class="form-control" name="password" placeholder="Enter your password ..."required/>

            </div>
            <div class="from-group">
        <label for="phonenumber"style="color:olive">Phone number</label><br>
        <input type="tel" class="form-control" name="phonenumber" placeholder="Enter your phone number here  ..."required>

            </div>
            <div class="from-group">
        <label for="email"style="color:olive">Email</label><br>
        <input type="text" class="form-control" name="email" placeholder="Enter your email here:  ..."notrequired>
        
            </div>
            <input type="submit"id="btn" value="signin">   </input><br>
           <p style="color:olive; padding:10px 10px 10px 10px;">Not yet a member ......<a class="active" href="register.php"style="padding:10px 10px 10px 10px;">Haven't have an account yet </a><br></p> 
            If you are admin ....Please click here to login !<a href="adminlogin.php"style="padding:10px 10px 10px 10px;">For admin only </a>
        </form>
    </div>
</div>
</div>
    
    </body>
</html>