

jQuery.expr[':'].icontains = function(a, i, m) {
  return jQuery(a).text().toUpperCase()
      .indexOf(m[3].toUpperCase()) >= 0;
};


// onload responsive footer and menu stuff
jQuery(document).ready(function($){

	if ( $( '.faculty-search' ) ) {
		$( '.faculty-search input[type=text]' ).on( 'keyup', function(){
			$( '.faculty-entry').removeClass('hidden');
			$( ".faculty-entry:not(:icontains('" + $(this).val() + "'))" ).addClass('hidden');
		});
	}

});

