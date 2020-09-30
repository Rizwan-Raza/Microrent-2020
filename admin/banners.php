<?php if (!isset($_SESSION)) {
    session_start();
}
if (
    isset($_SESSION['admin']) and
    $_SESSION['admin'] == true
) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Banners | Microrent India Admin </title>
        <base href="../" />
        <?php include "includes/head.inc.php"; ?>
        <!-- <link rel="stylesheet" href="admin/css/queries.css" /> -->
        <style>
            .text-center {
                text-align: center;
            }

            .home-slider ul li div {
                max-width: 920px;
                margin: auto;
            }

            .slides {
                float: left;
                width: 100%;
            }

            .slides li {
                /* display: none; */
                position: relative;
                height: auto;
                overflow: hidden;
                padding: 0;
                background: url(https://res.cloudinary.com/wamp-infotech/image/upload/v1601479733/ajaxLoader.gif) no-repeat center center;
                min-height: 100px;
                margin-bottom: 1em;
            }

            .slides li img {
                object-fit: cover;
                width: 100%;
                height: auto;
                max-width: 100%
            }

            .slides li .details {
                position: absolute;
                right: 5%;
                bottom: 15%;
                z-index: 999
            }

            .slides li h3 {
                color: #000;
                font-size: 72px;
                font-weight: 400;
                text-align: right;
            }

            .slides li h3 small {
                color: #000;
                font-size: 48px;
                font-weight: 300;
            }

            .slides li .btn {
                font-size: 36px;
                border-radius: 5px;
                font-weight: 300;
                padding: 20px 0;
                min-width: 333px;
                text-transform: uppercase;
                float: right;
                margin-top: 20px;
                border-bottom-color: #086566
            }

            .slides .details.d-small h3 {
                font-size: 48px;
            }

            .slides .details.d-small h3 small {
                font-size: 28px;
            }


            @media (min-width:768px) and (max-width:979px) {

                .slides li .details {
                    bottom: 20%
                }

                .slides li h3 {
                    font-size: 40px;
                    font-weight: 400;
                }

                .slides li h3 small {
                    font-size: 30px;
                    font-weight: 300;
                }

                .slides li .btn {
                    font-size: 18px;
                    font-weight: 400;
                    padding: 15px 40px;
                    min-width: inherit;
                    text-transform: uppercase;
                    float: right;
                    margin-top: 20px;
                }

                .slides li p {
                    float: right;
                    width: auto
                }
            }

            @media (max-width:767px) {

                .slides li .details {
                    right: 0;
                    left: 0;
                    bottom: 0;
                    width: 100%;
                    padding: 10px;
                    background: rgba(0, 0, 0, 0.5);
                }

                .slides li h3 {
                    color: #fff;
                    font-size: 22px;
                    font-weight: 400;
                    text-align: left;
                    display: inline-block;
                    padding-top: 4px
                }

                .slides li h3 small {
                    color: #00f8ff;
                    font-size: 22px;
                    font-weight: 400;
                }

                .slides .details.d-small h3 {
                    font-size: 22px;
                }

                .slides .details.d-small h3 small {
                    font-size: 12px;
                }

                .slides li br {
                    display: none
                }

                .slides li .btn {
                    font-size: 14px;
                    border-radius: 5px;
                    font-weight: 500;
                    padding: 5px 15px;
                    min-width: inherit;
                    text-transform: uppercase;
                    float: right;
                    margin-top: 0;
                }

                .slides li p {
                    float: right;
                    width: auto
                }
            }

            @media (max-width:480px) {
                .slides li .details {
                    display: none
                }
            }

            @media (max-width:360px) {

                .slides li .details,
                .description {
                    display: none
                }
            }

            .btn {
                color: #fff;
                border-radius: 0;
                font-size: 14px;
                border: 0;
                text-decoration: none;
                box-shadow: none;
                border-bottom: 3px solid #086566;
                font-weight: 500;
                padding: 5px 20px;
                text-shadow: none;
                font-weight: 500;
                margin: 0;
                display: inline-block;
                text-decoration: none;
                background: #2a8788;
                height: auto;
            }

            .btn:hover,
            .btn:focus {
                color: #fff;
                background: rgb(102, 102, 102);
            }

            .slides li,
            .slides li .content {
                position: relative;
            }

            .slides li:hover .floatings {
                visibility: visible;
            }

            .floatings {
                position: absolute;
                z-index: 9999;
                width: 52px;
                height: 52px;
                visibility: hidden;
                cursor: pointer;
            }

            .delete {
                top: 2em;
                right: 2em;
            }

            .oup {
                background-color: rgba(0, 0, 0, 0.5);
                bottom: 6em;
                left: 2em;
            }

            .odown {
                background-color: rgba(0, 0, 0, 0.5);
                bottom: 2em;
                left: 2em;
            }

            .edit {
                bottom: 2em;
                right: 2em;
            }

            .order {
                position: absolute;
                z-index: 9999;
                background-color: rgba(0, 0, 0, 0.5);
                color: #fff;
                left: 2em;
                top: 2em;
            }

            .material-tooltip {
                z-index: 99999;
            }
        </style>
    </head>

    <body>
        <!-- Page Layout here -->
        <section class="row m-0 p-0">
            <?php include "includes/sidenav.inc.html" ?>
            <div class="col s12 m9 white m-0 p-0" style="height:100vh;overflow:auto">
                <a class="p-2 pb-0 left" href="javascript:toggleNav()"><i class="material-icons text-primary">menu</i></a>
                <div class="px-4">
                    <h4 class="my-1">Banners</h4>
                </div>
                <div class="border-top-1 grey-border border-lighten-2 mt-2"></div>
                <div class="grey lighten-3">
                    <?php $sql = "SELECT * FROM `banners` ORDER BY `b_order`";
                    require "../php/db.pvt.php";
                    include "includes/functions.inc.php";
                    $conn =
                        DB::getConnection();
                    $result = $conn->query($sql); ?>
                    <div class="home-slider">
                        <ul class="slides">
                            <?php $serial = 0;
                            $max = $result->num_rows;
                            while ($banner = $result->fetch_assoc()) {
                                extract($banner);
                                $serial++; ?>
                                <li>
                                    <div class="floatings delete p-2 circle red tooltipped" data-tooltip="Delete" onclick="deleteBanner(<?= $_bid ?>, this)"><i class="material-icons white-text">close</i></div>
                                    <?php if ($serial != 1) { ?><div class="floatings oup p-2 circle tooltipped" data-tooltip="Move Up" onclick="changeOrder(<?= $_bid ?>, this, <?= $b_order ?>, -1)"><i class="material-icons white-text">expand_less</i></div><?php } ?>
                                    <?php if ($serial != $max) { ?><div class="floatings odown p-2 circle tooltipped" data-tooltip="Move Down" onclick="changeOrder(<?= $_bid ?>, this, <?= $b_order ?>, 1)"><i class="material-icons white-text">expand_more</i></div><?php } ?>
                                    <!-- <div class="floatings edit p-2 circle blue tooltipped" data-tooltip="Edit" onclick="editBanner(<?= $_bid ?>, '<?= $text ?>', '<?= $subtext ?>''<?= $action_text ?>', '<?= $action_link ?>');"><i class="material-icons white-text">edit</i></div> -->
                                    <div class="order p-2 circle"># <?= $serial ?></div>
                                    <div class="content"><img loading="lazy" src="<?= $img ?>" width="948" height="376" alt="<?= $alt ?>">
                                        <?php if ($is_static == 0) { ?>
                                            <div class="details <?php if (strlen($text) > 10) {
                                                                    echo "d-small";
                                                                } ?>">
                                                <h3><?= $text ?><?php if (isset($subtext) and strlen($subtext) > 0) { ?><br /><small><?= $subtext ?></small><?php } ?></h3>
                                                <?php if (isset($action_text) and strlen($action_text) > 0) { ?><p><a href="<?= $action_link ?>" class="btn"><?= $action_text ?></a></p><?php } ?>
                                            </div>
                                            <div class="shadaw"></div>
                                        <?php } ?>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <br clear="all" />
                    <div class="text-center m-4"><a href="admin/add-banner" class="btn"><i class="material-icons white-text left">add_a_photo</i> Add more</a></div>
                </div>
            </div>
        </section>
        <!-- Modal Structure -->
        <div id="editModal" class="modal">
            <div class="modal-content">
                <h4>Edit Banner</h4>
                <p>A bunch of text</p>
            </div>
            <div class="modal-footer">
                <button class="modal-close waves-effect waves-red btn-flat">Close</button>
            </div>
        </div>
        <?php include "includes/scripts.inc.php"; ?>
        <script src="admin/js/queries.js"></script>
        <script>
            function deleteBanner(id, elem) {
                console.log(elem);
                let answer = confirm("Are you sure, you want to delete this banner?");
                if (answer) {
                    elem = $(elem).closest("li");
                    $.ajax({
                        url: "admin/services/delete-banner.php",
                        method: "POST",
                        data: {
                            _bid: id
                        },
                        beforeSend: () => {
                            elem.css("opacity", 0.5);
                            // $("#progress, .prevent-overlay").removeClass("hide");
                        },
                        success: (data, status) => {
                            // console.log(data, status);
                            var object = JSON.parse(data);
                            M.toast({
                                html: object.message
                            });
                            if (object.status == "server_error") {
                                elem.css("opacity", 1);
                                return;
                            } else if (object.status == "success") {
                                elem.slideUp();
                            }
                        },
                        error: (data, status) => {
                            elem.css("opacity", 1);
                            console.log(data, status);
                        }
                    });
                }
            }

            function changeOrder(bid, elem, order, change) {
                elem = $(elem).closest("li");
                $.ajax({
                    url: "admin/services/change-order.php",
                    method: "POST",
                    data: {
                        _bid: bid,
                        order: order,
                        change: change
                    },
                    beforeSend: () => {
                        elem.css("opacity", 0.5);
                        // $("#progress, .prevent-overlay").removeClass("hide");
                    },
                    success: (data, status) => {
                        console.log(data, status);
                        var object = JSON.parse(data);
                        M.toast({
                            html: object.message
                        });
                        if (object.status == "success") {
                            if (change == 1)
                                elem.insertAfter(elem.next());
                            else
                                elem.insertBefore(elem.prev());
                        }
                        elem.css("opacity", 1);
                    },
                    error: (data, status) => {
                        elem.css("opacity", 1);
                        console.log(data, status);
                    }
                });

            }
        </script>
    </body>

    </html>
<?php
} else {
    header("Location: /admin/?redirect_to=" . $_SERVER['REDIRECT_URL']);
} ?>