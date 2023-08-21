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
$query6="select rdate from bookid where sr_no='$sr_no'";
    $result=mysqli_query($con,$query6);
    while($row=mysqli_fetch_assoc($result)){
          $d=strtotime($row['rdate']);
          $c=strtotime(date("Y-m-d"));
          $diff=$c-$d;
          if($diff>=0)
          {
           $day=floor($diff/(60*60*24));
           $fine=$day * 2;
          }
    }


$update="UPDATE bookid SET fine='$fine' WHERE sr_no='$sr_no'";
$data=mysqli_query($con,$update);
if($data)
{
  echo "update";
}
else
{
 echo "failed to delete record from database";
}
mysqli_close($con);
?>
<script type="text/javascript">
var x="<?php echo "$fine";?>";
window.location="user_bookidtable.php";
window.alert("fine of student="+"Rs."+x);
</script>