(function( $ ) {
	
	var bt_bb_resize = function( root ) {
		root.each(function() {
			$( this ).find( '.bt_bb_grid_item' ).each(function() {
				$( this ).find( '.bt_bb_grid_item_post_thumbnail' ).height( Math.floor( $( this ).width() * $( this ).data( 'hw' ) ) );
			});
		});
	}

	var bt_bb_load_images = function( root ) {
		root.each(function() {
			var page_bottom = $( window ).scrollTop() + $( window ).height();
			$( this ).find( '.bt_bb_grid_item' ).each(function() {
				var this_top = $( this ).offset().top;
				if ( this_top < page_bottom + $( window ).height() ) {
					var img_src = $( this ).data( 'src' );
					if ( img_src !== '' && $( this ).find( '.bt_bb_grid_item_post_thumbnail a' ).html() == '' ) {
						$( this ).find( '.bt_bb_grid_item_post_thumbnail a' ).html( '<img src="' + img_src + '">' );
					}
				}
			});
		});
	}
	
	var bt_bb_load_posts = function( root ) {
		root.addClass( 'bt_bb_grid_hide' );
		root.find( '.bt_bb_grid_item' ).remove();
		if ( root.hasClass( 'masonry' ) ) {
			root.masonry( 'destroy' );
		}
		root.parent().find( '.bt_bb_post_grid_loader' ).show();
		if ( root.data( 'post-type' ) == 'portfolio' ) {
			var action = 'bt_bb_get_grid_portfolio';
		} else {
			var action = 'bt_bb_get_grid';
		}
		var data = {
			'action': action,
			'number': root.data( 'number' ),
			'category': root.data( 'category' ),
			'show': root.data( 'show' )
		};
		$.ajax({
			type: 'POST',
			url: ajax_object.ajax_url,
			data: data,
			async: true,
			success: function( response ) {
				root.append( response );
				bt_bb_resize( root );
				bt_bb_load_images( root );
				root.masonry({
					columnWidth: '.bt_bb_grid_sizer',
					itemSelector: '.bt_bb_grid_item',
					gutter: 0,
					percentPosition: true
				});
				root.parent().find( '.bt_bb_post_grid_loader' ).hide();
				root.removeClass( 'bt_bb_grid_hide' );
				$( '.bt_bb_grid_container' ).css( 'height', 'auto' );
			}
		});
	}

	$( document ).ready(function() {

		$( window ).on( 'resize', function() {
			bt_bb_resize( $( '.bt_bb_masonry_post_grid_content' ) );
		});

		$( window ).on( 'scroll', function() {
			bt_bb_load_images( $( '.bt_bb_masonry_post_grid_content' ) );
		});

		$( '.bt_bb_masonry_post_grid_content' ).each(function() {
			var grid_content = $( this );
			bt_bb_load_posts( grid_content );
		});

		$( '.bt_bb_post_grid_filter_item' ).on( 'click', function() {
			var root = $( this ).closest( '.bt_bb_grid_container' );
			root.height( root.height() );
			$( this ).parent().find( '.bt_bb_post_grid_filter_item' ).removeClass( 'active' ); 
			$( this ).addClass( 'active' );
			var grid_content = $( this ).closest( '.bt_bb_masonry_post_grid' ).find( '.bt_bb_masonry_post_grid_content' );
			grid_content.data( 'category', $( this ).data( 'category' ) );
			bt_bb_load_posts( grid_content );
		});

	});
})( jQuery );