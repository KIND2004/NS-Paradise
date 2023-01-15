<?php

session_start();

require "connection.php";

if (isset($_SESSION["admin"])) {

    if (isset($_GET["email"])) {

        $email = $_GET["email"];

        $customerrs = Database::search("SELECT * FROM `customer` WHERE `email` = '" . $email . "'");

        if ($customerrs->num_rows == 1) {

            $customer = $customerrs->fetch_assoc();

?>

            <!DOCTYPE html>

            <html>

            <head>

                <title>NS Paradise</title>

                <?php require "link.php"; ?>

            </head>

            <body style="background-color: aqua;">

                <div class="container-fluid">
                    <div class="row justify-content-center">

                        <!-- header -->
                        <?php require "adminheader.php"; ?>
                        <!-- header -->

                        <div class="col-12">
                            <div class="row mt-3">
                                <div class="col-12 text-center">
                                    <span class="text-primary fs-1 fw-bolder">See All Meesages</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-10 col-md-8 col-lg-6">
                            <div class="row g-1">

                                <div class="col-12">
                                    <div class="row mt-3 bg-light rounded">

                                        <div class="12 text-center bg-warning border border-5 p-1 border-primary border-top-0 border-bottom-0 rounded">
                                            <label class="form-label text-white fs-3 fw-bold">Email To</label>
                                        </div>

                                        <div class="col-12">
                                            <div class="row my-2">
                                                <div class="col-12">
                                                    <label class="form-label fs-5 fw-bold">Name : </label>
                                                    <label class="form-label fs-5"><?php echo $customer["fname"] . " " . $customer["lname"]; ?></label>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label fs-5 fw-bold">Email &nbsp;: </label>
                                                    <label class="form-label fs-5"><?php echo $customer["email"]; ?></label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="row">

                                                <?php

                                                $msgrs = Database::search("SELECT * FROM `message` WHERE `customer_email` = '" . $email . "'");
                                                $msgnum = $msgrs->num_rows;

                                                if ($msgnum == 0) {

                                                ?>

                                                    <div class="col-12">
                                                        <div class="row border border-1 border-primary rounded">
                                                            <div class="col-12 text-center">
                                                                <span class="fs-3 fw-bold">No Email has been Sent yet</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 text-center">
                                                        <a class="link-primary text-decoration-none" href="SendEmailToUser.php?email=<?php echo $customer["email"]; ?>">Send Message</a>
                                                    </div>

                                                <?php

                                                } else {

                                                ?>

                                                    <div class="col-12 overflow-auto border border-1 border-primary rounded" style="height: 300px;">
                                                        <div class="row">
                                                            <?php
                                                            for ($m = 0; $m < $msgnum; $m++) {

                                                                $msg = $msgrs->fetch_assoc();

                                                            ?>

                                                                <div class="col-12">
                                                                    <span class="fw-bold fs-5"><?php echo $msg["msg"]; ?></span><br />
                                                                    <small class="text-black-50"><?php echo $msg["datetime"]; ?></small> |
                                                                    <span class="text-black-50"><?php echo $msg["admin_email"]; ?></span>
                                                                </div>

                                                            <?php
                                                            }

                                                            ?>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 text-center">
                                                        <a class="link-primary text-decoration-none" href="SendEmailToUser.php?email=<?php echo $customer["email"]; ?>">Send Message</a>
                                                    </div>

                                                <?php

                                                }


                                                ?>

                                            </div>
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
                alert("Invalid Email");
                window.location = "AdminHome.php";
            </script>

        <?php

        }
    } else {

        ?>

        <script>
            alert("Invalid Request");
            window.location = "AdminHome.php";
        </script>

    <?php

    }
} else {

    ?>

    <script>
        window.location = "AdminLogIn.php";
    </script>

<?php

}


?>