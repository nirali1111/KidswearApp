<?php
include("db.php");
if(!empty($_POST["keyword"])) {

  $res= $_POST["keyword"];
  // $query ="SELECT * FROM tbl_product WHERE prod_name like '" . $_POST["keyword"] . "%' OR color like '" . $_POST["keyword"] . "%' ORDER BY prod_name LIMIT 0,6";
   $query ="SELECT DISTINCT prod_name,shop_for FROM tbl_product WHERE `prod_name` like '%$res%' OR `shop_for` like '%$res%' ORDER BY prod_name,shop_for";
  $result = mysqli_query($con,$query);
  if(!empty($result)) {
  ?>
  <ul id="product-list">
  <?php
        foreach($result as $prod) {
  ?>
  <a href="<?php echo $prod['shop_for'].'_'.$prod['prod_name'].'.php';?>"><li onClick="selectProduct('<?php echo $prod["prod_name"];?> for <?php echo $prod["shop_for"];?>');"><?php echo $prod["prod_name"];?> for <?php echo $prod["shop_for"];?> </li></a>
<?php } ?>
</ul>
<?php } } ?>