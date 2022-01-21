
<?php

include('Dbconnects.php'); 

$med_code=$_POST ["med_code"];
$med_n=$_POST ["med_n"];
$med_unit=$_POST ["med_unit"];
$med_pp=$_POST ["med_pp"];
$med_pm=$_POST ["med_pm"];
$med_p=$_POST ["med_p"];
$med_e=$_POST ["med_e"];
$med_w=$_POST ["med_w"];

	
$sql = "INSERT INTO medicine(med_code,med_n,med_unit,med_pp,med_pm,med_p,med_e,med_w)  
VALUES('$med_code','$med_n', '$med_unit','$med_pp','$med_pm','$med_p','$med_e','$med_w')";
		
$result = mysqli_query($connect, $sql) or die ("Error in query: $sql " . mysqli_error());
	
mysqli_close($connect);


	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('Upload File Succesfuly');";
	echo "window.location = 'update.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error back to upload again');";
    echo "window.location = 'update.php'; ";
	echo "</script>";
}
?>