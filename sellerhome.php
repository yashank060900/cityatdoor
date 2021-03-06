<?php

require_once "db/connection.php";
session_start();
if(!isset($_SESSION["s_loggedin"]) || $_SESSION["s_loggedin"] !== true){
    header("location: sellerlogin.php");
    exit;
}
$msg = "";
  
  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];    
        $folder = "selleritems/".$filename;
        // Get all the submitted data from the form
        $sql = "INSERT INTO selleritem (itemImg) VALUES ('$folder')";
  
        // Execute query
        mysqli_query($db, $sql);
          
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  {
        }else{
            $msg = "Failed to upload image";
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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
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

            <li><a href="login.php">Login</a></li>
            <li><a href="signup.php">Signup</a></li>
            <li><a href="sellerlogin.php">Seller Login</a></li>
            <li style="border-bottom: 1px solid whitesmoke;"><a href="sellersignup.php">Seller Signup</a></li>
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
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <nav class="nav-mobile container-fluid p-2">
        <div class="search-box p-2">
            <input type="text" placeholder="Search Shop...">
            <img src="https://img.icons8.com/fluency-systems-regular/25/000000/search--v1.png" />
        </div>
    </nav>

    <form method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype='multipart/form-data'>
        <div class="form-outline">
            <input type='file' name='image'><br>
            <input type='submit' value='Upload Image' name='upload'>
        </div>

    </form>



    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script> -->

    <script src="js/js-jq.js"></script>
</body>

</html>