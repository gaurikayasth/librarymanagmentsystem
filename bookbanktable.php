<html>
<head><title>book bank table</title></head>
<body>
<?php
if(isset($_POST["submit"])){
$bid=$_POST["bid"];
$uid=$_POST["uid"];
$idate=$_POST["idate"];
$rdate=$_POST["rdate"];

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
echo "<font color=hotpink>"."<h1 align=center>"."Book Bank table"."</h1>";
echo "</br>";

$insert="insert into bookbank(bid,uid,idate,rdate) values('$bid','$uid','$idate','$rdate')";
if(mysqli_query($con,$insert))
{
 echo " ";
}
else
{
die('cannot insert data'.mysqli_error());
}
$query1="select * from bookbank";
$result=mysqli_query($con,$query1);
echo "<table  border=10  cellspacing=1 cellpadding=1 align=center>";
echo "<tr><th><font color=blue>Sr_no</th>
<th><font color=blue>Book Id</th> 
<th><font color=blue>User Id</th>
<th><font color=blue>Issue Date</th>
<th><font color=blue>Return Date</th>
<th><font color=blue>Update</th>
<th><font color=blue>Delete</th></tr>";
while($row=mysqli_fetch_array($result))
{
echo "<tr><td align='center'>"."<font color=navyblue>".$row['sr_no'].
"</td><td align='center'>"."<font color=navyblue>".$row['bid'].
"</td><td align='center'>"."<font color=navyblue>".$row['uid'].
"</td><td align='center'>"."<font color=navyblue>".$row['idate'].
"</td><td align='center'>"."<font color=navyblue>".$row['rdate'].
"</td></br></tr>";
/*echo"<tr>";
echo"<td>"; ?> <button type="button">update</button><?php echo "</td>";
echo"</tr>";*/
}
echo "</table>";
mysqli_close($con);
}
?>
</body>
</html>