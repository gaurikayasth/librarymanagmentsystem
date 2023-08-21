<?php
require('functions.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head> 
        <meta charset="utf-8">
        <title> Dashboard</title>
        <meta name="viewpoint" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="styleadmindashboard.css">
        <link rel="stylesheet" href="newadminstyle.css">
    </head>
    <body background="zg.jpg" style="background-repeat: no-repeat;background-size:100% 100%">
        <nav>
            <label class="logo">Admin</label>
            <ul>
                <li><a class="active" href="#">Dashboard</a></li>
                <li><a href="staffregister.php">Add Staff</a></li>
                <!--<li><a href="usershow.php" target="_self">User</a></li>
                <li><a href="staffshow.php" target="_self">Staff</a></li>
                <li><a href="bookshow.php">Book</a></li>-->
                <li><a href="adminloginfront.php">Logout</a></li>
            </ul>
        </nav>
    </body>
<div class="card1">
        <div class="card-header"> <h2>Total staff</h2><br>

             <div class="card-body"><p>Issued books on book id:<?php echo get_staff_count();?> </p> <br>
                <div class="card-btn">
                    <a href="staffshow.php" class="card-btn"><button class="card-btn"> View staff</button></a>   
                </div>
            </div>
        </div>
        
    </div>
<div class="card2">
        <div class="card-header"> <h2>Registered Users</h2><br>

             <div class="card-body"><p>No of total users: <?php echo get_user_count();?></p> <br>
                <div class="card-btn">
                    <a href="usershow.php" class="card-btn"><button class="card-btn"> View Registered users</button></a>   
                </div>
            </div>
        </div>
        
    </div>
    <div class="card4">
        <div class="card-header" id="one"> <h2>Added Books</h2><br>

             <div class="card-body"><p>No of Books: <?php echo get_book_count();?></p> <br>
                <div class="card-btn">
                    <a href="bookshow.php" class="card-btn"><button class="card-btn"> View Books</button></a>   
                </div>
            </div>
        </div>
        
    </div>


</html>