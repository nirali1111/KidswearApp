<?php
include('db.php'); 
 
if (isset($_POST["action"])) 
  {
    $pname = isset($_POST['pname'])?$_POST['pname']:'';
    $shopfor = isset($_POST['shopfor'])?$_POST['shopfor']:'';
    // $pname=$_POST["pname"];
    // $shopfor=$_POST["shopfor"];
    if(($pname!='')&&($shopfor!='')){
    $q = "SELECT * FROM tbl_product WHERE `prod_name` like '$pname' and `shop_for`='$shopfor'";
    
    if (isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"])) 
    {
        $q .= " AND prod_price BETWEEN '" . $_POST["minimum_price"] . "' AND '" . $_POST["maximum_price"] ."' ";
    }
    if (isset($_POST["size"])) {
        $size_filter = implode("','", $_POST["size"]);

        $q .= " AND size IN('" . $size_filter . "')";
    }
    if (isset($_POST["color"])) {
        $color_filter = implode("','", $_POST["color"]);
        
        $q .= " AND color IN('" . $color_filter . "')";
    }
    if (isset($_POST["brand"])) {
        $brand_filter = implode("','", $_POST["brand"]);
        $q .= " AND prod_brand IN('" . $brand_filter . "')";
    }
    if (isset($_POST["search_val"])) {
        $search =  $_POST["search_val"];
        $q .= " AND `prod_longname` LIKE '%{$search}%'";
    }
    if (isset($_POST["sortingwise"])) 
    {
        $sort=$_POST["sortingwise"];
        if($sort=='lowtohigh')
        {
            $q .= " ORDER BY prod_price ASC ";
        }
        elseif ($sort=='hightolow') 
        {
            $q .= " ORDER BY prod_price DESC ";
        }
        elseif($sort=='pnmatz')
        {
             $q .= " ORDER BY prod_description ASC ";
        }
        elseif($sort=='pnmzta')
        {
             $q .= " ORDER BY prod_description DESC ";
        }
    }
    
    $q1=mysqli_query($con,$q);
    $nor=mysqli_num_rows($q1);
    $output="";
    if($nor>0){
        while($qc2=mysqli_fetch_array($q1)) { 
                                  $output.='<div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                              
                                                    <img src="images/allwear/'.$qc2['prod_image'].'" class="img-fluid" alt="Image">
                                                    
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="shop_detail.php?id='.$qc2['prod_id'].'" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>

                                                            <li><a href="shop_detail.php?id='.$qc2['prod_id'].'" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>

                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                            
                                                        </ul>
                                                        <a class="cart" href="shop_detail.php">Add to Cart</a>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h4>'.$qc2['prod_brand'].' - '.$qc2['prod_longname'].'</h4>
                                                    <h5><i class="fa fa-inr" aria-hidden="true"></i>'.$qc2['prod_price'].'</h5>
                                                </div>
                                            </div>
                                        </div>';
                                    } 
                               
    }
    else
    {
      $output = '<h3>No Data Found</h3>';
    }
     echo $output;
  }
}
    
 
