<!-- <?php 
    // require "../../php/db.pvt.php";
    // $conn = DB::getConnection();
    // $sql = "TRUNCATE TABLE `banners`; INSERT INTO `banners` (`_bid`, `b_order`, `img`, `alt`, `text`, `subtext`, `action_text`, `action_link`, `time`, `is_static`) VALUES (1, 1, 'img/banners/banner1.webp', 'Desktops on Rent in Delhi, Gurgaon and Noida', 'Desktops', '', 'on rent', 'contact-us', '2020-08-23 16:58:03', 0),(2, 2, 'img/banners/banner2.webp', 'Laptops on Rent in Delhi, Gurgaon and Noida', 'Laptops', NULL, 'on rent', 'contact-us', '2020-08-23 17:09:22', 0),(3, 3, 'img/banners/banner3.webp', 'Servers and Workstations on Rent in Delhi, Gurgaon and Noida', 'Servers and<br /> Workstations', '(with High End Graphics Card)', 'on rent', 'contact-us', '2020-08-23 17:12:07', 0),(6, 6, 'img/banners/banner6.webp', 'MacBooks on Rent in Delhi, Gurgaon and Noida', 'MacBook Air', 'Thin & Light', 'on rent', 'contact-us', '2020-08-23 17:12:07', 0),(5, 5, 'img/banners/banner5.webp', NULL, NULL, NULL, NULL, NULL, '2020-08-23 17:12:07', 1),(4, 4, 'img/banners/banner4.webp', NULL, NULL, NULL, NULL, NULL, '2020-08-23 17:12:07', 1),(7, 7, 'img/banners/banner7.webp', 'Plasma and LEDs on Rent in Delhi, Gurgaon and Noida', 'Plasma and LED', 'Monitors', 'on rent', 'contact-us', '2020-08-23 17:12:07', 0);";
        // $sql = "CREATE TABLE `banners` (
        //     `_bid` int(11) NOT NULL AUTO_INCREMENT,
        //     `b_order` tinyint(4) NOT NULL,
        //     `img` varchar(200) NOT NULL,
        //     `alt` varchar(200) DEFAULT NULL,
        //     `text` varchar(50) DEFAULT NULL,
        //     `subtext` varchar(50) DEFAULT NULL,
        //     `action_text` varchar(50) DEFAULT NULL,
        //     `action_link` varchar(50) DEFAULT NULL,
        //     `time` timestamp NOT NULL DEFAULT current_timestamp(),
        //     `is_static` tinyint(1) NOT NULL DEFAULT 1,
        //     PRIMARY KEY (`_bid`)
        //   )";
    // if($conn->multi_query($sql)) {
    //     echo "success";
    //     $sql = "INSERT INTO `banners` (`_bid`, `b_order`, `img`, `alt`, `text`, `subtext`, `action_text`, `action_link`, `time`, `is_static`) VALUES
    //     (1, 1, 'img/banners/banner1.webp', 'Desktops on Rent in Delhi, Gurgaon and Noida', 'Desktops', '', 'on rent', 'contact-us', '2020-08-23 16:58:03', 0),
    //     (2, 2, 'img/banners/banner2.webp', 'Laptops on Rent in Delhi, Gurgaon and Noida', 'Laptops', NULL, 'on rent', 'contact-us', '2020-08-23 17:09:22', 0),
    //     (3, 3, 'img/banners/banner3.webp', 'Servers and Workstations on Rent in Delhi, Gurgaon and Noida', 'Servers and<br /> Workstations', '(with High End Graphics Card)', 'on rent', 'contact-us', '2020-08-23 17:12:07', 0),
    //     (6, 6, 'img/banners/banner6.webp', 'MacBooks on Rent in Delhi, Gurgaon and Noida', 'MacBook Air', 'Thin & Light', 'on rent', 'contact-us', '2020-08-23 17:12:07', 0),
    //     (5, 5, 'img/banners/banner5.webp', NULL, NULL, NULL, NULL, NULL, '2020-08-23 17:12:07', 1),
    //     (4, 4, 'img/banners/banner4.webp', NULL, NULL, NULL, NULL, NULL, '2020-08-23 17:12:07', 1),
    //     (7, 7, 'img/banners/banner7.png', 'Plasma and LEDs on Rent in Delhi, Gurgaon and Noida', 'Plasma and LED', 'Monitors', 'on rent', 'contact-us', '2020-08-23 17:12:07', 0);";
    //     if($conn->query($sql)) {
    //         echo "success2";
    //     } else {
    //         echo "error2";
    //         echo mysqli_error($conn);
    //     }
    // } else {
    //     echo "error1";
    //     echo mysqli_error($conn);
    // } -->