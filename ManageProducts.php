<?php

session_start();

require "connection.php";

if (isset($_SESSION["admin"])) {

?>

    <!DOCTYPE html>

    <html>

    <head>

        <title>NS Paradise - Manage Products</title>

        <?php require "link.php"; ?>

    </head>

    <body style="background-color: aqua;" onload="SearchProducts();">

        <div class="container-fluid">
            <div class="row">

                <!-- header -->
                <?php require "adminheader.php"; ?>
                <!-- header -->

                <div class="col-12">
                    <div class="row bg-primary py-3 justify-content-center">

                        <div class="col-12 text-center">
                            <span class="text-white fw-bolder fs-1">MANAGE PRODUCTS</span>
                        </div>

                        <div class="col-12">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-8 col-md-6 col-lg-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="text" class="form-control" placeholder="Search Product Title . . . . ." id="search" onkeyup="SearchProducts();" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12">
                    <div class="row mt-2" id="products">

                    </div>
                </div>

                <!-- DELETE -->
                <div class="modal fade" id="success" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <span class="fs-1 fw-bold text-success">Product Deleted Successfully!!!</span>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" onclick="Reload();">OK</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- DELETE -->

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