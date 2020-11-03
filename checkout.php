<?php
include("header.php");
@$userid=isset($_SESSION['user_data']['user_id'])?$_SESSION['user_data']['user_id']:0;
$q= "SELECT * FROM tbl_cart JOIN tbl_product ON tbl_cart.`cart_product_id`=tbl_product.`prod_id` WHERE tbl_cart.`cart_user_id`='$userid'";

$q1 = mysqli_query($con,$q);
$num = mysqli_num_rows($q1);
$cart_data  = array();
$product_data = array();
$total=$_SESSION['grand_total']; 
while($q2 =  mysqli_fetch_array($q1)){ 
      $cart_data[] =  $q2['cart_id'];
      $product_data[] = $q2['prod_id'];
}

    $cart_records =  implode(',',$cart_data);
    $product_records =  implode(',',$product_data);

    if(isset($_POST['placeorder']))
     {
       $productid =$_POST['productid'];
       $userid =$userid;
       $cartid =$_POST['cartid'];
       $username=$_POST['username'];
       $email=$_POST['email'];
       $contact=$_POST['contact'];
       $address=$_POST['address'];
       $city=$_POST['city'];
       $state=$_POST['state'];
       $pincode=$_POST['pincode'];
       $totalamt=$total;

        $qi="INSERT INTO tbl_order(`order_product_id`,`order_user_id`,`order_cart_id`,`order_uname`,`order_uemail`,`order_uphone`,`order_uaddress`,`order_city`,
        `order_state`,`order_upincode`,`order_totalamount`)values('$productid','$userid','$cartid','$username','$email','$contact','$address','$city','$state','$pincode','$totalamt')";
        $qi1= mysqli_query($con,$qi);
    
         if($qi1)
         {
            $msg="data inserted successfuly";
            // $qd="DELETE FROM tbl_cart WHERE cart_id IN ('".$cart_records."')";
            // $qd1= mysqli_query($con,$qd);

         }
         else
         {
           $msg="some thing happend wrong";

         }

     }

?>                           
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Checkout</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
     <?php if(isset($msg)) {?>
              <div class="alert alert-warning"><?php echo $msg; ?></div>
            <?php } 
     ?>
    <!-- End All Title Box -->

    <!-- Start Cart  -->

    <div class="cart-box-main">
  
        <div class="container">
            <div class="row">

                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="checkout-address">
                        <div class="title-left">
                            <h3>Billing address</h3>
                        </div>
                        <form method="post">
                        <input type="hidden" name="productid"  value="<?php echo $product_records; ?>">
                        <input type="hidden" name="cartid"  value="<?php echo $cart_records; ?>">

                            <div class="mb-3">
                                <label for="username">Username *</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="username" value="<?php echo $_SESSION['user_data']['user_name']; ?>" name="username" required>
                                    <div class="invalid-feedback" style="width: 100%;"> Your username is required. 
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email">Email Address *</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION['user_data']['user_email']; ?>">
                                <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
                            </div>
                            <div class="mb-3">
                                <label for="address">Contact No</label>
                                <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $_SESSION['user_data']['user_contactno']; ?>" required>
                                <div class="invalid-feedback"> Please enter your shipping address. </div>
                            </div>
                            <div class="mb-3">
                                <label for="address2">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="<?php echo $_SESSION['user_data']['user_address']; ?>"> 
                            </div>
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                <label for="country">City</label>
                                   <input type="text" class="form-control" id="city" placeholder="Enter City" name="city" value="<?php echo $_SESSION['user_data']['user_city']; ?>">   
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="country">State</label>
                                     <input type="text" class="form-control" id="state" placeholder="Enter City" name="state" value="<?php echo $_SESSION['user_data']['user_state']; ?>">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="pincode">Zip</label>
                                    <input type="text" class="form-control" id="pincode" name="pincode" value="<?php echo $_SESSION['user_data']['user_pincode']; ?>" required>
                                    <div class="invalid-feedback"> Zip code required. </div>
                                </div>
                            </div>
                            <hr class="mb-4">
                          <!--   <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="same-address">
                                <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="save-info">
                                <label class="custom-control-label" for="save-info">Save this information for next time</label>
                            </div>
                            <hr class="mb-4">
                            <div class="title"> <span>Payment</span> </div>
                            <div class="d-block my-3">
                                <div class="custom-control custom-radio">
                                    <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                                    <label class="custom-control-label" for="credit">Credit card</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                                    <label class="custom-control-label" for="debit">Debit card</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                                    <label class="custom-control-label" for="paypal">Paypal</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="cc-name">Name on card</label>
                                    <input type="text" class="form-control" id="cc-name" placeholder="" required> <small class="text-muted">Full name as displayed on card</small>
                                    <div class="invalid-feedback"> Name on card is required </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="cc-number">Credit card number</label>
                                    <input type="text" class="form-control" id="cc-number" placeholder="" required>
                                    <div class="invalid-feedback"> Credit card number is required </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="cc-expiration">Expiration</label>
                                    <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                                    <div class="invalid-feedback"> Expiration date required </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="cc-expiration">CVV</label>
                                    <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                                    <div class="invalid-feedback"> Security code required </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="payment-icon">
                                        <ul>
                                            <li><img class="img-fluid" src="images/payment-icon/1.png" alt=""></li>
                                            <li><img class="img-fluid" src="images/payment-icon/2.png" alt=""></li>
                                            <li><img class="img-fluid" src="images/payment-icon/3.png" alt=""></li>
                                            <li><img class="img-fluid" src="images/payment-icon/5.png" alt=""></li>
                                            <li><img class="img-fluid" src="images/payment-icon/7.png" alt=""></li>
                                        </ul>
                                    </div>
                                </div>
                            </div> -->
                    </div>
                </div>
                <?php 
                $qc= "SELECT * FROM tbl_cart JOIN tbl_product ON tbl_cart.`cart_product_id`=tbl_product.`prod_id` WHERE tbl_cart.`cart_user_id`='$userid'";

                $qc1 = mysqli_query($con,$qc);
                ?>
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="odr-box">
                                <div class="title-left">
                                    <h3>Shopping cart</h3>
                                </div>
                                <div class="rounded p-2 bg-light">
                                    <?php while($qc2=mysqli_fetch_array($qc1)) {?>
                                    <div class="media mb-2 border-bottom">
                                        <div class="media-body"> 
                                            <a href="update_cart.php?cid=<?php echo $qc2['cart_id'];?>">
                                            <img class="img-fluid" src="images/allwear/<?php echo $qc2['prod_image'];?>" alt="" style="height: 90px;width:90px;"/>
                                            </a>
                                          <a href="update_cart.php?cid=<?php echo $qc2['cart_id'];?>">
                                            <?php echo $qc2['prod_longname']; ?></a>
                                          <br/>Price: <?php echo $qc2['prod_price'];?> <span class="mx-2">|</span> Qty:<?php echo $qc2['cart_qty'];?> <span class="mx-2">|</span> Subtotal: <?php echo $qc2['cart_totalprice'];?>
                                           <!--  <div class="small text-muted" style="margin-left: 95px;ma"></div> -->
                                        </div>
                                    </div>
                                <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="order-box">
                                <div class="title-left">
                                    <h3>Your order</h3>
                                </div>
                                <div class="d-flex">
                                    <div class="font-weight-bold">Product</div>
                                    <div class="ml-auto font-weight-bold">Total</div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex">
                                    <h4>Sub Total</h4>
                                    <div class="ml-auto font-weight-bold"><i class="fa fa-inr" aria-hidden="true"></i> 
                                        <?php 
                                            if(isset($_SESSION['grand_total']))
                                            {
                                                echo $_SESSION['grand_total']; 
                                            }
                                        ?>
                                    </div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex">
                                    <h4>Shipping Cost</h4>
                                    <div class="ml-auto font-weight-bold"> Free </div>
                                </div>
                                <hr>
                                <div class="d-flex gr-total">
                                    <h5>Grand Total</h5>
                                    <div class="ml-auto h5"><i class="fa fa-inr" aria-hidden="true"></i> <?php 
                                            if(isset($_SESSION['grand_total']))
                                            {
                                                echo $_SESSION['grand_total']; 
                                            }
                                        ?>
                                    </div>
                                </div>
                                <hr> </div>
                        </div>
                        <div class="col-12 d-flex shopping-box">
                         <!-- <a href="checkout.html" class="ml-auto btn hvr-hover">Place Order</a> --> 
                         <button type="submit" class="btnhovers" name="placeorder">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </form>
    <!-- End Cart -->

    <!-- Start Instagram Feed  -->
    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-01.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-02.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-03.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-04.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-06.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-07.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-08.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-09.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Instagram Feed  -->

<?php
include("footer.php");
?>