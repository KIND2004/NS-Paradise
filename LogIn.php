<!DOCTYPE html>

<html>

<head>

    <title>NS Paradise-LogIn</title>

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
                    <div class="col-11 col-sm-9 col-md-7 col-lg-5">
                        <div class=" row p-3 g-3 rounded bg-light shadow">
                            <div class="col-12">
                                <h3 class="text-center fw-bold">Log In to your Account</h3>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold">Email</label>
                                <input class="form-control" type="email" placeholder="example@gmail.com" id="email2" />
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold">Password</label>
                                <input class="form-control" type="password" placeholder=" * * * * * * * * * * " id="password2" />
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 d-grid">
                                        <button class="btn btn-primary fw-bold" onclick="LogIn();">Log In</button>
                                    </div>
                                    <div class="col-12 text-center">
                                        <a class="link-primary text-decoration-none" style="cursor: pointer;" onclick="ForgotPassword();">Forgot Password?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-grid">
                                <button class="btn btn-secondary fw-bold" onclick="SwitchtoSignUp();">New to NS Paradaise? SignUp</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- contain -->

            <!-- Forgot Password Modal -->
            <div class="modal fade" tabindex="-1" id="ForgotPasswordModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Password Reset</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="row g-3">
                                <div class="col-6">
                                    <label class="form-label">New Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" type="text" id="np" />
                                        <button class="btn btn-outline-primary" type="button" id="npd" onclick="ShowPassword1();">Show</button>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Re-type Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" type="text" id="rnp" />
                                        <button class="btn btn-outline-primary" type="button" id="rnpd" onclick="ShowPassword2();">Show</button>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Verification Code</label>
                                    <input class="form-control" type="text" id="fvc" />
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="ResetPassword();">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Forgot Password Modal -->

        </div>
    </div>

    <?php
    require "script.php";
    ?>
</body>

</html>