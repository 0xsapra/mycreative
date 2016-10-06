$(document).on('ready', function() {
    $('.chat-btn').on('mouseover', function() {
            $('.chat-tip').show(150);
        });
        $('.notification-btn').on('mouseover', function() {
            $('.notification-tip').show(150);
        });    
        $('.chat-btn').on('mouseout', function() {
            $('.chat-tip').hide(10);
        });
        $('.notification-btn').on('mouseout', function() {
            $('.notification-tip').hide(10);
        });  
            var ti = 1;
            var opi = false; 
        $('.profile-btn').on('mouseover', function() {
            if(!opi)
            $('.profile-tip').show(150);
        });   
        $('.profile-btn').on('mouseout', function() {
            $('.profile-tip').hide(10);
        });  
        window.addEventListener('click', function(e) {
            if(e.target.className == 'profile-btn') {
                ++ti;
                $('.profile-tip').hide(10);
           if(ti % 2 == 0) {
                $('.bottom-menu').show(500);
                opi = true;
            }
           else{
                $('.bottom-menu').hide(100);
                opi = false;
            }
            }
            
            if(opi && e.target.className != 'profile-btn'){
                ++ti;
                if(e.target.className != 'bottom-menu') {
                    $('.bottom-menu').hide(100);
                    opi=false;
                }
                else {
                     $('.bottom-menu').show(500);
                    opi=true;
                }
            }
        }); 
    $('#info-frame').load(function() {
        $('#info-frame').contents().find('#t1').on('focusin', function() {
            $('.bar').hide(10);
            $('.first-bar').fadeIn(600);
        });
        $('#info-frame').contents().find('#t1').on('focusout', function() {
            $('.first-bar').fadeOut(200);
        });
        $('#info-frame').contents().find('#t2').on('focusin', function() {
            $('.bar').hide(10);
            $('.second-bar').fadeIn(600);
        });
        $('#info-frame').contents().find('#t2').on('focusout', function() {
            $('.second-bar').fadeOut(200);
        });
        $('#info-frame').contents().find('#t3').on('focusin', function() {
            $('.bar').hide(10);
            $('.third-bar').fadeIn(600);
        });
        $('#info-frame').contents().find('#t3').on('focusout', function() {
            $('.third-bar').fadeOut(200);
        });
        $('#info-frame').contents().find('#t4').on('focusin', function() {
            $('.bar').hide(10);
            $('.fourth-bar').fadeIn(600);
        });
        $('#info-frame').contents().find('#t4').on('focusout', function() {
            $('.fourth-bar').fadeOut(200);
        });       
    });
});