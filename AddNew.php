<?php

session_start();

require "connection.php";

if (isset($_SESSION["admin"])) {

?>

    <!DOCTYPE html>

    <html>

    <head>

        <title>NS Paradise</title>

        <?php require "link.php"; ?>

    </head>

    <body class="bg-light">

        <div class="container-fluid">
            <div class="row">

                <!-- header -->
                <?php require "adminheader.php"; ?>
                <!-- header -->

                <hr class="mt-5" />

                <!-- brand -->
                <div class="col-12">
                    <div class="row g-2">

                        <div class="col-6">
                            <label class="form-label fs-3 fw-bold text-dark">Brand</label>
                        </div>
                        <div class="col-6 text-end" onclick="BrandModal();">
                            <label class="link-primary text-decoration-none">
                                <i class="bi bi-plus-circle"></i> Add New</label>
                            </label>
                        </div>

                        <div class="col-12">
                            <div class="row justify-content-center g-2">

                                <?php
                                $brandrs = Database::search("SELECT * FROM `brand`");
                                for ($b = 0; $b < $brandrs->num_rows; $b++) {
                                    $brand = $brandrs->fetch_assoc();
                                ?>

                                    <div class="col-6 col-sm-5 col-md-4 col-lg-3 p-1">
                                        <div class="bg-danger rounded-3 text-center">
                                            <label class="form-label text-white fw-bold fs-3"><?php echo $brand["name"]; ?></label>
                                        </div>
                                    </div>

                                <?php
                                }
                                ?>

                            </div>
                        </div>

                    </div>
                </div>
                <!-- brand -->

                <hr class="my-3" />

                <!-- crown -->
                <div class="col-12">
                    <div class="row g-2">

                        <div class="col-6">
                            <label class="form-label fs-3 fw-bold text-dark">Crown</label>
                        </div>
                        <div class="col-6 text-end" onclick="CrownModal();">
                            <label class="link-primary text-decoration-none">
                                <i class="bi bi-plus-circle"></i> Add New</label>
                            </label>
                        </div>

                        <div class="col-12">
                            <div class="row justify-content-center g-2">

                                <?php
                                $crownrs = Database::search("SELECT * FROM `crown`");
                                for ($c = 0; $c < $crownrs->num_rows; $c++) {
                                    $crown = $crownrs->fetch_assoc();
                                ?>

                                    <div class="col-6 col-sm-5 col-md-4 col-lg-3 p-1">
                                        <div class="bg-success rounded-3 text-center">
                                            <label class="form-label text-white fw-bold fs-3"><?php echo $crown["name"]; ?></label>
                                        </div>
                                    </div>

                                <?php
                                }
                                ?>

                            </div>
                        </div>

                    </div>
                </div>
                <!-- crown -->

                <hr class="my-3" />

                <!-- shape -->
                <div class="col-12">
                    <div class="row g-2">

                        <div class="col-6">
                            <label class="form-label fs-3 fw-bold text-dark">Shape</label>
                        </div>
                        <div class="col-6 text-end" onclick="ShapeModal();">
                            <label class="link-primary text-decoration-none">
                                <i class="bi bi-plus-circle"></i> Add New</label>
                            </label>
                        </div>

                        <div class="col-12">
                            <div class="row justify-content-center g-2">

                                <?php
                                $shapers = Database::search("SELECT * FROM `shape`");
                                for ($s = 0; $s < $shapers->num_rows; $s++) {
                                    $shape = $shapers->fetch_assoc();
                                ?>

                                    <div class="col-6 col-sm-5 col-md-4 col-lg-3 p-1">
                                        <div class="bg-info rounded-3 text-center">
                                            <label class="form-label text-white fw-bold fs-3"><?php echo $shape["name"]; ?></label>
                                        </div>
                                    </div>

                                <?php
                                }
                                ?>

                            </div>
                        </div>

                    </div>
                </div>
                <!-- shape -->

                <hr class="my-3" />

                <!-- bracelet -->
                <div class="col-12">
                    <div class="row g-2">

                        <div class="col-6">
                            <label class="form-label fs-3 fw-bold text-dark">Bracelet</label>
                        </div>
                        <div class="col-6 text-end" onclick="BraceletModal();">
                            <label class="link-primary text-decoration-none">
                                <i class="bi bi-plus-circle"></i> Add New</label>
                            </label>
                        </div>

                        <div class="col-12">
                            <div class="row justify-content-center g-2">

                                <?php
                                $braceletrs = Database::search("SELECT * FROM `bracelet`");
                                for ($b = 0; $b < $braceletrs->num_rows; $b++) {
                                    $bracelet = $braceletrs->fetch_assoc();
                                ?>

                                    <div class="col-6 col-sm-5 col-md-4 col-lg-3 p-1">
                                        <div class="bg-warning rounded-3 text-center">
                                            <label class="form-label text-white fw-bold fs-3"><?php echo $bracelet["name"]; ?></label>
                                        </div>
                                    </div>

                                <?php
                                }
                                ?>

                            </div>
                        </div>

                    </div>
                </div>
                <!-- bracelet -->

                <hr class="my-3" />

                <!-- colors -->
                <div class="col-12">
                    <div class="row g-2">

                        <div class="col-6">
                            <label class="form-label fs-3 fw-bold text-dark">Colours</label>
                        </div>
                        <div class="col-6 text-end" onclick="ColorModal();">
                            <label class="link-primary text-decoration-none">
                                <i class="bi bi-plus-circle"></i> Add New</label>
                            </label>
                        </div>

                        <div class="col-12">
                            <div class="row justify-content-center g-2">

                                <?php
                                $colorrs = Database::search("SELECT * FROM `color`");
                                for ($c = 0; $c < $colorrs->num_rows; $c++) {
                                    $color = $colorrs->fetch_assoc();
                                ?>

                                    <div class="col-6 col-sm-5 col-md-4 col-lg-3 p-1">
                                        <div class="bg-primary rounded-3 text-center">
                                            <label class="form-label text-white fw-bold fs-3"><?php echo $color["name"]; ?></label>
                                        </div>
                                    </div>

                                <?php
                                }
                                ?>

                            </div>
                        </div>

                    </div>
                </div>
                <!-- colors -->

                <hr class="my-3" />

            </div>
        </div>

        <!-- BrandModal -->
        <div class="modal fade" id="BrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fs-1 fw-bolder" id="exampleModalLabel">Add New Brand</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-12">
                            <label class="form-label fw-bold fs-5">Brand</label>
                            <input type="text" class="form-control" id="newbrand" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" onclick="AddNewBrand();">Add</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- BrandModal -->

        <!-- CrownModal -->
        <div class="modal fade" id="CrownModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fs-1 fw-bolder" id="exampleModalLabel">Add New Crown</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-12">
                            <label class="form-label fw-bold fs-5">Crown</label>
                            <input type="text" class="form-control" id="newcrown" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" onclick="AddNewCrown();">Add</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- CrownModal -->

        <!-- ShapeModal -->
        <div class="modal fade" id="ShapeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fs-1 fw-bolder" id="exampleModalLabel">Add New Shape</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-12">
                            <label class="form-label fw-bold fs-5">Shape</label>
                            <input type="text" class="form-control" id="newshape" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" onclick="AddNewShape();">Add</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- ShapeModal -->

        <!-- BraceletModal -->
        <div class="modal fade" id="BraceletModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fs-1 fw-bolder" id="exampleModalLabel">Add New Bracelet</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-12">
                            <label class="form-label fw-bold fs-5">Bracelet</label>
                            <input type="text" class="form-control" id="newbracelet" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" onclick="AddNewBracelet();">Add</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- BraceletModal -->

        <!-- ColorModal -->
        <div class="modal fade" id="ColorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fs-1 fw-bolder" id="exampleModalLabel">Add New Color</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-12">
                            <label class="form-label fw-bold fs-5">Color</label>
                            <input type="text" class="form-control" id="newcolor" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" onclick="AddNewColor();">Add</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- ColorModal -->

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