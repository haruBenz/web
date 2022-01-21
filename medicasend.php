<?php

    session_start();

    if (isset($_POST["submit"])) {
        $comment = $_POST["comment"];

        $sToken = "iM1v4QUYmKkw95AplTw2DBNJGQEIJbUkgUpl873UQAI";
        $sMessage = "รายละเอียดจากการยืนยันเพิ่มเติม\n";
        $sMessage .= "ความคิดเห็นของแพทย์: " . $comment . " \n";
        $sMessage .= "Web Application: https://www.youtube.com/watch?v=c9RzZpV460k\n";

        $chOne = curl_init(); 
        curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
        curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
        curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
        curl_setopt( $chOne, CURLOPT_POST, 1); 
        curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
        $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
        curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
        $result = curl_exec( $chOne ); 

        if ($result) {
            $_SESSION["success"] = "ส่งข้อมูลแจ้งเตือนเรียบร้อยแล้ว!";
           
        } else {
            $_SESSION["error"] = "ส่งข้อมูลแจ้งเตือนผิดพลาด!";
           
        }

    }
?>