/* Скрипт формы обратной связи */
// Форма для виз

    $('.show-popup').on('click', function () {
        var title = $(this).attr('data-title');
       // if( title == undefined || title == ''){
            var title = $(this).text();
            $('#popup input[name="type"]').attr('value',title);
       // }
      //  else{
      //      $('#popup input[name="type"]').attr('value',title);
     //   }


    });
/*Castom JS*/
//отправка формы обратной связи
$('#submit-send').on('click', function(event){
    $('#submit-send').attr('disabled', true);
    var data = $('form#popup').serialize();
    $.ajax({
        url: '/contact',
        method: "POST",
        data: data,
        dataType : "json",
        success: function(data){
            //console.info('Server response: ', data);
            if(data.success){
                swal(trans['base.success'], "", "success");
                jQuery("#popup").trigger("reset");
                $('.popup-callback, #overlay').hide();
                $("#submit-send").attr('disabled', false);
            }
            else{
                swal(trans['base.error'], data.message, "error");
                $("#submit-send").attr('disabled', false);
            }
        },
        error:function(data){
            swal(trans['base.error']);
            $("#submit-send").attr('disabled', false);
            //  jQuery("#resume-form").trigger("reset");
        }

    },"json");
    event.preventDefault();
});
// scroll body to 0px on click
/*
$('.arrow-top').click(function () {
    $('body,html').animate({
        scrollTop: 0
    }, 800);
    return false;
});
*/
//Popup OPEN
    $('.show-popup').click( function(event){
        var title = $(this).attr('data-title');
        // if( title == undefined || title == ''){
        var title = $(this).text();
        $('#popup input[name="type"]').attr('value',title);
        // }
        //  else{
        //      $('#popup input[name="type"]').attr('value',title);
        //   }


        $('#overlay').fadeIn(400,
            function(){
                $('.popup-callback')
                    .css('display', 'block')
                    .animate({opacity: 1, top: '50%'}, 200);
            });
    });
//Popup ClOSE
    $('#modal_close, #overlay').click( function(){
        $('.popup-callback')
            .animate({opacity: 0, top: '45%'}, 200,
            function(){
                $(this).css('display', 'none');
                $('#overlay').fadeOut(400);
            }
        );
    });
//Popup news OPEN
$('.show-popup-news').click(function(event){
   var new_id = $(this).attr('data-new-id');
   $('#overlay').fadeIn(400,
        function(){
            // console.log(service_id);
            $('[data-id='+new_id+']')
                .css('display', 'block')
                .animate({opacity: 1, top: '45%'}, 200);
        });
   //Popup news ClOSE
   $('.close_news, #overlay').click( function(){
       $('[data-id='+new_id+']')
           .animate({opacity: 0, top: '45%'}, 200,
           function(){
                $(this).css('display', 'none');
                $('#overlay').fadeOut(400);
            }
       );
   });
});
//Popup advice
//Popup advice OPEN
$('.show-popup-advices').click(function(event){
    var advice_id = $(this).attr('data-advice-id');
    $('#overlay').fadeIn(400,
        function(){
            // console.log(service_id);
            $('[data-id='+advice_id+']')
                .css('display', 'block')
                .animate({opacity: 1, top: '45%'}, 200);
        });
    //Popup advice ClOSE
    $('.close_question, #overlay').click( function(){
        $('[data-id='+advice_id+']')
            .animate({opacity: 0, top: '45%'}, 200,
            function(){
                $(this).css('display', 'none');
                $('#overlay').fadeOut(400);
            }
        );
    });
});
//Popup services
$('.services-block_short-description').click( function(event){
    var service_id = $(this).parent('li').attr('data-service-id');
    //Popup services OPEN
    $('#overlay').fadeIn(400,
        function(){
           // console.log(service_id);
            $('[data-id='+service_id+']')
                .css('display', 'block')
                .animate({opacity: 1, top: '25%'}, 200);
        });
    //Отправка формы для services
    $('button#'+service_id+'').on('click', function(event){
        var title = $(this).attr('data-title');
        //Добавление в форму названия Services
        if( title == undefined || title == ''){
            var title = $(this).text();
            $('.popup-services input[name="type"]').attr('value',title);
        }
        else{
            $('.popup-services input[name="type"]').attr('value',title);
        }
        $('button#'+service_id+'').attr('disabled', true);
        var data = $('form#popup-services-'+service_id+'').serialize();
        $.ajax({
            url: '/contact',
            method: "POST",
            data: data,
            dataType : "json",
            success: function(data){
                //console.info('Server response: ', data);
                if(data.success){
                    swal(trans['base.success'], "", "success");
                    $('#popup-services-'+service_id+'').trigger("reset");
                    $('.popup-services, #overlay').hide();
                    $('button#'+service_id+'').attr('disabled', false);
                }
                else{
                    swal(trans['base.error'], data.message, "error");
                    $('button#'+service_id+'').attr('disabled', false);
                }
            },
            error:function(data){
                swal(trans['base.error']);
                $('button#'+service_id+'').attr('disabled', false);
                //  jQuery("#resume-form").trigger("reset");
            }

        },"json");
        event.preventDefault();
    });
    //Popup services ClOSE
    $('.close_services, #overlay').click( function(){
        $('[data-id='+service_id+']')
            .animate({opacity: 0, top: '45%'}, 200,
            function(){
                $(this).css('display', 'none');
                $('#overlay').fadeOut(400);
            }
        );
    });
});

//отправка формы для callback
$('#submit-send-callback').on('click', function(event){
    event.preventDefault();
    $('#submit-send-callback').attr('disabled', true);
    var data = $('form.callback').serialize();
    $.ajax({
        url: '/callback',
        method: "POST",
        data: data,
        dataType : "json",
        success: function(data){
            //console.info('Server response: ', data);
            if(data.success){
                swal(trans['base.success'], "", "success");
                jQuery(".callback").trigger("reset");
                $("#submit-send-callback").attr('disabled', false);
            }
            else{
                swal(trans['base.error'], data.message, "error");
                $("#submit-send-callback").attr('disabled', false);
            }
        },
        error:function(data){
            swal(trans['base.error']);
            $("#submit-send-callback").attr('disabled', false);
            //  jQuery("#resume-form").trigger("reset");
        }
    },"json");
});

//
