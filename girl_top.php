<?php
include("db.php");
include("header.php");
$q="SELECT * FROM tbl_product WHERE `prod_name` like '%top%' and `shop_for`='girl'";
$q1=mysqli_query($con,$q);
// $qd="SELECT  * from tbl_product where `prod_image` in 
// (
//   select DISTINCT `prod_image` from tbl_product WHERE `prod_name` like '%top%' and `shop_for`='girl'
// )";
// $qd1=mysqli_query($con,$qd);
// while($qd2=mysqli_fetch_array($qd1))
// {
//    echo $qd2['prod_image'];
// }
?>

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>SHOP</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">HOME</a></li>
                        <li class="breadcrumb-item active">SHOP</li>
                        <li class="breadcrumb-item active">TOPS FOR GIRLS</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Page  -->
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                    <div class="product-categori">
                        <div class="search-product">
                            
                            <input class="form-control" placeholder="Search here..." type="text" id="searchbox">
                            <button type="submit"> <i class="fa fa-search"></i> </button>
                        
                        </div>

                         <div class="filter-price-left">
                            <div class="title-left">
                                <h3>PRICE</h3>
                            </div>
                            <div class="price-box-slider">
                                <input type="hidden" id="min_price_hide" value="0" />
                                <input type="hidden" id="max_price_hide" value="500" />
                                 <div id="slider-range"></div>
                                <p id="price_show">$10 - $1000</p>
                               
                               <!--  <p>
                                    <input type="text" id="amount" readonly style="border:0; color:brown; font-weight:bold;font-size: 18px;">
                                    <button class="btn hvr-hover" type="submit">Filter</button>
                                </p> -->
                            </div>
                        </div>
                        <?php $qsz = "SELECT DISTINCT(size) FROM tbl_product WHERE `prod_name` LIKE '%top%' AND `shop_for`='girl' ORDER BY `size` ASC";
                         $qsz1 = mysqli_query($con,$qsz);
                         ?>
                        <div class="filter-brand-left">
                            <div class="title-left">
                                <h3>SIZE</h3>
                            </div>
                            <div class="brand-box">
                                 <ul>
                                    <?php while($qsz2 = mysqli_fetch_array($qsz1)) { ?>
                                    <li>
                                        <div>
                                            <input name="survey" id="check1" value="<?php echo $qsz2['size']; ?>" type="checkbox" class="filter_all size"> 
                                            <label for="check1"> <?php echo $qsz2['size']; ?> </label>
                                        </div>
                                    </li>
                                <?php }?>
                                </ul>
                            </div>
                        </div>

          
                        <div class="filter-brand-left">
                            <div class="title-left">
                                <h3>COLOR</h3>
                            </div>
                            <div style="padding-bottom: 30px;">
                                
                                        <div>
                                             
                                         <label for="checkc1" class="main">
                                            <input name="survey" id="checkc1" value="black" type="radio" class="filter_all color">
                                            <span class="col" style="background-color: black;"></span>
                                        </label>
                                        </div>
                                    
                                        <div>
                                            
                                            <label for="checkc2" class="main"> 
                                                <input name="survey" id="checkc2" value="white" type="radio" class="filter_all color">
                                                <span class="col" style="background-color: white;border:2px solid #ccc;"></span> 
                                            </label>
                                        </div>
                                   
                                        <div>
                                           <label for="checkc3" class="main"> 
                                                <input name="survey" id="checkc3" value="red" type="radio" class="filter_all color">
                                                <span class="col" style="background-color: red;"></span> 
                                            </label> 
                                        </div>
                                    
                                        <div>
                                            <label for="checkc4" class="main"> 
                                                <input name="survey" id="checkc4" value="blue" type="radio" class="filter_all color">
                                                <span class="col" style="background-color: blue;"></span> 
                                            </label>
                                        </div>
                                    
                                        <div>
                                            <label for="checkc5" class="main"> 
                                                <input name="survey" id="checkc5" value="pink" type="radio" class="filter_all color">
                                                <span class="col" style="background-color: #ff4da6;"></span> 
                                            </label>
                                        </div>
                                    
                                        <div>
                                            <label for="checkc6" class="main"> 
                                                <input name="survey" id="checkc6" value="green" type="radio" class="filter_all color">
                                                <span class="col" style="background-color: green;"></span> 
                                            </label>
                                        </div>
                                    
                                        <div>
                                            <label for="checkc7" class="main"> 
                                                <input name="survey" id="checkc7" value="yellow" type="radio" class="filter_all color">
                                                <span class="col" style="background-color: yellow;"></span> 
                                            </label>
                                        </div>
                                        <div>
                                            <label for="checkc7" class="main"> 
                                                <input name="survey" id="checkc7" value="brown" type="radio" class="filter_all color">
                                                <span class="col" style="background-color: brown;"></span> 
                                            </label>
                                        </div>
                            </div>
                            
                        </div>
                        <?php $qb = "SELECT DISTINCT(prod_brand) FROM tbl_product WHERE `prod_name` LIKE '%top%' AND `shop_for`='girl' ORDER BY `prod_brand` ASC";
                         $qb1 = mysqli_query($con,$qb);
                         ?>
                         <div class="filter-brand-left" style="padding-top: 60px;">
                            <div class="title-left">
                                <h3>SHOP BY BRAND</h3>
                            </div>
                            <div class="brand-box">
                                <ul>
                                    <?php while($qb2 = mysqli_fetch_array($qb1)) { ?>
                                    <li>
                                        <div>
                                            <input name="survey1" id="brand" value="<?php echo $qb2['prod_brand']; ?>" type="checkbox" class="filter_all brand"> 
                                            <label for="check1"> <?php echo $qb2['prod_brand']; ?> </label>
                                        </div>
                                    </li>
                                <?php }?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-item-filter row">
                            <div class="col-12 col-sm-8 text-center text-sm-left">
                                <div class="toolbar-sorter-right">
                                    <span>SORT BY </span>
                                    <select id="basic" class="form-control" name="sorting" style="height: 40px;width: 260px;">
                                    <option data-display="Select">Nothing</option>
                                    <option value="hightolow">High Price → Low Price</option>
                                    <option value="lowtohigh">Low Price → High Price</option>
                                    <option value="pnmatz">Product Name Wise(A → Z)</option>
                                    <option value="pnmzta">Product Name Wise(Z → A)</option>
                                </select>
                                </div>
                                <!-- <p></p> -->
                         
                            </div>
                            <div class="col-12 col-sm-4 text-center text-sm-right">
                                <ul class="nav nav-tabs ml-auto">
                                    <li>
                                        <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"></i> </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="#list-view" data-toggle="tab"> <i class="fa fa-list-ul"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                           
                        <div class="row product-categorie-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <div class="row">
                                        <?php while($q2=mysqli_fetch_array($q1)) { ?>

                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover"> 

                                                    <img src="images/allwear/<?php echo $q2['prod_image'];?>" class="img-fluid" alt="Image">
                                                    
                                                    <div class="mask-icon">
                                                        <ul>

                                                            <li><a href="shop_detail.php?id=<?php echo $q2['prod_id']; ?>" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                            
                                                            <li><a href="shop_detail.php?id=<?php echo $q2['prod_id']; ?>" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>

                                                            <li><a href="shop_detail.php?id=<?php echo $q2['prod_id']; ?>" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                        </ul>
                                                        <a class="cart" href="#">Add to Cart</a>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h4><?php echo $q2['prod_brand'];?> - <?php echo $q2['prod_longname'];?></h4>
                                                    <h5><i class="fa fa-inr" aria-hidden="true"></i><?php echo $q2['prod_price'];?></h5>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                       
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="list-view">
                                    <div class="list-view-box">
                                        <div class="row" id="txtfil">
                                             <?php 
                                             $qy="SELECT * FROM tbl_product WHERE `prod_name` like '%top%' and `shop_for`='girl'";
                                            $qy1=mysqli_query($con,$q);
                                             while($qy2=mysqli_fetch_array($qy1)) { ?>
                                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4" id="txtfill">
                                                <div class="products-single fix">
                                                    <div class="box-img-hover">
                                                        <div class="type-lb">
                                                            <p class="new">New</p>
                                                        </div>
                                                        <img src="images/allwear/<?php echo $qy2['prod_image'];?>" class="img-fluid" alt="Image">
                                                        <div class="mask-icon">
                                                            <ul>
                                                                <li><a href="shop_detail.php?id=<?php echo $qy2['prod_id']; ?>" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                            </ul>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                                <div class="why-text full-width">
                                                    <h4><?php echo $qy2['prod_longname'];?></h4>
                                                    <h5><i class="fa fa-inr" aria-hidden="true"></i><?php echo $qy2['prod_price'];?></h5>
                                                    <p><?php echo $qy2['prod_brand'];?> - <?php echo $qy2['prod_description'];?></p>
                                                    <a class="btn hvr-hover" href="#">Add to Cart</a>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>    
                                 </div>
                            </div>
                        </div><!-- rowproduct -->  
                    <div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
    <!-- End Shop Page -->

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

<!-- <input type="hidden" id="pn" name="pn" value="<?php echo $q2['prod_name']; ?>" >
<input type="hidden" id="sf" name="sf" value="<?php echo $q2['shop_for']; ?>" >  --> 
<?php
include("footer.php");
?>
