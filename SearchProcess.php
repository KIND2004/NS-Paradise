<?php

require "connection.php";

if (empty($_GET["search"])) {

    $producttitle = Database::search("SELECT DISTINCT(`brand`.`id`) FROM `product` INNER JOIN `brand` ON `product`.`brand_id` = `brand`.`id` WHERE `product`.`status_id` = '1'");
    $num = $producttitle->num_rows;
    for ($i = 0; $i < $num; $i++) {
        $row = $producttitle->fetch_assoc();

        $brand = Database::search("SELECT * FROM `brand` WHERE `id` = '" . $row["id"] . "'");
        $brand_row = $brand->fetch_assoc();
?>
        <div class="col-12">
            <a href="AllProductView.php?brand=<?php echo $row["id"]; ?>&page=1" class="ms-lg-3 brands link-dark"><?php echo $brand_row["name"]; ?></a>
            <a href="AllProductView.php?brand=<?php echo $row["id"]; ?>&page=1" class="ms-3 link-dark see_all">See All &rightarrow;</a>
        </div>
        <?php


        $productinfo = Database::search("SELECT * FROM `product` WHERE `brand_id` = '" . $row["id"] . "' AND `status_id` = '1' ORDER BY `datetime_added` DESC LIMIT 5 OFFSET 0");
        $nr = $productinfo->num_rows;

        for ($x = 0; $x < $nr; $x++) {
            $pd = $productinfo->fetch_assoc();
        ?>
            <div class="col-6 col-sm-5 col-md-3 col-lg-2 card">
                <img src="<?php echo $pd["img"]; ?>" class="card-img-top img-hgt img-thumbnail" />
                <div class="card-body">
                    <div class="col-12">
                        <h5 class="card-title fw-bold"><?php echo $pd["title"]; ?> <span class="badge bg-info">New</span></h5>
                    </div>
                    <div class="col-12 d-grid">
                        <a href="ViewProduct.php?id=<?php echo $pd["id"]; ?>" class="btn btn-dark">View Product</a>
                    </div>
                </div>
            </div>

        <?php
        }
    }
} else {

    $search = $_GET["search"];

    $productrs = Database::search("SELECT * FROM `product` WHERE `title` LIKE '%" . $search . "%' AND `status_id` = '1'");

    if ($productrs->num_rows >= 1) {

        for ($i = 0; $i < $productrs->num_rows; $i++) {

            $pd = $productrs->fetch_assoc();

        ?>

            <div class="col-6 col-sm-5 col-md-3 col-lg-2 card">
                <img src="<?php echo $pd["img"]; ?>" class="card-img-top img-hgt img-thumbnail" />
                <div class="card-body">
                    <div class="col-12">
                        <h5 class="card-title fw-bold"><?php echo $pd["title"]; ?> <span class="badge bg-info">New</span></h5>
                    </div>
                    <div class="col-12 d-grid">
                        <a href="ViewProduct.php?id=<?php echo $pd["id"]; ?>" class="btn btn-dark">View Product</a>
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