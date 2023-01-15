<?php

session_start();

require "connection.php";

if (isset($_SESSION["admin"])) {
?>

    <!DOCTYPE html>

    <html>

    <head>

        <title>NS Paradise - My Profile</title>

        <?php require "link.php"; ?>

    </head>

    <body>

        <div class="container-fluid">
            <div class="row">

                <!-- header -->
                <?php require "adminheader.php"; ?>
                <!-- header -->

                <div class="col-12">
                    <div class="row bg-primary rounded py-3">
                        <h1 class="text-center text-white fw-bolder fs-1">My Profile</h1>
                    </div>
                </div>

                <?php

                $user = Database::search("SELECT * FROM `admin` WHERE `email` = '" . $_SESSION["admin"]["email"] . "'");

                if ($user->num_rows == 1) {
                    $user_deatail = $user->fetch_assoc();
                ?>

                    <div class="col-12 mb-5">
                        <div class="row justify-content-center">

                            <div class="col-sm-10 col-md-6 col-lg-4">
                                <div class="row mt-3 g-3" style="text-align: center;">
                                    <?php
                                    $profile_rs = Database::search("SELECT * FROM `admin_profile` WHERE `admin_email` = '" . $_SESSION["admin"]["email"] . "'");

                                    if ($profile_rs->num_rows == 0) {
                                    ?>
                                        <div class="col-12">
                                            <img src="Resources/demoprofile.svg" id="prev" class="img-thumbnail rounded-circle" width="150px" height="150px" />
                                        </div>
                                        <div class="col-12 mt-3">
                                            <input type="file" accept="img/*" class="form-control d-none" id="profile" />
                                            <label for="profile" class="btn btn-primary fw-bold" style="width: 150px;" onclick="UploadAdminImage();">Upload Photo</label>
                                        </div>
                                    <?php
                                    } else {
                                        $profile = $profile_rs->fetch_assoc();
                                    ?>
                                        <div class="col-12">
                                            <img src="<?php echo $profile["code"]; ?>" id="prev" class="img-thumbnail rounded-circle" width="150px" height="150px" />
                                        </div>
                                        <div class="col-12 mt-3">
                                            <span role="button" tabindex="0" class="text-danger" onclick="RemoveAdminPic();">Remove Photo</span>
                                            <br />
                                            <input type="file" accept="img/*" class="form-control d-none" id="profile" />
                                            <label for="profile" class="btn btn-primary fw-bold" style="width: 150px;" onclick="UploadAdminImage();">Change Photo</label>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                    <div class="col-12 text-start">
                                        <label class="form-label fw-bold">First Name</label>
                                        <input type="text" class="form-control" value="<?php echo $user_deatail["fname"]; ?>" placeholder="Enter Your First Name" id="fname" />
                                    </div>
                                    <div class="col-12 text-start">
                                        <label class="form-label fw-bold">Last Name</label>
                                        <input type="text" class="form-control" value="<?php echo $user_deatail["lname"]; ?>" placeholder="Enter Your Last Name" id="lname" />
                                    </div>
                                    <div class="col-12 text-start">
                                        <label class="form-label fw-bold">Email</label>
                                        <input type="text" class="form-control" value="<?php echo $user_deatail["email"]; ?>" disabled id="email" />
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-success text-center fs-5 fw-bold" onclick="UpdateAdminProfile();">Update Profile</button>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                <?php
                }
                ?>


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