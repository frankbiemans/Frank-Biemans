<meta property="og:site_name" content="<?php wp_title(); ?>" />
	<meta property="og:title" content="<?php wp_title( ' - ', 1, 'right' ); bloginfo( 'name' ); ?>" />
	<meta property="og:description" content="<?php bloginfo('description'); ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="<?= get_home_url(); ?>" />
	<?php if(has_post_thumbnail()){ ?>
	    <meta property="og:image" content="<?= get_home_url(); ?>" />
	<?php } ?>