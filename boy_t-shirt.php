<?php
include("db.php");
include("header.php");
$q="SELECT * FROM tbl_product WHERE `prod_name` like '%t-shirt%' and `shop_for`='boy'";
$q1=mysqli_query($con,$q);
// if(isset($_GET['color']))
// {
//     $color=$_GET['color'];
//     $qc="SELECT * from tbl_product WHERE `prod_name`='top' and `color`='$color'";
//     $qc1=mysqli_query($con,$qc);
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
                        <li class="breadcrumb-item active">T-SHORTS FOR GIRLS</li>
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
                            <form action="#">
                                <div class="form-control" style="font-weight: bold;font-size: 17px;">FILTER BY <span><button style="border-radius: 5px;" id="clr"></button></button></span>
                                </div>
                            </form>
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
                        <?php $qsz = "SELECT DISTINCT(size) FROM tbl_product WHERE `prod_name` LIKE '%T-Shirt%' AND `shop_for`='boy' ORDER BY `size` ASC";
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
                        <?php $qb = "SELECT DISTINCT(prod_brand) FROM tbl_product WHERE `prod_name` LIKE '%T-Shirt%' AND `shop_for`='boy' ORDER BY `prod_brand` ASC";
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
                                    <span>Sort by </span>
                                    <select id="basic" class="form-control" name="sorting" style="height: 40px;width: 260px;">
                                    <option data-display="Select">Nothing</option>
                                    <option value="hightolow">High Price → Low Price</option>
                                    <option value="lowtohigh">Low Price → High Price</option>
                                    <option value="pnmatz">Product Name Wise(A → Z)</option>
                                    <option value="pnmzta">Product Name Wise(Z → A)</option>
                                </select>
                                </div>
                                <p></p>
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
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                            <li><a href="girl_top.php" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                        </ul>
                                                        <a class="cart" href="#">Add to Cart</a>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h4><?php echo $q2['prod_brand'];?> - <?php echo $q2['prod_description'];?></h4>
                                                    <h5><i class="fa fa-inr" aria-hidden="true"></i><?php echo $q2['prod_price'];?></h5>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                       
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>
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
<?php
include("footer.php");
?>
<script>
$(document).ready(function(){ 
    
                $('.product-categorie-box');
                var action = 'fetch_data';
                var pname='T-Shirt';
                var shopfor='boy';
                $('#basic').change(function(){
                 filter_data();
                });

                    function filter_data() {
                    var sortingwise = $('#basic').val();
                    // alert(sortingwise);
                    var minimum_price = $('#min_price_hide').val();
                    var maximum_price = $('#max_price_hide').val();
                    var size = get_filter('size');
                    var color = get_filter('color');
                    var brand=get_filter('brand');

                    $.ajax({
                        url: "productfilter_data.php",
                        method: "POST",
                        data: {
                            action: action,
                            pname:pname,
                            shopfor:shopfor,
                            minimum_price: minimum_price,
                            maximum_price: maximum_price,
                            size:size,
                            color:color,
                            brand:brand,
                            sortingwise:sortingwise                           
                        },
                        success: function(data) {
                            $('.product-categorie-box').html(data);              
                        }
                    });              
            
            }
            function get_filter(class_name) {
                var filter = [];
                $('.' + class_name + ':checked').each(function() {
                    filter.push($(this).val());
                });
                return filter;
            }
            
            $('.filter_all').click(function() {
               
                filter_data();
            });

        $("#slider-range").slider({
            range: true,
            min: 1,
            max: 1000,
            values: [1, 1000],
            step:11,
            stop: function(event, ui) {
                $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
                $('#min_price_hide').val(ui.values[0]);
                $('#max_price_hide').val(ui.values[1]);
            filter_data();
        }            
        }); 
    
});

</script>
