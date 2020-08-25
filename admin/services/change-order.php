<?php
// print_r($_REQUEST);
$data = array("message" => "Unknown method", "status" => "server_error");
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    error_reporting(0);
    extract($_REQUEST, EXTR_SKIP);
    // print_r($_POST);
    session_start();
    if($change == 1) {
        $sqlOrder = "SELECT `b_order`, `_bid` FROM `banners` WHERE `b_order` > $order ORDER BY `b_order` ASC LIMIT 0, 1";
    } else {
        $sqlOrder = "SELECT `b_order`, `_bid` FROM `banners` WHERE `b_order` < $order ORDER BY `b_order` DESC LIMIT 0, 1";
    }

    // echo $sql;
    require '../../php/db.pvt.php';
    $conn = DB::getConnection();
    $result = $conn->query($sqlOrder);
    if ($result == true) {
        $sibData = $result->fetch_assoc();
        $sql = "UPDATE `banners` SET `b_order` = $sibData[b_order] WHERE `_bid` = $_bid; UPDATE `banners` SET `b_order`= $order WHERE `_bid`=$sibData[_bid]";
        $result = $conn->multi_query($sql);
        if($result == true) {
            $data = array("message" => "Changed Order!", "status" => "success");
        } else {
            $data = array("message" => "Something went wrong!", "status" => "server_error", "data"=>$conn->error);
        }
    } else {
        // echo $conn->error;
        $data = array("message" => "Can't get order nubmer", "status" => "server_error");
    }
}
echo json_encode($data);
return;
