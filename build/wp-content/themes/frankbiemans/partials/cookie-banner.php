<?php
	$enable_cookie_banner = get_option('cb_enable');
?>

<?php if($enable_cookie_banner == 1 && $_COOKIE['nsc_cookies_accepted'] != 1){ ?>
<section class="cookie-banner">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-10">
				<p><?= get_option('cb_text'); ?></p>
			</div>
			<div class="col-12 col-md">
				<a href="<?= get_option('cb_privacy_link'); ?>"><?= get_option('cb_privacy_label'); ?></a>
				<a href="#" data-cookies-accept><?= get_option('cb_accept_label'); ?></a>
			</div>
		</div>
	</div>
</section>
<?php } ?>