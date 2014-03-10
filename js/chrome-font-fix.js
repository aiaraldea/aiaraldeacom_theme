//https://code.google.com/p/chromium/issues/detail?id=336476#c39

/**
 * Add in the extend function, added in Jquery 1.4 (which we don't have)
 */
jQuery.fn.extend({
        // Based off of the plugin by Clint Helfers, with permission.
        // http://blindsignals.com/index.php/2009/07/jquery-delay/
        delay: function( time, type ) {
                time = jQuery.fx ? jQuery.fx.speeds[time] || time : time;
                type = type || "fx";
 
                return this.queue( type, function() {
                        var elem = this;
                        setTimeout(function() {
                                jQuery.dequeue( elem, type );
                        }, time );
                });
        }
});

jQuery('body')
	  .delay(500)
	  .queue( 
	  	function(next){ 
	    	jQuery(this).css('padding-right', '1px'); 
	  	}
	  );

