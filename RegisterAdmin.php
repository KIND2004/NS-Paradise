<?php

session_start();

require "connection.php";

if (isset($_SESSION["admin"])) {
?>

    <!DOCTYPE html>

    <html>

    <head>

        <title>NS Paradise - Register Admin</title>

        <?php require "link.php"; ?>

    </head>

    <body class="bg-light vh-100">

        <div class="container-fluid">
            <div class="row">

                <!-- header -->
                <?php require "adminheader.php"; ?>
                <!-- header -->

                <div class="col-12">
                    <div class="row bg-primary py-3">
                        <div class="col-12">
                            <h1 class="fs-1 text-center text-white fw-bolder">Register Admin</h1>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-5">
                    <div class="row justify-content-center">

                        <div class="col-12 col-sm-10 col-md-6 col-lg-4">
                            <div class="row g-3 justify-content-center">

                            <div class="col-12" id="alert"></div>

                                <div class="col-12">
                                    <label class="form-label fw-bold">First Name</label>
                                    <input type="text" class="form-control" placeholder="First Name" id="fname" />
                                </div>

                                <div class="col-12">
                                    <label class="form-label fw-bold">Last Name</label>
                                    <input type="text" class="form-control" placeholder="Last Name" id="lname" />
                                </div>

                                <div class="col-12">
                                    <label class="form-label fw-bold">Email</label>
                                    <input type="text" class="form-control" placeholder="Email" id="email" />
                                </div>

                                <div class="col-8 mt-5 d-grid">
                                    <button class="btn btn-primary fs-5 fw-bold" onclick="RegisterAdmin();">Register</button>
                                </div>

                            </div>
                        </div>

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