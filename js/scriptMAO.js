jQuery('document').ready(function(){
    jQuery('#plus').on('click',function(){
        var p = jQuery('#number').html();
        alert(p);
        p=parseInt(p);
        alert(p);
        p=p+1;
        jQuery('#number').empty();
        jQuery('#number').append(p);
        var price = jQuery('#price').html();
        price=parseInt(price);
        price= price*p;
        jQuery('#price').empty();
        jQuery('#price').append(price);
        jQuery('#countVal').val(p);
        jQuery('#priceVal').val(price);
    });
    jQuery('#minus').on('click',function(){
        var p = jQuery('#number').html();
        p=parseInt(p);
        p=p-1;
        jQuery('#number').empty();
        jQuery('#number').append(p);
        var price = jQuery('#price').html();
        price=parseInt(price);
        price= price/(p+1);
        jQuery('#price').empty();
        jQuery('#price').append(price);
        if(p==0)
        {
            jQuery('#zakaz').remove();
        }
    });
    jQuery('#radioB2').on('click', function(){
    $.ajax({
    url: 'test.php',
    success: function(data) {
        // jQuery('#adres').replaceWith('<p id="adres" style="margin-left: 1rem; "><?php echo $sh["adress"];?></p>');
        $('#adres').replaceWith(data);
        }
    });

        
    })
    jQuery('#radioB1').on('click', function(){
        jQuery('#adres').replaceWith('<input id="adres" type="text" aria-label="Адрес" class="form-control">');
        
    })

    jQuery('#delete').on('click', function(){
        jQuery('#zakaz').remove();
    })

    const myForm = $("#myForm");
    jQuery('#btn').on('click', function(){
        myForm.submit();
    })

    
});

