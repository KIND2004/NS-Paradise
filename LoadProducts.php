<?php

require "connection.php";

if (empty($_GET["search"])) {

?>

    <div class="col-12 d-none d-lg-block">
        <div class="row mb-2">

            <div class="col-2 p-1 bg-light text-center">
                <label class="form-label fw-bolder fs-3 text-dark">Image</label>
            </div>
            <div class="col-3 bg-primary p-1 text-center">
                <label class="form-label fw-bolder fs-3 text-white">Title</label>
            </div>
            <div class="col-2 bg-light p-1 text-center">
                <label class="form-label fw-bolder fs-3 text-dark">Price</label>
            </div>
            <div class="col-2 p-1 bg-primary text-center">
                <label class="form-label fw-bolder fs-3 text-white">Registered Date</label>
            </div>
            <div class="col-3 p-1 bg-white text-center">
            </div>

        </div>
    </div>

    <?php

    $productrs = Database::search("SELECT * FROM `product`");

    for ($rows = 0; $rows < $productrs->num_rows; $rows++) {

        $product = $productrs->fetch_assoc();

    ?>

        <div class="col-12">
            <div class="row border border-2 border-dark border-top-0 border-start-0 border-end-0">

                <div class="col-12 col-lg-2 p-1 bg-light text-center">
                    <img src="<?php echo $product["img"]; ?>" height="70px" width="70px" />
                </div>

                <div class="col-12 col-lg-3 bg-primary p-1 text-center">
                    <label class="form-label fw-bolder fs-5 text-white"><?php echo $product["title"]; ?></label>
                </div>
                <div class="col-12 col-lg-2 bg-light p-1 text-center">
                    <label class="form-label fw-bolder fs-5 text-dark">Rs. <?php echo $product["price"]; ?> .00</label>
                </div>
                <div class="col-12 col-lg-2 p-1 bg-primary text-center">
                    <?php
                    $date = $product["datetime_added"];
                    $splitdate = explode(" ", $date);
                    ?>
                    <label class="form-label fw-bolder fs-5 text-white"><?php echo $splitdate[0]; ?></label>
                </div>
                <div class="col-12 col-lg-3 p-1 bg-white text-center">
                    <a href="UpdateProduct.php?id=<?php echo $product["id"]; ?>" class="btn btn-success fw-bold">Update</a>
                    <button class="btn btn-danger fw-bold" onclick="DeleteProduct(<?php echo $product['id']; ?>);">Delete</button>
                    <?php
                    if ($product["status_id"] == "1") {
                    ?>
                        <button id="ProductStatus<?php echo $product['id']; ?>" class="btn btn-warning text-white fw-bold" onclick="ProductStatus('<?php echo $product['id']; ?>');">Block</button>
                    <?php
                    } else {
                    ?>
                        <button id="ProductStatus<?php echo $product['id']; ?>" class="btn btn-info text-white fw-bold" onclick="ProductStatus('<?php echo $product['id']; ?>');">Unblock</button>
                    <?php
                    }

                    ?>
                </div>
            </div>
        </div>

    <?php

    }

    ?>


<?php

} else {

    $search = $_GET["search"];

?>

    <div class="col-12 d-none d-lg-block">
        <div class="row mb-2">

            <div class="col-2 p-1 bg-light text-center">
                <label class="form-label fw-bolder fs-3 text-dark">Image</label>
            </div>
            <div class="col-3 bg-primary p-1 text-center">
                <label class="form-label fw-bolder fs-3 text-white">Title</label>
            </div>
            <div class="col-2 bg-light p-1 text-center">
                <label class="form-label fw-bolder fs-3 text-dark">Price</label>
            </div>
            <div class="col-2 p-1 bg-primary text-center">
                <label class="form-label fw-bolder fs-3 text-white">Registered Date</label>
            </div>
            <div class="col-3 p-1 bg-white text-center">
            </div>

        </div>
    </div>

    <?php

    $productrs = Database::search("SELECT * FROM `product` WHERE `title` LIKE '%" . $search . "%'");

    if ($productrs->num_rows >= 1) {

        for ($rows = 0; $rows < $productrs->num_rows; $rows++) {

            $product = $productrs->fetch_assoc();

    ?>

            <div class="col-12">
                <div class="row border border-2 border-dark border-top-0 border-start-0 border-end-0">

                    <div class="col-12 col-lg-2 p-1 bg-light text-center">
                        <img src="<?php echo $product["img"]; ?>" height="70px" width="70px" />
                    </div>

                    <div class="col-12 col-lg-3 bg-primary p-1 text-center">
                        <label class="form-label fw-bolder fs-5 text-white"><?php echo $product["title"]; ?></label>
                    </div>
                    <div class="col-12 col-lg-2 bg-light p-1 text-center">
                        <label class="form-label fw-bolder fs-5 text-dark">Rs. <?php echo $product["price"]; ?> .00</label>
                    </div>
                    <div class="col-12 col-lg-2 p-1 bg-primary text-center">
                        <?php
                        $date = $product["datetime_added"];
                        $splitdate = explode(" ", $date);
                        ?>
                        <label class="form-label fw-bolder fs-5 text-white"><?php echo $splitdate[0]; ?></label>
                    </div>
                    <div class="col-12 col-lg-3 p-1 bg-white text-center">
                        <a href="UpdateProduct.php?id=<?php echo $product["id"]; ?>" class="btn btn-success fw-bold">Update</a>
                        <button class="btn btn-danger fw-bold" onclick="DeleteProduct(<?php echo $product['id']; ?>);">Delete</button>
                        <?php
                        if ($product["status_id"] == "1") {
                        ?>
                            <button id="ProductStatus<?php echo $product['id']; ?>" class="btn btn-warning text-white fw-bold" onclick="ProductStatus('<?php echo $product['id']; ?>');">Block</button>
                        <?php
                        } else {
                        ?>
                            <button id="ProductStatus<?php echo $product['id']; ?>" class="btn btn-info text-white fw-bold" onclick="ProductStatus('<?php echo $product['id']; ?>');">Unblock</button>
                        <?php
                        }

                        ?>
                    </div>
                </div>
            </div>

        <?php

        }
    } else {

        ?>

        <div class="col-12">
            <div class="row">
                <div class="col-12 text-center">
                    <label class="fs-1 fw-bolder">No Exact Matches Found</label>
                </div>
            </div>
        </div>

<?php

    }
}

?>