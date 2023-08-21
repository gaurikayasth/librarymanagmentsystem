<?php
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

$user_id=$_GET['user_id'];
$name=$_GET['name'];
$email=$_GET['email'];
$password=$_GET['password'];
$cpassword=$_GET['cpassword'];
$course=$_GET['course'];


?>
<html>
   <head>
        <title> login and registration form</title>
        <link rel="stylesheet" href="styleadmin.css">

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
<div class="container">
    <div class="card">
        <div class="inner-box">
            <div class="card-front">
                <h2>UPDATE USER</h2>
                <form method="post" >
                    <input type="name" class="input-box" name="name" value="<?php echo $_GET['name']; ?>" placeholder="Enter name"  required><?php echo "<font color=red>"; ?><span class="error">* <?php echo $nameErr; ?> </span> 
    <br> 
                    
                    <input type="text" class="input-box" name="eid" placeholder="Email-Id" value="<?php echo $_GET['email']; ?>" required><span class="error">* <?php echo $emailErr; ?> </span>  
    <br> 
                    
                    <input type="password" class="input-box" name="password" placeholder="Enter Password" value="<?php echo $_GET['password']; ?>" required><span class="error">* <?php echo $passwordErr; ?> </span>  
    <br> 
                    <input type="password" class="input-box" name="cpassword"placeholder="Confirm Password" value="<?php echo $_GET['cpassword']; ?>" required><span class="error">* <?php echo $cpasswordErr; ?> </span>  
    <br>  
                    <select name="course" id="c1" class="input-box">
                        <option value="<?php echo $_GET['course']; ?>"> <?php echo $_GET['course']; ?></option>
                        <option value="b.com-1"> b.com-1</option>
                        <option value="b.com-2"> b.com-2</option>
                        <option value="b.com-3"> b.com-3</option>
                        <option value="bbaca-1"> bbaca-1</option>
                        <option value="bbaca-2"> bbaca-2</option>
                        <option value="bbaca-3"> bbaca-3</option>
                    </select><span class="error">* <?php echo $courseErr; ?> </span>  
    <br><br>  
                <button type="submit" name="submit" id="submit" class="btn1" onclick="myFunction()">update</button>
               
            </form>  
          </div>
        </div>
    </div>
</div>

    </body>





    </body>
</html>
<?php  
    if(isset($_POST['submit'])) {  
    if($nameErr == "" && $emailErr == "" && $passwordErr == "" && $cpasswordErr == "" && $courseErr == "") {  
$name=$_POST["name"];
$eid=$_POST["eid"];
$password=$_POST["password"];
$cpassword=$_POST["cpassword"];
$course=$_POST["course"];

$query="update user set name='$name',email='$eid',password='$password',cpassword='$cpassword',course='$course' where user_id='$user_id'";
$data=mysqli_query($con,$query);
if($data)
{
 echo "<script>alert('record updated successfully!')</script>";
 ?>
 <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/librarymanagmentsystem/usershow.php">
 <?php
}
else
{
 echo "failed to update record";
}
}
}
?>



