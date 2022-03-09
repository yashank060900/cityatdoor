<?php

session_start();
include 'db/connection.php';

$emailerror = "";
$passworderror = "";
$errormsg = "";
$email = "";

if (isset($_POST['login'])) {

    $error = 0;

    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);


    if (empty($email)) {
        $emailerror = "Email is required";
        $error = 1;
    }
    if (empty($password)) {
        $passworderror = "Password is required";
        $error = 1;
    }

    if ($error == 0) {

        $password = md5($password); //encrypt the password before saving in the database

        $query = "SELECT * FROM seller WHERE semail = '$email' AND spassword = '$password'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) == 1) {
            $_SESSION['semail'] = $email;
            $_SESSION['start'] = true;
            header('location: sellerhome.php');
        } else {
            $errormsg = "Something went wrong !";
        }
    }
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
            <li ><a href="" class="center"><img src="https://img.icons8.com/color/22/000000/linkedin.png" />LinkedIn</a></li>
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
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp" style="width: 185px;" alt="logo">
                                        <h4 class="mt-1 mb-5 pb-1">We are The Lotus Team</h4>
                                    </div>

                                    <form action="" method="post">
                                        <p>Please login to your account</p>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example11">Email:</label>
                                            <input type="email" id="form2Example11" name="email" class="form-control" value="<?php echo $email ?>" />
                                            <span style="color: red; font-weight : 500; font-size:14px;"><?php echo $emailerror ?></span>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form2Example22">Password:</label>
                                            <input type="password" name="password" id="form2Example22" class="form-control" />
                                            <span style="color: red; font-weight : 500; font-size:14px;"><?php echo $passworderror ?></span>
                                        </div>

                                        <div class="text-center pb-2">
                                            <span style="color: red; font-weight : 500; font-size:14px;"><?php echo $errormsg ?></span>
                                        </div>

                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <input type="submit" name="login" id="form2Example22" class="form-control btn-block fa-lg gradient-custom-2 mb-1" style="color:white" />
                                            <a class="text-muted" href="#!">Forgot password?</a>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-center pb-4">
                                            <p class="mb-0 me-2">Don't have an account?</p>
                                            <a href="sellersignup.php"><button type="button" class="btn btn-outline-danger">Create new</button></a>
                                        </div>

                                    </form>

                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4">We are more than just a company</h4>
                                    <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
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