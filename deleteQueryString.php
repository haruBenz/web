<?php
require("Dbconnects.php");
$member_HN =  $_GET["HN"];

$sql="DELETE FROM patient WHERE member_HN =$member_HN";

$result=mysqli_query($connect,$sql);

if($result){
    header("location:patients-lits.php");
    exit(0);
}else{
    echo "เกิดข้อผิดพลาดเกิดขึ้น";
}
?>