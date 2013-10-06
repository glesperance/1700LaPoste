
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
	}

  // Setup Scrollers
  $('.container-fluid-scroller').each(function () {
    var $this                 = $(this)
      , scrollerLength        = $this.children().length - $this.children('.half-slide').length
      , scrollerLengthPercent = scrollerLength * 100

    $this.css({ 'width' : scrollerLengthPercent + '%' })

    $this.children().each(function () {
      var $child      = $(this)
        , childWidth  = $child.hasClass('half-slide')
                          ? 0.5
                          : 1
      var childWidthPercent = childWidth / scrollerLength * 100
      $child.css({ 'width' : childWidthPercent + '%' })
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