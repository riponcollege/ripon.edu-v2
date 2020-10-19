

// function to wrap the first [numWords] in [tag]
jQuery.fn.wrapStart = function ( numWords, tag ) { 

	if ( typeof( tag ) == 'undefined' ) {
		tag = 'span';
	}
    var node = this.contents().filter(function () { 
            return this.nodeType == 3 
        }).first(),
        text = node.text(),
        first = text.split(" ", numWords).join(" ");

    if (!node.length)
        return;

    node[0].nodeValue = text.slice(first.length);
    node.before('<' + tag + '>' + first + '</' + tag + '>');

};


// onload responsive footer and menu stuff
jQuery(document).ready(function($){

	// select some things we'll use to make things responsive
	var container = $( ".container" ),
		menu = $( '.main-menus' ),
		menu_toggle = $( 'header .menu-toggle' ),
		menu_ul = menu.find( 'ul' ),
		fluid_images = $( '.content img' ),
		left_menu = $( '.left-menu' ),
		quick_nav = $( 'select.quick-nav' );


	// remove height and width from images inside
	fluid_images.removeAttr( 'width' ).removeAttr( 'height' );

	menu_toggle.on("click",function(){
		if ( menu.hasClass( 'open' ) ) {
			menu.removeClass('open');
			container.removeClass('menu-open')
		} else {
			menu.addClass('open');
			container.addClass('menu-open')
		}
	});
	
});


