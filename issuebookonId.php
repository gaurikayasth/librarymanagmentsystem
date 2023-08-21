<?php
require('functions.php');
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title> login and registration form</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="navstyle.css">
    </head>
    <body background="zg.jpg" style="background-repeat: no-repeat;background-size:100% 100%">
<?php  
// define variables to empty values  
$bidErr = $uidErr = $idateErr =  $rdateErr = $dateErr = "";  
$bid = $uid = $idate = $rdate = "";  
$b=get_book_count();
$u=get_user_count();
  
//Input fields validation  
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
      

      
    
    //Number Validation  
    if (empty($_POST["bid"])) {  
            $bidErr = "id is required";  
    } else {  
            $bid= input_data($_POST["bid"]);  
            // check if mobile no is well-formed  
            if (!preg_match ("/^[0-9]*$/", $bid) ) {  
            $bidErr = "Only numeric value is allowed.";  
            }  
        //check mobile no length should not be less and greator than 10  
        //if (strlen ($password) != 8) {  
           // $passwordErr = "password must contain 8 digits.";  
           // }  
    }  
      
 if (empty($_POST["uid"])) {  
            $uidErr = "user id is required";  
    } else {  
            $uid= input_data($_POST["uid"]);  
            // check if mobile no is well-formed  
            if (!preg_match ("/^[0-9]*$/", $uid) ) {  
            $uidErr = "Only numeric value is allowed.";  
            }  
        //check mobile no length should not be less and greator than 10  
        //if (strlen ($cpassword) != 8) {  
          //  $cpasswordErr = "confirm password must contain 8 digits.";  
           // }  
    }  
  
if(($_POST["idate"])>($_POST["rdate"]))
{
  $dateErr="return date must be latest!";
}

if(($_POST["uid"])>$u) 
{
 $uidErr="there is no user of this ID present in database";
}

if(($_POST["bid"])>$b) 
{
 $bidErr="book not available";
}

}  
  function input_data($data) {  
  $data = trim($data);  
  $data = stripslashes($data);  
  $data = htmlspecialchars($data);  
  return $data;  
}  
?> 
<nav>
            <label class="logo">Staff</label>
            <ul>
                <li><a class="active" href="#">Dashboard</a></li>
                <li><a class="admin" href="adminlogin.php">Admin</a></li>
                <li><a class="regi" href="register.php" target="_self">User</a></li>
                <li><a class="book" href="addbook.php">Book</a></li>
                <li><a class="ibook" href="issuebook.html">IssueBook</a></li>
                <li><a class="logout" href="adminloginfront.php">Logout</a></li>
            </ul>
        </nav><br><br>
<div class="container">
    <div class="card">
        <div class="inner-box">
            <div class="card-front">
                <h2>ISSUE BOOK</h2>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <input type="Id" name="bid" class="input-box" placeholder="Book Id" required><?php echo "<font color=red>"; ?><span class="error">* <?php echo $bidErr; ?> </span>  
    <br>
                    <input type="user_id" name="uid" class="input-box" placeholder="User Id" required><br><span class="error">* <?php echo $uidErr; ?> </span>  
    <br>
                    <input type="date" name="idate" class="input-box" placeholder="Issue Date" required><br>
                    <input type="date" name="rdate" class="input-box" placeholder="Return Date" required><br><br><br><span class="error">* <?php echo $dateErr; ?> </span>  
    <br>
          
                <button type="submit" name="submit" class="btn1">Issue</button>
                <a href="dashboard.php"><button type="button" class="btn2">Cancel</button></a>
            </form></br></br>
<?php  
    if(isset($_POST['submit'])) {  
    if($bidErr == "" && $uidErr == "" && $dateErr =="") {  
$bid=$_POST["bid"];
$uid=$_POST["uid"];
$idate=$_POST["idate"];
$rdate=$_POST["rdate"];

$con=mysqli_connect("localhost","root","");
if(!$con)
{
 die('cannot connect'.mysqli_error());
}
else
{
  echo "";
}
echo "";
echo "</br>";
mysqli_select_db($con,"library");
echo "<font color=darkblue>"."<h1 align=center>"."issued book successfully on ID"."</h1>";
echo "</br>";

$insert="insert into bookid(bid,uid,idate,rdate) values('$bid','$uid','$idate','$rdate')";
if(mysqli_query($con,$insert))
{
 echo " ";
}
else
{
die('cannot insert data'.mysqli_error());
}
mysqli_close($con);
}  
}  
?>  

            </div>
        </div>
    </div>
</div>
    </body>








    
</html>