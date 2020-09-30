<?php
// print_r($_REQUEST);
$data = array("message" => "Unknown method", "status" => "server_error");
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    error_reporting(0);
    $sql1 = "SELECT `img` FROM `banners` WHERE `_bid`=$_POST[_bid]";
    $sql = "DELETE FROM `banners` WHERE `_bid`=$_POST[_bid]";
    // $data = array("message" => $sql, "status" => "success");
    // echo json_encode($data);
    // return;
    require '../../php/db.pvt.php';
    $conn = DB::getConnection();
    $result = $conn->query($sql1);
    if ($result == true) {
        $raw = $result->fetch_assoc();
        $directory = $raw['img'];
        if (unlink("../../" . $directory)) {
            $result = $conn->query($sql);
            if ($result == true) {
                $data = array("message" => "Banner Deleted Successfully!", "status" => "success");
            } else {
                $data = array("message" => "Image deleted, try again", "status" => "server_error");
            }
        } else {
            $data = array("message" => "Banner image not found", "status" => "server_error");
        }
    } else {
        $data = array("message" => "Something went wrong!", "status" => "server_error");
    }
}
echo json_encode($data);
return;
