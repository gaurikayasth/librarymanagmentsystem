<html>
<head><title>book table</title></head>
<a href="dashboard.php"><img src="arrow.png" width="42" height="42"</a>
<body>
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
echo "<font color=darkblue>"."<h1 align=center>"."issued books on ID"."</h1>";
echo "</br>";

$query1="SELECT bb.sr_no,bb.bid,b.bname,b.aname,b.price,b.category,bb.uid,u.name,u.email,u.course,bb.idate,bb.rdate,bb.fine FROM bookid bb INNER JOIN book b ON bb.bid=b.book_id INNER JOIN user u ON bb.uid=u.user_id";
$result=mysqli_query($con,$query1);
echo "<table  border=3  cellspacing=0 cellpadding=8 align=center>";
echo "<tr><th><font color=blue>SR_NO</th>
<th><font color=blue>Book id</th>
<th><font color=blue>Book name</th> 
<th><font color=blue>Author name</th>
<th><font color=blue>price</th>
<th><font color=blue>Book category</th>
<th><font color=blue>user id</th>
<th><font color=blue>user name</th> 
<th><font color=blue>email id</th>
<th><font color=blue>course</th>
<th><font color=blue>issue date</th>
<th><font color=blue>return date</th>
<th><font color=blue>Fine</th>
<th><font color=blue>Fine update</th>
<th><font color=blue>Delete</th></tr>";
while($row=mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td align='center'>"."<font color=black>".$row['sr_no']."</td>";
echo "<td align='center'>"."<font color=black>".$row['bid']."</td>";
echo "<td align='center'>"."<font color=black>".$row['bname']."</td>";
echo "<td align='center'>"."<font color=black>".$row['aname']."</td>";
echo "<td align='center'>"."<font color=black>"."Rs.".$row['price']."</td>";
echo "<td align='center'>"."<font color=black>".$row['category']."</td>";
echo "<td align='center'>"."<font color=black>".$row['uid']."</td>";
echo "<td align='center'>"."<font color=black>".$row['name']."</td>";
echo "<td align='center'>"."<font color=black>".$row['email']."</td>";
echo "<td align='center'>"."<font color=black>".$row['course']."</td>";
echo "<td align='center'>"."<font color=black>".$row['idate']."</td>";
echo "<td align='center'>"."<font color=black>".$row['rdate']."</td>";
echo "<td align='center'>"."<font color=black>".$row['fine']."</td>";
echo "<td>"; ?> <button style="background-color:blue; color:white" type="button"><a href="userfine.php?sr_no=<?php echo $row["sr_no"];?>&fine=<?php echo $row["fine"];?>" style="background-color:blue; color:white">Fine</a></button><?php echo "</td>";
echo "<td>"; ?> <button style="background-color:red; color:white" type="button"><a href="userbookdelete.php?sr_no=<?php echo $row["sr_no"];?>" style="background-color:red; color:white">Delete</a></button><?php echo "</td>";
echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>