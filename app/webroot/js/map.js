$(document).ready(function(){    
   
    $('.map > img').each(function(){
        $(this).hide();
    });
    $('.map > img').each(function(){
        $(this).load(function(){
            $(this).show(1000);
        });
    });
    $('.cover > img').each(function(){
        $(this).css('opacity' , '0');
    });
    $('.cover > img').each(function(){
        $(this).load(function(){
            $(this).fadeTo(1000 , 1);
        });
    });    


    $('.versecontent').each(function( i ){
        $(this).delay(i * 500).fadeIn();
    });
    

});
