
window.onload = function() {

	var allowedBlocks = [
	'core/paragraph',
	'core/image',
	'core/heading',
	'core/list',
	'core/shortcode',
	'core/embed/youtube',
	'core/embed/vimeo',
	'core/embed/table'
	];

	wp.blocks.getBlockTypes().forEach( function( blockType ) {
		if ( allowedBlocks.indexOf( blockType.name ) === -1 ) {
			wp.blocks.unregisterBlockType( blockType.name );
		}
	} );

};