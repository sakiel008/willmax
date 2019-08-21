(function ($) {
	"use strict";
	$(document).ready(btFixedFooter);
	$(window).on('resize',btFixedFooter);
	
	function btFixedFooter() {
		if ( $( document.body ).hasClass( 'btFixedFooter' ) ) {
			$( ".btPageWrap" ).css( "margin-bottom", function() {
				return $( ".btSiteFooter" ).outerHeight(true);
			});
		}
	}
}(jQuery));