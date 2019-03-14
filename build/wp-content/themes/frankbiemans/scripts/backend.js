
window.onload = function() {

	var allowedBlocks = [
	'core/paragraph',
	'core/image',
	'core/heading',
	'core/list',
	'core/table',
	'core/shortcode',
	'core/quote',
	'core/button',
	'core/embed/youtube',
	'core/embed/vimeo',
	'gravityforms/block'
	];

	wp.blocks.getBlockTypes().forEach( function( blockType ) {
		if ( allowedBlocks.indexOf( blockType.name ) === -1 ) {
			wp.blocks.unregisterBlockType( blockType.name );
		}
	} );

};