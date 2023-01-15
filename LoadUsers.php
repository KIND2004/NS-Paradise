<?php

require "connection.php";

if (empty($_GET["search"])) {

?>

    <div class="col-12">
        <div class="row mb-2">

            <div class="col-2 d-none d-lg-block p-1 bg-light text-center">
                <span class="fw-bolder fs-3 text-dark">Profile</span>
            </div>
            <div class="col-8 col-lg-3 bg-primary p-1 text-center">
                <span class="fw-bolder fs-3 text-white">Email</span>
            </div>
            <div class="col-2 d-none d-lg-block bg-light p-1 text-center">
                <span class="fw-bolder fs-3 text-dark">User Name</span>
            </div>
            <div class="col-2 d-none d-lg-block p-1 bg-primary text-center">
                <span class="fw-bolder fs-3 text-white">Registered Date</span>
            </div>
            <div class="col-2 d-none d-lg-block bg-light p-1 text-center">
                <span class="fw-bolder fs-3 text-dark">Account</span>
            </div>
            <div class="col-4 col-lg-1 p-1 bg-white text-center">
            </div>


        </div>
    </div>

    <?php

    $customerrs = Database::search("SELECT * FROM `customer`");

    for ($rows = 0; $rows < $customerrs->num_rows; $rows++) {

        $customer = $customerrs->fetch_assoc();

    ?>

        <div class="col-12">
            <div class="row border border-2 border-dark border-top-0 border-start-0 border-end-0">

                <?php

                $imgrs = Database::search("SELECT * FROM `profile_image` WHERE `customer_email` = '" . $customer["email"] . "'");

                if ($imgrs->num_rows == 1) {
                    $img = $imgrs->fetch_assoc();
                ?>
                    <div class="col-2 d-none d-lg-block p-1 bg-light text-center">
                        <img src="<?php echo $img["path"]; ?>" height="60px" width="60px" />
                    </div>
                <?php
                } else {
                ?>
                    <div class="col-2 d-none d-lg-block p-1 bg-light text-center">
                        <img src="Resources/demoprofile.svg" height="50px" width="50px" />
                    </div>
                <?php
                }


                ?>

                <div class="col-8 col-lg-3 bg-primary p-1 text-center">
                    <span class="fw-bolder fs-5 text-white fst-italic text-decoration-underline" style="cursor: pointer;" onclick="SendEmailToUser('<?php echo $customer['email']; ?>');"><?php echo $customer["email"]; ?></span>
                </div>
                <div class="col-2 d-none d-lg-block bg-light p-1 text-center">
                    <span class="fw-bolder fs-5 text-dark"><?php echo $customer["fname"] . " " . $customer["lname"]; ?></span>
                </div>
                <div class="col-2 d-none d-lg-block p-1 bg-primary text-center">
                    <?php
                    $date = $customer["registration_date"];
                    $splitdate = explode(" ", $date);
                    ?>
                    <span class="fw-bolder fs-5 text-white"><?php echo $splitdate[0]; ?></span>
                </div>
                <div class="col-2 d-none d-lg-block fs-5 bg-light p-1 text-center">
                    <?php
                    $acc = Database::search("SELECT * FROM `v_status` WHERE `id` = '" . $customer["v_status_id"] . "'");
                    $account = $acc->fetch_assoc();
                    ?>
                    <span class="fw-bolder fs-5 text-dark"><?php echo $account["status"]; ?></span>
                </div>
                <div class="col-4 col-lg-1 p-1 bg-white text-center d-grid">
                    <?php
                    if ($customer["status_id"] == "1") {
                    ?>
                        <button id="UserStatus<?php echo $customer['email']; ?>" class="btn btn-danger fw-bold" onclick="UserStatus('<?php echo $customer['email']; ?>');">Block</button>
                    <?php
                    } else {
                    ?>
                        <button id="UserStatus<?php echo $customer['email']; ?>" class="btn btn-success fw-bold" onclick="UserStatus('<?php echo $customer['email']; ?>');">Unblock</button>
                    <?php
                    }

                    ?>
                </div>
            </div>
        </div>

    <?php

    }
} else {

    $search = $_GET["search"];

    ?>

    <div class="col-12">
        <div class="row mb-2">

            <div class="col-2 d-none d-lg-block p-1 bg-light text-center">
                <span class="fw-bolder fs-3 text-dark">Profile</span>
            </div>
            <div class="col-8 col-lg-3 bg-primary p-1 text-center">
                <span class="fw-bolder fs-3 text-white">Email</span>
            </div>
            <div class="col-2 d-none d-lg-block bg-light p-1 text-center">
                <span class="fw-bolder fs-3 text-dark">User Name</span>
            </div>
            <div class="col-2 d-none d-lg-block p-1 bg-primary text-center">
                <span class="fw-bolder fs-3 text-white">Registered Date</span>
            </div>
            <div class="col-2 d-none d-lg-block bg-light p-1 text-center">
                <span class="fw-bolder fs-3 text-dark">Account</span>
            </div>
            <div class="col-4 col-lg-1 p-1 bg-white text-center">
            </div>

        </div>
    </div>

    <?php

    $customerrs = Database::search("SELECT * FROM `customer` WHERE `email` LIKE '%" . $search . "%'");

    if ($customerrs->num_rows >= 1) {

        for ($rows = 0; $rows < $customerrs->num_rows; $rows++) {

            $customer = $customerrs->fetch_assoc();

    ?>

            <div class="col-12">
                <div class="row border border-2 border-dark border-top-0 border-start-0 border-end-0">

                    <?php

                    $imgrs = Database::search("SELECT * FROM `profile_image` WHERE `customer_email` = '" . $customer["email"] . "'");

                    if ($imgrs->num_rows == 1) {
                        $img = $imgrs->fetch_assoc();
                    ?>
                        <div class="col-2 d-none d-lg-block p-1 bg-light text-center">
                            <img src="<?php echo $img["path"]; ?>" height="60px" width="60px" />
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="col-2 d-none d-lg-block p-1 bg-light text-center">
                            <img src="Resources/demoprofile.svg" height="50px" width="50px" />
                        </div>
                    <?php
                    }


                    ?>

                    <div class="col-8 col-lg-3 bg-primary p-1 text-center">
                        <span class="fw-bolder fs-5 text-white fst-italic text-decoration-underline" style="cursor: pointer;" onclick="SendEmailToUser('<?php echo $customer['email']; ?>');"><?php echo $customer["email"]; ?></span>
                    </div>
                    <div class="col-2 d-none d-lg-block bg-light p-1 text-center">
                        <span class="fw-bolder fs-5 text-dark"><?php echo $customer["fname"] . " " . $customer["lname"]; ?></span>
                    </div>
                    <div class="col-2 d-none d-lg-block p-1 bg-primary text-center">
                        <?php
                        $date = $customer["registration_date"];
                        $splitdate = explode(" ", $date);
                        ?>
                        <span class="fw-bolder fs-5 text-white"><?php echo $splitdate[0]; ?></span>
                    </div>
                    <div class="col-2 d-none d-lg-block fs-5 bg-light p-1 text-center">
                        <?php
                        $acc = Database::search("SELECT * FROM `v_status` WHERE `id` = '" . $customer["v_status_id"] . "'");
                        $account = $acc->fetch_assoc();
                        ?>
                        <span class="fw-bolder fs-5 text-dark"><?php echo $account["status"]; ?></span>
                    </div>
                    <div class="col-4 col-lg-1 p-1 bg-white text-center d-grid">
                        <?php
                        if ($customer["status_id"] == "1") {
                        ?>
                            <button id="UserStatus<?php echo $customer['email']; ?>" class="btn btn-danger fw-bold" onclick="UserStatus('<?php echo $customer['email']; ?>');">Block</button>
                        <?php
                        } else {
                        ?>
                            <button id="UserStatus<?php echo $customer['email']; ?>" class="btn btn-success fw-bold" onclick="UserStatus('<?php echo $customer['email']; ?>');">Unblock</button>
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