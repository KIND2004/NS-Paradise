<?php

session_start();

require "connection.php";

?>

<!DOCTYPE html>

<html>

<head>

    <title>NS Paradise-Home</title>

    <?php require "link.php"; ?>

</head>

<body onload="Search();">

    <div class="container-fluid">
        <div class="col-12">

            <!-- header -->
            <?php require "header.php"; ?>
            <!-- header -->

            <hr class="hrbreak" />

            <!-- search,logo -->
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-4">
                        <h1 class="fw-bold text-center text-danger">NS PARADISE</h1>
                    </div>
                    <div class="col-lg-7 search">
                        <div class="input-group">
                            <input type="text" class="col-9 form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2" id="search" />
                            <button class="col-3 btn btn-outline-primary" type="button" id="button-addon2" onclick="Search();">Search</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- search,logo -->

            <hr class="hrbreak" />

            <!-- slider -->
            <div class="col-12 d-none d-lg-block">
                <div class="row">
                    <div id="carouselExampleIndicators" class="offset-2 col-8 carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="Resources/Slider_Images/image1.jpeg" class="d-block w-100 s_show" />
                            </div>
                            <div class="carousel-item">
                                <img src="Resources/Slider_Images/image2.jpeg" class="d-block w-100 s_show" />
                            </div>
                            <div class="carousel-item">
                                <img src="Resources/Slider_Images/image3.jpeg" class="d-block w-100 s_show" />
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- slider -->

            <!-- product view -->
            <div class="col-12">
                <div class="row mt-5">

                    <div class="col-12">
                        <div class="row g-2 justify-content-center" id="product">

                        </div>
                    </div>

                </div>
            </div>
            <!-- product view -->

            <!-- footer -->
            <?php require "footer.php"; ?>
            <!-- footer -->

        </div>
    </div>

    <?php require "script.php"; ?>
</body>

</html>