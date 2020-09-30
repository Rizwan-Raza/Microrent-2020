<?php
header('Access-Control-Allow-Origin: *');
// print_r($_REQUEST);
// // print_r($_REQUEST);
$data = array("message" => "Unknown method", "status" => "server_error");
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['name']) and isset($_POST['email']) and isset($_POST['phone']) and isset($_POST['what']) and isset($_POST['msg'])) {
        error_reporting(0);
        extract($_POST, EXTR_SKIP);
        $sql = "INSERT INTO `queries`(`name`, `email`, `phone`, `what`, `message`) VALUES ('$name','$email','$phone', '$what', '$msg')";
        // $sql = "INSERT INTO `queries`(`name`, `email`, `phone`, `message`, `time`) VALUES ('$name','$email','$phone', '$msg', CONVERT_TZ(CURRENT_TIMESTAMP, '+00:00', '+05:30'))";
        // $sql = "INSERT INTO `queries`(`name`, `email`, `phone`, `message`, `time`) VALUES ('$name','$email','$phone', '$msg', CURRENT_TIMESTAMP)";
        require 'db.pvt.php';
        $conn = DB::getConnection();
        if ($conn->query($sql) === true) {
            // For testing purpose only.
            // $to = "rizwan.raza987@gmail.com";
            $to = "microrentindia@gmail.com";
            $from = "$name <$email>";
            $subject = "Enquiry from Microrent India Web Platform.";
            $body = '<!DOCTYPE html>
            <html>
            
            <head>
                <meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
            </head>
            
            <body style="font-family: Arial, Helvetica, sans-serif;margin:0px;background-color: #ffffff;">
                <table
                    style="background-color: #eeeeee;padding: 8px 16px;width: 100%;box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);">
                    <tr>
<<<<<<< HEAD
                        <td><img loading="lazy" src="http://microrentindia.com/img/logo.png" height="50px" alt="Microrent India" /></td>
=======
                        <td><img src="http://microrentindia.com/img/logo.png" height="50px" alt="Microrent India" /></td>
>>>>>>> 8ef17d1897278fcce84c0de24b0e93728ce31a76
                        <td style="line-height: 50px;vertical-align: top; margin:0px; font-size: 32px; font-weight: 500;">Enquiry
                            from Microrent India Web</td>
                    </tr>
                </table>
                <table style="padding: 8px 16px;width: 100%;font-weight: 500;" cellspacing="10">
                    <tr>
                        <td style="color: #2a8788;width: 30%">Name:</td>
                        <td style="width: 70%;">' . $name . '</td>
                    </tr>
                    <tr>
                        <td style="color: #2a8788;width: 30%">Email:</td>
                        <td style="width: 70%;">' . $email . '</td>
                    </tr>
                    <tr>
                        <td style="color: #2a8788;width: 30%">Number:</td>
                        <td style="width: 70%;"><a href="tel:' . $phone . '">' . $phone . '</a></td>
                    </tr>
                    <tr>
                        <td style="color: #2a8788;width: 30%">Looking for:</td>
                        <td style="width: 70%;">' . $what . '</td>
                    </tr>
                    <tr>
                        <td style="color: #2a8788;width: 30%">Message:</td>
                        <td style="width: 70%;">' . $msg . '</td>
                    </tr>
                </table>
                <table style="background-color: #2a8788;padding: 8px 16px;width: 100%;color: #ffffff;">
                    <tr>
                        <td style="line-height: 50px;vertical-align: top; margin:0px; font-size: 24px; font-weight: 500;"><a
                                href="http://microrentindia.com/" style="color: #ffffff;text-decoration:none">Microrent India</a>
                        </td>
                        <td><a href="http://microrentindia.com/about" style="color: #ffffff;text-decoration:none">About</a></td>
                        <td><a href="http://microrentindia.com/contact" style="color: #ffffff;text-decoration:none">Contact</a>
                        </td>
                    </tr>
                </table>
            </body>
            
            </html>';
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "Cc: info@microrentindia.com" . "\r\n";
            // More headers
            $headersO = $headers . 'From: ' . $from . "\r\n";
            if (mail($to, $subject, $body, $headersO)) {
                $data = array("message" => "Thank you! We will contact you soon.", "status" => "success");
            } else {
                $headersO = $headers . 'From: Support | Microrent India <info@microrentindia.com>' . "\r\n";
                mail($to, $subject, $body, $headers);
                $data = array("message" => "Email seems to be wrong, Try again.", "status" => "success");
            }
        } else {
            $data = array("message" => "Something went wrong! Try again", "status" => "server_error");
        }
    } else {
        $data = array("message" => "Parameters missing", "status" => "server_error");
    }
}
echo json_encode($data);
return;
