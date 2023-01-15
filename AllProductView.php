<?php

session_start();

require "connection.php";

if (isset($_GET["brand"])) {

    $brandid = $_GET["brand"];

    $pageno;

?>

    <!DOCTYPE html>

    <html>

    <head>

        <title>NS Paradise</title>

        <?php require "link.php"; ?>

    </head>

    <body>

        <div class="container-fluid">
            <div class="row">

                <?php require "header.php"; ?>

                <div class="col-12 col-lg-8 offset-lg-2">
                    <div class="row mt-5 justify-content-center">

                        <?php

                        if (isset($_GET["page"])) {
                            $pageno = $_GET["page"];
                        } else {
                            $pageno = 1;
                        }

                        $products = Database::search("SELECT * FROM `product` WHERE `brand_id` = '" . $brandid . "' AND `status_id` = '1' ORDER BY `datetime_added` DESC");
                        $d = $products->num_rows;
                        $row = $products->fetch_assoc();

                        $results_per_page = 8;

                        $number_of_pages = ceil($d / $results_per_page);

                        $page_first_result = ((int)$pageno - 1) * $results_per_page;

                        $selectedrs = Database::search("SELECT * FROM `product` WHERE `brand_id` = '" . $brandid . "' AND `status_id` = '1' ORDER BY `datetime_added` DESC 
LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "");
                        $srn = $selectedrs->num_rows;

                        while ($product = $selectedrs->fetch_assoc()) {

                            // $productrs = Database::search("SELECT * FROM `product` WHERE `brand_id` = '" . $brandid . "' AND `status_id` = '1' ORDER BY `datetime_added` DESC");

                            // for ($p = 0; $p < $productrs->num_rows; $p++) {

                            // $product = $productrs->fetch_assoc();

                        ?>

                            <div class="col-6 col-sm-5 col-md-3 col-lg-3 card">
                                <img src="<?php echo $product["img"]; ?>" class="card-img-top img-hgt img-thumbnail" />
                                <div class="card-body">
                                    <div class="col-12">
                                        <h5 class="card-title fw-bold"><?php echo $product["title"]; ?></h5>
                                    </div>
                                    <div class="col-12 d-grid">
                                        <a href="ViewProduct.php?id=<?php echo $product["id"]; ?>" class="btn btn-dark">View Product</a>
                                    </div>
                                </div>
                            </div>

                        <?php

                        }

                        ?>

                    </div>
                </div>

                <!-- pagination -->
                <div class="col-12 my-3">
                    <div class="offset-4 col-4 d-flex justify-content-center">
                        <div class="pagination">
                            <a href="<?php
                                        if ($pageno <= 1) {
                                            echo "#";
                                        } else {
                                            echo "?brand=" . $brandid . "&page=" . ($pageno - 1);
                                        }
                                        ?>">&laquo;</a>
                            <?php

                            for ($page = 1; $page <= $number_of_pages; $page++) {
                                if ($page == $pageno) {
                            ?>
                                    <a href="<?php echo "?brand=" . $brandid . "&page=" . ($page); ?>" class="ms-1 active"><?php echo $page; ?></a>
                                <?php
                                } else {
                                ?>
                                    <a href="<?php echo "?brand=" . $brandid . "&page=" . ($page); ?>" class="ms-1"><?php echo $page; ?></a>
                                <?php
                                }
                                ?>

                            <?php
                            }

                            ?>

                            <a href="<?php

                                        if ($pageno >= $number_of_pages) {
                                            echo "#";
                                        } else {
                                            echo "?brand=" . $brandid . "&page=" . ($pageno + 1);
                                        }

                                        ?>">&raquo;</a>
                        </div>
                    </div>
                </div>
                <!-- pagination -->

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

?>