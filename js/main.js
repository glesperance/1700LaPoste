
$(document).ready(function ($) {

	$('.carousel').carousel({
	  interval: 3000
	})
  
    // Sidebar Toggle
    
    $('.btn-navbar').click( function() {
	    $('html').toggleClass('expanded');
    });
	
		
	// Waypoints Scrolling
	
	var links = $('.navbar').find('.niv');
	var button = $('.intro button');
    var section = $('section');
    var mywindow = $(window);
    var htmlbody = $('html,body');

    
    section.waypoint(function (direction) {

        var datasection = $(this).attr('data-section');

        if (direction === 'down') {
            $('.navbar li.niv[data-section="' + datasection + '"]').addClass('active').siblings().removeClass('active');
        }
        else {
        	var newsection = parseInt(datasection) - 1;
            $('.navbar li.niv[data-section="' + newsection + '"]').addClass('active').siblings().removeClass('active');
        }

    });
    
    mywindow.scroll(function () {
        if (mywindow.scrollTop() == 0) {
            $('.navbar li[data-section="1"]').addClass('active');
            $('.navbar li[data-section="2"]').removeClass('active');
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
                
   $('#accueil').each(function(){
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
 
    $('#a-propos').each(function(){
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

 	$('#expositions').each(function(){
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

	function onResize() {
	  var vph = $('#fixed-border-left').height() - $('#fixed-border-left').css('border-right-width').slice(0, -"px".length); 
	  $('.section').css({'min-height': vph + 'px'});
    // Sizes letter back elements. 
    // This is needed since borders do not support percentages (%) as width
    var $letterBacks = $('.section .letter-back')
    $letterBacks.each(function () {
      var $this = $(this)
      $this.css({
          'border-top-width'    : $this.parent().height() * 1/ 4
        , 'border-right-width'  : $this.parent().width()  * 1/ 2
        , 'border-bottom-width' : $this.parent().height() * (1 - 1/4)
        , 'border-left-width'   : $this.parent().width()  * (1 - 1/2)
      })
    })
	}

	// $('#a-propos').affix({
	//    // offset:{ y: 300}
	// })

  $(window).resize(onResize)

	onResize();

});