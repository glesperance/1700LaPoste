
$(function ($) {
  // Redirect external links	
	$("a[rel='external']").click(function (){ this.target = "_blank"; }); 	

	// Modernizr SVG backup
	if(!Modernizr.svg) {
	    $('img[src*="svg"]').attr('src', function() {
	        return $(this).attr('src').replace('.svg', '.png');
	    });
	}

	function onResize() {
	  // Properly sizes all sections
    var viewPortheight    = $('#fixed-border-left').height()
      , borderAdjustment  =  $('#fixed-border-left').css('border-right-width').slice(0, -"px".length)

	  $('.section').css({'height': (viewPortheight - borderAdjustment) + 'px'});

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

  $(window).resize(onResize)

	setTimeout(onResize, 0);
  setTimeout(onResize, 100);

});