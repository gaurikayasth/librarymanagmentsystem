<html>
<a href="admindashboard.php"><img src="arrow.png" width="42" height="42"</a>
<a href="dashboard.php"><img src="arrow1.png" width="35" height="35"</a>
</html>
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
echo "<font color=darkblue>"."<h1 align=center>"."user table"."</h1>";
echo "</br>";

$query1="select * from user";
$result=mysqli_query($con,$query1);
echo "<table  border=3  cellspacing=1 cellpadding=8 align=center>";
echo "<tr><th><font color=blue>user id</th>
<th><font color=blue>user name</th> 
<th><font color=blue>email id</th>
<th><font color=blue>password</th>
<th><font color=blue>confirm password</th>
<th><font color=blue>selected course</th>
<th><font color=blue>Update</th>
<th><font color=blue>Delete</th></tr>";

while($row=mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td align='center'>"."<font color=black>".$row['user_id']."</td>";
echo "<td align='center'>"."<font color=black>".$row['name']."</td>";
echo "<td align='center'>"."<font color=black>".$row['email']."</td>";
echo "<td align='center'>"."<font color=black>".$row['password']."</td>";
echo "<td align='center'>"."<font color=black>".$row['cpassword']."</td>";
echo "<td align='center'>"."<font color=black>".$row['course']."</td>";
echo "<td>"; ?> <button style="background-color:green; color:white" type="button"><a href="userupdate.php?user_id=<?php echo $row["user_id"];?>&name=<?php echo $row["name"];?>&email=<?php echo $row["email"];?>&password=<?php echo $row["password"];?>&cpassword=<?php echo $row["cpassword"];?>&course=<?php echo $row["course"];?>" style="background-color:green; color:white">update</a></button> <?php echo "</td>";
echo "<td>"; ?> <button style="background-color:red; color:white" type="button"><a href="userdelete.php?user_id=<?php echo $row["user_id"];?>" style="background-color:red; color:white">Delete</a></button><?php echo "</td>";
echo "</tr>";
} 
echo "</table>";
mysqli_close($con);
?>