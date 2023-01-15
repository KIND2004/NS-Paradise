<?php

session_start();

require "connection.php";

if (isset($_SESSION["admin"])) {

?>

    <!DOCTYPE html>

    <html>

    <head>

        <title>NS Paradise - Manage Users</title>

        <?php require "link.php"; ?>

    </head>

    <body style="background-color: aqua;" onload="SearchUsers();">

        <div class="container-fluid">
            <div class="row">

                <!-- header -->
                <?php require "adminheader.php"; ?>
                <!-- header -->

                <div class="col-12">
                    <div class="row bg-primary py-3 justify-content-center">

                        <div class="col-12 text-center">
                            <span class="text-white fw-bolder fs-1">MANAGE USERS</span>
                        </div>

                        <div class="col-12">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-8 col-md-6 col-lg-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="text" class="form-control" placeholder="Search User Email . . . . ." id="search" onkeyup="SearchUsers();" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12">
                    <div class="row mt-2" id="users">

                    </div>
                </div>

            </div>
        </div>

        <?php require "script.php"; ?>
    </body>

    </html>

<?php

} else {

?>

    <script>
        window.location = "AdminLogIn.php";
    </script>

<?php

}

?>