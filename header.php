<!DOCTYPE html>
<html lang="en">
<?php
ob_start();
session_start();
include("db.php");
if(isset($_SESSION['user_data']['user_id'])){

$user_id=$_SESSION['user_data']['user_id'];
$cart_qn =  "select * from tbl_cart where `cart_user_id`='$user_id' AND `cart_status`='pending'";
            $cart_qn1 = mysqli_query($con,$cart_qn);
            $num = mysqli_num_rows($cart_qn1);
            $_SESSION['cart_data'] =  $num;

$wish_qn =  "select * from tbl_wishlist where `wish_user_id`='$user_id'";
            $wish_qn1 = mysqli_query($con,$wish_qn);
            $num1 = mysqli_num_rows($wish_qn1);
            $_SESSION['wish_data'] =  $num1;
}
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Kids Wear Collection
    </title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
     <!-- login & registration link -->
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="searchbox.js"></script>
    <script src="filterpannel.js"></script>
    
    
   <!--  <script src="cartnum.js"></script> -->
    <!-- for size -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script> -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <style>


     </style>
    <!--  <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script> -->
    
</head>

<body>

    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="text-slid-box">
                        <div>
                            <ul>
                              
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="custom-select-box">
                         <a href="cart.php">
                               <i class="fa fa-shopping-basket" aria-hidden="true" style="font-size:25px;color:white;"></i>
                               <span style="color: white;font-size: 17px;"><?php echo @$_SESSION['cart_data'];?></span>
                           </a>
                    </div>
                    <div class="right-phone-box">
                        <a href="wishlist.php"><i class="fa fa-heart-o" style="font-size:25px;color:white;"></i>
                             <span style="color: white;font-size: 17px;"><?php echo @$_SESSION['wish_data'];?></span>
                        </a>
                    </div>
                    <div class="our-link">
                        <ul>

                               <?php
                               if(isset($_SESSION['user_data']['user_email'])!='')
                               { ?>
                                  <li style="color: #ffffff;font-weight: 700;text-transform: uppercase;font-size: 14px;">Welcome  
                                    <?php echo $_SESSION['user_data']['user_name'];?></li>
                               <?php }
                                else
                               { ?>
                                 <li><a href="registration.php">Registration</a></li>

                                <?php } ?>

                               <?php
                               if(isset($_SESSION['user_data']['user_email'])!='')
                               { ?>
                                  <li><a href="logout.php">Logout</a></li>
                               <?php }
                                else
                               { ?>
                                 <li><a href="login.php">Login</a></li>

                                <?php } ?>

                                
                                <?php
                                if(isset($_SESSION['user_data']['user_email'])!='')
                               { ?>
                                <li class="dropdown"><a href="#" data-toggle="dropdown">My Account</a>
                                <ul class="dropdown-menu" style="background-color: black;">
                                <li><a href="edit_profile.php" >Edit Profile</a></li>
                                <li><a href="change_password.php">Change Password</a></li>
                                <li><a href="my_order.php">View Order</a></li>
                                <li><a href="cancel_order.php">Vew Cancel Order</a></li>
                          
                                </ul>
                                </li>
                               <?php } ?>
                               <li><a href="about.php">About Us</a></li>
                               <li><a href="contact_us.php">Contact Us</a></li>
                               <li><a href="t&c.php">T & C</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                   </button>
                    <a class="navbar-brand" href="index.php"><img src="images/lg1.png" class="logo" alt="" style="height: 120px;width: 200px;"></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li>
                            <div class="frmSearch">
                            <input type="text" name="Search" id="search-box" placeholder="Search products here..." class="n1">
                                <div class="search-icon">
                                    <i class="fas fa-search special-tag"></i>
                                </div>
                                <div id="suggesstion-box"></div>
                            </div>
                        </li>
                        <li class="nav-item active"><a class="nav-link" href="index.php">HOME</a></li>
                       
                           <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">GIRLS</a>
                            <ul class="dropdown-menu">
                                <li style="color:white;background-color: brown;height:45px;padding-top: 10px;padding-left: 10px;"><b>Top Wear</b></li>
                                <li><a href="girl_top.php">Tops</a></li>
                                <li><a href="cart.php">T-shirts</a></li>
                                <li><a href="girl_jackets.php">Jackets & Shrugs</a></li>
                                <li style="color:white;background-color: brown;height:45px;padding-top: 10px;padding-left: 10px;"><b>Bottom Wear</b></li>
                                <li><a href="wishlist.php">Jeans</a></li>
                                <li><a href="shop_detail.php">Trousers</a></li>
                                 <li><a href="shop.php">Shorts</a></li>
                                <li><a href="my-account.html">Scirts</a></li>
                                <li><a href="wishlist.php">Leggings</a></li>
                                <li><a href="shop_detail.php">Trackpants</a></li>
                            </ul>
                        </li>   
                           <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">BOYS</a>
                            <ul class="dropdown-menu">
                                <li style="color:white;background-color: brown;height:45px;padding-top: 10px;padding-left: 10px;"><b>Top Wear</b></li>
                                <li><a href="shop.php">Shirts</a></li>
                                <li><a href="cart.php">T-shirts</a></li>
                                <li><a href="shop.php">Jackets</a></li>
                                <li style="color:white;background-color: brown;height:45px;padding-top: 10px;padding-left: 10px;"><b>Bottom Wear</b></li>
                                <li><a href="wishlist.php">Jeans</a></li>
                                <li><a href="shop_detail.php">Trousers</a></li>
                                <li><a href="shop.php">Shorts & Dungrarees</a></li>
                                <li><a href="my-account.html">Track Pants</a></li>
                               
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">ETHNIC WEAR</a>
                            <ul class="dropdown-menu">
                                <li><a href="cart.html">Boys Ethnic</a></li>
                                <li><a href="checkout.html">Girls Ethnic</a></li>
                               
                            </ul>
                        </li>
                           <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">BIRTHDAY BOUTIQUE</a>
                            <ul class="dropdown-menu">
                                <li><a href="cart.html">Birthday Boy</a></li>
                                <li><a href="checkout.html">Birthday Girl</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">FOOTWEAR</a>
                            <ul class="dropdown-menu">
                                <li><a href="cart.html">Boys Footwear</a></li>
                                <li><a href="checkout.html">Girls Footwear</a></li>
                                
                            </ul>
                        </li>
                         <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">ACCESSORIES</a>
                            <ul class="dropdown-menu">
                                <li><a href="cart.html">Hair Accessories</a></li>
                                <li><a href="checkout.html">Watches</a></li>
                                <li><a href="my-account.html">Photo Propes</a></li>
                                <li><a href="wishlist.html">Bags</a></li>
                                <li><a href="shop-detail.html">Sunglasses</a></li>
                            </ul>
                        </li>
                        
                      
                        
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
             <!--    <div class="attr-nav">
                    <ul>
                        <li></li>
                        <li class="side-menu">
                            
                        </li>
                        <li>
                             <input type="text" name="Search" placeholder="Search products" class="n1">
                                            <div class="search-icon">
                                                <i class="fas fa-search special-tag"></i>
                                            </div>
                        </li>
                    </ul>
                </div> -->
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                        <li>
                            <a href="#" class="photo"><img src="images/img-pro-01.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Delica omtantur </a></h6>
                            <p>1x - <span class="price">$80.00</span></p>
                        </li>
                        <li>
                            <a href="#" class="photo"><img src="images/img-pro-02.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Omnes ocurreret</a></h6>
                            <p>1x - <span class="price">$60.00</span></p>
                        </li>
                        <li>
                            <a href="#" class="photo"><img src="images/img-pro-03.jpg" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Agam facilisis</a></h6>
                            <p>1x - <span class="price">$40.00</span></p>
                        </li>
                        <li class="total">
                            <a href="#" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                            <span class="float-right"><strong>Total</strong>: $180.00</span>
                        </li>
                    </ul>
                </li>
            </div>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->
