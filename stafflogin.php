<html>
    <head>
        <title> login and registration form</title>
        <link rel="stylesheet" href="styleadmin.css">
    </head>
<script>
function registration(){                 
var email= document.getElementById("t2").value;			
var pwd= document.getElementById("t4").value;
var letters = /^[a-zA-Z\s]*$/;
var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

if (!filter.test(email))
{
 alert('Invalid email');
 return false;
}
if(document.getElementById("t4").value.length != 4)
{
 alert ('Password length must be 4');
 return false;
}
if(email=="akshay@gmail.com" && pwd=="2233"){
       alert("valid");
      return true;
       }
if(email=="rohit@gmail.com" && pwd=="1020"){
       alert("valid");
       return true;
       }
if(email=="sachin@gmail.com" && pwd=="2345"){
       alert("valid");
       return true;
       }
if(email=="vikas@gmail.com" && pwd=="0989"){
       alert("valid");
       return true;
       }
else{
     alert("invalid staff information")
     return false;
}

return true;
}
</script> 
    <body background="zg.jpg" style="background-repeat: no-repeat;background-size:100% 100%">
<div class="container">
    <div class="card">
        <div class="inner-box">
            <div class="card-front">
                <h2>STAFF LOGIN</h2>
                <form method="post" action="dashboard.php" onsubmit="return registration();" >
                    <input type="email" class="input-box" placeholder="Your email id" name="eid" id="t2" required>
                    <input type="password" class="input-box" placeholder="password" name="password" id="t4" required>
                    <button type="submit" class="submit-btn" name="submit" >submit</button><br><br><br>
                </form>
                <a href="adminloginfront.php"><button type="button" class="btn2">Cancel</button></a><br><br><br>
            </div>
        </div>
    </div>
</div>
    </body>








    </body>
</html>