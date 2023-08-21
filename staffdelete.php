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

$staff_id=$_GET['staff_id'];
$query="delete from staff where staff_id='$staff_id'";
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
window.location="staffshow.php";
window.alert("record deleted successfully");
</script>