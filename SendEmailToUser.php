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
                                    <span class="text-primary fs-1 fw-bolder">Send Email to User</span>
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
                                            <div class="row mt-2">
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
                                            <div class="row mt-3">
                                                <div class="col-12">
                                                    <label class="form-label fs-5 fw-bold">Enter Your Message</label>
                                                </div>
                                                <div class="col-10">
                                                    <textarea placeholder="Type Your Message Here . . . . ." class="form-control" rows="10" id="msg"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 my-3">
                                            <div class="row justify-content-center">
                                                <div class="col-10 d-grid">
                                                    <button class="btn btn-success fs-4 fw-bold" onclick="SendEmailMessage('<?php echo $customer['email']; ?>');">Send Message</button>
                                                </div>
                                                <div class="col-12 text-center">
                                                    <a class="link-primary text-decoration-none fw-bold" href="SeeAllMessages.php?email=<?php echo $customer["email"]; ?>">See All Messages</a>
                                                </div>
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