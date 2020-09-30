<!--home banner starts-->
<?php $sql = "SELECT * FROM `banners` ORDER BY `b_order`";
require "php/db.pvt.php";
$conn = DB::getConnection();
$result = $conn->query($sql);
if ($result and $result->num_rows > 0) { ?>

    <section class="home-banner">
        <div class="home-slider">
            <ul class="slides">
                <?php while ($banner = $result->fetch_assoc()) {
                    extract($banner); ?>
<<<<<<< HEAD
                    <li> <img loading="lazy" src="<?= $img ?>" width="948" height="376" alt="<?= $alt ?>">
=======
                    <li> <img src="<?= $img ?>" width="948" height="376" alt="<?= $alt ?>">
>>>>>>> 8ef17d1897278fcce84c0de24b0e93728ce31a76
                        <?php if ($is_static == 0) { ?>
                            <div class="details <?php if(strlen($text) > 10) {echo "d-small";}?>">
                                <h3><?= $text ?><?php if (isset($subtext) and strlen($subtext) > 0) { ?><br /><small><?= $subtext ?></small><?php } ?></h3>
                                <?php if (isset($action_text) and strlen($action_text) > 0) { ?><p><a href="<?= $action_link ?>" class="btn"><?= $action_text ?></a></p><?php } ?>
                            </div>
                            <div class="shadaw"></div>
                        <?php } ?>
                    </li>
                <?php } ?>
<<<<<<< HEAD
                <!-- <li> <img loading="lazy" src="img/banners/banner2.jpg" width="948" height="376" alt="Laptops on Rent in Delhi, Gurgaon and Noida">
=======
                <!-- <li> <img src="img/banners/banner2.jpg" width="948" height="376" alt="Laptops on Rent in Delhi, Gurgaon and Noida">
>>>>>>> 8ef17d1897278fcce84c0de24b0e93728ce31a76
                <div class="details">
                    <h3>Laptops</h3>
                    <p><a href="contact-us" class="btn">on rent</a></p>
                </div>
                <div class="shadaw"></div>
            </li>
<<<<<<< HEAD
            <li><img loading="lazy" src="img/banners/banner3.jpg" alt="Servers and Workstations on Rent in Delhi, Gurgaon and Noida">
=======
            <li><img src="img/banners/banner3.jpg" alt="Servers and Workstations on Rent in Delhi, Gurgaon and Noida">
>>>>>>> 8ef17d1897278fcce84c0de24b0e93728ce31a76
                <div class="details d-small">
                    <h3>Servers and<br /> Workstations<br>
                        <small>(with High End Graphics Card)</small></h3>
                    <p><a href="contact-us" class="btn">on rent</a></p>
                </div>
                <div class="shadaw"></div>
            </li>
<<<<<<< HEAD
            <li> <img loading="lazy" src="img/banners/banner4.jpg" width="948" height="376" alt="Computers on Rent in Delhi, Gurgaon and Noida"></li>
            <li> <img loading="lazy" src="img/banners/banner5.jpg" width="948" height="376" alt="Computers on Rent in Delhi, Gurgaon and Noida"></li>
            <li><img loading="lazy" src="img/banners/banner6.jpg" alt="MacBooks on Rent in Delhi, Gurgaon and Noida">
=======
            <li> <img src="img/banners/banner4.jpg" width="948" height="376" alt="Computers on Rent in Delhi, Gurgaon and Noida"></li>
            <li> <img src="img/banners/banner5.jpg" width="948" height="376" alt="Computers on Rent in Delhi, Gurgaon and Noida"></li>
            <li><img src="img/banners/banner6.jpg" alt="MacBooks on Rent in Delhi, Gurgaon and Noida">
>>>>>>> 8ef17d1897278fcce84c0de24b0e93728ce31a76
                <div class="details">
                    <h3>MacBook Air<br>
                        <small>Thin & Light</small></h3>
                    <p><a href="contact-us" class="btn">on rent</a></p>
                </div>
                <div class="shadaw"></div>
            </li>
<<<<<<< HEAD
            <li><img loading="lazy" src="img/banners/banner7.png" alt="Plasma and LEDs on Rent in Delhi, Gurgaon and Noida">
=======
            <li><img src="img/banners/banner7.png" alt="Plasma and LEDs on Rent in Delhi, Gurgaon and Noida">
>>>>>>> 8ef17d1897278fcce84c0de24b0e93728ce31a76
                <div class="details d-small">
                    <h3>Plasma and LED<br>
                        <small>Monitors</small></h3>
                    <p><a href="contact-us" class="btn">on rent</a></p>
                </div>
                <div class="shadaw"></div>
            </li> -->
            </ul>
        </div>
    </section>
    <!--home banner ends-->
<?php } ?>