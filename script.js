function SwitchtoLogIn() {
    window.location = "LogIn.php";
}

function SwitchtoSignUp() {
    window.location = "SignUp.php";
}

var bm;

function SignUp() {

    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var rpassword = document.getElementById("rpassword");
    var dob = document.getElementById("dob");
    var gender = document.getElementById("gender");

    var form = new FormData();
    form.append("fname", fname.value);
    form.append("lname", lname.value);
    form.append("email", email.value);
    form.append("password", password.value);
    form.append("rpassword", rpassword.value);
    form.append("dob", dob.value);
    form.append("gender", gender.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Success") {
                swal({
                    title: "Welcome to NS Paradaise",
                    icon: "success",
                    button: "Ok",
                });
                code();
                var m = document.getElementById("code");
                bm = new bootstrap.Modal(m);
                bm.show();
            } else {
                swal({
                    title: "Registration Failed",
                    text: text,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };
    r.open("POST", "SignUpProcess.php", true);
    r.send(form);

}

function code() {

    var email = document.getElementById("email");

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Success") {
                swal({
                    title: "Email Verification Sent",
                    icon: "success",
                    button: "Ok",
                });
            } else {
                swal({
                    title: "Email Verification Failed",
                    text: text,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };
    r.open("GET", "Code.php?email=" + email.value, true);
    r.send();

}

function VC() {

    var email = document.getElementById("email");
    var vc = document.getElementById("vc");

    var form = new FormData();
    form.append("email", email.value);
    form.append("vc", vc.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text = "Success") {
                document.getElementById("fname").value = "";
                document.getElementById("lname").value = "";
                document.getElementById("email").value = "";
                document.getElementById("password").value = "";
                document.getElementById("dob").value = "";
                window.location = "LogIn.php";
            } else {
                swal({
                    title: text,
                    icon: "error",
                    button: "Ok",
                });
                document.getElementById("fname").value = "";
                document.getElementById("lname").value = "";
                document.getElementById("email").value = "";
                document.getElementById("password").value = "";
                document.getElementById("dob").value = "";
                window.location = "LogIn.php";
            }
        }
    };
    r.open("POST", "CodeProcess.php", true);
    r.send(form);

}

function LogIn() {

    var email = document.getElementById("email2");
    var password = document.getElementById("password2");

    var form = new FormData();
    form.append("email", email.value);
    form.append("password", password.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Success") {
                window.location = "index.php";
            } else {
                swal({
                    title: "LogIn Failed",
                    text: text,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };
    r.open("POST", "LogInProcess.php", true);
    r.send(form);

}

var fbm;

function ForgotPassword() {

    var email = document.getElementById("email2");

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Success") {
                var m = document.getElementById("ForgotPasswordModal");
                fpm = new bootstrap.Modal(m);
                fpm.show();
            } else {
                swal({
                    title: "Failed",
                    text: text,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };
    r.open("GET", "ForgotPasswordProcess.php?e=" + email.value, true);
    r.send();

}

function ResetPassword() {

    var e = document.getElementById("email2");
    var np = document.getElementById("np");
    var rnp = document.getElementById("rnp");
    var vc = document.getElementById("fvc");

    var form = new FormData();
    form.append("e", e.value);
    form.append("np", np.value);
    form.append("rnp", rnp.value);
    form.append("vc", vc.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Success") {
                alert("Password Reset Success");
                fpm.hide();
            } else {
                swal({
                    title: text,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };
    r.open("POST", "ResetPassword.php", true);
    r.send(form);

}

function ShowPassword1() {
    var np = document.getElementById("np");
    var npd = document.getElementById("npd");

    if (npd.innerHTML == "Show") {
        np.type = "text";
        npd.innerHTML = "Hide";
    } else {
        np.type = "Password";
        npd.innerHTML = "Show";
    }

}

function ShowPassword2() {
    var np = document.getElementById("rnp");
    var npd = document.getElementById("rnpd");

    if (npd.innerHTML == "Show") {
        np.type = "text";
        npd.innerHTML = "Hide";
    } else {
        np.type = "Password";
        npd.innerHTML = "Show";
    }

}

function changeImg() {

    var image = document.getElementById("img");
    var view = document.getElementById("prev");

    image.onchange = function () {
        var file = this.files[0];
        var url = window.URL.createObjectURL(file);

        view.src = url;
    }

}

function AddProduct() {

    var brand = document.getElementById("brand");
    var title = document.getElementById("title");
    var price = document.getElementById("price");
    var qty = document.getElementById("qty");
    var crown = document.getElementById("crown");
    var shape = document.getElementById("shape");
    var caseclr = document.getElementById("case-clr");
    var dialclr = document.getElementById("dial-clr");
    var bracelet = document.getElementById("bracelet");
    var braceletclr = document.getElementById("bracelet-clr");
    var gender = document.getElementById("gender");
    var datedisplay = document.getElementById("date-display");
    var description = document.getElementById("description");
    var img = document.getElementById("img");

    var form = new FormData();
    form.append("brand", brand.value);
    form.append("title", title.value);
    form.append("price", price.value);
    form.append("qty", qty.value);
    form.append("crown", crown.value);
    form.append("shape", shape.value);
    form.append("caseclr", caseclr.value);
    form.append("dialclr", dialclr.value);
    form.append("bracelet", bracelet.value);
    form.append("braceletclr", braceletclr.value);
    form.append("gender", gender.value);
    form.append("datedisplay", datedisplay.value);
    form.append("description", description.value);
    form.append("img", img.files[0]);

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function () {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            // alert(Response);
            if (Response == "Success") {
                var success = document.getElementById("success");
                k = new bootstrap.Modal(success);
                k.show();
            } else {
                swal({
                    title: Response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    Request.open("POST", "AddProductProcess.php", true);
    Request.send(form);

}

// AddToWatchlist

function AddToWatchlist(id) {

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function () {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Success") {
                window.location.reload();
            } else {
                swal({
                    title: Response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    Request.open("GET", "AddToWatchListProcess.php?id=" + id, true);
    Request.send();

}

// RemoveFromWatchlist

function RemoveFromWatchlist(id) {

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function () {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Success") {
                window.location.reload();
            } else {
                swal({
                    title: Response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    Request.open("GET", "RemoveFromWatchListProcess.php?id=" + id, true);
    Request.send();

}

// AddToCart

function AddToCart(id) {

    var qty = document.getElementById("qty");

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function () {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Success") {
                window.location = "Cart.php";
            } else {
                swal({
                    title: Response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    Request.open("GET", "AddToCartProcess.php?id=" + id + "&qty=" + qty.value, true);
    Request.send();

}

// RemoveFromCart

function RemoveFromCart(id) {

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function () {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Success") {
                window.location = "Cart.php";
            } else {
                swal({
                    title: Response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    Request.open("GET", "RemoveFromCartProcess.php?id=" + id, true);
    Request.send();

}

// UploadImage

function UploadImage() {
    var image = document.getElementById("profile");
    var view = document.getElementById("prev");

    image.onchange = function () {
        var file = this.files[0];
        var url = window.URL.createObjectURL(file);

        view.src = url;
    }
}

// SignOut

function SignOut() {

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function () {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Success") {
                window.location = "index.php";
            } else {
                swal({
                    title: Response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    Request.open("POST", "SignOut.php", true);
    Request.send();

}

// District

function District() {

    var province = document.getElementById("province");

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function () {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            document.getElementById("district").innerHTML = Response;
        }
    };

    Request.open("GET", "DistrictProcess.php?province=" + province.value, true);
    Request.send();

}

// UpdateProfile

function UpdateProfile() {

    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var line1 = document.getElementById("line1");
    var line2 = document.getElementById("line2");
    var province = document.getElementById("province");
    var district = document.getElementById("district");
    var city = document.getElementById("city");
    var postalcode = document.getElementById("postalcode");
    var img = document.getElementById("profile");

    var form = new FormData();
    form.append("fname", fname.value);
    form.append("lname", lname.value);
    form.append("line1", line1.value);
    form.append("line2", line2.value);
    form.append("province", province.value);
    form.append("district", district.value);
    form.append("city", city.value);
    form.append("postalcode", postalcode.value);
    form.append("img", img.files[0]);

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function () {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Success") {
                window.location.reload();
            } else {
                swal({
                    title: Response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    Request.open("POST", "UserProfileProcess.php", true);
    Request.send(form);

}

// RemovePic

function RemovePic() {

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function () {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Success") {
                window.location.reload();
            } else {
                swal({
                    title: Response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    Request.open("POST", "RemovePhotoProcess.php", true);
    Request.send();

}

// Verify_Account

function Verify_Account() {

    code();

    var m = document.getElementById("code");
    bm = new bootstrap.Modal(m);
    bm.show();

}

function AC() {

    var email = document.getElementById("email");
    var vc = document.getElementById("vc");

    var form = new FormData();
    form.append("email", email.value);
    form.append("vc", vc.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Success") {
                window.location.reload();
            } else {
                swal({
                    title: text,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };
    r.open("POST", "CodeProcess.php", true);
    r.send(form);

}

// AdminVerificationModal

function AdminVerificationModal() {

    var email = document.getElementById("email");

    var form = new FormData();
    form.append("email", email.value);

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function () {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Success") {

                SendAdminCode(email.value);

                var Modal = document.getElementById("AdminVerificationModal");

                k = new bootstrap.Modal(Modal);
                k.show();

            } else {
                swal({
                    title: Response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    Request.open("POST", "AdminEmailVerificationProcess.php", true);
    Request.send(form);

}

// SendAdminCode

function SendAdminCode(email) {

    var form = new FormData();
    form.append("email", email);

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function () {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Success") {
                swal({
                    title: "Verification Code Sent. Please Check your Email",
                    icon: "success",
                    button: "Ok",
                });
            } else {
                swal({
                    title: Response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    Request.open("POST", "AdminSendCodeProcess.php", true);
    Request.send(form);

}

// AdminLogIn

function AdminLogIn() {

    var email = document.getElementById("email");
    var code = document.getElementById("code");

    var form = new FormData();
    form.append("email", email.value);
    form.append("code", code.value);

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function () {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Success") {
                window.location = "AdminHome.php";
            } else {
                swal({
                    title: Response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    Request.open("POST", "AdminLogInProcess.php", true);
    Request.send(form);

}

// BuyNow

function BuyNow(id) {

    var qty = document.getElementById("qty").value;
    var line1 = document.getElementById("line1").value;
    var line2 = document.getElementById("line2").value;
    var city = document.getElementById("city").value;
    var postalcode = document.getElementById("postalcode").value;
    var province = document.getElementById("province").value;
    var district = document.getElementById("district").value;

    // alert(line1.value);
    // alert(line2.value);
    // alert(city.value);
    // alert(postalcode.value);
    // alert(province.value);
    // alert(district.value);
    // alert(id);
    // alert(qty.value);

    var form = new FormData();
    form.append("line1", line1);
    form.append("line2", line2);
    form.append("city", city);
    form.append("postalcode", postalcode);
    form.append("province", province);
    form.append("district", district);
    form.append("product_id", id);
    form.append("qty", qty);

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function () {
        if (Request.readyState == 4) {
            var Response = Request.responseText;

            // alert(Response);

            if (Response == "Please Sign In First") {
                swal({
                    title: "Please Sign In First",
                    icon: "error",
                    button: "Ok",
                });
            } else if (Response == "Invalid Request") {
                swal({
                    title: "Invalid Request",
                    icon: "error",
                    button: "Ok",
                });
            } else if (Response == "Please Add a Quantity") {
                swal({
                    title: "Please Add a Quantity",
                    icon: "error",
                    button: "Ok",
                });
            } else if (Response == "Please Add a Valid Quantity") {
                swal({
                    title: "Please Add a Valid Quantity",
                    icon: "error",
                    button: "Ok",
                });
            } else if (Response == "Please Enter Address Line 1") {
                swal({
                    title: "Please Enter Address Line 1",
                    icon: "error",
                    button: "Ok",
                });
            } else if (Response == "Please Enter Your City") {
                swal({
                    title: "Please Enter Your City",
                    icon: "error",
                    button: "Ok",
                });
            } else if (Response == "Please Enter Your Postal Code") {
                swal({
                    title: "Please Enter Your Postal Code",
                    icon: "error",
                    button: "Ok",
                });
            } else if (Response == "Invalid Postal Code") {
                swal({
                    title: "Invalid Postal Code",
                    icon: "error",
                    button: "Ok",
                });
            } else if (Response == "Invalid Product") {
                swal({
                    title: "Invalid Product",
                    icon: "error",
                    button: "Ok",
                });
            } else if (Response == "Invalid User") {
                swal({
                    title: "Invalid User",
                    icon: "error",
                    button: "Ok",
                });
            } else {

                var Payment_Details = JSON.parse(Response);

                var orderid = Payment_Details["orderid"];
                var total = Payment_Details["price"];
                var delivery_address = Payment_Details["delivery_address"];
                var delivery_city = Payment_Details["delivery_city"];

                // Called when user completed the payment. It can be a successful payment or failure
                payhere.onCompleted = function onCompleted(orderId) {
                    console.log("Payment completed. OrderID:" + orderId);

                    SaveInvoice(orderid, qty, total, delivery_address, delivery_city, id, postalcode, district, province);
                    //Note: validate the payment and show success or failure page to the customer
                };

                // Called when user closes the payment without completing
                payhere.onDismissed = function onDismissed() {
                    //Note: Prompt user to pay again or show an error page
                    console.log("Payment dismissed");
                };

                // Called when error happens when initializing payment such as invalid parameters
                payhere.onError = function onError(error) {
                    // Note: show an error page
                    console.log("Error:" + error);
                };

                // Put the payment variables here
                var payment = {
                    "sandbox": true,
                    "merchant_id": "1219052",    // Replace your Merchant ID
                    "return_url": "http://localhost/Abdullah_NS/ViewProduct.php?id=" + id,     // Important
                    "cancel_url": "http://localhost/Abdullah_NS/ViewProduct.php?id=" + id,     // Important
                    "notify_url": "http://sample.com/notify",
                    "order_id": Payment_Details["orderid"],
                    "items": Payment_Details["title"],
                    "amount": Payment_Details["price"],
                    "currency": "LKR",
                    "first_name": Payment_Details["fname"],
                    "last_name": Payment_Details["lname"],
                    "email": Payment_Details["email"],
                    "address": Payment_Details["address"],
                    "city": Payment_Details["city"],
                    "country": "Sri Lanka",
                    "delivery_address": Payment_Details["delivery_address"],
                    "delivery_city": Payment_Details["delivery_city"],
                    "delivery_country": "Sri Lanka"
                };

                // Show the payhere.js popup, when "PayHere Pay" is clicked
                payhere.startPayment(payment);

            }

        }
    };

    Request.open("POST", "BuyNowProcess.php", true);
    Request.send(form);

}

function SaveInvoice(orderid, qty, total, delivery_address, delivery_city, id, postalcode, district, province) {

    // alert(orderid);
    // alert(qty);
    // alert(total);
    // alert(delivery_address);
    // alert(delivery_city);
    // alert(id);
    // alert(postalcode);
    // alert(district);
    // alert(province);

    var form = new FormData();
    form.append("orderid", orderid);
    form.append("qty", qty);
    form.append("total", total);
    form.append("delivery_address", delivery_address);
    form.append("delivery_city", delivery_city);
    form.append("product_id", id);
    form.append("postalcode", postalcode);
    form.append("district", district);
    form.append("province", province);

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function () {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Success") {
                window.location = "Invoice.php?oid=" + orderid;
            } else {
                swal({
                    title: Response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    Request.open("POST", "SaveInvoiceProcess.php", true);
    Request.send(form);

}

// printDiv

function printDiv() {

    var restorepage = document.body.innerHTML;
    var page = document.getElementById("GFG").innerHTML;
    document.body.innerHTML = page;
    window.print();
    document.body.innerHTML = restorepage;

}

// OpenFeedbackModal

function OpenFeedbackModal(id) {

    var FeedbackModal = document.getElementById("feedbackmodal" + id);

    k = new bootstrap.Modal(FeedbackModal);
    k.show();

}

// SendFeedback

function SendFeedback(id) {

    var content = document.getElementById("content" + id);

    var form = new FormData();
    form.append("content", content.value);
    form.append("product_id", id);

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function () {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Success") {
                k.hide();
                var AlertModal = document.getElementById("alertmodal");
                k = new bootstrap.Modal(AlertModal);
                k.show();
            } else {
                swal({
                    title: Response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    Request.open("POST", "SaveFeedbackProcess.php", true);
    Request.send(form);

}

// Reload

function Reload() {

    k.hide();
    window.location.reload();

}

// UploadAdminImage

function UploadAdminImage() {
    var image = document.getElementById("profile");
    var view = document.getElementById("prev");

    image.onchange = function () {
        var file = this.files[0];
        var url = window.URL.createObjectURL(file);

        view.src = url;
    }
}

// UpdateAdminProfile

function UpdateAdminProfile() {

    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var img = document.getElementById("profile");

    var form = new FormData();
    form.append("fname", fname.value);
    form.append("lname", lname.value);
    form.append("img", img.files[0]);

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function () {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Success") {
                window.location.reload();
            } else {
                swal({
                    title: Response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    Request.open("POST", "AdminProfileProcess.php", true);
    Request.send(form);

}

// RemoveAdminPic

function RemoveAdminPic() {

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function () {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Success") {
                window.location.reload();
            } else {
                swal({
                    title: Response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    Request.open("POST", "RemoveAdminPhotoProcess.php", true);
    Request.send();

}

// RegisterAdmin

function RegisterAdmin() {

    var div1 = document.createElement("div");
    div1.className = "row bg-success p-2";
    var div2 = document.createElement("div");
    div2.className = "col-12";
    var div3 = document.createElement("div");
    div3.className = "row";
    var div4 = document.createElement("div");
    div4.className = "col-10";
    var span1 = document.createElement("span");
    span1.className = "text-white fw-bold fs-6";
    span1.innerHTML = "Registeration Success";
    var div5 = document.createElement("div");
    div5.className = "col-2 text-end fw-bolder";
    var i1 = document.createElement("i");
    i1.className = "close fs-6 text-white bi bi-x";
    i1.onclick = function (p) {
        window.location.reload();
    }

    div4.appendChild(span1);
    div5.appendChild(i1);
    div3.appendChild(div4);
    div3.appendChild(div5);
    div2.appendChild(div3);
    div1.appendChild(div2);

    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");

    var form = new FormData();
    form.append("fname", fname.value);
    form.append("lname", lname.value);
    form.append("email", email.value);

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function () {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Success") {
                fname.value = "";
                lname.value = "";
                email.value = "";
                var maindiv = document.getElementById("alert");
                maindiv.appendChild(div1);
            } else {
                swal({
                    title: Response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    Request.open("POST", "RegisterAdminProcess.php", true);
    Request.send(form);

}

// UserStatus

function UserStatus(email) {

    var UserStatus = document.getElementById("UserStatus" + email);

    var form = new FormData();
    form.append("email", email);

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function () {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Deactivated") {
                UserStatus.className = "btn btn-success fw-bold";
                UserStatus.innerHTML = "Unblock";
            } else if (Response == "Activated") {
                UserStatus.className = "btn btn-danger fw-bold";
                UserStatus.innerHTML = "Block";
            } else {
                swal({
                    title: Response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    Request.open("POST", "UserStatusProcess.php", true);
    Request.send(form);

}

// UpdateProduct

function UpdateProduct(id) {

    var title = document.getElementById("title");
    var price = document.getElementById("price");
    var qty = document.getElementById("qty");
    var description = document.getElementById("description");
    var img = document.getElementById("img");

    var form = new FormData();
    form.append("id", id);
    form.append("title", title.value);
    form.append("price", price.value);
    form.append("qty", qty.value);
    form.append("description", description.value);
    form.append("img", img.files[0]);

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function () {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Success") {
                window.location = "ManageProducts.php";
            } else {
                swal({
                    title: Response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    Request.open("POST", "UpdateProductProcess.php", true);
    Request.send(form);

}

// DeleteProduct

function DeleteProduct(id) {

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function () {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Success") {
                var success = document.getElementById("success");
                k = new bootstrap.Modal(success);
                k.show();
            } else {
                swal({
                    title: Response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    Request.open("GET", "DeleteProductProcess.php?id=" + id, true);
    Request.send();

}

// ProductStatus

function ProductStatus(id) {

    var ProductStatus = document.getElementById("ProductStatus" + id);

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function () {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Deactivated") {
                ProductStatus.className = "btn btn-info text-white fw-bold";
                ProductStatus.innerHTML = "Unblock";
            } else if (Response == "Activated") {
                ProductStatus.className = "btn btn-warning text-white fw-bold";
                ProductStatus.innerHTML = "Block";
            } else {
                swal({
                    title: Response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    Request.open("GET", "ProductStatusProcess.php?id=" + id, true);
    Request.send();

}

// Search

function Search() {

    var search = document.getElementById("search");

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function () {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            document.getElementById("product").innerHTML = Response;
        }
    };

    Request.open("GET", "SearchProcess.php?search=" + search.value, true);
    Request.send();

}

// BrandModal

function BrandModal() {

    var BrandModal = document.getElementById("BrandModal");

    M = new bootstrap.Modal(BrandModal);
    M.show();

}

// AddNewBrand

function AddNewBrand() {

    var brand = document.getElementById("newbrand");

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function () {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Success") {
                window.location.reload();
            } else {
                swal({
                    title: Response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    Request.open("GET", "AddNewBrand.php?brand=" + brand.value, true);
    Request.send();

}


// CrownModal

function CrownModal() {

    var CrownModal = document.getElementById("CrownModal");

    M = new bootstrap.Modal(CrownModal);
    M.show();

}

// AddNewCrown

function AddNewCrown() {

    var crown = document.getElementById("newcrown");

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function () {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Success") {
                window.location.reload();
            } else {
                swal({
                    title: Response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    Request.open("GET", "AddNewCrown.php?crown=" + crown.value, true);
    Request.send();

}

// ShapeModal

function ShapeModal() {

    var ShapeModal = document.getElementById("ShapeModal");

    M = new bootstrap.Modal(ShapeModal);
    M.show();

}

// AddNewShape

function AddNewShape() {

    var shape = document.getElementById("newshape");

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function () {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Success") {
                window.location.reload();
            } else {
                swal({
                    title: Response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    Request.open("GET", "AddNewShape.php?shape=" + shape.value, true);
    Request.send();

}

// BraceletModal

function BraceletModal() {

    var BraceletModal = document.getElementById("BraceletModal");

    M = new bootstrap.Modal(BraceletModal);
    M.show();

}

// AddNewBracelet

function AddNewBracelet() {

    var bracelet = document.getElementById("newbracelet");

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function () {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Success") {
                window.location.reload();
            } else {
                swal({
                    title: Response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    Request.open("GET", "AddNewBracelet.php?bracelet=" + bracelet.value, true);
    Request.send();

}

// ColorModal

function ColorModal() {

    var ColorModal = document.getElementById("ColorModal");

    M = new bootstrap.Modal(ColorModal);
    M.show();

}

// AddNewColor

function AddNewColor() {

    var color = document.getElementById("newcolor");

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function () {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Success") {
                window.location.reload();
            } else {
                swal({
                    title: Response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    Request.open("GET", "AddNewColor.php?color=" + color.value, true);
    Request.send();

}

// AdminSignOut

function AdminSignOut() {

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function () {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Success") {
                window.location = "AdminLogIn.php";
            } else {
                swal({
                    title: Response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    Request.open("POST", "AdminSignOut.php", true);
    Request.send();

}

// SearchUsers

function SearchUsers() {

    var search = document.getElementById("search");

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function () {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            document.getElementById("users").innerHTML = Response;
        }
    };

    Request.open("GET", "LoadUsers.php?search=" + search.value, true);
    Request.send();

}

// SearchProducts

function SearchProducts() {

    var search = document.getElementById("search");

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function () {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            document.getElementById("products").innerHTML = Response;
        }
    };

    Request.open("GET", "LoadProducts.php?search=" + search.value, true);
    Request.send();

}

// SendEmailToUser

function SendEmailToUser(email) {

    window.location = "SendEmailToUser.php?email=" + email;

}

// SendEmailMessage

function SendEmailMessage(email) {

    swal({
        title: "Please Wait",
        button: "Ok",
    });

    var msg = document.getElementById("msg");

    var form = new FormData();
    form.append("email", email);
    form.append("msg", msg.value);

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function () {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Success") {
                swal({
                    title: "Email Sent.",
                    icon: "success",
                    button: "Ok",
                });
                msg.value = "";
            } else {
                swal({
                    title: Response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    Request.open("POST", "SendEmailMessage.php", true);
    Request.send(form);

}

// ChangeQuantity

function ChangeQuantity(id) {

    var qty = document.getElementById("qty" + id);

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function () {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Success") {
                window.location.reload();
            } else {
                document.getElementById("error").innerHTML = Response;
            }
        }
    };

    Request.open("GET", "ChangeQuantityProcess.php?id=" + id + "&qty=" + qty.value, true);
    Request.send();

}

// GoToCheckOut

function GoToCheckOut() {

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function () {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Success") {
                window.location = "CheckOut.php";
            } else {
                swal({
                    title: Response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    Request.open("POST", "GoToCheckOutProcess.php", true);
    Request.send();

}

// CheckOut

function CheckOut() {

    var line1 = document.getElementById("line1").value;
    var line2 = document.getElementById("line2").value;
    var city = document.getElementById("city").value;
    var postalcode = document.getElementById("postalcode").value;
    var province = document.getElementById("province").value;
    var district = document.getElementById("district").value;

    // alert(line1);
    // alert(line2);
    // alert(city);
    // alert(postalcode);
    // alert(province);
    // alert(district);

    var form = new FormData();
    form.append("line1", line1);
    form.append("line2", line2);
    form.append("city", city);
    form.append("postalcode", postalcode);
    form.append("province", province);
    form.append("district", district);

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function () {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Please Sign In First") {
                swal({
                    title: "Please Sign In First",
                    icon: "error",
                    button: "Ok",
                });
            } else if (Response == "Please Enter Address Line 1") {
                swal({
                    title: "Please Enter Address Line 1",
                    icon: "error",
                    button: "Ok",
                });
            } else if (Response == "Please Enter Your City") {
                swal({
                    title: "Please Enter Your City",
                    icon: "error",
                    button: "Ok",
                });
            } else if (Response == "Please Enter Your Postal Code") {
                swal({
                    title: "Please Enter Your Postal Code",
                    icon: "error",
                    button: "Ok",
                });
            } else if (Response == "Invalid Postal Code") {
                swal({
                    title: "Invalid Postal Code",
                    icon: "error",
                    button: "Ok",
                });
            } else if (Response == "Invalid User") {
                swal({
                    title: "Invalid User",
                    icon: "error",
                    button: "Ok",
                });
            } else {

                var PaymentDetails = JSON.parse(Response);

                var orderid = PaymentDetails["orderid"];
                var total = PaymentDetails["price"];
                var delivery_address = PaymentDetails["delivery_address"];
                var delivery_city = PaymentDetails["delivery_city"];

                // Called when user completed the payment. It can be a successful payment or failure
                payhere.onCompleted = function onCompleted(orderId) {
                    console.log("Payment completed. OrderID:" + orderId);

                    SaveCheckOutInvoice(orderid, total, delivery_address, delivery_city, postalcode, district, province);
                    //Note: validate the payment and show success or failure page to the customer
                };

                // Called when user closes the payment without completing
                payhere.onDismissed = function onDismissed() {
                    //Note: Prompt user to pay again or show an error page
                    console.log("Payment dismissed");
                };

                // Called when error happens when initializing payment such as invalid parameters
                payhere.onError = function onError(error) {
                    // Note: show an error page
                    console.log("Error:" + error);
                };

                // Put the payment variables here
                var payment = {
                    "sandbox": true,
                    "merchant_id": "1219052",    // Replace your Merchant ID
                    "return_url": "http://localhost/Abdullah_NS/Cart.php",     // Important
                    "cancel_url": "http://localhost/Abdullah_NS/Cart.php",     // Important
                    "notify_url": "http://sample.com/notify",
                    "order_id": PaymentDetails["orderid"],
                    "items": PaymentDetails["title"],
                    "amount": PaymentDetails["price"],
                    "currency": "LKR",
                    "first_name": PaymentDetails["fname"],
                    "last_name": PaymentDetails["lname"],
                    "email": PaymentDetails["email"],
                    "address": PaymentDetails["address"],
                    "city": PaymentDetails["city"],
                    "country": "Sri Lanka",
                    "delivery_address": PaymentDetails["delivery_address"],
                    "delivery_city": PaymentDetails["delivery_city"],
                    "delivery_country": "Sri Lanka"
                };

                // Show the payhere.js popup, when "PayHere Pay" is clicked
                payhere.startPayment(payment);

            }
        }
    };

    Request.open("POST", "CheckOutProcess.php", true);
    Request.send(form);

}

function SaveCheckOutInvoice(orderid, total, delivery_address, delivery_city, postalcode, district, province) {

    var form = new FormData();
    form.append("orderid", orderid);
    form.append("total", total);
    form.append("delivery_address", delivery_address);
    form.append("delivery_city", delivery_city);
    form.append("postalcode", postalcode);
    form.append("district", district);
    form.append("province", province);

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function () {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Success") {
                window.location = "Invoice.php?oid=" + orderid;
            } else {
                swal({
                    title: Response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    Request.open("POST", "SaveCheckOutInvoiceProcess.php", true);
    Request.send(form);

}

// AddSliderImage

function AddSliderImage() {

    var img = document.getElementById("img");

    var form = new FormData();
    form.append("img", img.files[0]);

    var Request = new XMLHttpRequest();

    Request.onreadystatechange = function () {
        if (Request.readyState == 4) {
            var Response = Request.responseText;
            if (Response == "Success") {
                var success = document.getElementById("success");
                k = new bootstrap.Modal(success);
                k.show();
            } else {
                swal({
                    title: Response,
                    icon: "error",
                    button: "Ok",
                });
            }
        }
    };

    Request.open("POST", "SliderImageProcess.php", true);
    Request.send(form);

}