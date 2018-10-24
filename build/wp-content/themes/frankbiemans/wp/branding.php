<?php
    
add_filter( 'login_headerurl', 'custom_loginlogo_url' );
function custom_loginlogo_url($url) {
    return 'http://www.nosuch.nl';
}

add_action('login_head', 'login_styles');  
function login_styles() {   
    ?>
        <style type="text/css">
            .login h1 a { 
                background: url(<?php echo get_bloginfo("template_directory"); ?>/images/nsc_logo.svg) no-repeat center; 
                width: 330px;
                background-size: contain;
            }
        </style>
    <?php   
} 

add_filter('admin_footer_text', 'modify_footer_admin');  
function modify_footer_admin () {  
  echo 'Ontwikkeld door <a href="//www.nosuch.nl" target="_blank">NOSUCH</a>.';  
}  