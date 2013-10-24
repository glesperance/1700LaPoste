_throttle = function(func, wait, options) {
    var context, args, result;
    var timeout = null;
    var previous = 0;
    options || (options = {});
    var later = function() {
      previous = options.leading === false ? 0 : new Date;
      timeout = null;
      result = func.apply(context, args);
    };
    return function() {
      var now = new Date;
      if (!previous && options.leading === false) previous = now;
      var remaining = wait - (now - previous);
      context = this;
      args = arguments;
      if (remaining <= 0) {
        clearTimeout(timeout);
        timeout = null;
        previous = now;
        result = func.apply(context, args);
      } else if (!timeout && options.trailing !== false) {
        timeout = setTimeout(later, remaining);
      }
      return result;
    };
  };
$(function ($) {

  // Set jQuery special scroll events latency to 700ms
  jQuery.event.special.scrollstop.latency = 100

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
      , sectionsHeight    = (viewPortheight)

	  $('.section').css({ 'height': sectionsHeight + 'px' });
    $('.section.scroller').css({ 'min-height': sectionsHeight + 'px', 'height' : 'initial' });
    $('.section > .container-fluid-scroller').css({ 'height' : sectionsHeight + 'px' })

    // Sizes .letter-back elements. 
    // This is needed since borders do not support percentages (%) as width
    var $letterBacks = $('.section .letter-back')
    $letterBacks.each(function () {
      var $this = $(this)
      $this.css({
          'border-top-width'    : $this.parent().height() * 1/ 2.4
        , 'border-right-width'  : $this.parent().width()  * 1/ 2
        , 'border-bottom-width' : $this.parent().height() * (1 - 1/4)
        , 'border-left-width'   : $this.parent().width()  * (1 - 1/2)
      })
    })

    // Setup Responsive Sidr Menu
    $('.responsive-menu-button').sidr({ source: '#nav' })

    $(document).scrollsnap({
        snaps     : '.section'
      , proximity : sectionsHeight / 2 - 100
    });

    $('iframe[width][height]').each(function () {
      var $iframe = $(this)
      $iframe.css({ 'height' : $iframe.attr('height') / $iframe.attr('width') * $iframe.width() })
    })

	}

  /****************************************************************************
   * Sticky Section Demo Code. Add to templates and remove in Prod.
   */
 // $('#section1').addClass('sticky')
 // $('#section1 .container-fluid-scroller > :first-child .row-fluid > :first-child').addClass('current-only')
 // $('#section1 .container-fluid-scroller > :first-child .row-fluid > .card .footer').addClass('current-only')
  /***************************************************************************/

  // Setup Scrollers
  $('.scroller').each(function () {
    var $scroller = $(this)
    var scrollerWidth = $scroller.attr('scroller-width') || 100
    var $containerFluidScroller = $(this).children('.container-fluid-scroller')
    
    var isSticky = $scroller.hasClass('sticky')
    
    var scrollerLength = 0
    var initialSlidesWidth = 0
    var $lastInitialSlide

    $containerFluidScroller.children().each(function () {
      var $child = $(this)
      var childWidth = +$child.attr('slide-width') || 1
      scrollerLength += childWidth

      if (initialSlidesWidth + childWidth <= 1) {
        initialSlidesWidth += childWidth
        $lastInitialSlide = $child
      }
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
      var distance = alignLeft ? 0 : -initialSlidesWidth

      $containerFluidScroller.children().each(function () {
        
        if (alignLeft && $slide.is(this)) return false
        
        distance += +$(this).attr('slide-width') || 1
        
        if ($slide.is(this)) return false
      })
      
      return Math.min(Math.max(distance, 0), scrollerLength - 1)
    }

    function scroll(options) {
      if (!options) options = {}

      var $currentSlide = $containerFluidScroller.children('[current=true]')
      if (!$currentSlide.length) $currentSlide = $lastInitialSlide
      
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

      $scroller.attr('slide-first', $slide.is($lastInitialSlide))
      $scroller.attr('slide-last', !$slide.next().length)

      var scrollPositionPercent =  distance * (scrollerWidth)
      $containerFluidScroller.css({ 'left' : '-' + scrollPositionPercent +  '%' })

      if (isSticky) {
        var $rowFluid = $firstSlide.find('> .row-fluid')
        var isFireFox = !!window.sidebar
        
        var relativeSizeAdjustment

        if (isFireFox)  {
          relativeSizeAdjustment = ($firstSlide.outerWidth() / $rowFluid.width())
          $rowFluid.css({
            'transform' : 'translate3d(' + Math.ceil(scrollPositionPercent * relativeSizeAdjustment)  + '%' + ', 0, 0)'
          })
        }
        else {
          relativeSizeAdjustment = ($firstSlide.outerWidth() / $firstSlide.width())
          $rowFluid.css({
            'left' : Math.ceil(scrollPositionPercent * relativeSizeAdjustment)  + '%'
          })
        }
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

  // Setup smooth scroll
  $('#nav').bind('click', 'ul li a', function(event) {
    if (event.target.hash) $.scrollTo(event.target.hash,{
        duration : 500
      , easing   : 'swing'
      , offset   : - $(event.target.hash).attr('translate-y-offset') || 0
    });
  });

  // Bottom Section Scrolling over content Effect & Red png Effect
  var $contactSlide = $('#contact')
  var $previousSlide = $contactSlide.siblings(':nth-child(' + $contactSlide.index() + ')')
  var $previousSlideChildren = $previousSlide.children()
  
  var $redPng = $('#thepng-red')

  $(window).scroll(_throttle(function () {
    var contactRect = $contactSlide[0].getBoundingClientRect()
    var previousSlideRect = $previousSlide[0].getBoundingClientRect()
    
    if (previousSlideRect.top > $(window).innerHeight()) return

    if (contactRect.top > $(window).innerHeight())
      translateY = 0
    else
      translateY = Math.min(
          Math.max(
              $previousSlide.height() - contactRect.top - ($previousSlide.height() - $(window).innerHeight())
            , 0
          )
        , $contactSlide.height()
      )

    var isFireFox = !!window.sidebar
    var transformString = isFireFox 
      ? 'translate3d(0,' + Math.round(translateY) + 'px, 0)'
      : 'translate(0,' + Math.round(translateY) + 'px)'

    var opacity = 1 - (translateY / $contactSlide.height()) * 0.5
    
    if (isFireFox)
      $previousSlide.css({ 'transform' : transformString })
    else
      $previousSlide.css({ 
          'transform'         : transformString
        , '-webkit-transform' : transformString
        , '-ms-transform'     : transformString
      })

    $previousSlideChildren.css({'opacity' : opacity })

    $redPng.css({ 'opacity' : (translateY / $contactSlide.height()) })

    $previousSlide.attr('translate-y-offset', translateY)
  }, 10))

  // Setup onResize callback
  $(window).resize(onResize)

  // Hacks for Firefox not having the element sized properly after load
  // This is perhaps due to LESS beign compiled on-the-fly... 
  // this should be investigated further.
	setTimeout(onResize, 0);
  setTimeout(onResize, 100);

});
