<?php
require('Dbconnects.php');

$member_HN=$_POST ["member_HN"];
$member_fname=$_POST ["member_fname"];
$member_lname=$_POST ["member_lname"];
$member_gender=$_POST ["member_gender"];
$member_birth=$_POST ["member_birth"];
$member_age=$_POST ["member_age"];

$sql ="UPDATE patient SET member_HN='$member_HN',member_fname='$member_fname',member_lname='$member_lname',member_gender='$member_gender',member_birth='$member_birth',member_age='$member_age' WHERE member_HN=$member_HN";

$result=mysqli_query($connect,$sql);

if($result){
    header("location:patients-lits.php");
    exit(0);
}else{
    echo"miss".mysqli_error($connect);
}
?>