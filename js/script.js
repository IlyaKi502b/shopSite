jQuery('document').ready(function(){
    const myForm = $("#myForm");
    jQuery('option').on('click', function(){
        myForm.submit();
    })
});

