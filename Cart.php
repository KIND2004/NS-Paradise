<?php

session_start();

require "connection.php";

if (isset($_SESSION["user"])) {

    $email = $_SESSION["user"]["email"];
    $total = "0";

?>

    <!DOCTYPE html>

    <html>

    <head>

        <title>NS Paradise | Cart</title>

        <?php require "link.php"; ?>

    </head>

    <body>

        <div class="container-fluid">
            <div class="row">

                <?php require "header.php"; ?>

                <div class="col-12 border border-1 border-secondary rounded mb-3">
                    <div class="row">

                        <div class="col-12">
                            <label class="form-label fs-1 fw-bolder">Basket <i class="bi bi-cart3"></i></label>
                        </div>

                        <div class="col-12">
                            <hr class="hrbreak1" />
                        </div>

                        <?php

                        $cartrs = Database::search("SELECT * FROM `cart` WHERE `customer_email` = '" . $email . "'");
                        $cn = $cartrs->num_rows;

                        if ($cn == 0) {
                        ?>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 emptycart"></div>
                                    <div class="col-12 text-center">
                                        <label class="form-label fs-1 fw-bolder">You Have no Items in Your Basket</label>
                                    </div>
                                    <div class="offset-0 offset-lg-4 col-12 col-lg-4 d-grid mb-4">
                                        <a href="index.php" class="btn btn-primary fs-3">Start Shopping</a>
                                    </div>
                                </div>
                            </div>

                        <?php
                        } else {
                        ?>

                            <div class="col-12 col-lg-9">
                                <div class="row g-2">
                                    <?php
                                    for ($i = 0; $i < $cn; $i++) {
                                        $cr  = $cartrs->fetch_assoc();
                                        $cid = $cr["product_id"];

                                        $productrs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $cid . "'");
                                        $productrow = $productrs->fetch_assoc();
                                        $prod = $productrow["id"];

                                        $total = $total + ($productrow["price"] * $cr["qty"]);

                                    ?>

                                        <div class="card mb-3 mx-0 mx-lg-3 col-12">
                                            <div class="row g-0">
                                                <div class="col-md-4">
                                                    <img src="<?php echo $productrow["img"]; ?>" class="img-fluid rounded-start" />
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="card-body">
                                                        <h3 class="card-title text-success fw-bold"><?php echo $productrow["title"]; ?></h3>

                                                        <hr />

                                                        <div class="col-12 mt-3">
                                                            <h1 class="text-dark fs-3 fw-bolder">SPECIFICATIONS</h1>
                                                        </div>

                                                        <div class="col-12 p-2 border border-1 border-dark rounded">
                                                            <div class="row">

                                                                <div class="col-12">
                                                                    <label class="fs-6 form-label fw-bold">Crown Type :</label>&nbsp;
                                                                    <?php
                                                                    $crown = Database::search("SELECT * FROM `crown` WHERE `id` = '" . $productrow["crown_id"] . "'");
                                                                    $crown_row = $crown->fetch_assoc();
                                                                    ?>
                                                                    <label class="fs-6 form-label fw-bold text-black-50"><?php echo $crown_row["name"]; ?></label>
                                                                </div>
                                                                <div class="col-12">
                                                                    <label class="fs-6 form-label fw-bold">Shape :</label>&nbsp;
                                                                    <?php
                                                                    $shape = Database::search("SELECT * FROM `shape` WHERE `id` = '" . $productrow["shape_id"] . "'");
                                                                    $shape_row = $shape->fetch_assoc();
                                                                    ?>
                                                                    <label class="fs-6 form-label fw-bold text-black-50"><?php echo $shape_row["name"]; ?></label>
                                                                </div>
                                                                <div class="col-12">
                                                                    <label class="fs-6 form-label fw-bold">Case Colour :</label>&nbsp;
                                                                    <?php
                                                                    $case = Database::search("SELECT * FROM `color` WHERE `id` = '" . $productrow["case_color"] . "'");
                                                                    $case_row = $case->fetch_assoc();
                                                                    ?>
                                                                    <label class="fs-6 form-label fw-bold text-black-50"><?php echo $case_row["name"]; ?></label>
                                                                </div>
                                                                <div class="col-12">
                                                                    <label class="fs-6 form-label fw-bold">Dial Colour :</label>&nbsp;
                                                                    <?php
                                                                    $dial = Database::search("SELECT * FROM `color` WHERE `id` = '" . $productrow["dial_color"] . "'");
                                                                    $dial_row = $dial->fetch_assoc();
                                                                    ?>
                                                                    <label class="fs-6 form-label fw-bold text-black-50"><?php echo $dial_row["name"]; ?></label>
                                                                </div>
                                                                <div class="col-12">
                                                                    <label class="fs-6 form-label fw-bold">Bracelet :</label>&nbsp;
                                                                    <?php
                                                                    $bracelet = Database::search("SELECT * FROM `bracelet` WHERE `id` = '" . $productrow["bracelet_id"] . "'");
                                                                    $bracelet_row = $bracelet->fetch_assoc();
                                                                    ?>
                                                                    <label class="fs-6 form-label fw-bold text-black-50"><?php echo $case_row["name"]; ?></label>
                                                                </div>
                                                                <div class="col-12">
                                                                    <label class="fs-6 form-label fw-bold">Bracelet Colour :</label>&nbsp;
                                                                    <?php
                                                                    $braceletclr = Database::search("SELECT * FROM `color` WHERE `id` = '" . $productrow["bracelet_color"] . "'");
                                                                    $braceletclr_row = $braceletclr->fetch_assoc();
                                                                    ?>
                                                                    <label class="fs-6 form-label fw-bold text-black-50"><?php echo $case_row["name"]; ?></label>
                                                                </div>
                                                                <div class="col-12">
                                                                    <label class="fs-6 form-label fw-bold">Gender :</label>&nbsp;
                                                                    <?php
                                                                    $gender = Database::search("SELECT * FROM `gender` WHERE `id` = '" . $productrow["gender_id"] . "'");
                                                                    $gender_row = $gender->fetch_assoc();
                                                                    ?>
                                                                    <label class="fs-6 form-label fw-bold text-black-50"><?php echo $gender_row["name"]; ?></label>
                                                                </div>
                                                                <div class="col-12">
                                                                    <label class="fs-6 form-label fw-bold">Date Diplay :</label>&nbsp;
                                                                    <?php
                                                                    $datedisp = Database::search("SELECT * FROM `date_display` WHERE `id` = '" . $productrow["date_display_id"] . "'");
                                                                    $datedisp_row = $datedisp->fetch_assoc();
                                                                    ?>
                                                                    <label class="fs-6 form-label fw-bold text-black-50"><?php echo $datedisp_row["name"]; ?></label>
                                                                </div>
                                                                <?php
                                                                if ($productrow["description"] != "") {
                                                                ?>
                                                                    <div class="col-12">
                                                                        <label class="fs-6 form-label fw-bold text-black-50"><?php echo $productrow["description"]; ?></label>
                                                                    </div>
                                                                <?php
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 mt-4">
                                                    <div class="row">
                                                        <div class="col-12 card-body">
                                                            <div class="row g-2">
                                                                <div class="col-12">
                                                                    <span class="fs-3 text-dark fw-bold">Rs. <?php echo $productrow["price"]; ?> .00</span>
                                                                </div>
                                                                <div class="col-12">
                                                                    <label class="form-label fw-bold">Quantity</label>
                                                                    <input type="number" class="form-control" value="<?php echo $cr["qty"]; ?>" id="qty<?php echo $productrow['id']; ?>" onkeyup="ChangeQuantity('<?php echo $productrow['id']; ?>');" onchange="ChangeQuantity('<?php echo $productrow['id']; ?>');" />
                                                                    <small class="fw-bold text-danger" id="error"></small>
                                                                </div>
                                                                <hr class="my-4" />
                                                                <!-- <div class="col-12">
                                                                    <label class="form-label fw-bold text-dark fs-5">Request Total :</label>&nbsp;
                                                                    <label class="form-label fw-bold text-black-50 fs-5">Rs. .00</label>
                                                                </div> -->
                                                                <div class="col-12 d-grid">
                                                                    <a href="BuyNow.php?id=<?php echo $productrow["id"]; ?>" class="btn btn-outline-success">Pay for This</a>
                                                                </div>
                                                                <div class="col-12 d-grid">
                                                                    <button class="btn btn-outline-danger" onclick="RemoveFromCart(<?php echo $cr['id']; ?>);">Remove</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>

                            <div class="col-12 col-lg-3">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label fs-3 fw-bold">Summary</label>
                                    </div>
                                    <div class="col-12">
                                        <hr />
                                    </div>
                                    <div class="col-6">
                                        <span class="fs-6 fw-bold">Items (<?php echo $cn; ?>)</span>
                                    </div>
                                    <div class="col-6 text-end">
                                        <span class="fs-6 fw-bold">Rs. <?php echo $total; ?> .00</span>
                                    </div>
                                    <div class="col-6 mt-3">
                                        <span class="fs-6 fw-bold">Shipping (Free)</span>
                                    </div>
                                    <div class="col-6 text-end mt-3">
                                        <span class="fs-6 fw-bold">Rs. 00 .00</span>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <hr />
                                    </div>
                                    <div class="col-6 mt-2">
                                        <span class="fs-5 fw-bolder">Total</span>
                                    </div>
                                    <div class="col-6 text-end mt-2">
                                        <span class="fs-5 fw-bolder">Rs. <?php echo $total; ?> .00</span>
                                    </div>
                                    <div class="col-12 mt-3 mb-3 d-grid">
                                        <button class="btn btn-primary fs-5 fw-bold" onclick="GoToCheckOut();">CHECKOUT</button>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
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
        window.location = "LogIn.php";
    </script>
<?php
}

?>