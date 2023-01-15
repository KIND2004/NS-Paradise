<?php

session_start();

require "connection.php";

if (isset($_SESSION["user"])) {

    if (isset($_GET["oid"])) {

        $orderid = $_GET["oid"];

        $invoicers = Database::search("SELECT * FROM `invoice` WHERE `order_id` = '" . $orderid . "'");

        if ($invoicers->num_rows >= 1) {

            $invoice = $invoicers->fetch_assoc();
?>

            <!DOCTYPE html>

            <html>

            <head>

                <title>NS Paradise - Invoice</title>

                <?php require "link.php"; ?>

            </head>

            <body class="bg-light">

                <div class="container-fluid">
                    <div class="row">

                        <?php require "header.php"; ?>

                        <div class="col-12">
                            <div class="row mt-3">
                                <div class="col-12 text-end">
                                    <button class="btn btn-danger fw-bold" onclick="printDiv();"><i class="bi bi-printer-fill"></i> Print</button>
                                </div>
                            </div>
                        </div>

                        <div id="GFG">

                            <div class="col-12">
                                <div class="row mb-3">

                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <div class="col-12">
                                                <h1 class="fs-1 fw-bold text-primary text-start">NS Paradise</h1>
                                            </div>
                                            <div class="col-12">
                                                <span class="fw-bold text-dark text-start">111/2, Abdul Hameed Street</span>
                                                <br />
                                                <span class="fw-bold text-dark text-start">Colombo - 12</span>
                                                <br />
                                                <span class="fw-bold text-dark text-start">Sri Lanka</span>
                                                <br />
                                                <span class="fw-bold text-dark text-start">0771414818</span>
                                                <br />
                                                <span class="fw-bold text-dark text-start">abdullahzufar04@gmail.com</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-6 mt-5">
                                        <div class="row me-1">
                                            <div class="col-12">
                                                <div class="row justify-content-end">
                                                    <span class="fw-bold fs-5 text-end col-5">Invoice Id</span>
                                                    <span class="fw-bold fs-6 text-center border border-2 border-secondary rounded p-1 col-7 col-sm-6 col-md-4 bg-white"><?php echo $invoice["id"]; ?></span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row justify-content-end">
                                                    <span class="fw-bold fs-5 text-end col-5">Order Id</span>
                                                    <span class="fw-bold fs-6 text-center border border-2 border-secondary rounded p-1 col-7 col-sm-6 col-md-4 bg-white"><?php echo $invoice["order_id"]; ?></span>
                                                </div>
                                            </div>
                                            <?php
                                            $datetime = $invoice["datetime"];
                                            $splitdate = explode(" ", $datetime)
                                            ?>
                                            <div class="col-12">
                                                <div class="row justify-content-end">
                                                    <span class="fw-bold fs-5 text-end col-5">Date</span>
                                                    <span class="fw-bold fs-6 text-center border border-2 border-secondary rounded p-1 col-7 col-sm-6 col-md-4 bg-white"><?php echo $splitdate[0]; ?></span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row justify-content-end">
                                                    <span class="fw-bold fs-5 text-end col-5">Time</span>
                                                    <span class="fw-bold fs-6 text-center border border-2 border-secondary rounded p-1 col-7 col-sm-6 col-md-4 bg-white"><?php echo $splitdate[1]; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <hr />

                            <div class="col-12">
                                <div class="row border border-5 border-warning border-top-0 border-end-0 border-bottom-0">
                                    <div class="col-12 col-md-6 col-lg-4 bg-primary p-1">
                                        <h3 class="text-white fw-bold fs-4 text-center">Bill To</h3>
                                    </div>
                                </div>
                            </div>
                            <?php

                            $customerrs = Database::search("SELECT * FROM `customer` WHERE `email` = '" . $invoice["customer_email"] . "'");
                            $customer = $customerrs->fetch_assoc();

                            $delivery_detailsrs = Database::search("SELECT * FROM `delivery_details` WHERE `invoice_id` = '" . $invoice["id"] . "'");
                            $delivery_details = $delivery_detailsrs->fetch_assoc();

                            $cityrs = Database::search("SELECT * FROM `city` WHERE `id` = '" . $delivery_details["city_id"] . "'");
                            $city = $cityrs->fetch_assoc();

                            ?>
                            <div class="col-12 mb-3">
                                <div class="row mt-2">
                                    <div class="col-12">
                                        <span class="fw-bold text-black-50 text-start"><?php echo $customer["fname"] . " " . $customer["lname"]; ?></span>
                                        <br />
                                        <span class="fw-bold text-black-50 text-start"><?php echo $customer["email"]; ?></span>
                                        <br />
                                        <span class="fw-bold text-black-50 text-start"><?php echo $delivery_details["address"]; ?></span>
                                        <br />
                                        <span class="fw-bold text-black-50 text-start"><?php echo $city["name"]; ?></span>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <table class="table table-responsive table-dark">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Unit Price</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $subtotal = "0";
                                    $discount = "00";
                                    $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `order_id` = '" . $orderid . "'");
                                    for ($i = 0; $i < $invoice_rs->num_rows; $i++) {
                                        $invoice_details = $invoice_rs->fetch_assoc();
                                        $productrs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $invoice_details["product_id"] . "'");
                                        // for ($p = 0; $p < $prductrs->num_rows; $p++) {
                                            $product = $productrs->fetch_assoc();
                                            $subtotal = $subtotal + $invoice_details["total"];
                                            $grandtotal = $subtotal - $discount;

                                    ?>
                                            <tr class="table-active">
                                                <td><?php echo $product["title"]; ?></td>
                                                <td><?php echo $product["price"]; ?></td>
                                                <td><?php echo $invoice_details["qty"]; ?></td>
                                                <td><?php echo $invoice_details["total"]; ?></td>
                                            </tr>
                                    <?php
                                        // }
                                    }
                                    ?>
                                </tbody>
                            </table>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6 col-md-3 offset-md-3">
                                        <span class="fs-5 fw-bold text-end">SUBTOTAL</span>
                                        <hr class="border border-2 border-start-0 border-top-0 border-end-0 border-dark" />
                                        <span class="fs-5 fw-bold text-end">DISCOUNT</span>
                                        <hr class="border border-2 border-start-0 border-top-0 border-end-0 border-dark" />
                                        <span class="fs-4 fw-bold text-end text-primary">GRAND TOTAL</span>
                                        <hr class="border border-2 border-start-0 border-top-0 border-end-0 border-primary" />
                                    </div>
                                    <div class="col-6 text-end">
                                        <span class="fs-5 fw-bold text-end">Rs. <?php echo $subtotal; ?> .00</span>
                                        <hr class="border border-2 border-start-0 border-top-0 border-end-0 border-dark" />
                                        <span class="fs-5 fw-bold text-end">Rs. <?php echo $discount; ?> .00</span>
                                        <hr class="border border-2 border-start-0 border-top-0 border-end-0 border-dark" />
                                        <span class="fs-4 fw-bold text-end text-primary">Rs. <?php echo $grandtotal; ?> .00</span>
                                        <hr class="border border-2 border-start-0 border-top-0 border-end-0 border-primary" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <h1 class="fs-1 fw-bolder text-center text-primary">Thank You!!!</h1>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <span class="text-danger fw-bold">Invoice was created on a computer and is valid without the Signature and Seal.</span>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <?php require "footer.php"; ?>

                    </div>
                </div>

                <?php require "script.php"; ?>

            </body>

            </html>

        <?php
        } else {
        ?>
            <script>
                window.location = "index.php";
            </script>
        <?php
        }
    } else {
        ?>
        <script>
            window.location = "index.php";
        </script>
    <?php
    }
} else {
    ?>
    <script>
        window.location = "LogIn.php";
    </script>
<?php
}
?>