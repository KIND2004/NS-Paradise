<?php

session_start();

require "connection.php";

if (isset($_SESSION["admin"])) {

?>

    <!DOCTYPE html>

    <head>

        <title>NS Paradise | Admin Home</title>

        <?php require "link.php"; ?>

    </head>

    <body style="background-color: aqua;">

        <div class="container-fluid">
            <div class="row">

                <div class="col-12  mb-2">
                    <div class="row rounded bg-primary p-3">
                        <div class="col-12">
                            <?php
                            $adminrs = Database::search("SELECT * FROM `admin` WHERE `email` = '" . $_SESSION["admin"]["email"] . "'");
                            $admin = $adminrs->fetch_assoc();
                            ?>
                            <h1 class="fs-1 text-center fw-bolder text-light">Welcome <?php echo $admin["fname"] . " " . $admin["lname"]; ?></h1>
                        </div>
                    </div>
                </div>

                <?php require "adminheader.php"; ?>

                <div class="col-12 mt-3">
                    <div class="row bg-light p-2">
                        <?php

                        $startdate = new DateTime("2021-11-01 00:00:00");

                        $today_date = new DateTime();
                        $timezone = new DateTimeZone("Asia/Colombo");
                        $today_date->setTimezone($timezone);
                        $enddate = new DateTime($today_date->format("Y-m-d H:i:s"));

                        $difference = $enddate->diff($startdate);

                        ?>

                        <div class="col-12 col-md-6">
                            <span class="text-primary fs-4 fw-bold">Total Active Time</span>
                        </div>
                        <div class="col-12 col-md-6">
                            <span class="text-danger fs-4 fw-bold">
                                <?php
                                echo $difference->format('%Y') . " Years " .
                                    $difference->format('%M') . " Months " .
                                    $difference->format('%d') . " Days " .
                                    $difference->format('%H') . " Hours " .
                                    $difference->format('%i') . " Minutes " .
                                    $difference->format('%s') . " Seconds ";
                                ?>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row">
                        <div class="col-12 mt-3">
                            <div class="row justify-content-center g-3">

                                <?php

                                $datetime = new DateTime();
                                $timezone = new DateTimeZone("Asia/Colombo");
                                $datetime->setTimezone($timezone);

                                $todaydate = $datetime->format("Y-m-d");
                                $thismonth = $datetime->format("m");
                                $thisyear = $datetime->format("Y");


                                $today = "00";
                                $month = "00";
                                $total = "00";
                                $todayitem = "0";
                                $monthitem = "0";
                                $totalitem = "0";

                                $invoicers = Database::search("SELECT * FROM `invoice`");
                                $invoice_num = $invoicers->num_rows;

                                for ($x = 0; $x < $invoice_num; $x++) {
                                    $invoice = $invoicers->fetch_assoc();

                                    $total = $total + $invoice["total"];
                                    $totalitem = $totalitem + $invoice["qty"];

                                    $date = $invoice["datetime"];
                                    $splitdate = explode(" ", $date);
                                    $invoicedate = $splitdate[0];

                                    if ($invoicedate == $todaydate) {
                                        $today = $today + $invoice["total"];
                                        $todayitem = $todayitem + $invoice["qty"];
                                    }

                                    $splitmonth = explode("-", $invoicedate);
                                    $invoiceyear = $splitmonth[0];
                                    $invoicemonth = $splitmonth[1];

                                    if ($invoiceyear == $thisyear) {
                                        if ($invoicemonth == $thismonth) {
                                            $month = $month + $invoice["total"];
                                            $monthitem = $monthitem + $invoice["qty"];
                                        }
                                    }
                                }

                                ?>

                                <div class="col-12 col-sm-10 col-md-6 col-lg-4 px-1">
                                    <div class="bg-success rounded-3 text-center">
                                        <label class="form-label text-white fw-bold fs-3">Today Earnings</label>
                                        <br />
                                        <label class="form-label text-white fw-bold fs-3">Rs. <?php echo $today; ?> .00</label>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-10 col-md-6 col-lg-4 px-1">
                                    <div class="bg-danger rounded-3 text-center">
                                        <label class="form-label text-white fw-bold fs-3">Monthly Earnings</label>
                                        <br />
                                        <label class="form-label text-white fw-bold fs-3">Rs. <?php echo $month; ?> .00</label>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-10 col-md-6 col-lg-4 px-1">
                                    <div class="bg-success rounded-3 text-center">
                                        <label class="form-label text-white fw-bold fs-3">Total Earning</label>
                                        <br />
                                        <label class="form-label text-white fw-bold fs-3">Rs. <?php echo $total; ?> .00</label>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-10 col-md-6 col-lg-4 px-1">
                                    <div class="bg-danger rounded-3 text-center">
                                        <label class="form-label text-white fw-bold fs-3">Today Sellings</label>
                                        <br />
                                        <label class="form-label text-white fw-bold fs-3"><?php echo $todayitem; ?> Items</label>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-10 col-md-6 col-lg-4 px-1">
                                    <div class="bg-success rounded-3 text-center">
                                        <label class="form-label text-white fw-bold fs-3">Monthly Sellings</label>
                                        <br />
                                        <label class="form-label text-white fw-bold fs-3"><?php echo $monthitem; ?> Items</label>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-10 col-md-6 col-lg-4 px-1">
                                    <div class="bg-danger rounded-3 text-center">
                                        <label class="form-label text-white fw-bold fs-3">Total Sellings</label>
                                        <br />
                                        <label class="form-label text-white fw-bold fs-3"><?php echo $totalitem; ?> Items</label>
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
        window.location = "AdminLogIn.php";
    </script>

<?php

}


?>