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
if(document.getElementById("t4").value.length != 6)
{
 alert ('Password length is 6');
 return false;
}

if(email=="admin@gmail.com" && pwd=="383838"){
       alert("valid");
       return true;
       }
else{
     alert("invalid admin information")
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
                <h2>ADMIN LOGIN</h2>
                <form method="post" action="admindashboard.php" onsubmit="return registration();" >
                    <input type="email" class="input-box" placeholder="Your email id" id="t2" required>
                    <input type="password" class="input-box" placeholder="password" id="t4" required>
                   
                    <button type="submit" class="submit-btn" name="submit" >submit</button><br><br>

                
                <button type="reset" class="btn2">Cancel</button><br><br><br>
                <a href="stafflogin.php" class="staff_link">I'm Staff Member</a>
            </form>
            </div>
        </div>
    </div>
</div>
    </body>








    </body>
</html>