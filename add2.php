<?php

require('Dbconnects.php'); 

$or_HN=$_POST["or_HN"];
$or_code=$_POST["or_code"];
$or_n=$_POST["or_n"];
$or_time=implode(",",$_POST["or_time"]);
$or_ptime=implode(",",$_POST["or_ptime"]);
$or_tt=$_POST["or_tt"];
$or_day=$_POST["or_day"];
$or_unit=$_POST["or_unit"];

// echo $or_HN;
// echo $or_code;
// echo $or_n;
// echo $or_time;
// echo $or_ptime;
// echo $or_tt;
// echo $or_day;

$sql ="INSERT INTO ordermed(or_HN, or_code, or_n, or_time, or_ptime, or_tt, or_day,or_unit) 
VALUES('$or_HN', '$or_code', '$or_n', '$or_time', '$or_ptime','$or_tt', '$or_day','$or_unit')";
$result=mysqli_query($connect,$sql);
// $sql ="UPDATE patient SET or_HN='$or_HN',or_code='$member_fname',member_lname='$member_lname',member_gender='$member_gender',member_birth='$member_birth',member_age='$member_age' WHERE member_HN=$member_HN";

// $result=mysqli_query($connect,$sql);


if($result){
    echo("สำเร็จ");
    exit(0);
}else{
    echo"miss";
}
?>
