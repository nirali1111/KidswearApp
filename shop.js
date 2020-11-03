$(document).ready(function(){
$('.divcl a').click(function(event){
    event.preventDefault();
    $.ajax({
        type: "GET",
        url: "http://192.168.0.1/Test/Nirali_Raiyani/Kids_Wear/kidswear/girl_top.php?color=red",
        success: function(data){
           var b = jQuery(data).find('#grid-view');
           jQuery('#grid-view').html(b);
        }
        });
});
});

