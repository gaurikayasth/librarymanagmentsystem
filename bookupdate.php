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

$book_id=$_GET['book_id'];
$bname=$_GET['bname'];
$aname=$_GET['aname'];
$num=$_GET['num'];
$price=$_GET['price'];
$category=$_GET['category'];


?>
<html>
    <head>
        <title> login and registration form</title>
        <link rel="stylesheet" href="styleaddbook.css">
    </head>
    <body background="zg.jpg" style="background-repeat: no-repeat;background-size:100%">
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

<div class="container">
    <div class="card">
        <div class="inner-box">
            <div class="card-front">
                <h2>UPDATE BOOK</h2>
                <form method="post" >
                    <input type="text" class="input-box" placeholder="Book name" value="<?php echo $_GET['bname']; ?>" name="bname" required><?php echo "<font color=red>"; ?><span class="error">* <?php echo $bnameErr; ?> </span>  
    <br>
                    <input type="text" class="input-box" placeholder="Author name" value="<?php echo $_GET['aname']; ?>" name="aname" required><span class="error">* <?php echo $anameErr; ?> </span>
    <br>                <input type="text" class="input-box" placeholder="No of Books" value="<?php echo $_GET['num']; ?>" name="num" required><span class="error">* <?php echo $noErr; ?> </span>
    <br>
                    <input type="text" class="input-box" placeholder="Actual Price" value="<?php echo $_GET['price']; ?>" name="price" required><span class="error">* <?php echo $priceErr; ?> </span>
    <br>
                    <select name="category" id="cat1" class="course">
                        <option value="<?php echo $_GET['category']; ?>"> <?php echo $_GET['category']; ?></option>
                        <option value="computer"> Computer</option>
                        <option value="management"> Management</option>
                        <option value="Business"> Business</option>
                        <option value="Banking"> Banking</option>
                        <option value="Marketing"> Marketing</option>
                        <option value="Dictionaries"> Dictionaries</option>
                    </select><span class="error">* <?php echo $categoryErr; ?> </span>
    <br>
                <button type="submit" name="submit" class="btn1">Update</button>
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
    if($bnameErr == "" && $anameErr == "" && $noErr == "" && $priceErr == "" && $categoryErr == "") {  
$bname=$_POST["bname"];
$aname=$_POST["aname"];
$num=$_POST["num"];
$price=$_POST["price"];
$category=$_POST["category"];

$query="update book set bname='$bname',aname='$aname',num='$num',price='$price',category='$category' where book_id='$book_id'";
$data=mysqli_query($con,$query);
if($data)
{
 echo "<script>alert('record updated successfully!')</script>";
 ?>
 <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/librarymanagmentsystem/bookshow.php">
 <?php
}
else
{
 echo "failed to update record";
}
}
}
?>