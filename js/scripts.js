jQuery('.btn-contact').on('click', function(e){
    jQuery('#myModal').css('display', 'block');
    jQuery('body').css('overflow', 'hidden');
});

jQuery('.btn-close').on('click', function(e){
    jQuery('#myModal').css('display', 'none');
    jQuery('body').css('overflow', 'auto');
});

jQuery(window).on('click', function(e){
    if(e.target.id === jQuery('#myModal')[0].id){
        jQuery('#myModal').css('display', 'none');
        jQuery('body').css('overflow', 'auto');
    }
});