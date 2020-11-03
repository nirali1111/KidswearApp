
$(document).ready(function(){ 
    
                $('.product-categorie-box');
                var action = 'fetch_data';
                var pname='Top';
                var shopfor='girl';
                $("#searchbox").on("keyup",function(){
                   filter_data(); 
                });
                $('#basic').change(function(){
                 filter_data();
                });

                    function filter_data() {
                    var sortingwise = $('#basic').val();
                    var search_val=$('#searchbox').val().toLowerCase();
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
                            sortingwise:sortingwise,
                            search_val:search_val                           
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


