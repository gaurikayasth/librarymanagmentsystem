<html>
    <head>
        <title> login and registration form</title>
        <link rel="stylesheet" href="stylestaffregister.css">
        <link rel="stylesheet" href="navstyle.css">
    </head>
    <body background="zg.jpg" style="background-repeat: no-repeat;background-size:100%">
       <?php  
          // define variables to empty values  
          $nameErr = $emailErr = $mobileErr = $passwordErr = $cpasswordErr = $msg = "";  
          $name = $eid = $mnum = $password = $cpassword = "";  
  
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
            if (empty($_POST["mnum"])) {  
            $mobileErr = "Mobile no is required";  
            } else {  
            $mnum = input_data($_POST["mnum"]);  
          // check if mobile no is well-formed  
            if (!preg_match ("/^[0-9]*$/", $mnum) ) {  
            $mobileErr = "Only numeric value is allowed.";  
            }  
          //check mobile no length should not be less and greator than 10  
            if (strlen ($mnum) != 10) {  
            $mobileErr = "Mobile no must contain 10 digits.";  
            }  
        }  
   
            if(($_POST["password"]) != ($_POST["cpassword"]) ){
             $msg = "passwords doesn't match";
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
   
         <div class="container">
         <div class="card">
             <div class="inner-box">
                <div class="card-front">
                   <h2> ADD STAFF </h2>
                      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
                        <input type="text" class="input-box" name="name" id="t1" placeholder="Enter name" required><?php echo "<font color=red>"; ?><span class="error">* <?php echo $nameErr; ?> </span>  
    <br>
                        <input type="text" class="input-box" name="eid" id="t2" placeholder="Email-Id" required><span class="error">* <?php echo $emailErr; ?> </span>  
    <br>
                        <input type="text" class="input-box" name="mnum" id="t3" placeholder="Mobile number" required><span class="error">* <?php echo $mobileErr; ?> </span>  
    <br>
                    <input type="password" class="input-box" name="password" id="t4" placeholder="Enter Password" required><span class="error">* <?php echo $passwordErr; ?> </span>  
    <br>
                    <input type="password" class="input-box" name="cpassword" id="t5" placeholder="Confirm Password" required><span class="error">* <?php echo $cpasswordErr; ?> </span>  
    <br>               <span class="error">* <?php echo $msg; ?> </span><br>
                  <button type="submit" name="submit" value="ok" class="btn1" onclick="myFunction()">OK</button>
                <a href="admindashboard.php"><button type="button" class="btn2">Cancel</button></a>
            </form>
<?php  
    if(isset($_POST['submit'])) {  
    if($nameErr == "" && $emailErr == "" && $mobileErr == "" && $passwordErr == "" && $cpasswordErr == "" && $msg =="") {  
$name=$_POST["name"];
$eid=$_POST["eid"];
$password=$_POST["password"];
$cpassword=$_POST["cpassword"];
$mnum=$_POST["mnum"];

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
echo "<font color=darkblue>"."<h1 align=center>"."Staff added successfully"."</h1>";
echo "</br>";

$insert="insert into staff(sname,seid,smnum,password,cpassword) values('$name','$eid','$mnum','$password','$cpassword')";
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