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
        <title>Add Banner | Microrent India Admin </title>
        <base href="../" />
        <?php include "includes/head.inc.php"; ?>
        <link rel="stylesheet" href="admin/css/queries.css" />
        <style>
            .btn:hover {
                background-color: #0a6768;
            }

            #is_cta {
                display: none;
            }
        </style>
    </head>

    <body>
        <!-- Page Layout here -->
        <section class="row m-0 p-0" id="bannerAdd">
            <?php include "includes/sidenav.inc.html" ?>
            <div class="col s12 m9 white m-0 p-0" style="height:100vh;overflow:auto">
                <a class="p-2 pb-0 left" href="javascript:toggleNav()"><i class="material-icons text-primary">menu</i></a>
                <div class="px-4">
                    <h4 class="my-1">Add Banner</h4>
                </div>
                <div class="border-top-1 grey-border border-lighten-2 mt-2"></div>
                <div class="progress-holder hide border-radius-0">
                    <div class="progress border-radius-0">
                        <div class="indeterminate bg-primary"></div>
                    </div>
                </div>
                <div class="prevent-overlay hide full"></div>
                <div class="grey lighten-3 p-4">
                    <p><i>Image should be minimum 1200x473 pixel and highly compressed</i></p>
                    <form enctype="multipart/form-data">
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Add Banner Image</span>
                                <input type="file" name="image" required accept="image/*">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" name="banner_fname">
                            </div>
                        </div>
                        <div class="input-field">
                            <input type="text" class="validate" name="alt_text">
                            <label>Banner Alt Text (Optional)</label>
                        </div>
                        <div class="switch">
                            <span>With call to action? </span>
                            <label class="mx-2">
                                No
                                <input type="checkbox" id="cta_toggle" name="is_cta">
                                <span class="lever"></span>
                                Yes
                            </label>
                        </div>
                        <br />
                        <div id="is_cta" class="grey lighten-4 p-4">
                            <div class="input-field">
                                <input type="text" class="validate" name="title">
                                <label>Title</label>
                            </div>
                            <div class="input-field">
                                <input type="text" class="validate" name="subtitle">
                                <label>Subtitle (Optional)</label>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m6">
                                    <input type="text" class="validate" name="action_text">
                                    <label>Action Text</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <input type="text" class="validate" name="action_link">
                                    <label>Action Link</label>
                                </div>
                            </div>
                        </div>
                        <br />
                        <button class="btn right">Upload</button>
                    </form>

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
        <script>
            $(() => {
                $("#cta_toggle").change((e) => {
                    if ($(e.target).prop('checked')) {
                        $("#is_cta").slideDown();
                    } else {
                        $("#is_cta").slideUp();
                    }
                });

                $("#bannerAdd form").submit(e => {
                    e.preventDefault();
                    $.ajax({
                        url: "admin/services/add-banner.php",
                        contentType: false,
                        processData: false,
                        method: "POST",
                        type: "POST",
                        data: new FormData(e.target),
                        beforeSend: () => {
                            $("#bannerAdd .progress-holder, #bannerAdd .prevent-overlay").removeClass("hide");
                        },
                        success: (data, status) => {
                            var object = JSON.parse(data);
                            console.log(object);
                            M.toast({
                                html: object.message
                            });

                            if (object.status == "success") {
                                e.target.reset();
                                $("#bannerAdd #cta_toggle").prop("checked", false);
                                M.updateTextFields();
                            }
                        },
                        error: (data, status) => {
                            console.log(data, status);
                        },
                        complete: () => {
                            $("#bannerAdd .progress-holder, #bannerAdd .prevent-overlay").addClass("hide");
                        }
                    });

                });
            });
        </script>
    </body>

    </html>
<?php
} else {
    header("Location: /admin/?redirect_to=" . $_SERVER['REDIRECT_URL']);
} ?>