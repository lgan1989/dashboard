$(document).ready(function(){    

    var imgArray = [];

    $('.thumb img').each(function(){
        imgArray.push($(this));
    });



    imgArray.sort(function(){
        return Math.random() > 0.5 ? 1 : -1;
    });

    $.each(imgArray , function(index , obj){
        obj.delay(index * 100).animate({opacity:1});
    });

    $('#cover img').load(function(){
        $(this).fadeIn('slow');
    });

});
