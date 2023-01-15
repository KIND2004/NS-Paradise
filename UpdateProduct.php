<?php

session_start();

require "connection.php";

if (isset($_SESSION["admin"])) {

    if (isset($_GET["id"])) {

        $id  = $_GET["id"];

        $productrs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $id . "'");

        if ($productrs->num_rows == 1) {

            $product = $productrs->fetch_assoc();

?>

            <!DOCTYPE html>

            <html>

            <head>

                <title>NS Paradise-Update Product</title>

                <?php require "link.php"; ?>

            </head>

            <body>

                <div class="container-fluid">
                    <div class="row">

                        <!-- header -->
                        <?php require "adminheader.php"; ?>
                        <!-- header -->

                        <!-- TITLE -->
                        <div class="col-12">
                            <div class="row bg-primary py-2 rounded">

                                <div class="col-12">
                                    <h1 class="text-center fw-bolder text-white">Update Product</h1>
                                </div>

                            </div>
                        </div>
                        <!-- TITLE -->

                        <!-- MAIN PART -->
                        <div class="col-12">
                            <div class="row my-5 gy-3">

                                <div class="col-12">
                                    <div class="row justify-content-center gy-2">

                                        <div class="col-sm-8 col-md-6 col-lg-4">
                                            <label class="form-label fw-bold fs-4">Select Barnd</label>
                                            <select class="form-select" disabled>
                                                <?php
                                                $barnd_rs = Database::search("SELECT * FROM `brand` WHERE `id` = '" . $product["brand_id"] . "'");
                                                $barnd_d = $barnd_rs->fetch_assoc();
                                                ?>
                                                <option value="<?php echo $barnd_d["id"]; ?>"><?php echo $barnd_d["name"]; ?></option>
                                            </select>
                                        </div>

                                        <div class="col-sm-8 col-md-6 col-lg-4">
                                            <label class="form-label fw-bold fs-4">Add a Title</label>
                                            <input type="text" class="form-control fw-bold" placeholder="Enter Title here . . . . ." value="<?php echo $product["title"]; ?>" id="title" />
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="row justify-content-center gy-2">

                                        <div class="col-sm-8 col-md-6 col-lg-4">
                                            <label class="form-label fw-bold fs-4">Cost per Item</label>
                                            <input type="text" class="form-control fw-bold" placeholder="Enter Price here . . . . ." value="<?php echo $product["price"]; ?>" id="price" />
                                        </div>

                                        <div class="col-sm-8 col-md-6 col-lg-4">
                                            <label class="form-label fw-bold fs-4">Add Product Quantity</label>
                                            <input type="number" class="form-control fw-bold" value="<?php echo $product["qty"]; ?>" id="qty" />
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="row justify-content-center gy-2">

                                        <div class="col-sm-8 col-md-6 col-lg-4">
                                            <label class="form-label fw-bold fs-4">Select Crown Type</label>
                                            <select class="form-select" disabled>
                                                <?php
                                                $crown_rs = Database::search("SELECT * FROM `crown` WHERE `id` = '" . $product["crown_id"] . "'");
                                                $crown_d = $crown_rs->fetch_assoc();
                                                ?>
                                                <option value="<?php echo $crown_d["id"]; ?>"><?php echo $crown_d["name"]; ?></option>
                                            </select>
                                        </div>

                                        <div class="col-sm-8 col-md-6 col-lg-4">
                                            <label class="form-label fw-bold fs-4">Select Shape Type</label>
                                            <select class="form-select" disabled>
                                                <?php
                                                $shape_rs = Database::search("SELECT * FROM `shape` WHERE `id` = '" . $product["shape_id"] . "'");
                                                $shape_d = $shape_rs->fetch_assoc();
                                                ?>
                                                <option value="<?php echo $shape_d["id"]; ?>"><?php echo $shape_d["name"]; ?></option>
                                            </select>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="row justify-content-center gy-2">

                                        <div class="col-sm-8 col-md-6 col-lg-4">
                                            <label class="form-label fw-bold fs-4">Select Case Colour</label>
                                            <select class="form-select" disabled>
                                                <?php
                                                $color_case_rs = Database::search("SELECT * FROM `color` WHERE `id` = '" . $product["case_color"] . "'");
                                                $color_case_d = $color_case_rs->fetch_assoc();
                                                ?>
                                                <option value="<?php echo $color_case_d["id"]; ?>"><?php echo $color_case_d["name"]; ?></option>
                                            </select>
                                        </div>

                                        <div class="col-sm-8 col-md-6 col-lg-4">
                                            <label class="form-label fw-bold fs-4">Select Dial Colour</label>
                                            <select class="form-select" disabled>
                                                <?php
                                                $color_dial_rs = Database::search("SELECT * FROM `color` WHERE `id` = '" . $product["dial_color"] . "'");
                                                $color_dial_d = $color_dial_rs->fetch_assoc();
                                                ?>
                                                <option value="<?php echo $color_dial_d["id"]; ?>"><?php echo $color_dial_d["name"]; ?></option>
                                            </select>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="row justify-content-center gy-2">

                                        <div class="col-sm-8 col-md-6 col-lg-4">
                                            <label class="form-label fw-bold fs-4">Select Bracelet Type</label>
                                            <select class="form-select" disabled>
                                                <?php
                                                $bracelet_rs = Database::search("SELECT * FROM `bracelet` WHERE `id` = '" . $product["bracelet_id"] . "'");
                                                $bracelet_d = $bracelet_rs->fetch_assoc();
                                                ?>
                                                <option value="<?php echo $bracelet_d["id"]; ?>"><?php echo $bracelet_d["name"]; ?></option>
                                            </select>
                                        </div>

                                        <div class="col-sm-8 col-md-6 col-lg-4">
                                            <label class="form-label fw-bold fs-4">Select Bracelet Colour</label>
                                            <select class="form-select" disabled>
                                                <?php
                                                $color_bracelet_rs = Database::search("SELECT * FROM `color` WHERE `id` = '" . $product["bracelet_id"] . "'");
                                                $color_bracelet_d = $color_bracelet_rs->fetch_assoc();
                                                ?>
                                                <option value="<?php echo $color_bracelet_d["id"]; ?>"><?php echo $color_bracelet_d["name"]; ?></option>
                                            </select>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="row justify-content-center gy-2">

                                        <div class="col-sm-8 col-md-6 col-lg-4">
                                            <label class="form-label fw-bold fs-4">Select Gender</label>
                                            <select class="form-select" disabled>
                                                <?php
                                                $gender_rs = Database::search("SELECT * FROM `gender` WHERE `id`  = '" . $product["gender_id"] . "'");
                                                $gender_d = $gender_rs->fetch_assoc();
                                                ?>
                                                <option value="<?php echo $gender_d["id"]; ?>"><?php echo $gender_d["name"]; ?></option>
                                            </select>
                                        </div>

                                        <div class="col-sm-8 col-md-6 col-lg-4">
                                            <label class="form-label fw-bold fs-4">Date Display</label>
                                            <select class="form-select" disabled>
                                                <?php
                                                $date_display_rs = Database::search("SELECT * FROM `date_display` WHERE `id` = '" . $product["date_display_id"] . "'");
                                                $date_display_d = $date_display_rs->fetch_assoc();
                                                ?>
                                                <option value="<?php echo $date_display_d["id"]; ?>"><?php echo $date_display_d["name"]; ?></option>
                                            </select>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="row justify-content-center">

                                        <div class="col-12 col-sm-10 col-md-8 col-lg-6">
                                            <label class="form-label fw-bold fs-4">Description</label>&nbsp;<label class="form-label text-black-50 fs-5">(Optional)</label>
                                            <textarea class="form-control border border-1 border-primary description" rows="10" id="description"><?php echo $product["description"]; ?></textarea>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="row justify-content-center g-2">

                                        <div class="col-sm-8 col-md-6 col-lg-4">
                                            <div class="row justify-content-center">
                                                <div class="col-8 p-2 border border-2 border-primary rounded">
                                                    <img src="<?php echo $product["img"]; ?>" class="col-12" height="300px" id="prev" />
                                                </div>
                                            </div>
                                            <div class="offset-2 mt-1 col-8 d-grid">
                                                <input type="file" class="d-none" accept="img/*" id="img" />
                                                <label for="img" class="btn btn-success fs-4 fw-bold" onclick="changeImg();">Add Product Image</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- MAIN PART -->

                        <div class="col-12">
                            <hr class="border border-2 border-dark" />
                        </div>

                        <!-- ADD PRODUCT -->
                        <div class="col-12">
                            <div class="row my-5">

                                <div class="col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-4 offset-lg-4">
                                    <div class="row">

                                        <div class="col-12 d-grid">
                                            <button class="btn btn-primary fw-bolder fs-3" onclick="UpdateProduct(<?php echo $product['id']; ?>);">UPDATE PRODUCT</button>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- ADD PRODUCT -->

                    </div>
                </div>

                <?php require "script.php"; ?>

            </body>

            </html>

        <?php
        } else {
        ?>
            <script>
                window.location = "AdminHome.php";
            </script>
        <?php
        }
    } else {
        ?>
        <script>
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