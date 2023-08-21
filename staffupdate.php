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

$staff_id=$_GET['staff_id'];
$sname=$_GET['sname'];
$seid=$_GET['seid'];
$password=$_GET['password'];
$cpassword=$_GET['cpassword'];
$smnum=$_GET['smnum'];


?>
<html>
    <head>
        <title> login and registration form</title>
        <link rel="stylesheet" href="stylestaffregister.css">
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

      <div class="container">
         <div class="card">
             <div class="inner-box">
                <div class="card-front">
                   <h2> UPDATE STAFF </h2>
                      <form method="post"  >
                        <input type="text" class="input-box" name="name" id="t1" value="<?php echo $_GET['sname']; ?>" placeholder="Enter name" required><?php echo "<font color=red>"; ?><span class="error">* <?php echo $nameErr; ?> </span>  
    <br>
                        <input type="text" class="input-box" name="eid" id="t2" value="<?php echo $_GET['seid']; ?>" placeholder="Email-Id" required><span class="error">* <?php echo $emailErr; ?> </span>  
    <br>
                        <input type="text" class="input-box" name="mnum" id="t3" value="<?php echo $_GET['smnum']; ?>" placeholder="Mobile number" required><span class="error">* <?php echo $mobileErr; ?> </span>  
    <br>
                    <input type="password" class="input-box" name="password" id="t4" value="<?php echo $_GET['password']; ?>" placeholder="Enter Password" required><span class="error">* <?php echo $passwordErr; ?> </span>  
    <br>
                    <input type="password" class="input-box" name="cpassword" id="t5" value="<?php echo $_GET['cpassword']; ?>" placeholder="Confirm Password" required><span class="error">* <?php echo $cpasswordErr; ?> </span>  
    <br>               <span class="error">* <?php echo $msg; ?> </span><br>
                  <button type="submit" name="submit" value="ok" class="btn1" onclick="myFunction()">Update</button>
              
            </form>



            </div>
        </div>
    </div>
</div>
    </body>







    
</html>
<?php  
    if(isset($_POST['submit'])) {  
    if($nameErr == "" && $emailErr == "" && $mobileErr == "" && $passwordErr == "" && $cpasswordErr == "" && $msg =="") {  
$name=$_POST["name"];
$eid=$_POST["eid"];
$password=$_POST["password"];
$cpassword=$_POST["cpassword"];
$mnum=$_POST["mnum"];

$query="update staff set sname='$name',seid='$eid',password='$password',cpassword='$cpassword',smnum='$mnum' where staff_id='$staff_id'";
$data=mysqli_query($con,$query);
if($data)
{
 echo "<script>alert('record updated successfully!')</script>";
 ?>
 <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/librarymanagmentsystem/staffshow.php">
 <?php
}
else
{
 echo "failed to update record";
}
}
}
?>
