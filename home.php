<?php
// session_start();
// if(!isset($_SESSION["c_loggedin"]) || $_SESSION["c_loggedin"] !== true){
//     header("location: login.php");
//     exit;
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CityAtDoor</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Bootstrap Font Icon CSS -->
    </script>
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
            <li><img
                    src="https://img.icons8.com/external-flatart-icons-outline-flatarticons/25/ffffff/external-cart-supermarket-flatart-icons-outline-flatarticons.png" />
            </li>
            <li><img
                    src="https://img.icons8.com/external-xnimrodx-lineal-xnimrodx/25/ffffff/external-bell-event-and-party-xnimrodx-lineal-xnimrodx.png" />
            </li>
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

            <li><a href="">My Orders</a></li>
            <li><a href="">Notifications</a></li>
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href="policyandprivacy.php">Policy & Privacy</a></li>
            <li style="border-bottom: 1px solid whitesmoke;"><a href="contactus.php">Contact Us</a></li>
            <li>Connect with us</li>
            <li><a href="" class="center"><img
                        src="https://img.icons8.com/fluency/22/000000/facebook-new.png" />Facebook</a></li>
            <li><a href="" class="center"><img
                        src="https://img.icons8.com/color/22/000000/twitter--v1.png" />Twitter</a></li>
            <li style="border-bottom: 1px solid whitesmoke;"><a href="" class="center"><img
                        src="https://img.icons8.com/color/22/000000/linkedin.png" />LinkedIn</a></li>
            <li><a href="logout.php" class="center">Logout</a></li>
        </ul>
    </div>

    <nav class="nav-mobile container-fluid p-2">
        <div class="search-box p-2">
            <input type="text" placeholder="Search Shop...">
            <img src="https://img.icons8.com/fluency-systems-regular/25/000000/search--v1.png" />
        </div>
    </nav>

    <div class="item-category">
        <div class="item-row">
            <img src="img/temp.jpg" alt="">
            <p>Grocery</p>
        </div>
        <div class="item-row">
            <img src="img/temp.jpg" alt="">
            <p>Grocery</p>
        </div>
        <div class="item-row">
            <img src="img/temp.jpg" alt="">
            <p>Grocery</p>
        </div>
    </div>

    <div class="sale">
        <div class="sale-img">
            <img src="img/sale.jpg" alt="">
        </div>
        <div class="sale-img">
            <img src="img/sale.jpg" alt="">
        </div>
        <div class="sale-img">
            <img src="img/sale.jpg" alt="">
        </div>
        <div class="sale-img">
            <img src="img/sale.jpg" alt="">
        </div>
        <div class="sale-img">
            <img src="img/sale.jpg" alt="">
        </div>
    </div>

    <div class="item-category">
        <div class="item-row">
            <img src="img/temp.jpg" alt="">
            <p>Grocery</p>
        </div>
        <div class="item-row">
            <img src="img/temp.jpg" alt="">
            <p>Grocery</p>
        </div>
        <div class="item-row">
            <img src="img/temp.jpg" alt="">
            <p>Grocery</p>
        </div>
    </div>

    <div class="sale">
        <div class="sale-img">
            <img src="img/sale.jpg" alt="">
        </div>
        <div class="sale-img">
            <img src="img/sale.jpg" alt="">
        </div>
        <div class="sale-img">
            <img src="img/sale.jpg" alt="">
        </div>
        <div class="sale-img">
            <img src="img/sale.jpg" alt="">
        </div>
        <div class="sale-img">
            <img src="img/sale.jpg" alt="">
        </div>
    </div>

    <div class="item-category">
        <div class="item-row">
            <img src="img/temp.jpg" alt="">
            <p>Grocery</p>
        </div>
        <div class="item-row">
            <img src="img/temp.jpg" alt="">
            <p>Grocery</p>
        </div>
        <div class="item-row">
            <img src="img/temp.jpg" alt="">
            <p>Grocery</p>
        </div>
    </div>

    <div class="sale">
        <div class="sale-img">
            <img src="img/sale.jpg" alt="">
        </div>
        <div class="sale-img">
            <img src="img/sale.jpg" alt="">
        </div>
        <div class="sale-img">
            <img src="img/sale.jpg" alt="">
        </div>
        <div class="sale-img">
            <img src="img/sale.jpg" alt="">
        </div>
        <div class="sale-img">
            <img src="img/sale.jpg" alt="">
        </div>
    </div>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script> -->

    <script src="js/js-jq.js"></script>
</body>

</html>