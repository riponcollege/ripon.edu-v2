

// onload responsive footer and menu stuff
jQuery(document).ready(function($){

	// select some things we'll use to make things work
	var menu_pane = $( '.menu-pane' ),
		menu_show = $( '.menu-show' ),
		menu_hide = menu_pane.find('.close'),
		menu_photo = $( '.menu-photo' );

	// click menu show, show the menu
	menu_show.on( "click", function(){
		menu_pane.addClass('open');
		menu_photo.addClass('open');
	});

	// click close button inside menu-pane
	menu_hide.on( "click", function(){
		menu_pane.removeClass('open');
		menu_photo.removeClass('open');
		menu_pane.find( '.sub-menu' ).removeClass('open');
	});

	// handle submenu stuff
	menu_pane.find('.main-menu > li > a').on( 'click', function(event){

		// cancel default behavior for main menu items
		event.preventDefault();
		
		// if the item has a submenu
		$( this ).next('.sub-menu')

		// close any visible submenus
		$( '.sub-menu.open' ).removeClass('open');

		// show the submenu
		$( this ).next('.sub-menu').addClass('open');

		// if the user then clicks the main menu item again, go to it.
		$( this ).on( 'click.submenu-active', function(){
			location.href = $(this).attr('href');
		});
	});

});

