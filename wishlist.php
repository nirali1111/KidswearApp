<?php
include("header.php");
if(isset($_GET['wishdel_id']))
{
    $wishdel_id=$_GET['wishdel_id'];
    $query="DELETE FROM tbl_wishlist WHERE `wish_id`='$wishdel_id'";
    $query1= mysqli_query($con,$query);
    if($query1)
    {
        $msg="Data Deleted Successfully From WishList"; 
    }
    else
    {
        $msg="Some Problem may Occured"; 
    }
    header("location:wishlist.php");
}   
@$userid=isset($_SESSION['user_data']['user_id'])?$_SESSION['user_data']['user_id']:0;
$q= "SELECT * FROM tbl_wishlist JOIN tbl_product ON tbl_wishlist.`wish_product_id`=tbl_product.`prod_id` where tbl_wishlist.`wish_user_id`='$userid'";
$q1 = mysqli_query($con,$q);
$num = mysqli_num_rows($q1);
?>
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Wishlist</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Wishlist</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Wishlist  -->
    <div class="wishlist-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table" style="border:1px solid #ccc;border-radius: 8px;">
                            <thead>
                                <tr>
                                    <th>Images</th>
                                    <th>Product Name</th>
                                    <th>Unit Price </th>
                                    <th>Add Item</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                if($num > 0 )
                {
                 while($q2 = mysqli_fetch_array($q1)) { ?>
                            <tr>
                                <td class="thumbnail-img">
                                    <a href="shop_detail.php?id=<?php echo $q2['wish_product_id'];?>">
                                    <img class="img-fluid" src="images/allwear/<?php echo $q2['prod_image'];?>" alt="" />
                                    </a>
                                </td>
                                <td class="name-pr">
                                    <a href="shop_detail.php?id=<?php echo $q2['wish_product_id'];?>">
                                    <?php echo $q2['prod_longname'];?>
                                    </a>
                                </td>
                                <td class="price-pr">
                                    <p><?php echo $q2['prod_price'];?></p>
                                </td>
                                <td>
                                    <p><a class="btn hvr-hover" href="shop_detail.php?id=<?php echo $q2['wish_product_id'];?>" style="color: white;font-weight: bold;"> <i class="fa fa-eye" aria-hidden="true" style="font-size:20px;color:white;margin-right: 5px;border-radius: 10px;"></i>QUICK VIEW</a></p>
                                </td> 
                                <td style="text-align: center;">
                                    <a href="wishlist.php?wishdel_id=<?php echo $q2['wish_id'];?>">
                                    <i class="fa fa-remove" style="font-size:25px;color:red"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php } }  ?>
                                
                            </tbody>
                           
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Wishlist -->

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