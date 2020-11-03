
    $(document).ready(function(){
    $("#search-box").keyup(function(){
        var searchtext=$(this).val().toLowerCase();
        $.ajax({
        type: "POST",
        url: "readproduct.php",
        data:{keyword:searchtext},
        beforeSend: function(){
            $("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
        },
        success: function(data){
            $("#suggesstion-box").show();
            $("#suggesstion-box").html(data);
            $("#search-box").css("background","#FFF");
        }
        });
    });
});

function selectProduct(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}

