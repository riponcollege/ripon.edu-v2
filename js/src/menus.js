

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

		// if the item has a submenu
		if ( $( this ).next('.sub-menu').length > 0 ) {

			// cancel default behavior for main menu items
			event.preventDefault();
			
			// close any visible submenus
			$( '.sub-menu.open' ).removeClass('open');

			// show the submenu
			$( this ).next('.sub-menu').addClass('open');

			// if the user then clicks the main menu item again, go to it.
			$( this ).on( 'click.submenu-active', function(){
				location.href = $(this).attr('href');
			});

		}
	});


	// sidebar menus
	var left_menu = $( '.sidebar .nav-menu' );
	left_menu.find( 'li.menu-item-has-children > a' ).click(function( event ){
		var menu_item = $( this ).parent( 'li' );
		var submenu = $( this ).next( 'ul.sub-menu' );
		if ( !submenu.hasClass( 'open' ) ) {
			left_menu.find( 'ul.sub-menu.open' ).removeClass( 'open' );
			event.preventDefault();
			menu_item.addClass( 'open' );
			submenu.addClass( 'open' );
		}
	});


});

