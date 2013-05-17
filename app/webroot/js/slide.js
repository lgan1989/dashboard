$('.listitem').click(function(){
        var current = $(this);
        var id = $(this).attr('id');
        var sid = id + "detail";
        if (  $('#' + sid).children('img').attr('src') == undefined )
            return;

        $('.itemdetail').each(function(){

            var idx =  $(this).attr('id');
           
                var flag = 0;
                if ( $(this).css('display') == 'block' ){
                    flag = 1;
                    
                    $(this).find('img').fadeOut();
                    $(this).find('span').fadeOut();
                    $(this).slideUp(
                        500,
                        function(){
                            $(this).css('display' , 'none') ;
                            if (sid != idx){
                                var obj  = $('#' + sid);
                                obj.css('display' , 'block');  

                                obj.slideDown(1000,function(){
                                        
                                        obj.children('img').fadeIn();
                                        obj.children('span').fadeIn();
                                });
                              
                            }
                        }
                    );

                }
                if (flag == 0 && sid == idx){
                    var obj  = $('#' + sid);
                    obj.css('display' , 'block');  

                    obj.slideDown(1000, function(){
                            obj.children('img').fadeIn();
                            obj.children('span').fadeIn();

                    });


                }

        });


    });

