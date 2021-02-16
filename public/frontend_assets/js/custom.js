$(function(){
	


	$(window).scroll(function () {
		
		if($(this).scrollTop() > 10) {
			
			
			$(".header").addClass("HeaderFixed");
						
		} else {
			
			$(".header").removeClass("HeaderFixed");
		}
		
	});

	
	$(".iconMenuMob").click(function () {
		
		$("body,html").addClass("overflowH");
		$(".menuMobile").fadeIn();
		$(".transformPage,.menuMobile .menuContent").addClass("active");
		
	});
	
	$(".closeX,.BgClose").click(function () {
		
		$("body,html").removeClass("overflowH");
		$(".menuMobile").fadeOut();
		$(".transformPage,.menuMobile .menuContent").removeClass("active");
		
	});
	

	
	$(".header .iconMenuPc").click(function(){
		
		$(".header .menuPc").slideToggle();
		
	});
	
	$('body,html').on('click', function(e) {
		var container = $(".header .iconMenuPc,.header .iconMenuPc *"),
		Sub = $(".header .menuPc");
		

	    if( !$(e.target).is(container) ){
	        Sub.slideUp();
	    }
	
	});
	
	
	$(".closeX,.BgClose,.menuMobile .menuContent .menuRes li a").click(function () {
		
		$("body").removeClass("overflowH");
		$(".menuMobile").fadeOut();
		$(".transformPage,.menuMobile .menuContent").removeClass("active");
		
	});
	
	
	$('.the-slider-inner').bxSlider({
		useCSS: false,
		auto: true,
		controls: true,
		pager: true,
		autoHover: true,
		responsive: true,
		nextSelector: '#slider-next',
		prevSelector: '#slider-prev',
		nextText: '<i class="fa fa-angle-right"></i>',
		prevText: '<i class="fa fa-angle-left"></i>'
	});
	
	
	
	
	
	
	$(".inputStyle input").keyup(function() {
	    if($(this).val().length > 0) {
	         $(this).parent().addClass("active");
	    } else {
	        $(this).parent().removeClass("active");
	    }
	});
	
	$(".newCard .form .formCard .iconLeft").click(function() {
		
		
		
	});
	

	$( ".datepicker" ).datepicker();
	
	$( ".selectmenu" ).selectmenu();
	
	$.scrollIt({topOffset:-110});
	
	/* WOW Js */
    new WOW().init();
 
    $(".newCard .form .formCard .numberIcon").click(function () {
        $(".newCard .form .formCard .inputStyle.inputNumb").append("<div class='newNum' style='position: relative;margin-top:15px'><div class='inputStyle'><input type='number' style='padding-left:30px' name='Mobile[]' placeholder='اضف رقم اخر'/><i style='position: absolute;left: 20px;top: 22px;font-size:17px;color: #000;cursor: pointer;' class='fa fa-close remove'></i></div></div>");
        $(".newCard .form .formCard .inputStyle .remove").click(function () {
            $(this).parent().remove();
        });
	 	$(".inputStyle input").focus(function () {
			
			$(this).parent().addClass("active");
			
		}).blur(function () {
			
			$(this).parent().removeClass("active");
			
		});
        
    });

    
	$(".inputStyle input").focus(function () {
		
		$(this).parent().addClass("active");
		
	}).blur(function () {
		
		$(this).parent().removeClass("active");
		
	});
    
 	/****** Start Tabs ******/
	
	$(".features .tabsBtns li").click(function () {
		
		var myButton = $(this).attr("id"),
			parent = $(this).parent().attr("id");
		
		$(this).addClass("active").siblings().removeClass("active");
		
		$(".features .tab").hide();
		
		$(".features ." + myButton).fadeIn();
		
	});
	
	/****** End Tabs ******/
    
	
});
