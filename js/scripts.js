jQuery('.btn-contact').on('click', function(e){
    jQuery('#myModal').css('display', 'block');
    jQuery('body').css('overflow', 'hidden');
    jQuery('.ref').val(jQuery('.reference').text());
});

jQuery('.btn-contact-2').on('click', function(e){
    jQuery('#myModal').css('display', 'block');
    jQuery('body').css('overflow', 'hidden');
    jQuery('.ref').val(jQuery('.reference').text());
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

jQuery('.prev').on('mouseover', function(e){
    jQuery('.currentImg').attr('src', jQuery('.prevImg').attr('src'));
    jQuery('.currentImg').css('display', 'flex');
});

jQuery('.prev').on('mouseout', function(e){
    jQuery('.currentImg').css('display', 'none');
});

jQuery('.next').on('mouseover', function(e){
    jQuery('.currentImg').attr('src', jQuery('.nextImg').attr('src'));
    jQuery('.currentImg').css('display', 'flex');
});

jQuery('.next').on('mouseout', function(e){
    jQuery('.currentImg').css('display', 'none');
});