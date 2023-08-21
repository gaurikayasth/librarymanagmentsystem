<html>
    <head>
        <title> login and registration form</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="navstyle.css">
    </head>
    <body background="zg.jpg" style="background-repeat: no-repeat;background-size:100% 100%">
<?php  
// define variables to empty values  
$bnameErr = $anameErr = $noErr = $priceErr = $categoryErr = "";  
$bname = $aname = $num = $price = $category = "";  
  
//Input fields validation  
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
      
//String Validation  
    if (empty($_POST["bname"])) {  
         $bnameErr = "Book name is required";  
    } else {  
        $bname = input_data($_POST["bname"]);  
            // check if name only contains letters and whitespace  
            if (!preg_match("/^[a-zA-Z ]*$/",$bname)) {  
                $bnameErr = "Only alphabets and white space are allowed";  
            }  
    } 
//String Validation  
    if (empty($_POST["aname"])) {  
         $anameErr = "Author name is required";  
    } else {  
        $aname = input_data($_POST["aname"]);  
            // check if name only contains letters and whitespace  
            if (!preg_match("/^[a-zA-Z ]*$/",$aname)) {  
                $anameErr = "Only alphabets and white space are allowed";  
            }  
    }   
      
    
    
    //Number Validation  
    if (empty($_POST["num"])) {  
            $noErr = "number of books is required";  
    } else {  
            $num= input_data($_POST["num"]);  
            // check if mobile no is well-formed  
            if (!preg_match ("/^[0-9]*$/", $num) ) {  
            $noErr = "Only numeric value is allowed.";  
            }  
        }  
      
 if (empty($_POST["price"])) {  
            $priceErr = "price is required";  
    } else {  
            $price= input_data($_POST["price"]);  
            // check if mobile no is well-formed  
            if (!preg_match ("/^[0-9]*$/", $price) ) {  
            $priceErr = "Only numeric value is allowed.";  
            }  
        }  

   
if(!isset($_POST['category'])) 
{
  $categoryErr= "You forgot to select your category";
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
                <h2>ADD BOOK</h2>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <input type="text" class="input-box" placeholder="Book name" name="bname" required><?php echo "<font color=red>"; ?><span class="error">* <?php echo $bnameErr; ?> </span>  
    <br>
                    <input type="text" class="input-box" placeholder="Author name" name="aname" required><span class="error">* <?php echo $anameErr; ?> </span>
    <br>                <input type="text" class="input-box" placeholder="No of Books" name="num" required><span class="error">* <?php echo $noErr; ?> </span>
    <br>
                    <input type="text" class="input-box" placeholder="Actual Price" name="price" required><span class="error">* <?php echo $priceErr; ?> </span>
    <br>
                    <select name="category" id="cat1" class="course">
                        <option value="computer"> Computer</option>
                        <option value="management"> Management</option>
                        <option value="Business"> Business</option>
                        <option value="Banking"> Banking</option>
                        <option value="Marketing"> Marketing</option>
                        <option value="Dictionaries"> Dictionaries</option>
                    </select><span class="error">* <?php echo $categoryErr; ?> </span>
    <br>
                <button type="submit" name="submit" class="btn1">OK</button>
                <a href="dashboard.php"><button type="button" name="back" class="btn2">Back</button></a>
            </form>
<?php  
    if(isset($_POST['submit'])) {  
    if($bnameErr == "" && $anameErr == "" && $noErr == "" && $priceErr == "" && $categoryErr == "") {  
$bname=$_POST["bname"];
$aname=$_POST["aname"];
$num=$_POST["num"];
$price=$_POST["price"];
$category=$_POST["category"];

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
echo "<font color=darkblue>"."<h1 align=center>"."Book added successfully"."</h1>";
echo "</br>";

$insert="insert into book(bname,aname,num,price,category) values('$bname','$aname','$num','$price','$category')";
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