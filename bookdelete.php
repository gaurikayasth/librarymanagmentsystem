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
$query="delete from book where book_id='$book_id'";
$result=mysqli_query($con,$query);
if($result)
{
 echo "record deleted from database";
}
else
{
 echo "failed to delete record from database";
}
mysqli_close($con);
?>
<script type="text/javascript">
window.location="bookshow.php";
window.alert("record deleted successfully");
</script>