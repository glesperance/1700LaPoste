/**********
 * This file was modified from its original. Please do not update.
 */
(function( $ ) {

    $.fn.scrollsnap = function( options ) {

        return this.each(function() {
            var self = this;
            var alreadyInitialized = !!this.scrollsnapSettings

            this.scrollsnapSettings = $.extend({
                'direction': 'y',
                'snaps' : '*',
                'proximity' : 12,
                'offset' : 0,
                'duration' : 500,
                'easing' : 'swing',
            }, options);

            if (alreadyInitialized) return this

            var leftOrTop = self.scrollsnapSettings.direction === 'x' ? 'Left' : 'Top';

            var scrollingEl = this;

            if (scrollingEl['scroll'+leftOrTop] !== undefined) {
                // scrollingEl is DOM element (not document)
                $(scrollingEl).css('position', 'relative');

                $(scrollingEl).bind('scrollstop', function(e) {

                    var matchingEl = null, matchingDy = self.scrollsnapSettings.proximity + 1;

                    $(scrollingEl).find(self.scrollsnapSettings.snaps).each(function() {
                        var snappingEl = this,
                            dy = Math.abs(snappingEl['offset'+leftOrTop] + self.scrollsnapSettings.offset - scrollingEl['scroll'+leftOrTop]) - ($(snappingEl).attr('translate-y-offset') || 0);

                        if (dy <= self.scrollsnapSettings.proximity && dy < matchingDy) {
                            matchingEl = snappingEl;
                            matchingDy = dy;
                        }
                    });

                    if (matchingEl) {
                        var $previousSlides = $(matchingEl).siblings('[scrollsnap-current=true]')
                        $previousSlides.attr('scrollsnap-current', false);
                        $previousSlides.trigger('scrollsnap::blur');

                        $(matchingEl).attr('scrollsnap-current', true);

                        var endScroll = matchingEl['offset'+leftOrTop] + self.scrollsnapSettings.offset - ($(matchingEl).attr('translate-y-offset') || 0),
                            animateProp = {};
                        animateProp['scroll'+leftOrTop] = endScroll;
                        if ($(scrollingEl)['scroll'+leftOrTop]() != endScroll) {
                            $(scrollingEl).animate(animateProp, self.scrollsnapSettings.duration, self.scrollsnapSettings.easing);
                        }
                    }

                });

            } else if (scrollingEl.defaultView) {
                // scrollingEl is DOM document
                $(scrollingEl).bind('scrollstop', function(e) {

                    var matchingEl = null, matchingDy = self.scrollsnapSettings.proximity + 1;

                    $(scrollingEl).find(self.scrollsnapSettings.snaps).each(function() {
                        var snappingEl = this,
                            dy = Math.abs(($(snappingEl).offset()[leftOrTop.toLowerCase()] + self.scrollsnapSettings.offset - ($(snappingEl).attr('translate-y-offset') || 0)) - scrollingEl.defaultView['scroll'+self.scrollsnapSettings.direction.toUpperCase()]);

                        if (dy <= self.scrollsnapSettings.proximity && dy < matchingDy) {
                            matchingEl = snappingEl;
                            matchingDy = dy;
                        }
                    });

                    if (matchingEl) {
                        var $previousSlides = $(matchingEl).siblings('[scrollsnap-current=true]')
                        $previousSlides.attr('scrollsnap-current', false);
                        $previousSlides.trigger('scrollsnap::blur');
                        
                        $(matchingEl).attr('scrollsnap-current', true);

                        var endScroll = $(matchingEl).offset()[leftOrTop.toLowerCase()] + self.scrollsnapSettings.offset - ($(matchingEl).attr('translate-y-offset') || 0),
                            animateProp = {};
                        animateProp['scroll'+leftOrTop] = endScroll;
                        if ($(scrollingEl)['scroll'+leftOrTop]() != endScroll) {
                            $('html, body').animate(animateProp, self.scrollsnapSettings.duration, self.scrollsnapSettings.easing);
                        }
                    }

                });
            }

        });

    };

})( jQuery );