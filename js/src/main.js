

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

});

