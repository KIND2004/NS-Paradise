<?php

if (isset($_SESSION["user"])) {

?>
    <header>
        <div class="px-3 py-2 bg-dark text-white">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-start">

                    <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                        <li>
                            <a href="index.php" class="nav-link text-white h">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="UserProfile.php" class="nav-link text-white h">
                                My Profile
                            </a>
                        </li>
                        <li>
                            <a href="PurchasedHistory.php" class="nav-link text-white h">
                                Purchased History
                            </a>
                        </li>
                        <li>
                            <a href="Watchlist.php" class="nav-link text-white h">
                                Watchlist
                            </a>
                        </li>
                        <li>
                            <a href="Cart.php" class="nav-link text-white h">
                                <i class="bi bi-cart"></i>
                            </a>
                        </li>
                        <li>
                            <a onclick="SignOut();" role="button" class="nav-link text-white h">
                                Sign Out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
<?php
} else {
?>
    <header>
        <div class="px-3 py-2 bg-dark text-white">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

                    <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                        <li>
                            <a href="index.php" class="nav-link text-white h">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="SignUp.php" class="nav-link text-white h">
                                Sign Up
                            </a>
                        </li>
                        <li>
                            <a href="LogIn.php" class="nav-link text-white h">
                                Log In
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
<?php
}

?>