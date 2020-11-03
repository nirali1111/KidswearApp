$(document).ready(function() {
$(".quantity-box").on('click',function() {
    var per=$("#product_per_price").val();
   
    var qty=$("#qty").val();
    
    var total=per*qty;
    
   $("#total_price").text(total);
 });
});
