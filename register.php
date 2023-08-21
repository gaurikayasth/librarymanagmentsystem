<html>
   <head>
        <title> login and registration form</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="navstyle.css">

    </head>
    <body background="zg.jpg" style="background-repeat:no-repeat;background-size:100% 100%">
<?php  
// define variables to empty values  
$nameErr = $emailErr = $passwordErr = $cpasswordErr = $courseErr = "";  
$name = $eid = $password = $cpassword = $course = "";  
  
//Input fields validation  
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
      
//String Validation  
    if (empty($_POST["name"])) {  
         $nameErr = "Name is required";  
    } else {  
        $name = input_data($_POST["name"]);  
            // check if name only contains letters and whitespace  
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {  
                $nameErr = "Only alphabets and white space are allowed";  
            }  
    }  
      
    //Email Validation   
    if (empty($_POST["eid"])) {  
            $emailErr = "Email is required";  
    } else {  
            $eid = input_data($_POST["eid"]);  
            // check that the e-mail address is well-formed  
            if (!filter_var($eid, FILTER_VALIDATE_EMAIL)) {  
                $emailErr = "Invalid email format";  
            }  
     }  
    
    //Number Validation  
    if (empty($_POST["password"])) {  
            $passwordErr = "password is required";  
    } else {  
            $password = input_data($_POST["password"]);  
            // check if mobile no is well-formed  
            if (!preg_match ("/^[0-9]*$/", $password) ) {  
            $passwordErr = "Only numeric value is allowed.";  
            }  
        //check mobile no length should not be less and greator than 10  
        if (strlen ($password) != 4) {  
            $passwordErr = "password must contain 4 digits.";  
            }  
    }  
      
 if (empty($_POST["cpassword"])) {  
            $cpasswordErr = "password is required";  
    } else {  
            $cpassword = input_data($_POST["cpassword"]);  
            // check if mobile no is well-formed  
            if (!preg_match ("/^[0-9]*$/", $cpassword) ) {  
            $cpasswordErr = "Only numeric value is allowed.";  
            }  
        //check mobile no length should not be less and greator than 10  
        if (strlen ($cpassword) != 4) {  
            $cpasswordErr = "confirm password must contain 4 digits.";  
            }  
    } 

if(($_POST["password"]) != ($_POST["cpassword"]) )
   {
         $msg = "passwords doesn't match";
    } 
   
if(!isset($_POST['course'])) 
{
  $courseErr= "You forgot to select your Gender";
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
                <h2>ADD USER</h2>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <input type="name" class="input-box" name="name" placeholder="Enter name" required><?php echo "<font color=red>"; ?><span class="error">* <?php echo $nameErr; ?> </span>  
    <br> 
                    
                    <input type="text" class="input-box" name="eid" placeholder="Email-Id" required><span class="error">* <?php echo $emailErr; ?> </span>  
    <br> 
                    
                    <input type="password" class="input-box" name="password" placeholder="Enter Password" required><span class="error">* <?php echo $passwordErr; ?> </span>  
    <br> 
                    <input type="password" class="input-box" name="cpassword"placeholder="Confirm Password" required><span class="error">* <?php echo $cpasswordErr; ?> </span>  
    <br>  
                    <select name="course" id="c1" class="input-box">
                        <option value="b.com-1"> b.com-1</option>
                        <option value="b.com-2"> b.com-2</option>
                        <option value="b.com-3"> b.com-3</option>
                        <option value="bbaca-1"> bbaca-1</option>
                        <option value="bbaca-2"> bbaca-2</option>
                        <option value="bbaca-3"> bbaca-3</option>
                    </select><span class="error">* <?php echo $courseErr; ?> </span>  
    <br><br>  
                <button type="submit" name="submit" id="submit" class="btn1" onclick="myFunction()">OK</button>
                <a href="dashboard.php"><button type="button" name="back" class="btn2">Back</button></a>
            </form>
<?php  
    if(isset($_POST['submit'])) {  
    if($nameErr == "" && $emailErr == "" && $passwordErr == "" && $cpasswordErr == "" && $courseErr == "") {  
$name=$_POST["name"];
$eid=$_POST["eid"];
$password=$_POST["password"];
$cpassword=$_POST["cpassword"];
$course=$_POST["course"];

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
echo "<font color=darkblue>"."<h1 align=center>"."user added successfully!"."</h1>";
echo "</br>";

$insert="insert into user(name,email,password,cpassword,course) values('$name','$eid','$password','$cpassword','$course')";
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








    </body>
</html>