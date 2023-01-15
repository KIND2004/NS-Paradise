<?php

session_start();

require "connection.php";

if (isset($_GET["id"])) {

    $id = $_GET["id"];

    $productrs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $id . "'");
    $productnum = $productrs->num_rows;

    if ($productnum == 1) {

        $productrow = $productrs->fetch_assoc();

?>

        <!DOCTYPE html>

        <html>

        <head>

            <title>Product View</title>

            <?php require "link.php"; ?>

        </head>

        <body>

            <div class="container-fluid">
                <div class="row">

                    <!-- header -->
                    <?php require "header.php"; ?>
                    <!-- header -->

                    <!-- product pic -->
                    <div class="col-12">
                        <div class="row mt-5 justify-content-center">

                            <div class="col-sm-10 col-md-8 col-lg-4">
                                <div class="row justify-content-center">
                                    <div class="col-8 p-2">
                                        <img src="<?php echo $productrow["img"]; ?>" class="col-12 img-thumbnail" height="200px" width="200px" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-10 col-md-8 col-lg-4">
                                <div class="row justify-content-center g-3">

                                    <div class="col-12">
                                        <h1 class="fw-bold fs2 text-success"><?php echo $productrow["title"]; ?></h1>
                                    </div>

                                    <hr />

                                    <div class="col-12 mt-3">
                                        <label class="form-label fs-5 fw-bold">Rs. <?php echo $productrow["price"]; ?> .00</label>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label fw-bold">Add a Quantity</label>
                                        <input type="number" class="form-control" value="1" id="qty" />
                                    </div>
                                    <div class="col-12 d-grid">
                                        <a href="BuyNow.php?id=<?php echo $productrow["id"]; ?>" class="btn btn-outline-success">Buy Now</a>
                                    </div>
                                    <div class="col-12 d-grid">
                                        <button onclick="AddToCart(<?php echo $id; ?>);" class="btn btn-outline-primary">Add To Cart</button>
                                    </div>

                                    <?php

                                    if (isset($_SESSION["user"])) {
                                        $watchlist = Database::search("SELECT * FROM `watchlist` WHERE `product_id` = '" . $productrow["id"] . "' AND `customer_email` = '" . $_SESSION["user"]["email"] . "'");
                                        if ($watchlist->num_rows == 1) {
                                            $watchlistrow = $watchlist->fetch_assoc();
                                    ?>

                                            <div class="col-12 text-center">
                                                <i onclick="RemoveFromWatchlist(<?php echo $watchlistrow['id']; ?>);" class="bi bi-heart-fill text-danger fs-1"></i>
                                            </div>
                                        <?php

                                        } else {

                                        ?>

                                            <div class="col-12 text-center">
                                                <i onclick="AddToWatchlist(<?php echo $productrow['id']; ?>);" class="bi bi-heart-fill text-secondary fs-1"></i>
                                            </div>

                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <div class="col-12 text-center">
                                            <i onclick="AddToWatchlist(<?php echo $productrow['id']; ?>);" class="bi bi-heart-fill text-secondary fs-1"></i>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                    <hr />

                                    <div class="col-12 mt-3">
                                        <h1 class="text-dark fs-1 fw-bolder">SPECIFICATIONS</h1>
                                    </div>

                                    <div class="col-12 p-2">
                                        <div class="row">

                                            <div class="col-12">
                                                <label class="fs-5 form-label fw-bold">Crown Type :</label>&nbsp;
                                                <?php
                                                $crown = Database::search("SELECT * FROM `crown` WHERE `id` = '" . $productrow["crown_id"] . "'");
                                                $crown_row = $crown->fetch_assoc();
                                                ?>
                                                <label class="fs-5 form-label fw-bold text-black-50"><?php echo $crown_row["name"]; ?></label>
                                            </div>
                                            <div class="col-12">
                                                <label class="fs-5 form-label fw-bold">Shape :</label>&nbsp;
                                                <?php
                                                $shape = Database::search("SELECT * FROM `shape` WHERE `id` = '" . $productrow["shape_id"] . "'");
                                                $shape_row = $shape->fetch_assoc();
                                                ?>
                                                <label class="fs-5 form-label fw-bold text-black-50"><?php echo $shape_row["name"]; ?></label>
                                            </div>
                                            <div class="col-12">
                                                <label class="fs-5 form-label fw-bold">Case Colour :</label>&nbsp;
                                                <?php
                                                $case = Database::search("SELECT * FROM `color` WHERE `id` = '" . $productrow["case_color"] . "'");
                                                $case_row = $case->fetch_assoc();
                                                ?>
                                                <label class="fs-5 form-label fw-bold text-black-50"><?php echo $case_row["name"]; ?></label>
                                            </div>
                                            <div class="col-12">
                                                <label class="fs-5 form-label fw-bold">Dial Colour :</label>&nbsp;
                                                <?php
                                                $dial = Database::search("SELECT * FROM `color` WHERE `id` = '" . $productrow["dial_color"] . "'");
                                                $dial_row = $dial->fetch_assoc();
                                                ?>
                                                <label class="fs-5 form-label fw-bold text-black-50"><?php echo $dial_row["name"]; ?></label>
                                            </div>
                                            <div class="col-12">
                                                <label class="fs-5 form-label fw-bold">Bracelet :</label>&nbsp;
                                                <?php
                                                $bracelet = Database::search("SELECT * FROM `bracelet` WHERE `id` = '" . $productrow["bracelet_id"] . "'");
                                                $bracelet_row = $bracelet->fetch_assoc();
                                                ?>
                                                <label class="fs-5 form-label fw-bold text-black-50"><?php echo $case_row["name"]; ?></label>
                                            </div>
                                            <div class="col-12">
                                                <label class="fs-5 form-label fw-bold">Bracelet Colour :</label>&nbsp;
                                                <?php
                                                $braceletclr = Database::search("SELECT * FROM `color` WHERE `id` = '" . $productrow["bracelet_color"] . "'");
                                                $braceletclr_row = $braceletclr->fetch_assoc();
                                                ?>
                                                <label class="fs-5 form-label fw-bold text-black-50"><?php echo $case_row["name"]; ?></label>
                                            </div>
                                            <div class="col-12">
                                                <label class="fs-5 form-label fw-bold">Gender :</label>&nbsp;
                                                <?php
                                                $gender = Database::search("SELECT * FROM `gender` WHERE `id` = '" . $productrow["gender_id"] . "'");
                                                $gender_row = $gender->fetch_assoc();
                                                ?>
                                                <label class="fs-5 form-label fw-bold text-black-50"><?php echo $gender_row["name"]; ?></label>
                                            </div>
                                            <div class="col-12">
                                                <label class="fs-5 form-label fw-bold">Date Diplay :</label>&nbsp;
                                                <?php
                                                $datedisp = Database::search("SELECT * FROM `date_display` WHERE `id` = '" . $productrow["date_display_id"] . "'");
                                                $datedisp_row = $datedisp->fetch_assoc();
                                                ?>
                                                <label class="fs-5 form-label fw-bold text-black-50"><?php echo $datedisp_row["name"]; ?></label>
                                            </div>
                                            <?php
                                            if ($productrow["description"] != "") {
                                            ?>
                                                <div class="col-12">
                                                    <label class="fs-5 form-label fw-bold">Other :</label>&nbsp;
                                                    <label class="fs-5 form-label fw-bold text-black-50"><?php echo $productrow["description"]; ?></label>
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
                    <!-- product pic -->

                    <?php

                    $feedbackrs = Database::search("SELECT * FROM `feedback` WHERE `product_id` = '" . $productrow["id"] . "'");

                    if ($feedbackrs->num_rows >= 1) {

                    ?>

                        <!-- feedback -->
                        <div class="col-12 my-5">
                            <div class="row g-1">

                                <div class="col-12 text-center">
                                    <label class="fs-1 fw-bolder">Feedbacks</label>
                                </div>

                                <hr />

                                <?php

                                for ($f = 0; $f < $feedbackrs->num_rows; $f++) {

                                    $feedback = $feedbackrs->fetch_assoc();

                                    $customerrs = Database::search("SELECT * FROM `customer` WHERE `email` = '" . $feedback["customer_email"] . "'");
                                    $customer = $customerrs->fetch_assoc();

                                ?>

                                    <div class="col-12 col-sm-10 col-md-6 col-lg-4 border border-1 border-dark rounded p-1">
                                        <span class="fw-bold fs-5 fst-italic text-decoration-underline"><?php echo $customer["fname"] . " " . $customer["lname"]; ?></span>
                                        <br />
                                        <span class="fw-bold text-black-50"><?php echo $feedback["content"]; ?></span>
                                    </div>

                                <?php

                                }

                                ?>

                            </div>
                        </div>
                        <!-- feedback -->

                    <?php

                    }

                    ?>

                    <!-- footer -->
                    <?php require "footer.php"; ?>
                    <!-- footer -->

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
?>