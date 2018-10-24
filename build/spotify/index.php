<?php
	
	error_reporting(-1);
	ini_set('display_errors', 1);

	include('includes/Request.php');
	include('includes/Session.php');
	include('includes/SpotifyWebAPI.php');
	include('includes/SpotifyWebAPIException.php');

	include('includes/functions.php');

	$redirect_url = 'http://localhost:6322';

	if('preview.nosuchdemos.nl' == $_SERVER['SERVER_NAME'])
		$redirect_url = 'http://preview.nosuchdemos.nl/spotify-api/';

	if('comfrankbi-igola.savviihq.com' == $_SERVER['SERVER_NAME'])
		$redirect_url = 'http://comfrankbi-igola.savviihq.com/spotify/';

	if('frankbiemans.site' == $_SERVER['SERVER_NAME'])
		$redirect_url = 'https://frankbiemans.site/spotify/';

	$session = new SpotifyWebAPI\Session(
	    'fab0fec8aa8b4b668fed51370323bc2a',
	    'a80ec011f24f4ab9a173f39776b910e7',
	    $redirect_url
	);

	$api = new SpotifyWebAPI\SpotifyWebAPI();

	if (isset($_GET['logout'])):
		echo 'Log out...';
	    unset($_GET['access-token']);
	    unset($_GET['code']);
	endif;

	if (isset($_GET['access-token'])) {

		if(!empty($_GET['page'])){
			$page = 'pages/'. $_GET['page'];
		} elseif(!empty($_GET['article'])){
			$page = 'articles/'. $_GET['article'];
		} else {
			$page = 'pages/profile-overview';
		}

		include($page .'.php');

	} elseif (isset($_GET['code'])) {
	    $session->requestAccessToken($_GET['code']);
	    $api->setAccessToken($session->getAccessToken());
	    header('Location: index.php?access-token='. $session->getAccessToken());

	} else {
	    $scopes = [
	        'scope' => [
	            'playlist-read-private',
	            'playlist-read-collaborative',
	            'playlist-modify-public',
	            'playlist-modify-private',
	            'streaming',
	            'user-follow-modify',
	            'user-follow-read',
	            'user-library-read',
	            'user-library-modify',
	            'user-read-private',
	            'user-read-birthdate',
	            'user-read-email',
	            'user-top-read',
	            'user-read-recently-played',
	            'user-read-playback-state'
	        ],
	    ];
	    header('Location: ' . $session->getAuthorizeUrl($scopes));
	    
	}

?>