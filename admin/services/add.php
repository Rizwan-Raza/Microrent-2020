<?php 
// $sql = "DROP TABLE `queries`;";
//     require "../../php/db.pvt.php";
//     $conn = DB::getConnection();
//     if($conn->query($sql)) {
//         echo "success";
//         $sql = "CREATE TABLE `queries` (`_qid` int(11) NOT NULL AUTO_INCREMENT, `name` varchar(30) NOT NULL, `email` varchar(50) NOT NULL, `phone` varchar(15) NOT NULL, `what` varchar(100) DEFAULT NULL,`message` text NOT NULL, `time` timestamp NOT NULL DEFAULT current_timestamp(), PRIMARY KEY (`_qid`));";
//         if($conn->query($sql)) {
//             echo "success2";
//         } else {
//             echo "error2";
//             echo mysqli_error($conn);
//         }
//     } else {
//         echo mysqli_error($conn);
//     }