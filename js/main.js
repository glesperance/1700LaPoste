
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

	  $('.section, .section > .container-fluid-scroller').css({ 'height': sectionsHeight + 'px' });

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

     $(document).scrollsnap({
        snaps     : '.section'
      , proximity : sectionsHeight / 2
    });

    $('iframe[width][height]').each(function () {
      var $iframe = $(this)
      $iframe.css({ 'height' : $iframe.attr('height') / $iframe.attr('width') * $iframe.width() })
    })

	}

  // Setup Scrollers
  $('.scroller').each(function () {
    var $scroller = $(this)
    var scrollerWidth = $scroller.attr('scroller-width') || 100
    var $containerFluidScroller = $(this).children('.container-fluid-scroller')
    
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

      var $currentSlide = $containerFluidScroller.children('.current')
      if (!$currentSlide.length) $currentSlide = $containerFluidScroller.children().first()
      
      var $slide
      if (options.prev) {
        $slide = $currentSlide.prev()
        if (!$slide.length) $slide = $containerFluidScroller.children().last()
      } 
      else {
        $slide = $currentSlide.next()
        if (!$slide.length) $slide = $containerFluidScroller.children().first()
      }

      var distance = getDistance($slide)

      $slide.addClass('current')
      $slide.siblings().removeClass('current')

      $scroller.attr('slide-first', !$slide.prev().length)
      $scroller.attr('slide-last', !$slide.next().length)

      $containerFluidScroller.css({ 'left' : '-' + distance * (scrollerWidth) + '%' })
    }

    $containerFluidScroller.find('.next').click(function () { scroll() })
    $containerFluidScroller.find('.prev').click(function () { scroll({ prev : true }) })

    $containerFluidScroller.siblings('.next').click(function () { scroll() })
    $containerFluidScroller.siblings('.prev').click(function () { scroll({ prev : true }) })

    $scroller.attr('slide-first', true)
  })

  // Setup onResize callback
  $(window).resize(onResize)

  // Hacks for Firefox not having the element sized properly after load
  // This is perhaps due to LESS beign compiled on-the-fly... 
  // this should be investigated further.
	setTimeout(onResize, 0);
  setTimeout(onResize, 100);

});