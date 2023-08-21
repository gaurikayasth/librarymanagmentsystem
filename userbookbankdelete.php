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

$sr_no=$_GET['sr_no'];
$query="delete from bookbank where sr_no='$sr_no'";
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
window.location="user_booktable.php";
window.alert("record deleted successfully");
</script>