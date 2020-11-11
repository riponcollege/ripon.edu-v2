

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
		menu_show = $( '.menu-show' ),
		menu_hide = $( '.menu-hide' ),
		menu_photo = $( '.menu-photo' ),


		menu_ul = menu.find( 'ul' ),
		fluid_images = $( '.content img' ),
		left_menu = $( '.left-menu' ),
		quick_nav = $( 'select.quick-nav' );


	// remove height and width from images inside
	fluid_images.removeAttr( 'width' ).removeAttr( 'height' );

	menu_show.on("click",function(){
		menu.addClass('open');
		menu_photo.addClass('open');
		container.addClass('menu-open');
	});

	menu_hide.on("click",function(){
		menu.removeClass('open');
		menu_photo.removeClass('open');
		container.removeClass('menu-open');
	});
	
});


