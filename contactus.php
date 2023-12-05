<?php 
session_start();
if(!isset($_SESSION['loggedin'])){
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

$error=array();



?>
<html>
    <head>
      
        <style>
            body{
                background-color: blanchedalmond;
                color:brown;
            }
         h2{
            text-align:center;
            text-transform: uppercase;

         }
         div{
            text-align: center;
            border:2px solid sandybrown;
            padding:10px 10px;
         }
         input[type=datetime-local],textarea[name=message],input[type=number]{
            width:50%;
            padding:10px 10px;
         }
         input[type=submit]{
    background-color: #04AA6D;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100px;
    text-transform: uppercase;
  
   
}
                img{
                    width:100%;
                    height:300px;
                }
                table{
                   width:100%;
                   height:100px;
                }
        </style>
    </head>
    <body>
        <div>
        <h2>Contact us Form</h2>
            <img src="img/exform.png" alt="exofcontactus">
           
            <form action="contactus.php" method="post">
                <h3 style="padding-right:800px">Do you have any problems about the system ? ... Please give us your message </h3><br>
                <p >Message Form</p>
                <textarea name="message"rows="8" cols="40" placeholder="Enter your message here....."></textarea><br>
                <p>
                <label for="sdate">Submiited date</label><br>
                <input type="datetime-local" name="submitted_dtime"placeholde="Enter your submitted date and time......"><br>
                </p>
                <p>
                <label for="cno">Contact us number</label><br>
                <input type="number" name="contact_no"placeholde="Enter your contact us number ......"><br>
                <input type="submit" name="submit"value="Submit">
                </p>
                <?php
                if(isset($_POST['submit'])){
                    
                    $msg=mysqli_real_escape_string($con,$_POST['message']);
                    $d_time=mysqli_real_escape_string($con,$_POST['submitted_dtime']);
                    $no=mysqli_real_escape_string($con,$_POST['contact_no']);

                    $count=1;
                
                 
                    if(empty($msg)){
                        array_push($error,"Message is required");
                    }
                    if(empty($d_time)){array_push($error,"Submitted date time is required ");}
                    if(empty($no)){array_push($error,"Contact us messgae number  is required ");}
                    if(count($error)!=0 ){
                   
                        print_r($error);
                    echo"Failed to submit the message!.......Please try again";
                    }
                        if( $_SESSION['id']!=$no){
                            echo'you have selected your account id is: '.$_SESSION['id'].' <br> you have selected your contact number is '.$no.'<br>';
                    echo"Your account id and your contact number values need to match togther before going to send a message ";
                        die(mysqli_connect_error());
                    }
                   else{
                    echo"You have submmited your message successfully....<br>";
                    echo'<p>If you have any comment during your using.... Please give us your message here <a href="contactus.php" class="active">Contact us </a></p>';
                        $query="INSERT INTO contact_(message,submitted_dtime,contact_no) VALUES('$msg','$d_time','$no')";
                        $add="SELECT  CONCAT(accounts.username,accounts.email,accounts.phonenumber) 
                        AS username,accounts.email,accounts.phonenumber,contact_.message,contact_.submitted_dtime,contact_.contact_no
                        
                        FROM accounts INNER JOIN contact_ ON accounts.id=contact_.contact_no"; 
                        $kq=mysqli_query($con,$query) ;
                    $kq=mysqli_query($con,$add);
                    if(mysqli_num_rows($kq)>0){
                        while($q=mysqli_fetch_array($kq)){
                          
                           echo'
                           <table width="100px%" border="1" style="border-collapse:collapse;">
                <thead>
<tr>
<th ><strong>No</strong></th>
<th><strong>User name</strong></th>
<th><strong>User email</strong></th>
<th><strong>User phonenumber</strong></th>
<th><strong>User message</strong></th>
<th><strong>User message submitted date </strong></th>
<th><strong>User contact number</strong></th>
</tr>
                </thead>
                <tbody>
                            <tr><td style="background-color:lightblue;"> '.$count.' </td>
                            <td style="background-color:lightblue;"> '.$q["username"].'</td>
                            <td style="background-color:lightblue;width:30%">'.$q["email"].'</td>
                            <td style="background-color:lightblue;"> '.$q["phonenumber"].'</td>
                            <td style="background-color:lightblue;">'.$q["message"].'</td>
                            
                            <td style="background-color:lightblue;">'.$q["submitted_dtime"].'</td>
                            <td style="background-color:lightblue;"> '.$q["contact_no"].'</td>
                            </tr>
                            </tbody>
                            </table>';
                            
                       
                       $count++; }
                    }
                        
               
                } 
       
                        
                    
                    } 
                   
                        
                   
                
                
                
                
                ?>
            </form>
        </div>
    </body>
</html>