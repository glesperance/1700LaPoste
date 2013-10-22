
$(function ($) {

  // Set jQuery special scroll events latency to 700ms
  jQuery.event.special.scrollstop.latency = 700

  // Redirect external links	
	$("a[rel='external']").click(function (){ this.target = "_blank"; }); 	

	// Modernizr SVG backup
	if(!Modernizr.svg) {
	    $('img[src*="svg"]').attr('src', function() {
	        return $(this).attr('src').replace('.svg', '.png');
	    });
	}

  // Callback to be called on window resize.
	function onResize() {
	  // Properly sizes all sections
    var viewPortheight    = $(window).innerHeight()
      , borderAdjustment  = $('#fixed-border-left').css('border-right-width').slice(0, -"px".length)
      , sectionsHeight    = (viewPortheight - borderAdjustment)

	  $('.section').css({ 'height': sectionsHeight + 'px' });
    $('.section.scroller').css({ 'min-height': sectionsHeight + 'px', 'height' : 'initial' });
    $('.section > .container-fluid-scroller').css({ 'height' : sectionsHeight + 'px' })

    // Sizes .letter-back elements. 
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

    // Setup Responsive Sidr Menu
    $('.responsive-menu-button').sidr({ source: '#nav' })

    $(document).scrollsnap({
        snaps     : '.section'
      , proximity : sectionsHeight / 2
    });

    $('iframe[width][height]').each(function () {
      var $iframe = $(this)
      $iframe.css({ 'height' : $iframe.attr('height') / $iframe.attr('width') * $iframe.width() })
    })

	}

  $('#section1').addClass('sticky')
  $('#section1 .container-fluid-scroller > :first-child .row-fluid > :first-child').addClass('current-only')
  $('#section1 .container-fluid-scroller > :first-child .row-fluid > .card .footer').addClass('current-only')

  // Setup Scrollers
  $('.scroller').each(function () {
    var $scroller = $(this)
    var scrollerWidth = $scroller.attr('scroller-width') || 100
    var $containerFluidScroller = $(this).children('.container-fluid-scroller')
    
    var isSticky = $scroller.hasClass('sticky')
    var $firstSlide = $containerFluidScroller.find('> :first-child')
    
    var scrollerLength = 0

    $containerFluidScroller.children().each(function () {
      var $child = $(this)
      scrollerLength += (+$child.attr('slide-width') || 1)
    })

    var scrollerLengthPercent = scrollerLength * (scrollerWidth)

    $containerFluidScroller.css({ 
        'width'       : scrollerLengthPercent + '%'
    })

    $containerFluidScroller.children().each(function () {
      var $child      = $(this)
        , childWidth  = +$child.attr('slide-width') || 1

      var childWidthPercent = childWidth / scrollerLength * (scrollerWidth)
      $child.css({ 'width' : childWidthPercent + '%' })
    })

    $(window).resize(function () {
      scroll({ refresh : true })
    })

    function getDistance($slide) {
      var alignLeft = $scroller.attr('slide-align')
      var distance = alignLeft ? 0 : -1

      $containerFluidScroller.children().each(function () {
        
        if (alignLeft && $slide.is(this)) return false
        
        distance += +$(this).attr('slide-width') || 1
        
        if ($slide.is(this)) return false
      })

      return Math.max(distance, 0)
    }

    function scroll(options) {
      if (!options) options = {}

      var $currentSlide = $containerFluidScroller.children('[current=true]')
      if (!$currentSlide.length) $currentSlide = $containerFluidScroller.children().first()
      
      var $slide
      if (options.refresh) {
        $slide = $currentSlide
      }
      else if (options.prev) {
        $slide = $currentSlide.prev()
        if (!$slide.length) $slide = $containerFluidScroller.children().last()
      } 
      else {
        $slide = $currentSlide.next()
        if (!$slide.length) $slide = $containerFluidScroller.children().first()
      }

      var distance = getDistance($slide)

      $slide.attr('current', true)
      $slide.siblings().attr('current', false)

      $scroller.attr('slide-first', !$slide.prev().length)
      $scroller.attr('slide-last', !$slide.next().length)

      var scrollPositionPercent =  distance * (scrollerWidth)
      $containerFluidScroller.css({ 'left' : '-' + scrollPositionPercent +  '%' })

      if (isSticky) {
        var relativeSizeAdjustment = $firstSlide.outerWidth() / $firstSlide.width()
        $firstSlide.find('> .row-fluid').css({
          'left' : Math.ceil(scrollPositionPercent * relativeSizeAdjustment)  + '%'
        })
      }
    }

    $containerFluidScroller.find('.next').click(function () { scroll() })
    $containerFluidScroller.find('.prev').click(function () { scroll({ prev : true }) })

    $containerFluidScroller.siblings('.next').click(function () { scroll() })
    $containerFluidScroller.siblings('.prev').click(function () { scroll({ prev : true }) })

    $scroller.attr('slide-first', true)
  })

  // Setup nav bar secondary menu
  $('.nav > li').each(function () {
    var $menu = $(this)
    var $anchor = $menu.children('a')
    var $secondary = $menu.children('.secondary')

    if ($secondary.length)
      $menu.hover(function () {
        $menu.addClass('show-secondary')
        $anchor.css({ 'padding-right': $secondary.width() + 20 + 'px' })
      }, function () {
        $menu.removeClass('show-secondary')
        $anchor.css({ 'padding-right': 0 })
      })

  })

  // Setup onResize callback
  $(window).resize(onResize)

  // Hacks for Firefox not having the element sized properly after load
  // This is perhaps due to LESS beign compiled on-the-fly... 
  // this should be investigated further.
	setTimeout(onResize, 0);
  setTimeout(onResize, 100);

});

// SMOOTH SCROLL TO

 (function() {

     'use strict';

    // Feature Test
    if ( 'querySelector' in document && 'addEventListener' in window && Array.prototype.forEach ) {

        // Function to animate the scroll
        var smoothScroll = function (anchor, duration) {

            // Calculate how far and how fast to scroll
            var startLocation = window.pageYOffset;
            var endLocation = anchor.offsetTop;
            var distance = endLocation - startLocation;
            var increments = distance/(duration/16);
            var stopAnimation;

            // Scroll the page by an increment, and check if it's time to stop
            var animateScroll = function () {
                window.scrollBy(0, increments);
                stopAnimation();
            };

            // If scrolling down
            if ( increments >= 0 ) {
                // Stop animation when you reach the anchor OR the bottom of the page
                stopAnimation = function () {
                    var travelled = window.pageYOffset;
                    if ( (travelled >= (endLocation - increments)) || ((window.innerHeight + travelled) >= document.body.offsetHeight) ) {
                        clearInterval(runAnimation);
                    }
                };
            }
            // If scrolling up
            else {
                // Stop animation when you reach the anchor OR the top of the page
                stopAnimation = function () {
                    var travelled = window.pageYOffset;
                    if ( travelled <= (endLocation || 0) ) {
                        clearInterval(runAnimation);
                    }
                };
            }

            // Loop the animation function
            var runAnimation = setInterval(animateScroll, 16);
       
        };

        // Define smooth scroll links
        var scrollToggle = document.querySelectorAll('.scroll');

        // For each smooth scroll link
        [].forEach.call(scrollToggle, function (toggle) {

            // When the smooth scroll link is clicked
            toggle.addEventListener('click', function(e) {

                // Prevent the default link behavior
                e.preventDefault();

                // Get anchor link and calculate distance from the top
                var dataID = toggle.getAttribute('href');
                var dataTarget = document.querySelector(dataID);
                var dataSpeed = toggle.getAttribute('data-speed');

                // If the anchor exists
                if (dataTarget) {
                    // Scroll to the anchor
                    smoothScroll(dataTarget, dataSpeed || 500);
                }

            }, false);

        });

    }

 })();