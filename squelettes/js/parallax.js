$(document).ready(function (){   
  // Cache the Window object
  $window = $(window);

    // Example 1
    // || |--------------|
    // || |    FALSE     |
    // || |              |
    // || |--------------|
    // ||=================== <--------------- windowTop
    // || |--------------| <--- elementRect.top
    // || |    TRUE      |
    // || |              |
    // || |--------------| <--- elementRect.bottom
    // ||=================== <--------------- windowBottom

    // Example 2
    // || |--------------| 
    // || |    FALSE     |
    // || |              |
    // || |--------------|
    // || |--------------| <--- elementRect.top
    // || |    TRUE      |
    // ||=|==============|== <--------------- windowTop
    // || |--------------| <--- elementRect.bottom
    // ||
    // || |--------------| <--- elementRect.top
    // || |    TRUE      |
    // ||=|==============|== <--------------- windowBottom
    // || |--------------| <--- elementRect.bottom
    // ||
    // || |--------------| 
    // || |    FALSE     |
    // || |              |
    // || |--------------| 


  // For each element that has a data-type attribute
  $('[data-type="background"]').each(function (){

    // Store some variables based on where we are
    var self        = this
      , $self       = $(self)
      ;

      var speed = +($self.attr('data-speed') || 1)
      var windowHeight, selfHeight

      function onResize() {
        windowHeight = $window.height()
        selfHeight  = $self.height() 
      }

      $(window).resize(onResize)

      // Hacks for Firefox not having the element sized properly after load
      // This is perhaps due to LESS beign compiled on-the-fly... 
      // this should be investigated further.
      setTimeout(onResize, 0);
      setTimeout(onResize, 100);

      // When the window is scrolled...
      $(window).scroll(function () {
        var elementRect = self.getBoundingClientRect()
        
        var elementTopIsinView = elementRect.top >= 0 && elementRect.top < windowHeight
        var elementBottomIsInView = elementRect.bottom >= 0 && elementRect.bottom < windowHeight

        // We want the background to go DOWN.
        // ==> we want background top position to augment in a fashion
        // that is inversely proportional to the rect top
        if (elementBottomIsInView)
          $self.css('background-position-y', -selfHeight / 4 - elementRect.top * speed + 'px')

        else if (elementTopIsinView)
          $self.css('background-position-y', -selfHeight / 4 + elementRect.top * speed + 'px')
    })
  })
})