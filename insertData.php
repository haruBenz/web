<?php

require('Dbconnects.php');

 $member_HN=$_POST ["member_HN"];
 $member_fname=$_POST ["member_fname"];
 $member_lname=$_POST ["member_lname"];
 $member_gender=$_POST ["member_gender"];
 $member_birth=$_POST ["member_birth"];
 $member_age=$_POST ["member_age"];

 $sql ="INSERT INTO patient(member_HN,member_fname,member_lname,member_gender,member_birth,member_age)  VALUES('$member_HN','$member_fname','$member_lname','$member_gender','$member_birth','$member_age')";
 $result=mysqli_query($connect,$sql);


if($result){
    header("location:.php");
    exit(0);
}else{
    echo"miss";
}
?>