

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

	// grab the time number
	var time = $(this).data( 'time' );
	if ( typeof( time ) == 'undefined' ) time = 20000;


	// change quotes on an interval
	var quote_interval = setInterval(function(){

		// select the current quote
		var current_quote = quote_group.find( '.quote-slide:visible' );

		// select the next quote
		var next_quote = current_quote.next('.quote-slide');

		// if the next quote is not empty
		if ( next_quote.length > 0 ) {

			// hide the current quote
			current_quote.hide();

			// show the next quote
			next_quote.show();

		} else {

			// hide visible quote
			current_quote.hide();

			// show the first quote in the group
			quote_group.find( '.quote-slide:first-child' ).show();

		}

	}, time );


});

