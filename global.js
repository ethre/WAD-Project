$('input#product-submit').on('click',function(){
    
    var product =$('input#product').val();
    if($.trim(product) !=''){
       $.post('product.php', {product: product}, function(data) {
            $('div#product-data').text(data);
        });
    }
});