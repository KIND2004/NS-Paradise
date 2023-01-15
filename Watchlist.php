<?php

session_start();

require "connection.php";

if (isset($_SESSION["user"])) {


    $email = $_SESSION["user"]["email"];

    $prod;

?>

    <!DOCTYPE html>

    <html>

    <head>

        <title>NS Paradise - Watchlist</title>

        <?php require "link.php"; ?>

    </head>

    <body>
        
        <div class="container-fluid">
            <div class="row">

                <!-- header -->
                <?php require "header.php"; ?>
                <!-- header -->

                <div class="col-12 border border-1 border-secondary rounded">
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label fs-1 fw-bolder">Watchlist <i class="bi bi-heart-fill"></i></label>
                        </div>

                        <div class="col-12">
                            <hr class="hrbreak1" />
                        </div>

                        <div class="col-12 col-lg-2 border border-start-0 border-top-0 border-bottom-0 border-end border-2 border-primary">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Watchlist</li>
                                </ol>
                            </nav>
                            <nav class="nav nav-pills flex-column">
                                <a class="nav-link active" aria-current="page">My Watchlist</a>
                                <a class="nav-link" href="Cart.php">My Cart</a>
                            </nav>
                        </div>

                        <?php

                        $watchlistrs = Database::Search("SELECT * FROM `watchlist` WHERE `customer_email` = '" . $email . "'");
                        $wn = $watchlistrs->num_rows;

                        if ($wn <= 0) {
                        ?>
                            <!-- without items -->
                            <div class="col-12 col-lg-9">
                                <div class="row">
                                    <div class="col-12 emptyview"></div>
                                    <div class="col-12 text-center">
                                        <label class="form-label fs-1 mb-3 fw-bolder">You Have no Items in Your Watchlist.</label>
                                    </div>
                                </div>
                            </div>
                            <!-- without items -->
                        <?php
                        } else {
                        ?>
                            <div class="col-12 col-lg-9">
                                <div class="row g-2">
                                    <?php
                                    for ($i = 0; $i < $wn; $i++) {
                                        $wr  = $watchlistrs->fetch_assoc();
                                        $wid = $wr["product_id"];

                                        $productrs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $wid . "'");
                                        $pn = $productrs->num_rows;

                                        if ($pn == 1) {
                                            $productrow = $productrs->fetch_assoc();
                                            $prod = $productrow["id"];

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
                                                                <h1 class="text-dark fs-1 fw-bolder">SPECIFICATIONS</h1>
                                                            </div>

                                                            <div class="col-12 p-2 border border-1 border-dark rounded">
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
                                                    <div class="col-md-3 mt-4">
                                                        <div class="row">
                                                            <div class="col-12 card-body">
                                                                <div class="row g-2">
                                                                    <div class="col-12">
                                                                        <span class="fs-3 text-dark fw-bold">Rs. <?php echo $productrow["price"]; ?> .00</span>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <label class="form-label fw-bold">Quantity</label>
                                                                        <input type="number" class="form-control" value="1" id="qty" />
                                                                    </div>
                                                                    <div class="col-12 d-grid">
                                                                        <a href="BuyNow.php?id=<?php echo $productrow["id"]; ?>" class="btn btn-outline-success">Buy Now</a>
                                                                    </div>
                                                                    <div class="col-12 d-grid">
                                                                        <button class="btn btn-outline-primary" onclick="AddToCart(<?php echo  $productrow['id']; ?>);">Add To Cart</button>
                                                                    </div>
                                                                    <div class="col-12 d-grid">
                                                                        <button class="btn btn-outline-danger" onclick="RemoveFromWatchlist(<?php echo $wr['id']; ?>);">Remove</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                        <!-- footer -->
                        <?php require "footer.php"; ?>
                        <!-- footer -->

                    </div>
                </div>

                <?php require "script.php"; ?>

            </div>
        </div>

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