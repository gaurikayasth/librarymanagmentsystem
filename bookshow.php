<html>
<head><title>book table</title></head>
<body>
<a href="admindashboard.php"><img src="arrow.png" width="42" height="42"</a>
<a href="dashboard.php"><img src="arrow1.png" width="35" height="35"</a>
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
echo "<font color=darkblue>"."<h1 align=center>"."Book table"."</h1>";
echo "</br>";

$query1="select * from book";
$result=mysqli_query($con,$query1);
echo "<table  border=3  cellspacing=0 cellpadding=8 align=center>";
echo "<tr><th><font color=blue>Book id</th>
<th><font color=blue>Book name</th> 
<th><font color=blue>Author name</th>
<th><font color=blue>Number of books</th>
<th><font color=blue>Actual price</th>
<th><font color=blue>Book category</th>
<th><font color=blue>Update</th>
<th><font color=blue>Delete</th></tr>";
while($row=mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td align='center'>"."<font color=black>".$row['book_id']."</td>";
echo "<td align='center'>"."<font color=black>".$row['bname']."</td>";
echo "<td align='center'>"."<font color=black>".$row['aname']."</td>";
echo "<td align='center'>"."<font color=black>".$row['num']."</td>";
echo "<td align='center'>"."<font color=black>".$row['price']."</td>";
echo "<td align='center'>"."<font color=black>".$row['category']."</td>";
echo "<td>"; ?> <button style="background-color:green; color:white" type="button"><a href="bookupdate.php?book_id=<?php echo $row["book_id"];?>&bname=<?php echo $row["bname"];?>&aname=<?php echo $row["aname"];?>&num=<?php echo $row["num"];?>&price=<?php echo $row["price"];?>&category=<?php echo $row["category"];?>" style="background-color:green; color:white">update</a></button> <?php echo "</td>";
echo "<td>"; ?> <button style="background-color:red; color:white" type="button"><a href="bookdelete.php?book_id=<?php echo $row["book_id"];?>" style="background-color:red; color:white">Delete</a></button><?php echo "</td>";
echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>