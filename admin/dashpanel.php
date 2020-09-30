<?php 
if(!isset($_SESSION)) {session_start();}
if (isset($_SESSION['admin']) and $_SESSION['admin'] == true) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard | Microrent India Admin </title>
    <base href="../">
    <?php include "includes/head.inc.php"; ?>
    <!-- <link rel="stylesheet" href="css/signin.css" /> -->
    <style>
        .card h4 {
            height: 50px;
            line-height: 50px;
            margin: 0;
        }
    </style>
</head>
<body>
    <!-- Page Layout here -->
    <section class="row m-0 p-0">
        <?php 
        include "includes/sidenav.inc.html";
        require "../php/db.pvt.php";
        
        $sql = "SELECT COUNT(`_qid`) FROM `queries`"; 
        $conn = DB::getConnection(); 
        $result = $conn->query($sql);
        $num_q = $result->fetch_assoc()['COUNT(`_qid`)'];
        
        ?>
        <div class="col s12 m9 white lighten-3 m-0 p-0" style="height:100vh;overflow:auto">
            <a class="p-2 pb-0 left" href="javascript:toggleNav()"><i class="material-icons text-primary">menu</i></a>
            <div class="px-4">
                <h4 class="my-1">
                    Welcome!
                </h4>
            </div>
            <div class="border-top-1 grey-border border-lighten-2 my-2"></div>
            <div class="px-4">
                <p>Here, we got some numbers: </p>
                <div class="row">
                    <div class="col s12 m6 l4 xl3 my-1">
                        <a href="admin/queries" class="waves-effect waves-light w-full bg-primary border-radius-8">
                            <div class="card bg-primary m-0">
                                <div class="card-content white-text">
                                    <h4 class="fw-500 center-align">
                                        <?=$num_q?>
                                    </h4>
                                </div>
                                <div class="card-action center-align">
                                    Queries
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include "includes/scripts.inc.php"; ?>
    <!-- <script src="admin/js/common.js"></script> -->
</body>
</html>
<?php } else {
    header("Location: /admin/?redirect_to=".$_SERVER['REDIRECT_URL']);
} ?>