<?php
 function get_user_count(){
    $con=mysqli_connect("localhost","root","");
    $db=mysqli_select_db($con,"library");
    $user_count="";
    $query1="select count(*) as user_id from user";
    $result=mysqli_query($con,$query1);
    while($row=mysqli_fetch_array($result)){
          $user_count=$row['user_id'];
    }
    return ($user_count);
 }

 

 function get_book_count(){
    $con=mysqli_connect("localhost","root","");
    $db=mysqli_select_db($con,"library");
    $book_count="";
    $query2="select count(*) as book_id from book";
    $result=mysqli_query($con,$query2);
    while($row=mysqli_fetch_array($result)){
          $book_count=$row['book_id'];
    }
    return ($book_count);
 }

 function get_issue_count(){
    $con=mysqli_connect("localhost","root","");
    $db=mysqli_select_db($con,"library");
    $issue_count="";
    $query3="select count(*) as sr_no from bookid";
    $result=mysqli_query($con,$query3);
    while($row=mysqli_fetch_array($result)){
          $issue_count=$row['sr_no'];
    }
    return ($issue_count);
 }

function get_issue_count1(){
    $con=mysqli_connect("localhost","root","");
    $db=mysqli_select_db($con,"library");
    $issue_count="";
    $query5="select count(*) as sr_no from bookbank";
    $result=mysqli_query($con,$query5);
    while($row=mysqli_fetch_array($result)){
          $issue_count=$row['sr_no'];
    }
    return ($issue_count);
 }

 function get_staff_count(){
    $con=mysqli_connect("localhost","root","");
    $db=mysqli_select_db($con,"library");
    $staff_count="";
    $query4="select count(*) as staff_id from staff";
    $result=mysqli_query($con,$query4);
    while($row=mysqli_fetch_array($result)){
          $staff_count=$row['staff_id'];
    }
    return ($staff_count);
 }


  
  ?>