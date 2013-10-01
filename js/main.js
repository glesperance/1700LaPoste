
$(document).ready(function ($) {

	$('.carousel').carousel({
	  interval: 3000
	})
  
    // Sidebar Toggle
    
    $('.btn-navbar').click( function() {
	    $('html').toggleClass('expanded');
    });
	
		
	// Waypoints Scrolling
	
	var links = $('.navigation').find('.niv');
	var button = $('.intro button');
    var section = $('section');
    var mywindow = $(window);
    var htmlbody = $('html,body');

    
    section.waypoint(function (direction) {

        var datasection = $(this).attr('data-section');

        if (direction === 'down') {
            $('.navigation li.niv[data-section="' + datasection + '"]').addClass('active').siblings().removeClass('active');
        }
        else {
        	var newsection = parseInt(datasection) - 1;
            $('.navigation li.niv[data-section="' + newsection + '"]').addClass('active').siblings().removeClass('active');
        }

    });
    
    mywindow.scroll(function () {
        if (mywindow.scrollTop() == 0) {
            $('.navigation li[data-section="1"]').addClass('active');
            $('.navigation li[data-section="2"]').removeClass('active');
        }
    });
    
    function goToByScroll(datasection) {
        
        if (datasection == 1) {
	        htmlbody.animate({
	            scrollTop: $('.section[data-section="' + datasection + '"]').offset().top
	        }, 500, 'easeOutQuart');
        }
        else {
	        htmlbody.animate({
	            scrollTop: $('.section[data-section="' + datasection + '"]').offset().top
	        }, 500, 'easeOutQuart');
        }
        
    }

    links.click(function (e) {
        e.preventDefault();
        var datasection = $(this).attr('data-section');
        goToByScroll(datasection);
    });
    
    button.click(function (e) {
        e.preventDefault();
        var datasection = $(this).attr('data-section');
        goToByScroll(datasection);
    });
    
    // Redirect external links
	
	$("a[rel='external']").click(function(){
		this.target = "_blank";
	}); 	
	
	
	// Modernizr SVG backup
	
	if(!Modernizr.svg) {
	    $('img[src*="svg"]').attr('src', function() {
	        return $(this).attr('src').replace('.svg', '.png');
	    });
	}
/*
	// Cache the Window object
	$window = $(window);
                
   $('#section1').each(function(){
     var $bgobj = $(this); // assigning the object
                  
            $(window).scroll(function() {

				// Scroll the background at var speed
				// the yPos is a negative value because we're scrolling it UP!								
				//var yPos = -($window.scrollTop() / 1);
				var ByPos = -($window.scrollTop() / 3); 

				// Put together our final background position
              	var coords = '50% '+ ByPos + 'px';

				// Move the background
				//$bgobj.css({ marginTop: yPos });
				$bgobj.css({ backgroundPosition: coords });

      		}); // window scroll Ends

 	});	
 
    $('#section2').each(function(){
        var $bgobj = $(this); // assigning the object
                    
            $(window).scroll(function() {

				// Scroll the background at var speed
				// the yPos is a negative value because we're scrolling it UP!								
				var yPos = -($window.scrollTop() / 1.4); 
				var ByPos = -($window.scrollTop() / 3); 

				// Put together our final background position
              	var coords = '50% '+ ByPos + 'px';

				// Move the background
				$bgobj.css({ marginTop: yPos });
				$bgobj.css({ backgroundPosition: coords });

	      	}); // window scroll Ends

	 });

 	$('#section3').each(function(){
 		var $bgobj = $(this); // assigning the object
                
            $(window).scroll(function() {

				// Scroll the background at var speed
				// the yPos is a negative value because we're scrolling it UP!								
				var yPos = -($window.scrollTop() / 1.8);
				var ByPos = -($window.scrollTop() / 3);

				// Put together our final background position
              	var coords = '50% '+ ByPos + 'px';

				// Move the background
				$bgobj.css({ marginTop: yPos });
				$bgobj.css({ backgroundPosition: coords });

          	}); // window scroll Ends

          	$bgobj.css({ bottom: 0 });

    });
*/

	function centerLogo() {
	  vph = $(window).innerHeight();
	  vh = $('#logo').outerHeight();
	  calcul = (vph - 300) / 2;
	  $('#logo').css({'margin': calcul + 'px auto'});
	}

	function centerSection2() {
	  vph = $(window).innerHeight(); 
	  calcul = vph / 6;
	  $('#section2 > .container-fluid > .row-fluid').css({'margin': calcul + 'px auto'});
	}

	function centerSection3() {
	  vph = $(window).innerHeight(); 
	  calcul = vph / 6;
	  $('#section3 > .container-fluid > .row-fluid').css({'margin': calcul + 'px auto'});
	}

	function centerSection4() {
	  vph = $(window).innerHeight(); 
	  vh = $('#section4 > .container-fluid > .row-fluid > .span3 > .row-fluid > .span1').outerHeight();
	  calcul2 = (vph - vh) / 2;
	  $('#section4 > .container-fluid > .row-fluid').css({'margin': calcul2 + 'px 0px'});
	}

	function resizeScreen() {
	  vph = $(window).innerHeight(); 
	  $('.section').css({'min-height': vph + 'px'});
	  $('#section4').css({'min-height': vph + 'px'});

	  centerLogo();
	  centerSection2();
	  centerSection3();
	  centerSection4();
	}

	$('#section2').affix({
	   // offset:{ y: 300}
	})

	resizeScreen();

	window.onresize = function(event) {
  resizeScreen();
}

});