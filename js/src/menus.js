

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


    // handle sidebar menu toggling
    var left_menu = $('.sidebar .section-menu ul.menu');
    left_menu.find( 'a' ).click(function(){
        var parent_li = $( this ).parent( 'li' );
        var submenu = $( this ).next( 'ul' );
        if ( !submenu.is( ':visible' ) && parent_li.hasClass( 'menu-item-has-children' ) ) {
            event.preventDefault();
            parent_li.addClass( 'open' );
            submenu.show();
        }
    });

    // auto open a menu if it or one of its children is the current page
	left_menu.find( 'li' ).each(function(){
		var item = $(this);
		if ( item.hasClass( 'current_page_parent' ) || item.hasClass( 'current-menu-item' ) || item.hasClass( 'current-menu-ancestor' ) ) {
			item.addClass( 'open' );
			item.find( 'ul.sub-menu' ).addClass( 'open' );
		}
	});
	

    // quicknav functionality
    $('select.quick-nav').on( 'change', function(){
    	if ( $(this).val() != '' ) {
    		location.href = $(this).val();
    	}
    });

});

