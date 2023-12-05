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

$query = "SELECT *FROM food WHERE id='$id'" ; 
$result = mysqli_query($con,$query) or die ( mysqli_connect_error());
$q  =mysqli_fetch_array($result);






?>
<html>
    <head>
<style>
     tr td {
            margin:10px 10px 10px 10px;
            padding:10px 10px 10px 10px;
            width:100px;
            height:100px;
            color:brown;
        }
        article h1{
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
   margin-left:15px;
   margin-top:10px;
  
 

  }
  img{
    width:400px;
    height:300px;
  }
 

 
</style>
    </head>
    <body style="background-color:lightblue;">
        
    <h2 style="text-transform:uppercase;text-align:center;color:brown">Based on your fitness demand , the food selection is important during your training   </h2>
    <h3>To enhance the energy and acheive the weight goal , you have to select the right amount of food and right number of food gram per day</h3>
        <h3 style="color:red;">Posted by Sang Nguyen- April 2023</h3>
        
            <article>
          
        <h1 style="color:brown;">Be prepared your plan of workout and Setting up your diet plan for each meal based on your fitness demand  </h1> 
            <div class="new_list">
                <div class="news_item">
                    <h4>A workout set </h4>
                    <img src="img/b.jpg" alt="b">
                    <div class="content">
                    A "rep," short for "repetition," is a single execution of an exercise. One pushup is one rep, and 10 pushups are 10 reps. A "set" is a collection of reps. If your goal is to complete 20 pushups, you might break your workout up into two sets of 10 reps.
                    </div>
                </div>
            </div>
            <div class="new_list">
                <div class="news_item">
                    <h4>A diet plan</h4>
                    <img src="img/a.jpg" alt="a">
                    <div class="content">
                    Planning diets refers to determining what usual nutrient intake should be. Regardless of whether one is planning diets for individuals or groups, the goal is to have diets that are nutritionally adequate, or conversely, to ensure that the probability of nutrient inadequacy or excess is acceptably low.
                    </div>
                </div>
            </div>
            <div class="new_list">
                <div class="news_item">
                    <h4>Menu set</h4>
                    <img src="img/abc.jpg" alt="=abc">
                    <div class="content">
                    What menu set means?
A set menu is a menu with a specific set of meals to choose from. The price charged for each meal is the same. There is a single set menu, with four courses for $31. Our set menu is offered alongside the à la carte menu. There is a wide choice of meals on the set menu 
                    </div>
                </div>
            </div>
        </article>
        </div>
        <div style="border:2px solid brown;padding:10px 10px 10px 10px;margin:10px 10px 10px 10px;">
            <h2>Part 1: Select the right food (OR set up your specific food plan for your meals)</h2>
            <div  style="border:1px outset;padding:10px 10px 10px 10px;margin:10px 10px 10px 10px;">
            <p>Choose your menu(Clearly) / Set your diet plan in specific ways :</p>
           <ul>
            <li>
                If you train for lossing weight , you have to select the menu of proper food for your breakfast,lunch,dinner (+extra snack before training and after training).
               <br><p>1.For Appertizers:(low calories, tend to be a salad or green vegetables/mushrooms )</p> <br>
                <p style="padding:10px 10px 10px 10px;">2.For The Main Courses(low fat, low calories, ): chicken breast <br>
                / red meat(like beef) (sometimes) to improve the muscle strength and provide a good amount of energy for a diet<br>
                / for sea food: you can choose shrimp,tuna,haddock(low calories, and high-protein ) <br>
                / Instead of using high calories startch , you can choose the following startchs:</p> 
                <table width="100%" border="2px solid brown;" style="border-collapse:collapse; ">
                <tr>
                    <td>Number</td>
                    <td>Name of sratch</td>
                    <td>Effects</td>

                </tr>
                <tr>
                    <td>1</td>
                    <td>Sweet potato</td>
                    <td>
                        <ul><li>
                    Lower your chancce of getting the eye disease
                    </li>
                    <li>lower your odds of heart problems</li></ul>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Brown bread</td>
                    <td>
                        <ul><li>
                   Adds many vitamins and minerals to your diet
                    </li>
                    <li>facilitates bowel movements</li>
                <li>support healthy digestion</li>
                </ul>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Low calories rice</td>
                    <td>
                    <ul><li>
                   Provide enough energy and carbs per day
                    </li>
                    <li>Prevent the body from storing excess water weight</li>
                <li>Reduce the pressure on the kidneys </li>
                </ul>
                    </td>
                </tr>
              </table>
                <p>3.For the Drinks ( can be choose with low diet coke ,  the low fat milk, Black coffee with no sugar, water,...) 
                    <br>/ Avoid the alcohol <br>/ Drink at least 2 liters of water per day
                </p>
                <p>4. For desserts :Cakes (instead of using white sugar , you can use diet sugar ): but limit of eating <br>
                / Fruits( you can choose the low calories fruits like dragon fruits or cantaloupe )</p>
                <p>5. For the extra snack : You can choose the protein drinks or protein bars  instead of using the main courses (for providing enough calories and startch per a meal) before training 1 hour and might accept after training 30 mintues 
                <br>/ Or you can choose the egg-white</p>
                <p style="float:right;">-> A low-calorie diet(800 calories) is allowed initially which is then increased up to 1200 calories per a phase</p>
                <p >-> Setting on time for each diets and take care of your sleep patern </p>
            </li>
           </ul>
           </div>
            </table>
            <h2>Part 2: Select the right workout set: <br>/The workout set per week very important to keep the workout routine in order to achevie your fitness demand  </h2>
            <div  style="border:1px outset;padding:10px 10px 10px 10px;margin:10px 10px 10px 10px;">
            <p>Choose your workout set (Clearly) / Set your  plan to do exercises in specific ways :</p>
           <ul>
            <li>
                If you train for lossing weight , you have to select the schedule of good workout .
               <br><p>1.Exercises plan that targets your fitness demand:(Cardio/strength training ): 
                <br> <p style="text-transform:uppercase;color:brown;padding-top:10px;">A. Cardio</p>
               </p> <br>
               <table width="100%" border="2px solid brown;" style="border-collapse:collapse; ">
                <tr>
                    <td>Number</td>
                    <td>Name of exercises</td>
                    <td>Exercise category</td>
                    <td>Effects</td>

                </tr>
                <tr>
                    <td>1</td>
                    <td>Jump rope</td>
                    <td>Cardio</td>
                    <td>
                        <ul><li>
                        May Boost Heart Health.
                    </li>
                    <li>Helps Improve Coordination</li></ul>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Burpees</td>
                    <td>Cardio</td>
                    <td>
                        <ul><li>
                        stronger heart and lungs
                    </li>
                    <li>improved brain function</li>
                <li>improved cholesterol levels</li>
                </ul>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Squat jacks</td>
                    <td>Cardio</td>
                    <td>
                    <ul><li>
                    building muscle and strength
                    </li>
                    <li>boosting aerobic and cardiovascular fitness</li>
                <li>improving mobility and balance </li>
                </ul>
                    </td>
                </tr>
              
              </table>
              <p style="text-transform:uppercase;color:brown;padding-top:10px;">B.Strength training</p>
              <table width="100%" border="2px solid brown;" style="border-collapse:collapse;padding:10px 10px 10px 10px;margin-top:20px; ">
                <tr>
                    <td>Number</td>
                    <td>Name of exercises</td>
                    <td>Exercise category</td>
                    <td>Effects</td>

                </tr>
                <tr>
                    <td>1</td>
                    <td>Push-ups</td>
                    <td>Strength training </td>
                    <td>
                        <ul><li>
                        building upper body strength
                    </li>
                    <li>strengthen the lower back and core by engaging (pulling in) the abdominal muscles</li></ul>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>High pulls</td>
                    <td>Strength training</td>
                    <td>
                        <ul><li>
                        builds muscle in the arms, shoulders, and back
                    </li>
                    <li>builds strength and power</li>
               
                </ul>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Planks and plank variations</td>
                    <td>Strength training</td>
                    <td>
                    <ul><li>
                    Reverse planks are great for improving your glutes and your lower body, particularly your hamstrings and lower back
                    </li>
                    <li>Front planks – the standard plank – help strengthen the upper and lower body.</li>
                <li>Side planking is very good for training your obliques and providing stabilization to your spine. </li>
                </ul>
                    </td>
                </tr>
              </table>
           
        
         
               
                <p style="padding:10px 10px 10px 10px;">2. Select your slepping pattern :

                    <br>+)The recommended amount of sleep for a healthy adult is at least seven hours.<br>
                     +)Most people don't need more than eight hours in bed to be well rested. 
                     <br> +)Go to bed and get up at the same time every day, including weekends. Being consistent reinforces your body's sleep-wake cycle.
                </p>
                <p>
                3.Select your good workout schedule(example):
      
                </p>
                <table width="100%" border="2px solid brown;" style="border-collapse:collapse;padding:10px 10px 10px 10px;margin-top:20px; ">
                <tr>
                    <td>Number</td>
                    <td>Day</td>
                    <td>Activities(/Training)</td>
         

                </tr>
                <tr>
                    <td>1</td>
                    <td>Monday</td>
                    <td>Strength training</td>
                    
                </tr>
                <tr>
                    <td>2</td>
                    <td>Tuesday</td>
                    <td>Cardio</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Wednesday</td>
                    <td>Active recovery (stretch or yoga)</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Thursday</td>
                    <td>Strength training</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Friday</td>
                    <td>Cardio</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Saturday</td>
                    <td>Active recovery (stretch or yoga)</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Sunday</td>
                    <td>REST</td>
                </tr>
                </table>
        </div>
    <div style="border:2px solid brown;padding:10px 10px 10px 10px;margin:10px 10px 10px 10px;">
<h2 style="color:aqua;text-transform:uppercase;">A food details: </h2>

<img src="img/<?php echo $q['image']?>">
<div style="float:right;padding-right:600px;color:brown;">
    <p>Food name:<?php echo $q['name']?></p>
<p>Food type:<?php echo $q['type']?></p>
<p>Estimate the food calories per number of gram:<?php echo $q['calories']?></p>
<p>Number of gram:<?php echo $q['numofGram']?></p>
</div>

</div>
    </body>
</html>