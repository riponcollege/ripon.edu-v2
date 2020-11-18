

// area controls
jQuery(document).ready(function($){

	$( '.back-to-areas' ).click(function(){
		location.href = "/areas-of-study";
	});


	$( '.area .tab-nav li' ).on( 'click', function(){
		$( '.area .tab-content:visible' ).hide();
		$( '.area .tab-nav li.active' ).removeClass('active');
		var this_class = $( this ).attr('class').replace( 'active', '' );

		$( this ).addClass('active');
		$( '.tab-content.'+this_class ).fadeIn( 400 );
	});

});

