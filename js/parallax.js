$(document).ready(function(){   
  // Cache the Window object
  $window = $(window);

  // For each element that has a data-type attribute
  $('section[data-type="background"]').each(function(){

          // Store some variables based on where we are
          var $self = $(this),
                  offsetCoords = $self.offset(),
                  topOffset = offsetCoords.top;

          // When the window is scrolled...
      $(window).scroll(function() {

                  // If this section is in view
                  if ( ($window.scrollTop() + $window.height()) > (topOffset) &&
                           ( (topOffset + $self.height()) > $window.scrollTop() ) ) {

                          // Scroll the background at var speed
                          // the yPos is a negative value because we're scrolling it UP!                              
                          var yPos = -($window.scrollTop() / $self.data('speed')); 

                          // If this element has a Y offset then add it on
                          //if ($self.data('offsetY')) {
                            //      yPos += $self.data('offsetY');
                          //}

                          // Put together our final background position
                          var coords = '50% '+ yPos + 'px';

                          // Move the background
                          $self.css({ backgroundPosition: coords });


                  }; // in view

          }); // window scroll

  }); // each data-type

}); // document ready
