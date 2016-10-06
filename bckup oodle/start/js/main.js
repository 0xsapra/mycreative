        $(document).ready(function() {
    //     $("#overlay-loader").fadeOut(3000,function() {
    //     $("#entire-page").fadeIn(1000);
    // });  
        
        var speed = 6000;
        var slideInterval;
        var slides = [$('.text-1'),$('.text-2'), $('.text-3')];
        var currentIndex = 0;
        var nextIndex;
        var runnnig = true;
        
        function hideSlide(hid) {
            if(currentIndex == 0) {
                $('#'+hid[0].id).hide("slide", { direction: "up" }, 1000);
                $('#'+hid[1].id).hide("slide", { direction: "right" }, 1000);
                $('#'+hid[2].id).hide("slide", { direction: "left" }, 1000);
            }
            if(currentIndex == 1) {
                $('#'+hid[0].id).hide("slide", { direction: "up" }, 1000);
                $('#'+hid[1].id).hide("slide", { direction: "left" }, 1000);
                $('#'+hid[2].id).hide("slide", { direction: "right" }, 1000);
            }
            if(currentIndex == 2) {
                $('#'+hid[0].id).hide("slide", { direction: "down" }, 1000);
                $('#'+hid[1].id).hide("slide", { direction: "right" }, 1000);
                $('#'+hid[2].id).hide("slide", { direction: "left" }, 1000);
            }
        }
        
        function showSlide(sho) {
            if(currentIndex == 0) {
                $('#'+sho[0].id).show("slide", { direction: "down" }, 3000);
                $('#'+sho[1].id).show("slide", { direction: "left" }, 3000);
                $('#'+sho[2].id).show("slide", { direction: "right" }, 3000);
            }
            if(currentIndex == 1) {
                $('#'+sho[0].id).show("slide", { direction: "down" }, 3000);
                $('#'+sho[1].id).show("slide", { direction: "right" }, 3000);
                $('#'+sho[2].id).show("slide", { direction: "left" }, 3000);
            }
            if(currentIndex == 2) {
                $('#'+sho[0].id).show("slide", { direction: "up" }, 3000);
                $('#'+sho[1].id).show("slide", { direction: "left" }, 3000);
                $('#'+sho[2].id).show("slide", { direction: "right" }, 3000);
            }
        }
        
        function showNextSlide() {
            if(currentIndex == slides.length-1) {
                nextIndex = 0;
                hideSlide(slides[currentIndex]);
                showSlide(slides[nextIndex]);
                currentIndex = 0;
            }
            else {
                nextIndex = currentIndex + 1;
                hideSlide(slides[currentIndex]);
                showSlide(slides[nextIndex]);
                ++currentIndex;
            }
        }
        
        function showPrevSlide() {
            if(currentIndex == 0) {
                nextIndex = (slides.length-1);
                hideSlide(slides[currentIndex]);
                showSlide(slides[nextIndex]);
                currentIndex = (slides.length-1);
            }
            else {
                nextIndex = currentIndex - 1;
                hideSlide(slides[currentIndex]);
                showSlide(slides[nextIndex]);
                --currentIndex;
            }
        }
        
        $('#prevB').click(function() {
            showPrevSlide();
            runnnig = false;
        });
        $('#nextB').click(function() {
            showNextSlide();
            runnnig = false;
        });
        
        slideInterval = setInterval(function() {
            if(runnnig) {
                showNextSlide(); 
            }
        }, speed);
        
        $('#main-text').mouseenter(function() {
            $('#prevB').animate(1000,'ease',function() {$('#prevB').css('visibility', 'visible')});
            $('#nextB').animate(1000,'ease',function() {$('#nextB').css('visibility', 'visible')});
        });
        $('#main-text').mouseleave(function() {
            $('#prevB').animate(2000,'slow',function() {$('#prevB').css('visibility', 'hidden')});
            $('#nextB').animate(2000,'slow',function() {$('#nextB').css('visibility', 'hidden')});
        });
        
        $(".toScroll").on('click',function(e) {
            var url = e.target.href;
            var hash = url.substring(url.indexOf("#")+1);
            $('html, body').animate({
            scrollTop: $('#'+hash).offset().top
            }, 1000);
            return false;
        });
        
         $('#upper-log').on('click',function() {
            $('#log-sign-window').fadeIn(1000);
        });
        
        $('#inside-log').on('click', function() {
            $('#inside-log').addClass('linkSelected');
            $('#inside-sign').removeClass('linkSelected');
            $('#sign-window').fadeOut(20);
            $('#log-window').fadeIn(100);
        });
        $('#inside-sign').on('click', function() {
            $('#inside-sign').addClass('linkSelected');
            $('#inside-log').removeClass('linkSelected');
            $('#log-window').fadeOut(20);
            $('#sign-window').fadeIn(100);
        });
        $('#closer').on('click', function() {
            $('#log-sign-window').fadeOut(500);
        });
        $('.lily').on('click', function() {
            $('#log-sign-window').fadeOut(500);
        });
            var op = 0.9;
            var trig = false;
        setInterval(function() {
            if(op >= 0.6 && !trig) {
                op -= 0.1;
            }
            else {
                trig = true;
                if(op == 0.9) {
                    trig = false;
                }
                op += 0.1;
            }
            $('#main-text').animate(1500,'slow',function() {$('#main-text').css('opacity', ''+op)});
        }, 2000);    
        //for text fields
        var tempText, te;
        $('.lt').on('focusin', function(e){
            tempText = e.target.name;
            te = e.target.placeholder;
            $('#log'+tempText).html(te);
            $('#log'+tempText).show(300);
            e.target.placeholder = "";
        });
        $('.lt').on('focusout', function(e){
            $('#log'+tempText).html(tempText);
            $('#log'+tempText).hide(1);
            e.target.placeholder = te;
        });
        
        $('.st').on('focusin', function(e){
            tempText = e.target.name;
            te = e.target.placeholder;
            if(te === 'Retype the Password') {
                $('#sign'+tempText).css('left','47%');
            }else if(te === 'Password') {
                $('#sign'+tempText).css('left','3%');
            }
            $('#sign'+tempText).html(te);
            $('#sign'+tempText).show(300);
            e.target.placeholder = "";
        });
        $('.st').on('focusout', function(e){
            $('#sign'+tempText).html(tempText);
            $('#sign'+tempText).hide(1);
            e.target.placeholder = te;
        });

        window.addEventListener('scroll',function(){
            document.getElementById("header2").style.backgroundColor="rgba(255, 255, 255,"+window.pageYOffset/($('.adjust').offset().top-20)+")";
        });
            
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
            
        //NAVIGATION MENU
            var id;
            $('.navi').on('mouseover', function(e) {
                $('.nav-desc').fadeOut(10);
                id = e.target.id + "-desc";
                $('.'+id).show('slide', {direction: 'left'}, 200);
            });
            $('.nav-desc').on('mouseleave', function() {
                $('.nav-desc').hide('slide', {direction: 'right'}, 200);
            });
            $('.life-saver').on('mouseover', function() {
                $('.nav-desc').hide('slide', {direction: 'right'}, 200);
            });
    });
            
     //fixing retype password
$('#pass_check').on('focusin', function() {
   
        $('.pass-saver').css({
        'position': 'absolute',
    'width': '84%',
    'left': '2vh',
    'height': '5vh',
    'padding': '4vh 2vh',
    'padding-bottom': '3vh',
    'bottom': '25%'
    });
    $('.pass-saver .text-field').css({
        'width': '45%',
   'margin-top': '2vh'
    });
    $('label').css('margin-bottom','3vh');
    $('#pass_check_again').show(800);
});


            
// form validation time

// LOG IN WALA
var v1,v2,v3,v4,v5,v6,vl2,vl3;
$('.lt').on('focusout', function(e) {
    var erri = e.target.id;
    if(!$('#'+erri).val().trim()) {
        $('.'+erri+'-error').html("* This field should not be left blank");
        if(erri === "log-username") {
            vl2 = false;
        }
    }
    else {
        $('.'+erri+'-error').html("");
        if(erri === "log-username") {
            vl2 = true;
        }
    }
});
$('#login-pass').on('focusout', function() {
    var pass = $('#login-pass').val();
    var m = checkPass(pass);
    if(m !== "") {
        m = "Password is incorrect. Check again!";
        vl3 = false;
    }
    else {
        vl3 = true;
    }
    $('.log-password-error').html(m);   
});

// SIGN UP WALA
$('.st').on('focusout', function(e) {
    var erri = e.target.id;
    if(!$('#'+erri).val().trim()) {
        $('.'+erri+'-error').html("* This field should not be left blank");
        if(erri === "sign-name") {
            v1 = false;
        } else if(erri === "sign-username") {
            v2 = false;
        } else if(erri === "sign-email") {
            v3 = false;
        } else if(erri === "sign-mob") {
            v4 = false;
        }
        
    }
    else {
        $('.'+erri+'-error').html("");
        if(erri === "sign-name") {
            v1 = true;
        } else if(erri === "sign-username") {
            v2 = true;
        } else if(erri === "sign-email") {
            v3 = true;
        } else if(erri === "sign-mob") {
            v4 = true;
        }
    }
});

function checkPass(pass_val) {
    if (pass_val.length < 8) {
        v5 = false;
        return("* Password is way too short");
    } else if (pass_val.length > 50) {
        v5 = false;
        return("* Password is way too long");
    } else if (pass_val.search(/\d/) == -1) {
        v5 = false;
        return("* Password should contain a number");
    } else if (!/[a-z]/.test(pass_val) || !/[A-Z]/.test(pass_val)) {
        v5 = false;
        return("* Password should contain both lowercase and uppercase characters");
    } else if (pass_val.search(/[^a-zA-Z0-9\!\@\#\$\%\^\&\*\(\)\_\+\.\,\;\:]/) != -1) {
        v5 = false;
        return("* It has some bad characters");
    }
    else {
        v5 = true;
        return("");
    }
}

$('#pass_check').on('focusout', function() {
    var pass = $('#pass_check').val();
    $('.sign-password').html(checkPass(pass));   
});
$('#pass_check_again').on('focusout', function() {
    if($('#pass_check_again').val() !== $('#pass_check').val()) {
        v6 = false;
        $('.sign-password').html("* Password does not match in both fields");
    } else {
        if($('#pass_check_again').val().trim() === "") {
            v6 = false;
            $('.sign-password').html("* Password field cannot be left blank");
        }
        else {
        v6 = true;    
        $('.sign-password').html("");
        }
    }
});

function isFormValid() {
    if(v1 && v2 && v3 && v4 && v5 && v6) {
        return true;
    }
    else {
        return false;
    }
}

$('#oodSign').on('submit', function(e) {
    if(isFormValid()) {
        if($("#checky").is(':checked')) {
        alert("THANKS FOR CHOOSING OODLEE...YOU ARE WELCOME");
        return true;
        } else {
            $(".checky-errr").html("* You must certify your age first");
            return false;
        }
    }
    else {
        alert("FORM SHI NI BHARA BE TUNE");
        e.preventDefault();
    }
});
$('#oodLog').on('submit', function(e) {
    if(vl2 && vl3) {
        //alert("YOU WILL BE LOGGED IN SHORTLY")
    }
    else {
        alert("SAARI FIELD BHARO AND TRY AGAIN");
        e.preventDefault();
        return false;
    }
});
