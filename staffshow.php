<html>
<a href="admindashboard.php"><img src="arrow.png" width="42" height="42"</a>
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
echo "<font color=darkblue>"."<h1 align=center>"."staff table"."</h1>";
echo "</br>";

$query1="select * from staff";
$result=mysqli_query($con,$query1);
echo "<table  border=3  cellspacing=0 cellpadding=8 align=center>";
echo "<tr><th><font color=blue>staff id</th>
<th><font color=blue>staff name</th> 
<th><font color=blue>email id</th>
<th><font color=blue>mobile number</th>
<th><font color=blue>password</th>
<th><font color=blue>confirm password</th>
<th><font color=blue>Update</th>
<th><font color=blue>Delete</th></tr>";
while($row=mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td align='center'>"."<font color=black>".$row['staff_id']."</td>";
echo "<td align='center'>"."<font color=black>".$row['sname']."</td>";
echo "<td align='center'>"."<font color=black>".$row['seid']."</td>";
echo "<td align='center'>"."<font color=black>".$row['smnum']."</td>";
echo "<td align='center'>"."<font color=black>".$row['password']."</td>";
echo "<td align='center'>"."<font color=black>".$row['cpassword']."</td>";
echo "<td>"; ?> <button style="background-color:green; color:white" type="button"><a href="staffupdate.php?staff_id=<?php echo $row["staff_id"];?>&sname=<?php echo $row["sname"];?>&seid=<?php echo $row["seid"];?>&smnum=<?php echo $row["smnum"];?>&password=<?php echo $row["password"];?>&cpassword=<?php echo $row["cpassword"];?>" style="background-color:green; color:white">update</a></button> <?php echo "</td>";
echo "<td>"; ?> <button style="background-color:red; color:white" type="button"><a href="staffdelete.php?staff_id=<?php echo $row["staff_id"];?>" style="background-color:red; color:white">Delete</a></button><?php echo "</td>";
echo "</tr>";

}
echo "</table>";
mysqli_close($con);
?>
