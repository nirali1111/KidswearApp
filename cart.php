<?php
include("header.php");
if(isset($_POST['clearcart'])) 
{
    $qd="DELETE FROM tbl_cart";
    $qd1= mysqli_query($con,$qd);
    if($qd1)
    {
        $msg="Data Deleted Successfully From Cart"; 
    }
    else
    {
        $msg="Error"; 
    }
} 
$qd="SELECT * FROM tbl_cart";
$qd1 = mysqli_query($con,$qd);
$numr = mysqli_num_rows($qd1);
if($numr==0){ ?>
     <div class="alert alert-warning"><?php echo "YOUR CART IS EMPTY..."; ?></div>
     <center><a href="index.php" ><button class="btnhoversupd" name="continue" type="submit" style="margin-bottom: 25px;">CONTINUE SHOPPING<i class="fas fa-chevron-right" style="padding-left: 10px;"></i><i class="fas fa-chevron-right"></i></button></a></center>
<?php }
else
{
if(isset($_GET['cartdel_id']))
{
    $cartdel_id=$_GET['cartdel_id'];
    $query="DELETE FROM tbl_cart WHERE `cart_id`='$cartdel_id'";
    $query1= mysqli_query($con,$query);
    if($query1)
    {
        $msg="Data Deleted Successfully From Cart"; 
    }
    else
    {
        $msg="Some Problem may Occured"; 
    }
    header("location:cart.php");
} 

@$userid=isset($_SESSION['user_data']['user_id'])?$_SESSION['user_data']['user_id']:0;

$q= "SELECT * FROM tbl_cart JOIN tbl_product ON tbl_cart.`cart_product_id`=tbl_product.`prod_id` WHERE tbl_cart.`cart_user_id`='$userid' AND tbl_cart.`cart_status`='pending'";


$q1 = mysqli_query($con,$q);
$num = mysqli_num_rows($q1);
$subtotal=0;
?>
    
    <!-- End Main Top -->

    <!-- Start All Title Box -->
<form method="post">
    <div class="all-title-box">
        <div class="container">      
            <div class="row">
            <?php if(isset($msg)) {?>
              <div class="alert alert-warning"><?php echo $msg; ?></div>
            <?php } ?>
                <div class="col-lg-12">
                    <h2>Cart</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table" style="border:1px solid #ccc;border-radius: 8px;">
                            <thead>
                                <tr>
                                    <th>Images</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Size</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                <?php
                if($num > 0 )
                {
                 while($q2 = mysqli_fetch_array($q1)) { ?>
                                <tr>
                                    <td class="thumbnail-img">
                                    <a href="update_cart.php?cid=<?php echo $q2['cart_id'];?>">
									<img class="img-fluid" src="images/allwear/<?php echo $q2['prod_image'];?>" alt="" />
								    </a><br/>
                                      <a href="update_cart.php?cid=<?php echo $q2['cart_id'];?>" style="margin-left: 35px;">
                                        <i class="fa fa-edit" style="font-size:25px;color:#004080"></i>
                                       </a>
                                    <a href="cart.php?cartdel_id=<?php echo $q2['cart_id'];?>" style="margin-left: 32px;">
                                        <i class="fa fa-trash" style="font-size:25px;color:red"></i>
                                       </a>
                                  
                                    </td>
                                    <td class="name-pr">
                                        <a href="shop_detail.php?id=<?php echo $q2['cart_id'];?>">
									<?php echo $q2['prod_longname'];?>
								    </a>
                                    </td>

                                    <input type="hidden" value="<?php echo $q2['prod_price'];?>"  id="product_per_price">
                                    <td class="price-pr">
                                        <p><?php echo $q2['prod_price'];?></p>
                                    </td>

                                    <td class="size-pr">
                                        <p><?php echo $q2['size'];?></p>
                                    </td>
                                
                                    <td class="quantity-box">
                                        <input type="text" value="<?php echo $q2['cart_qty'];?>" min="0" step="1"  id="qty" name="cqty" readonly>
                                    </td>

                                      
                                    <td class="total-pr" style="text-align: center;" >
                                        <p id="total_price"><?php echo $total=$q2['cart_totalprice'];?></p>
                                    </td>
                                     <input type="hidden" value="<?php echo $q2['prod_price']*$q2['cart_qty'];?>" name="ctot">
                                    <?php $subtotal=$subtotal+$total; ?>
                                   <!--  <td style="text-align: center;">

                                       <a href="cart.php?cartdel_id=<?php echo $q2['cart_id'];?>">
									    <i class="fa fa-remove" style="font-size:25px;color:red"></i>
								       </a>
                                    </td> -->
                                </tr>
                            <?php } }  ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

              <div>
                
                    <div class="update-box" style="float: left;">
                         <a href="index.php"><button class="btnhoversupd" name="continue" type="submit">CONTINUE SHOPPING</button></a>
                    </div>
                    <div class="update-box" style="float: left;margin-left: 90px;">
                         <button class="btnhoversupd" name="clearcart" type="submit">CLEAR CART</button>
                    </div>
                    <!-- <div class="update-box" style="float: left;margin-left: 90px;">
                         <button class="btnhoversupd" name="updatecart" type="submit">UPDATE CART</button>
                    </div> -->
                
            </div>
            <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12" style="border:1px solid #ccc;margin-top: -45px;">
                    <div class="order-box" >
                        <div style="font-weight: bold;text-align: center;color: black;font-size: 30px;background-color: #ccc;">ORDER SUMMARY</div><hr class="my-1">
                        <div class="d-flex">
                            <h4>Sub Total</h4>
                            <div class="ml-auto font-weight-bold"> <i class="fa fa-inr" aria-hidden="true"></i><?php echo $subtotal; ?> </div>
                        </div>
                       <!--  <div class="d-flex">
                            <h4>Discount</h4>
                            <div class="ml-auto font-weight-bold"> $ 40 </div>
                        </div> -->
                        <hr class="my-1">
                     
                        <!-- <div class="d-flex">
                            <h4>Tax</h4>
                            <div class="ml-auto font-weight-bold"> $ 2 </div>
                        </div> -->
                        <div class="d-flex">
                            <h4>Shipping Cost</h4>
                            <div class="ml-auto font-weight-bold"> Free </div>
                        </div>
                        <hr>
                        <div class="d-flex gr-total">
                            <h5>Grand Total</h5>
                            <div class="ml-auto h5"> <i class="fa fa-inr" aria-hidden="true"></i><?php echo $subtotal;
                                 $_SESSION['grand_total']=$subtotal; ?> </div>
                        </div>
                        <hr> 
                        <div>
                            <a href="checkout.php" class="ml-auto btn hvr-hover" style="color: white;font-weight: bold;width: 350px;margin-bottom: 10px;padding-top: 10px;padding-bottom: 10px;font-size: 18px;">GO TO CHECKOUT</a> 
                        </div>
                    </div>
                </div>
              <!--   <div class="col-12 d-flex shopping-box">
                    <a href="checkout.html" class="ml-auto btn hvr-hover">Checkout</a> 
                </div> -->

            </div>

        </div>
    </div>
<?php } ?>
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


    <!-- Start Footer  -->
   <?php
include("footer.php");
?>
