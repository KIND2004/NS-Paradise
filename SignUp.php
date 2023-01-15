<?php

require "connection.php";

?>

<!DOCTYPE html>

<html>

<head>

    <title>NS Paradise-SignUp</title>

    <?php
    require "link.php";
    ?>

</head>

<body class="bg-white">

    <div class="container-fluid">
        <div class="row">

            <!-- logo -->
            <div class="col-12">
                <div class="row mt-5">
                    <div class="col-12 logo"></div>
                </div>
            </div>
            <!-- logo -->

            <!-- contain -->
            <div class="col-12">
                <div class="row justify-content-center my-5">
                    <div class="col-11 col-sm-9 col-md-7 col-lg-5 rounded">
                        <div class="row p-3 g-3 bg-light shadow">
                            <div class="col-12">
                                <h3 class="text-center fw-bold">Create New Account</h3>
                            </div>
                            <div class="col-12 col-lg-6">
                                <label class="form-label fw-bold">First Name</label>
                                <input class="form-control" type="text" placeholder="First Name" id="fname" />
                            </div>
                            <div class="col-12 col-lg-6">
                                <label class="form-label fw-bold">Last Name</label>
                                <input class="form-control" type="text" placeholder="Last Name" id="lname" />
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold">Email</label>
                                <input class="form-control" type="email" placeholder="example@gmail.com" id="email" />
                            </div>
                            <div class="col-12 col-lg-6">
                                <label class="form-label fw-bold">Password</label>
                                <input class="form-control" type="password" placeholder=" * * * * * * * * * * " id="password" />
                            </div>
                            <div class="col-12 col-lg-6">
                                <label class="form-label fw-bold">Retype-Password</label>
                                <input class="form-control" type="password" placeholder=" * * * * * * * * * * " id="rpassword" />
                            </div>
                            <div class="col-12 col-lg-6">
                                <label class="form-label fw-bold">Date of Birth</label>
                                <input class="form-control" type="date" id="dob" />
                            </div>
                            <div class="col-12 col-lg-6">
                                <label class="form-label fw-bold">Gender</label>
                                <select class="form-select" id="gender">
                                    <?php

                                    $r = Database::search("SELECT * FROM `gender`");
                                    $n = $r->num_rows;

                                    for ($x = 0; $x < $n; $x++) {

                                        $d = $r->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $d["id"]; ?>"><?php echo $d["name"]; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-12 d-grid">
                                <button class="btn btn-primary fw-bold" onclick="SignUp();">Sign Up</button>
                            </div>
                            <div class="col-12 d-grid">
                                <button class="btn btn-success fw-bold" onclick="SwitchtoLogIn();">Already Have an Account? Log In</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- contain -->

            <!-- Email Verification Modal -->
            <div class="modal fade" tabindex="-1" id="code">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Email Verification</h5>
                            <span class="modal-title">Verification Code Sent.Please Check Your Email</span>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Verification Code</label>
                                    <input class="form-control" type="text" id="vc" />
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="VC();">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Email Verification Modal -->

        </div>
    </div>

    <?php
    require "script.php";
    ?>
</body>

</html>