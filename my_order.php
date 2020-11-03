<?php
include("header.php");
@$userid=isset($_SESSION['user_data']['user_id'])?$_SESSION['user_data']['user_id']:0;

    $q="SELECT * FROM tbl_order JOIN tbl_product ON tbl_order.`order_product_id`=tbl_product.`prod_id` JOIN tbl_cart ON tbl_cart.`cart_id`=tbl_order.`order_cart_id` WHERE tbl_order.`order_user_id`='$userid'";
    $q1=mysqli_query($con,$q);
           
?>
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>MY ORDERS </h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active"> MY ORDERS </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Contact Us  -->
    <form method="post">
    <div class="container" style="margin-top: 80px;margin-bottom: 80px;">
  <table class="table table-hover table-bordered">
    <thead>
      <tr>
      	<th>Email-Id</th>	
        <th>Product Name</th>
        <th>Product Image</th>
        <th>Price(per)</th>
        <th>Quantity</th>
        <th>Total Amount</th>
        <th>Order Date</th>
        <th>Remove</th>

      </tr>
    </thead>
    <tbody>
    <?php while($q2=mysqli_fetch_array($q1)) { 
          $exp=$q2['prod_image'];
          $new=explode(",", $exp);
          print_r($new);
    	?>
      <tr>
        <td><?php echo $q2['order_uemail'];?></td>
        <td><?php echo $q2['prod_longname'];?></td>
        <td><img class="img-fluid" src="images/allwear/<?php echo $new;?>" alt="" style="height: 90px;width:90px;"/></td>
        <td><?php echo $q2['prod_price'];?></td>
        <td><?php echo $q2['cart_qty'];?></td>
        <td><?php echo $q2['order_totalamount'];?></td>
        <td><?php echo $q2['order_date'];?></td>
        <td><a href="cart.php?cartdel_id=<?php echo $q2['cart_id'];?>" style="margin-left: 20px;">
                                        <i class="fa fa-trash" style="font-size:25px;color:red"></i>
                                       </a></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
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


    <!-- Start Footer  -->
    <?php include("footer.php");?>
    <!-- End Footer  -->

    <!-- Start copyright  -->
