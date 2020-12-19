

// onload responsive footer and menu stuff
jQuery(document).ready(function($){

	// select some things we'll use to make things responsive
	var menu = $( '.main-menus' ),
		menu_show = $( '.menu-show' ),
		menu_hide = $( '.menu-hide' ),
		menu_photo = $( '.menu-photo' ),
		search_show = $( '.search-show' ),
		search_box = $( '.search' );

	menu_show.on("click",function(){
		menu.addClass('open');
		menu_photo.addClass('open');
	});

	menu_hide.on("click",function(){
		menu.removeClass('open');
		menu_photo.removeClass('open');
		$( '.main-menus' ).find( '.sub-menu' ).removeClass('open');
	});

	$('.main-menus .nav-menu > li > a').on( 'click', function(event){
		event.preventDefault();
		$('.sub-menu.open').removeClass('open');
		$(this).next('.sub-menu').toggleClass('open');
	});
	
	search_show.on( 'click', function(){
		search_box.fadeIn( 400 );
		search_box.find('input[type=text]').focus();

		search_box.find('input[type=text]').keyup(function(e) {
		    if (e.key === "Escape") {
		        search_box.fadeOut( 400 );
		    }
		})
	});

});

