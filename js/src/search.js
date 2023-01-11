

// onload responsive footer and menu stuff
jQuery(document).ready(function($){

	// select some things we'll use to make things responsive
	var search_pane = $( '.search-pane' ),
		search_show = $( '.search-show' ),
		search_hide = search_pane.find('.close');

	search_show.on("click",function(){
		search_pane.addClass('open');
		search_pane.find('input[type=text]').focus();
	});

	search_hide.on("click",function(){
		search_pane.removeClass('open');
	});

});

