<?php

$remove_defaults_widgets = array(
    'dashboard_incoming_links' => array(
        'page'    => 'dashboard',
        'context' => 'normal'
    ),
    'dashboard_right_now' => array(
        'page'    => 'dashboard',
        'context' => 'normal'
    ),
    'dashboard_recent_drafts' => array(
        'page'    => 'dashboard',
        'context' => 'side'
    ),
    'dashboard_quick_press' => array(
        'page'    => 'dashboard',
        'context' => 'side'
    ),
    'dashboard_plugins' => array(
        'page'    => 'dashboard',
        'context' => 'normal'
    ),
    'dashboard_primary' => array(
        'page'    => 'dashboard',
        'context' => 'side'
    ),
    'dashboard_secondary' => array(
        'page'    => 'dashboard',
        'context' => 'side'
    ),
    'dashboard_recent_comments' => array(
        'page'    => 'dashboard',
        'context' => 'normal'
    )
);

$custom_dashboard_widgets = array(
    'my-dashboard-widget' => array(
        'title' => 'Welkom in Wordpress',
        'callback' => 'dashboardWidgetContent'
    ),
    'nosuch-dashboard-widget' => array(
        'title' => 'NOSUCH',
        'callback' => 'nosuchDashboardWidgetContent'
    )
);

function nosuchDashboardWidgetContent() {
    echo '
        <h4>Direct contact:</h4>
        <p><a href="http://www.nosuch.nl" target="_blank">» NoSuch.nl</a></p>
        <p>
            Schiehavenkade 214-222<br />
            3024 EZ<br />
            Rotterdam 
        </p>
        <p>
            010 244 1044<br />
            <a href="mailto:info@nosuch.nl">info@nosuch.nl</a>
        </p>
    ';

}

function dashboardWidgetContent() {
    $user = wp_get_current_user();
    echo '
        <h4>'. __('Welkom in Wordpress') .' '. ucfirst($user->user_login) .'.</h4>
        <ul>
            <li><a href="http://www.nosuch.nl" target="_blank">» NoSuch.nl</a></li>
            <li><a href="http://nl.wordpress.org/" target="_blank">» Wordpress.org</a></li>
            <li><a href="http://www.wpcom.nl/" target="_blank">» WPcom.nl (documentatie)</a></li>
        </ul>
    ';
}


Class Dashboard_Widgets {
 
    function __construct()
    {
        add_action( 'wp_dashboard_setup', array( $this, 'remove_dashboard_widgets' ) );
        add_action( 'wp_dashboard_setup', array( $this, 'add_dashboard_widgets' ) );
    }
 
    function remove_dashboard_widgets()
	{
	    global $remove_defaults_widgets;
	 
	    foreach ($remove_defaults_widgets as $wigdet_id => $options) {
	        remove_meta_box($wigdet_id, $options['page'], $options['context']);
	    }
	}
 
    function add_dashboard_widgets()
	{
	    global $custom_dashboard_widgets;
	 
	    foreach ($custom_dashboard_widgets as $widget_id => $options) {
	        wp_add_dashboard_widget(
	            $widget_id,
	            $options['title'],
	            $options['callback']
	        );
	    }
	}
 
}
 
$wdw = new Dashboard_Widgets();