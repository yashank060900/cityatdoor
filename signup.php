<?php
require_once "db/connection.php";
$nameerror = $emailerror = $passworderror = $passwordwrong = $cityempty = "";
$addressempty = $stateempty = $pincodeempty = $name = $email = $password = $confirmpassword = $address = "";
$city = $pincode = $state = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $error = 0;
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $city = mysqli_real_escape_string($db, $_POST['city']);
    $pincode = mysqli_real_escape_string($db, $_POST['pincode']);
    $state = mysqli_real_escape_string($db, $_POST['state']);

    if (empty(trim($_POST["email"]))) {
        $error = 1;
        $emailerror = "Please enter your email";
    } else if (!preg_match('/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/', trim($_POST["email"]))) {
        $error = 1;
        $emailerror = "Invalid Email";
    } else if (empty(trim($_POST["name"]))) {
        $error = 1;
        $nameerror = "Please enter a username.";
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["name"]))) {
        $error = 1;
        $nameerror = "Name can only contain letters, numbers, and underscores.";
    } else {
        $sql = "SELECT cid FROM customer WHERE cemail = ?";

        if ($stmt = mysqli_prepare($db, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            // Set parameters
            $param_username = trim($_POST["email"]);
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $error = 1;
                    $emailerror = "This email is already taken.";
                } else {
                    $email = trim($_POST["email"]);
                    $name = trim($_POST["name"]);
                }
            } else {
                $error = 1;
            }
            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    if (empty($city)) {
        $cityempty = "City is required";
        $error = 1;
    }
    if (empty($state)) {
        $stateempty = "State is required";
        $error = 1;
    }
    if (empty($pincode)) {
        $pincodeempty = "Pincode is required";
        $error = 1;
    }
    if (empty($address)) {
        $addressempty = "Address is required";
        $error = 1;
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $error = 1;
        $passworderror = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $error = 1;
        $passworderror = "Password must have atleast 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirmpassword"]))) {
        $error = 1;
        $passwordwrong = "Please confirm password.";
    } else {
        $confirmpassword = trim($_POST["confirmpassword"]);
        if (empty($password_err) && ($password != $confirmpassword)) {
            $error = 1;
            $passwordwrong = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if ($error == 0) {

        $password = md5($password);
        $query = "INSERT INTO customer (cname,cemail,cpassword,ccity,caddress,cstate,cpincode) 
                  VALUES('$name','$email','$password','$city','$address','$state','$pincode')";
        mysqli_query($db, $query);
        header('location: login.php');
    }

    // Close connection
    mysqli_close($db);
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CityAtDoor</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/login.css">
    <style>
        .b {
            border: 1px solid red;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

    <nav class="d-flex nav-bar p-3">
        <div class="icon logo">
            <img src="img/bootstrap-solid.svg" width="40" alt="">
            CityAtDoor
        </div>
        <div class="search-box p-2">
            <input type="text" placeholder="Search Shop...">
            <img src="https://img.icons8.com/fluency-systems-regular/25/000000/search--v1.png" />
        </div>
        <ul class="nav-hides">
            <li><a href="">About us</a></li>
            <li><a href="">Sell with us</a></li>
        </ul>
        <ul class="nav-icons">
            <li><img src="https://img.icons8.com/ios/25/ffffff/like--v1.png" /></li>
            <li><img src="https://img.icons8.com/external-flatart-icons-outline-flatarticons/25/ffffff/external-cart-supermarket-flatart-icons-outline-flatarticons.png" /></li>
            <li><img src="https://img.icons8.com/external-xnimrodx-lineal-xnimrodx/25/ffffff/external-bell-event-and-party-xnimrodx-lineal-xnimrodx.png" /></li>
        </ul>
        <div class="icon open-dropdown" id="open-dropdown">
            <img src="img/bootstrap-solid.svg" width="30" alt="">
        </div>
    </nav>

    <div class="top-dropdown" id="dropdown-opened" style="border: 1px solid rgb(165, 165, 160);">
        <ul>
            <li style="border-bottom: 1px solid whitesmoke;">
                <div class="profile">
                    <img src="img/bootstrap-solid.svg" width="40" alt=""><span>Yashank Maski</span>
                </div>
            </li>

            <li><a href="login.php">Login</a></li>
            <li><a href="signup.php">Signup</a></li>
            <li><a href="sellerlogin.php">Seller Login</a></li>
            <li style="border-bottom: 1px solid whitesmoke;"><a href="sellersignup.php">Seller Signup</a></li>
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href="policyandprivacy.php">Policy & Privacy</a></li>
            <li style="border-bottom: 1px solid whitesmoke;"><a href="contactus.php">Contact Us</a></li>
            <li>Connect with us</li>
            <li><a href="" class="center"><img src="https://img.icons8.com/fluency/22/000000/facebook-new.png" />Facebook</a></li>
            <li><a href="" class="center"><img src="https://img.icons8.com/color/22/000000/twitter--v1.png" />Twitter</a></li>
            <li><a href="" class="center"><img src="https://img.icons8.com/color/22/000000/linkedin.png" />LinkedIn</a></li>
        </ul>
    </div>

    <nav class="nav-mobile container-fluid p-2">
        <div class="search-box p-2">
            <input type="text" placeholder="Search Shop...">
            <img src="https://img.icons8.com/fluency-systems-regular/25/000000/search--v1.png" />
        </div>
    </nav>

    <section class="gradient-form">
        <div class="container py-5" style="overflow:hidden;">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">

                                    <div class="text-center">
                                        <img src="img/bootstrap-solid.svg" style="width: 170px;" alt="logo" class="p-3">
                                        <h4 class="mt-1 mb-5 pb-1">CityAtDoor Login</h4>
                                    </div>

                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                        <p>General Information</p>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example11">Name:</label>
                                            <input type="text" id="form2Example11" name="name" class="form-control" placeholder="Your name" value="<?php echo $name; ?>" />
                                            <span style="color: red; font-weight : 500; font-size:14px;"><?php echo $nameerror ?></span>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example11">Email:</label>
                                            <input type="email" id="form2Example11" name="email" class="form-control" placeholder="Email address" value="<?php echo $email; ?>" />
                                            <span style="color: red; font-weight : 500; font-size:14px;"><?php echo $emailerror ?></span>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example22">Create Password:</label>
                                            <input type="password" name="password" id="form2Example22" class="form-control" />
                                            <span style="color: red; font-weight : 500; font-size:14px;"><?php echo $passworderror ?></span>
                                        </div>


                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center">
                                <div class="card-body p-md-5 mx-md-4">

                                    <p>Personal Information</p>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example11">Address:</label>
                                        <input type="text" id="form2Example11" name="address" class="form-control" value="<?php echo $address; ?>" />
                                        <span style="color: red; font-weight : 500; font-size:14px;"><?php echo $addressempty ?></span>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example22">City:</label>
                                        <select class="form-control" name="city" type="">
                                            <option selected value="<?php echo $city; ?>"><?php echo $city; ?></option>
                                            <option value="Dewas">Dewas</option>
                                            <option value="Indore">Indore</option>
                                        </select>
                                        <span style="color: red; font-weight : 500; font-size:14px;"><?php echo $cityempty ?></span>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example22">Pincode:</label>
                                        <input type="number" name="pincode" id="form2Example22" class="form-control" value="<?php echo $pincode; ?>" />
                                        <span style="color: red; font-weight : 500; font-size:14px;"><?php echo $pincodeempty ?></span>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example22">State:</label>
                                        <input type="text" name="state" id="form2Example22" class="form-control" value="<?php echo $state; ?>" />
                                        <span style="color: red; font-weight : 500; font-size:14px;"><?php echo $stateempty ?></span>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example22">Confirm Password:</label>
                                        <input type="password" name="confirmpassword" id="form2Example22" class="form-control" />
                                        <span style="color: red; font-weight : 500; font-size:14px;"><?php echo $passwordwrong ?></span>
                                    </div>

                                    <div class="text-center pt-1 mb-5 pb-1">
                                        <input type="submit" name="signup" id="form2Example22" class="form-control btn-block fa-lg gradient-custom-2 mb-1" style="color:white" placeholder="Signup" />
                                        <a class="text-muted" href="#!">Forgot password?</a>
                                    </div>
                                    </form>

                                    <div class="d-flex align-items-center justify-content-center pb-4">
                                        <p class="mb-0 me-2">Already have an account?</p>
                                        <a href="login.php"><button type="button" class="btn btn-outline-danger">Login</button></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="js/js-jq.js"></script>
</body>

</html>