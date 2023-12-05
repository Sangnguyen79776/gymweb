<?php 
   session_start();     
?>
<html>
    <head>
<h2 >Admin login page </h2>
<link rel="stylesheet"  href="css/1.css" />

    </head>
    <body style="color:brown;background-color:palegoldenrod">


    
        <div class="col-md-6 col-md-offset-3">
	<div class="alert alert-info">
    <img src="img/banner.jpg" alt="bannerofwebsite" >
	</div><br>
    <div class=panel panel-primary style="padding:10px 10px 10px 10px;text-align:center;border:2px outset  ; background-color:pink">
<div class="panel-body">
    <div class="from-group">
    <form action="validate.php" method="post" class="form">
        <label for="username">Name</label><br>
        <input type="text" class="form-control" name="username" placeholder="Enter your name ..."required/>
			</div>
            <div class="from-group">
        <label for="password">Password</label><br>
        <input type="password" class="form-control" name="password" placeholder="Enter your password ..."required/>

            </div>
            
            </div>
            <input type="submit"id="btn" value="Signin"name="signin">   </input>
            
        </form>
    </div>
</div>
</div>
    
    </body>
</html>