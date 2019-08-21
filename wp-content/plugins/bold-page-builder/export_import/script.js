(function( $ ) {
	
	$( document ).ready(function() {
		
		$( '.bt_bb_import_xml' ).on( 'click', function() {
			
			window.bt_bb_import_file = $( this ).data( 'file' );
			
			window.bt_bb_import_step = 0;
			
			var data = {
				'action': 'bt_bb_import_ajax',
				'file': window.bt_bb_import_file,
				'step': window.bt_bb_import_step
			}
			
			$( '.bt_bb_import_select_xml' ).hide();
			$( '.bt_bb_import_xml_container' ).hide();
			
			$( '.bt_bb_import_progress' ).html( 'Please wait...' );
			
			window.bt_bb_import_ajax( data );
			
		});
		
		window.bt_bb_import_ajax = function( data ) {
			$.ajax({
				type: 'POST',
				url: window.bt_bb_import_ajax_url,
				data: data,
				async: true,
				success: function( response ) {
					response = $.trim( response );
					if ( response.endsWith( 'bt_bb_import_end' ) ) {
						$( '.bt_bb_import_report' ).html( $( '.bt_bb_import_report' ).html() + response.substr( 0, response.indexOf( 'bt_bb_import_end' ) ) + '<br/><b>Import finished!</b>' );
						$( '.bt_bb_import_progress' ).hide();
					} else if ( response.startsWith( '<p><strong>Error' ) ) {
						$( '.bt_bb_import_report' ).html( $( '.bt_bb_import_report' ).html() + response );
						$( '.bt_bb_import_progress' ).hide();
					} else {
						$( '.bt_bb_import_progress' ).html( $( '.bt_bb_import_progress' ).html() + '.' );
						$( '.bt_bb_import_report' ).html( $( '.bt_bb_import_report' ).html() + response );
						window.bt_bb_import_step++;
						var data = {
							'action': 'bt_bb_import_ajax',
							'file': window.bt_bb_import_file,
							'step': window.bt_bb_import_step
						}
						window.bt_bb_import_ajax( data );
					}
				},
				error: function( xhr, status, error ) {
					$( '.bt_bb_import_report' ).html( $( '.bt_bb_import_report' ).html() + '<span style="color:red;">' + status + ' ' + error + '</span>' + '<br/>' );
				}
			});
		}
		
		
	});
	
})( jQuery );

String.prototype.endsWith = function(suffix) {
    return this.match(suffix+"$") == suffix;
};

if (!String.prototype.startsWith) {
  String.prototype.startsWith = function(searchString, position) {
    position = position || 0;
    return this.indexOf(searchString, position) === position;
  };
}