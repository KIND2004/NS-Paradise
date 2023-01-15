<!DOCTYPE html>

<head>

    <title>NS Paradise | Admin Sign In</title>

    <?php require "link.php"; ?>

</head>

<body style="background-color: gainsboro; height: 100vh;">

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 py-3" style="background-color: olive;">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-center fw-bolder text-white fst-italic fs-1">Admin Sign In</h1>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-5 p-5">
                <div class="row justify-content-center">

                    <div class="col-12 col-sm-10 col-md-8 col-lg-6 rounded-3 shadow bg-light">
                        <div class="row p-3 g-2">

                            <div class="col-12 text-center">
                                <label class="fw-bolder fs-2">Log In to your Account</label>
                            </div>

                            <hr />

                            <div class="col-12">
                                <label class="form-label fw-bold">Email</label>
                                <input type="text" class="form-control" placeholder="Enter Your Email Address" id="email" />
                            </div>

                            <div class="col-12 d-grid">
                                <button class="btn fw-bold btn-primary" onclick="AdminVerificationModal();">Send Verification</button>
                            </div>
                            <div class="col-12 d-grid">
                                <a href="index.php" class="btn fw-bold btn-danger">Back to Home</a>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <!-- Admin Verification Modal -->
            <div class="modal fade" id="AdminVerificationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Admin Email Verification</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-12">
                                <label class="form-label fw-bold">Enter the Verification Code you got by an Email</label>
                                <input type="text" class="form-control" id="code" placeholder="Please Enter Your Verification Code" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success" onclick="AdminLogIn();">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Admin Verification Modal -->

        </div>
    </div>

    <?php require "script.php"; ?>
</body>

</html>