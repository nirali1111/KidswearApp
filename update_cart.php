<?php
include("header.php");
if(isset($_GET['cid'])){

   $cid=$_GET['cid'];
   $qs="SELECT * FROM tbl_cart JOIN tbl_product ON tbl_cart.`cart_product_id`=tbl_product.`prod_id` WHERE `cart_id`='$cid'";
   $qs1=mysqli_query($con,$qs);
   $qs2=mysqli_fetch_array($qs1);

   $img=$qs2['prod_image'];
   $qsp="SELECT * FROM tbl_product WHERE `prod_image`='$img'";
   $qsp1=mysqli_query($con,$qsp);
   
   $userid=@$_SESSION['user_data']['user_id'];
  
    if(isset($_POST['updatecart']))
    {   
        $sizeselect=$_POST['sizeselect'];
        $qsize_id=$sizeselect;

        $qc= "SELECT * FROM tbl_cart WHERE `cart_product_id`='$qsize_id' AND `cart_user_id`='$userid' AND `cart_status` != 'completed'";
        $qc1 = mysqli_query($con,$qc);
        $qc2 = mysqli_fetch_array($qc1);
        $numc=mysqli_num_rows($qc1);        
        $qty=$_POST['qty'];   
        $cqty=$qc2['cart_qty'];
        $uqty=$cqty+$qty;     
        $price=$_POST['pprice'];
        $totalprice=$price*$qty;
        $utotalprice=$price*$uqty;
        if($numc==0)
        {
 
            $qudty="UPDATE tbl_cart SET `cart_product_id`='$qsize_id',`cart_qty`='$qty',`cart_totalprice`='$totalprice' WHERE `cart_id`='$cid'";
            $qudty1=mysqli_query($con,$qudty);
            if($qudty1)
            {
                $msg="Data Updated Successfully To The Cart with size";
            }
            else
            {
                $msg="something wrong";
            }
            
        }
        else
        {
            $qudt="UPDATE tbl_cart SET `cart_qty`='$qty',`cart_totalprice`='$totalprice' WHERE `cart_product_id`='$qsize_id'";
            $qudt1=mysqli_query($con,$qudt);
            if($qudt1)
            {
                $msg="Data Updated Successfully To The Cart";
            }
            else
            {
                $msg="something wrong";
            }
        }
        

    }
}

?>
    
    <!-- End Main Top -->

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>SHOP DEATAIL</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Shop Detail </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->
<form id="singleProduct" method="post">
        <?php if(isset($msg)) { ?>
                <div class="alert alert-warning"><?php echo $msg;
                 ?> </div>
      <?php } 
     ?>
    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active"> <img class="d-block w-100" src="images/allwear/<?php echo $qs2['prod_image'];?>" alt="First slide"> </div>
                            <div class="carousel-item"> <img class="d-block w-100" src="images/allwear/<?php echo $qs2['prod_image'];?>" alt="Second slide"> </div>
                            <div class="carousel-item"> <img class="d-block w-100" src="images/allwear/<?php echo $qs2['prod_image'];?>" alt="Third slide"> </div>
                        </div>
                        <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev"> 
						<i class="fa fa-angle-left" aria-hidden="true"></i>
						<span class="sr-only">Previous</span> 
					    </a>
                        <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next"> 
						<i class="fa fa-angle-right" aria-hidden="true"></i> 
						<span class="sr-only">Next</span> 
					    </a>
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-1" data-slide-to="0" class="active">
                                <img class="d-block w-100 img-fluid" src="images/allwear/<?php echo $qs2['prod_image'];?>" alt="" />
                            </li>
                            <li data-target="#carousel-example-1" data-slide-to="1">
                                <img class="d-block w-100 img-fluid" src="images/allwear/<?php echo $qs2['prod_image'];?>" alt="" />
                            </li>
                            <li data-target="#carousel-example-1" data-slide-to="2">
                                <img class="d-block w-100 img-fluid" src="images/allwear/<?php echo $qs2['prod_image'];?>" alt="" />
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <div class="lnm"><?php echo $qs2['prod_longname'];?></div>
                        <h5><i class="fa fa-inr" aria-hidden="true"></i><?php echo $qs2['prod_price'];?>
                        </h5>
                        <input type="hidden" name="pprice" value="<?php echo $qs2['prod_price']; ?>">
                                <!-- <h4>Short Description:</h4> -->
                                <p><?php echo $qs2['prod_description'];?></p>
                                <ul>
                                    <li>
                                        <div class="form-group size-st">
                                            <label class="size-label">Size</label>
                                            <select id="basic" class="selectpicker show-tick form-control" name="sizeselect" required>
                                            <option selected disabled="disabled">-----------Select Size------------</option>
                                            <?php while($qsp2=mysqli_fetch_array($qsp1)) { ?>
									        <option value="<?php echo $qsp2['prod_id'];?>"
                                            <?php 
                                               if(@$qs2['cart_product_id']== $qsp2['prod_id'])
                                                 
                                                    echo 'selected="selected"';
                                                 
                                                 ?> >
                                                <?php 
                                                      
                                                      echo $qsp2['size']; 
                                                ?>
                                            </option>
                                            <?php  }  ?>
                                          
								            </select>
                                        </div>
                                       <!--     <div class="form-group size-st">
                                            <label class="size-label">Size</label>
                                            <select id="basic" class="selectpicker show-tick form-control" name="sizeselect" required>
                                            <option selected disabled="disabled">-----------Select Size------------</option>
                                            <?php while($qsp2=mysqli_fetch_array($qsp1)) { ?>
                                            <option value="<?php echo $qsp2['prod_id']; ?>" >
                                                <?php 
                                                      
                                                      echo $qsp2['size']; 
                                                ?>
                                            </option>
                                            <?php  }  ?>
                                          
                                            </select>
                                        </div> -->

                                    </li>
                                    <li>
                                        <div class="form-group quantity-box">
                                            <label class="control-label">Quantity</label>
                                            <input class="form-control" value="<?php echo $qs2['cart_qty'];?>" min="1" max="20" type="number" name="qty">
                                        </div>
                                    </li>
                                </ul>

                                <div class="add-to-btn">
                                    <div class="add-comp">
                                     
                                        <button type="submit" class="btnhovers" name="updatecart" id="atc"><i class="fa fa-shopping-basket" aria-hidden="true" style="font-size:20px;color:white;margin-right: 5px;border-radius: 10px;"></i>UPDATE CART</button>
                                         <button type="submit" class="btnhovers" name="addtowish"><i class="fas fa-heart" style="font-size:20px;margin-right: 5px;"></i>ADD TO WISHLIST</button>
                                         <button type="submit" class="btnhovers" name="compare"><i class="fas fa-sync-alt" style="font-size:20px;margin-right: 5px;"></i>ADD TO COMPARE</button>
                                        <!-- <a class="btn hvr-hover" href="#"> <i class="fa fa-shopping-basket" aria-hidden="true" style="font-size:20px;color:white;margin-right: 5px;border-radius: 10px;"></i>ADD TO CART</a>
                                        <a class="btn hvr-hover" href="#"><i class="fas fa-heart" style="font-size:20px;margin-right: 5px;"></i> ADD TO WISHLIST</a>
                                        <a class="btn hvr-hover" href="#"><i class="fas fa-sync-alt" style="font-size:20px;margin-right: 5px;"></i> ADD TO COMPARE</a> -->
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
    <!-- End Cart -->

    <!-- Start Instagram Feed  -->

    <!-- End Instagram Feed  -->
<?php
include("footer.php");
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script>
 $('#singleProduct').validate({ // initialize the plugin
    rules: {
                sizeselect:{ required: true},
           },
  messages:{
               sizeselect:{
               required:"<div style='color:red'>Please Select Size</div>"
                         }

             }  
});
 </script>