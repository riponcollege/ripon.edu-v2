

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
	var fluid_images = $( '.content img' );


	// remove height and width from images inside
	fluid_images.removeAttr( 'width' ).removeAttr( 'height' );


    // lightboxes
    $('.lightbox-image').magnificPopup({ type:'image' });
    $('.lightbox-iframe').magnificPopup({ type:'iframe' });


    // fitvids for responsive videos
    $('.content').fitVids();


    // creep for smooth scrolling anchor links
    $(".back-to-top").on( 'click', function(){
        $('html, body').animate({
            scrollTop: 0
        }, 1000 );
    });

    // handle sidebar menu toggling
    var left_menu = $('.sidebar .section-menu ul.menu');
    console.log( left_menu );
    left_menu.find( 'a' ).click(function(){
        var parent_li = $( this ).parent( 'li' );
        var submenu = $( this ).next( 'ul' );
        if ( !submenu.is( ':visible' ) && parent_li.hasClass( 'menu-item-has-children' ) ) {
            event.preventDefault();
            parent_li.addClass( 'open' );
            submenu.show();
        }
    });

});

