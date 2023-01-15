<?php

session_start();

require "connection.php";

if (isset($_SESSION["admin"])) {
?>

    <!DOCTYPE html>

    <html>

    <head>

        <title>NS Paradise-Add Product</title>

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
                    <div class="row bg-primary py-3 rounded">

                        <div class="col-12">
                            <h1 class="text-center fw-bolder text-white">Add Product</h1>
                        </div>

                    </div>
                </div>
                <!-- TITLE -->

                <!-- ALERT -->
                <div class="col-12" id="maindiv">

                </div>
                <!-- ALERT -->

                <!-- MAIN PART -->
                <div class="col-12">
                    <div class="row my-5 gy-3">

                        <div class="col-12">
                            <div class="row justify-content-center gy-2">

                                <div class="col-sm-8 col-md-6 col-lg-4">
                                    <label class="form-label fw-bold fs-4">Select Barnd</label>
                                    <select class="form-select" id="brand">
                                        <option value="0">Select Barnd</option>
                                        <?php
                                        $barnd_rs = Database::search("SELECT * FROM `brand`");
                                        $brand_n = $barnd_rs->num_rows;
                                        for ($i = 0; $i < $brand_n; $i++) {
                                            $barnd_d = $barnd_rs->fetch_assoc();
                                        ?>
                                            <option value="<?php echo $barnd_d["id"]; ?>"><?php echo $barnd_d["name"]; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-sm-8 col-md-6 col-lg-4">
                                    <label class="form-label fw-bold fs-4">Add a Title</label>
                                    <input type="text" class="form-control fw-bold" placeholder="Enter Title here . . . . ." id="title" />
                                </div>

                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row justify-content-center gy-2">

                                <div class="col-sm-8 col-md-6 col-lg-4">
                                    <label class="form-label fw-bold fs-4">Cost per Item</label>
                                    <input type="text" class="form-control fw-bold" placeholder="Enter Price here . . . . ." id="price" />
                                </div>

                                <div class="col-sm-8 col-md-6 col-lg-4">
                                    <label class="form-label fw-bold fs-4">Add Product Quantity</label>
                                    <input type="number" value="1" class="form-control fw-bold" id="qty" />
                                </div>

                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row justify-content-center gy-2">

                                <div class="col-sm-8 col-md-6 col-lg-4">
                                    <label class="form-label fw-bold fs-4">Select Crown Type</label>
                                    <select class="form-select" id="crown">
                                        <option value="0">Select Crown</option>
                                        <?php
                                        $crown_rs = Database::search("SELECT * FROM `crown`");
                                        $crown_n = $crown_rs->num_rows;
                                        for ($i = 0; $i < $crown_n; $i++) {
                                            $crown_d = $crown_rs->fetch_assoc();
                                        ?>
                                            <option value="<?php echo $crown_d["id"]; ?>"><?php echo $crown_d["name"]; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-sm-8 col-md-6 col-lg-4">
                                    <label class="form-label fw-bold fs-4">Select Shape Type</label>
                                    <select class="form-select" id="shape">
                                        <option value="0">Select Shape</option>
                                        <?php
                                        $shape_rs = Database::search("SELECT * FROM `shape`");
                                        $shape_n = $shape_rs->num_rows;
                                        for ($i = 0; $i < $shape_n; $i++) {
                                            $shape_d = $shape_rs->fetch_assoc();
                                        ?>
                                            <option value="<?php echo $shape_d["id"]; ?>"><?php echo $shape_d["name"]; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row justify-content-center gy-2">

                                <div class="col-sm-8 col-md-6 col-lg-4">
                                    <label class="form-label fw-bold fs-4">Select Case Colour</label>
                                    <select class="form-select" id="case-clr">
                                        <option value="0">Choose Colour</option>
                                        <?php
                                        $color_case_rs = Database::search("SELECT * FROM `color`");
                                        $color_case_n = $color_case_rs->num_rows;
                                        for ($i = 0; $i < $color_case_n; $i++) {
                                            $color_case_d = $color_case_rs->fetch_assoc();
                                        ?>
                                            <option value="<?php echo $color_case_d["id"]; ?>"><?php echo $color_case_d["name"]; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-sm-8 col-md-6 col-lg-4">
                                    <label class="form-label fw-bold fs-4">Select Dial Colour</label>
                                    <select class="form-select" id="dial-clr">
                                        <option value="0">Choose Colour</option>
                                        <?php
                                        $color_dial_rs = Database::search("SELECT * FROM `color`");
                                        $color_dial_n = $color_dial_rs->num_rows;
                                        for ($i = 0; $i < $color_dial_n; $i++) {
                                            $color_dial_d = $color_dial_rs->fetch_assoc();
                                        ?>
                                            <option value="<?php echo $color_dial_d["id"]; ?>"><?php echo $color_dial_d["name"]; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row justify-content-center gy-2">

                                <div class="col-sm-8 col-md-6 col-lg-4">
                                    <label class="form-label fw-bold fs-4">Select Bracelet Type</label>
                                    <select class="form-select" id="bracelet">
                                        <option value="0">Select Bracelet</option>
                                        <?php
                                        $bracelet_rs = Database::search("SELECT * FROM `bracelet`");
                                        $bracelet_n = $bracelet_rs->num_rows;
                                        for ($i = 0; $i < $bracelet_n; $i++) {
                                            $bracelet_d = $bracelet_rs->fetch_assoc();
                                        ?>
                                            <option value="<?php echo $bracelet_d["id"]; ?>"><?php echo $bracelet_d["name"]; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-sm-8 col-md-6 col-lg-4">
                                    <label class="form-label fw-bold fs-4">Select Bracelet Colour</label>
                                    <select class="form-select" id="bracelet-clr">
                                        <option value="0">Choose Colour</option>
                                        <?php
                                        $color_bracelet_rs = Database::search("SELECT * FROM `color`");
                                        $color_bracelet_n = $color_bracelet_rs->num_rows;
                                        for ($i = 0; $i < $color_bracelet_n; $i++) {
                                            $color_bracelet_d = $color_bracelet_rs->fetch_assoc();
                                        ?>
                                            <option value="<?php echo $color_bracelet_d["id"]; ?>"><?php echo $color_bracelet_d["name"]; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row justify-content-center gy-2">

                                <div class="col-sm-8 col-md-6 col-lg-4">
                                    <label class="form-label fw-bold fs-4">Select Gender</label>
                                    <select class="form-select" id="gender">
                                        <option value="0">Select Gender</option>
                                        <?php
                                        $gender_rs = Database::search("SELECT * FROM `gender`");
                                        $gender_n = $gender_rs->num_rows;
                                        for ($i = 0; $i < $gender_n; $i++) {
                                            $gender_d = $gender_rs->fetch_assoc();
                                        ?>
                                            <option value="<?php echo $gender_d["id"]; ?>"><?php echo $gender_d["name"]; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-sm-8 col-md-6 col-lg-4">
                                    <label class="form-label fw-bold fs-4">Date Display</label>
                                    <select class="form-select" id="date-display">
                                        <option value="0">Date Display</option>
                                        <?php
                                        $date_display_rs = Database::search("SELECT * FROM `date_display`");
                                        $date_display_n = $date_display_rs->num_rows;
                                        for ($i = 0; $i < $date_display_n; $i++) {
                                            $date_display_d = $date_display_rs->fetch_assoc();
                                        ?>
                                            <option value="<?php echo $date_display_d["id"]; ?>"><?php echo $date_display_d["name"]; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row justify-content-center">

                                <div class="col-12 col-sm-10 col-md-8 col-lg-6">
                                    <label class="form-label fw-bold fs-4">Description</label>&nbsp;<label class="form-label text-black-50 fs-5">(Optional)</label>
                                    <textarea class="form-control border border-1 border-primary description" rows="10" id="description"></textarea>
                                </div>

                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row justify-content-center g-2">

                                <div class="col-sm-8 col-md-6 col-lg-4">
                                    <div class="row justify-content-center">
                                        <div class="col-8 p-2 border border-2 border-primary rounded">
                                            <img src="Resources/addimage.svg" class="col-12" height="300px" id="prev" />
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
                                    <button class="btn btn-primary fw-bolder fs-3" onclick="AddProduct();">ADD PRODUCT</button>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <!-- ADD PRODUCT -->

            </div>
        </div>

        <!-- SUCCESS -->
        <div class="modal fade" id="success" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <span class="fs-1 fw-bold text-success">Product Added Successfully!!!</span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="Reload();">OK</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- SUCCESS -->

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