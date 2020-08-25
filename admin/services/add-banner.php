<?php
$data = array("message" => "Unknown method", "status" => "server_error");
if ($_SERVER['REQUEST_METHOD'] === "POST" and isset($_FILES['image'])) {
    error_reporting(0);
    extract($_POST, EXTR_SKIP);

    if (isset($_FILES['image'])) {
        $directory = "img/banners/" . $_FILES['image']['name'];
        if (!move_uploaded_file($_FILES['image']['tmp_name'], "../../" . $directory)) {
            echo json_encode(array("message" => "File upload failed", "status" => "server_error"));
            return;
        }
    }

    require '../../php/db.pvt.php';

    $conn = DB::getConnection();
    $sqlOrder = "SELECT MAX(`b_order`) AS 'n_order' FROM `banners`";
    $result = $conn->query($sqlOrder);
    $orderData = $result->fetch_assoc();
    $newOrder = $orderData['n_order'] + 1;
    $sql = "INSERT INTO `banners` (`img`, `b_order`, `alt`) VALUES('$directory', $newOrder, " . (isset($alt) ? "'$alt'" : "NULL") . ")";
    if (isset($_POST['is_cta']) and $is_cta == "on") {
        $sql = "INSERT INTO `banners` (`img`, `b_order`, `alt`, `text`, `subtext`, `action_text`, `action_link`, `is_static`) VALUES('$directory', $newOrder, " . ((isset($alt) and strlen($alt) > 0) ? "'$alt'" : "NULL") . ", '$title', " . ((isset($subtitle) and strlen($alt) > 0) ? "'$subtitle'" : "NULL") . ", '$action_text', '$action_link', 0)";
    }

    $result = $conn->query($sql);

    if ($result) {
        $data = array("message" => "Banner Added successfully", "status" => "success");
    } else {
        $data = array("message" => "Something went wrong!", "status" => "server_error", "data" => $conn->error);

    }
}
echo json_encode($data);
return;
