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
        <link rel="stylesheet" href="newdashboardstyle.css">
        
    </head>
    <body background="zg.jpg" style="background-repeat:no-repeat;background-size:100% 100%">
        <nav>
            <label class="logo">Staff</label>
            <ul>
                <li><a class="active" href="#">Dashboard</a></li>
                
                <li><a class="regi" href="register.php" target="_self">User</a></li>
                <li><a class="book" href="addbook.php">Book</a></li>
                <li><a class="ibook" href="issuebook.html">IssueBook</a></li>
                <li><a class="logout" href="adminloginfront.php">Logout</a></li>
            </ul>
        </nav><br><br>
       
    </body>
    <div class="card1">
        <div class="card-header"> <h2>Registered Users</h2><br>

             <div class="card-body"><p>No of total users: <?php echo get_user_count();?></p> <br>
                <div class="card-btn">
                    <a href="usershow.php" class="card-btn"><button class="card-btn"> View Registered users</button></a>   
                </div>
            </div>
        </div>
        
    </div>
    <div class="card2">
        <div class="card-header" id="one"> <h2>Added Books</h2><br>

             <div class="card-body"><p>No of Books: <?php echo get_book_count();?></p> <br>
                <div class="card-btn">
                    <a href="bookshow.php" class="card-btn"><button class="card-btn"> View Books</button></a>   
                </div>
            </div>
        </div>
        
    </div>
    <div class="card3">
        <div class="card-header" id="two"> <h2>Issued Books</h2><br>

             <div class="card-body"><p>Issued books on book bank:<?php echo get_issue_count1();?> </p> <br>
                <div class="card-btn">
                    <a href="user_booktable.php" class="card-btn"><button class="card-btn"> View Issued Books</button></a>   
                </div>
            </div>
        </div>
        
    </div>
    <div class="card4">
        <div class="card-header"> <h2>Issued Books</h2><br>

             <div class="card-body"><p>Issued books on book id:<?php echo get_issue_count();?> </p> <br>
                <div class="card-btn">
                    <a href="user_bookidtable.php" class="card-btn"><button class="card-btn"> View Issued Books</button></a>   
                </div>
            </div>
        </div>
        
    </div>
    
</html>