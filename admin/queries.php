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
        <title>Queries | Microrent India Admin </title>
        <base href="../" />
        <?php include "includes/head.inc.php"; ?>
        <link rel="stylesheet" href="admin/css/queries.css" />
    </head>

    <body>
        <!-- Page Layout here -->
        <section class="row m-0 p-0">
            <?php include "includes/sidenav.inc.html" ?>
            <div class="col s12 m9 white m-0 p-0" style="height:100vh;overflow:auto">
                <a class="p-2 pb-0 left" href="javascript:toggleNav()"><i class="material-icons text-primary">menu</i></a>
                <div class="px-4">
                    <h4 class="my-1">Queries</h4>
                </div>
                <div class="border-top-1 grey-border border-lighten-2 mt-2"></div>
                <div class="grey lighten-3">
                    <?php $sql = "SELECT * FROM `queries` ORDER BY `time` DESC";
                    require "../php/db.pvt.php";
                    include "includes/functions.inc.php";
                    $conn =
                        DB::getConnection();
                    $result = $conn->query($sql); ?>
                    <table>
                        <?php if ($result and ($num = $result->num_rows) > 0) {
                        ?>
                            <thead>
                                <tr>
                                    <th class="pl-4">#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Number</th>
                                    <th>Looking for</th>
                                    <th>Message</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for ($i = 0; $i <
                                    $num; $i++) {
                                    $user = $result->fetch_assoc(); ?>
                                    <tr>
                                        <td class="pl-4">
                                            <?= $i + 1 ?>
                                        </td>
                                        <td>
                                            <?= $user['name'] ?>
                                        </td>
                                        <td>
                                            <a href="mailto:<?= $user['email'] ?>"><?= $user['email'] ?></a>
                                        </td>
                                        <td>
                                            <a href="tel:<?= $user['phone'] ?>"><?= $user['phone'] ?></a>
                                        </td>
                                        <td>
                                            <?= $user['what'] ?>
                                        </td>
                                        <td class="tooltipped" data-tooltip="<?= date_format(date_create($user['time']), 'l jS \of F Y h:i:s A') . "<br /><br />" . daysUntilToday($user['time']) ?>">
                                            <?php $count = strlen($user['message']); ?>
                                            <?= substr($user['message'], 0, 50) ?>
                                            <?php echo $count > 50 ? '... <a href="javascript:openQuery(\'' . $user['name'] . '\', \'' . addslashes($user['message']) . '\')">Read more</a>' : ''; ?>
                                        </td>
                                        <td>
                                            <button class="transparent btn-flat circle btn-floating btn-medium tooltipped waves-effect waves-circle waves-dark" onclick="deleteQuery(<?= $user['_qid'] ?>, this, 0)" data-tooltip="Delete"><i class="material-icons black-text lh-5">delete</i></button>
                                        </td>
                                    </tr>
                            </tbody>
                        <?php
                                } ?>
                    <?php
                        } else {
                    ?>
                        <tr>
                            <td colspan="5" class="center-align">No queries found</td>
                        </tr>
                    <?php
                        } ?>
                    </table>
                </div>
            </div>
        </section>
        <!-- Modal Structure -->
        <div id="queryModal" class="modal">
            <div class="modal-content">
                <h4>Modal Header</h4>
                <p>A bunch of text</p>
            </div>
            <div class="modal-footer">
                <button class="modal-close waves-effect waves-red btn-flat">Close</button>
            </div>
        </div>
        <?php include "includes/scripts.inc.php"; ?>
        <script src="admin/js/queries.js"></script>
    </body>

    </html>
<?php
} else {
    header("Location: /admin/?redirect_to=" . $_SERVER['REDIRECT_URL']);
} ?>