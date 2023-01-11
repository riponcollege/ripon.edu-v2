

function randomInclusive( min, max ) {
	min = Math.ceil(min);
	max = Math.floor(max);
	return Math.floor(Math.random() * ( max - min + 1 ) + min); // The maximum is inclusive and the minimum is inclusive
}




// quote controls
jQuery(document).ready(function($){

	// get the quote group
	var quote_group = $('.quote-showcase');

	// get the quotes
	var quotes = quote_group.children();

	// count the quotes
	var number_of_quotes = quotes.length - 1;

	// get a random quote key
	var random_quote_key = randomInclusive( 0, number_of_quotes );

	// get and show the first (random) quote
	var random_quote = quote_group.children().eq( random_quote_key );

	// show the random quote
	random_quote.show();

	// bind to the controls, and handle quote navigation
	quote_group.find('.control').on( 'click', function(){

		var control = $( this );

		if ( quote_group.length > 0 ) {

			if ( control.hasClass( 'next' ) ) {

				// select the current ad
				var current_quote = quote_group.find( '.quote-slide:visible' );

				// select the next ad
				var next_quote = current_quote.next('.quote-slide');

				// if the next ad is not empty
				if ( next_quote.length > 0 ) {

					// hide the current ad
					current_quote.hide();

					// show the next ad
					next_quote.show();		

				} else {

					// hide visible ad
					current_quote.hide();

					// show the first ad in the group
					quote_group.find( '.quote-slide:first-child' ).show();

				}

			} else {

				// select the current ad
				var current_quote = quote_group.find( '.quote-slide:visible' );

				// select the next ad
				var prev_quote = current_quote.prev('.quote-slide');

				// if the next ad is not empty
				if ( prev_quote.length > 0 ) {

					// hide the current ad
					current_quote.hide();

					// show the next ad
					prev_quote.show();

				} else {

					// hide visible ad
					current_quote.hide();

					var prev_quote = quote_group.find( '.quote-slide' ).last();

					// show the first ad in the group
					prev_quote.show();

				}

			}

		}

	});


});

