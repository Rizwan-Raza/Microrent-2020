<?php
$data = array("message" => "Unknown method", "status" => "server_error");
if ($_SERVER['REQUEST_METHOD'] === "GET" and isset($_GET['what'])) {
    error_reporting(0);
    extract($_REQUEST, EXTR_SKIP);
    $sql = "SELECT * FROM `$what`";
    if (isset($filter) and isset($with)) {
        $sql .= " WHERE `$filter`=" . $with;
    }
    // echo $sql;
    require '../../php/db.pvt.php';
    if ($result = DB::getConnection()->query($sql)) {
        $data = array();
        while ($row = $result->fetch_assoc()) {
            array_push($data, $row);
        }
    } else {
        $data = array("message" => "Something went wrong!", "status" => "server_error", "conn_error" => mysqli_connect_error());
    }
}
echo json_encode($data);
