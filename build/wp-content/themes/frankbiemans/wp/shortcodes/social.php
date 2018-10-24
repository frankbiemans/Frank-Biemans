<?php

add_shortcode( 'social-icons', 'shortcode_social' );
function shortcode_social( $atts ) {
    $shortcode = basename( __FILE__ , '.php' );

    $defaults = array( 
        'url_linkedin' => get_option('url_linkedin'),
        'url_facebook' => get_option('url_facebook'),
        'url_twitter' => get_option('url_twitter'),
        'url_instagram' => get_option('url_instagram')
    );
    $atts = shortcode_atts( $defaults, $atts );
    extract( $atts );

    $html = '';

    if(!empty($url_twitter) || !empty($url_facebook) || !empty($url_linkedin)){
        $html .= '<ul class="social__ul">';

        if(!empty($url_linkedin)){
            $html .= '
            <li class="social__li">
                <a href="'. $url_linkedin .'" target="_blank" class="social__a">
                    <i class="fab fa-linkedin social__i" aria-hidden="true"></i>
                </a>
            </li>
            ';
        }

        if(!empty($url_twitter)){
            $html .= '
            <li class="social__li">
                <a href="'. $url_twitter .'" target="_blank" class="social__a">
                    <i class="fab fa-twitter-square social__i" aria-hidden="true"></i>
                </a>
            </li>
            ';
        }

        if(!empty($url_facebook)){
            $html .= '
            <li class="social__li">
                <a href="'. $url_facebook .'" target="_blank" class="social__a">
                    <i class="fab fa-facebook-square social__i" aria-hidden="true"></i>
                </a>
            </li>
            ';
        }

        if(!empty($url_instagram)){
            $html .= '
            <li class="social__li">
                <a href="'. $url_instagram .'" target="_blank" class="social__a">
                    <i class="fab fa-instagram social__i" aria-hidden="true"></i>
                </a>
            </li>
            ';
        }

        $html .= '</ul>'; 
    }

    return $html;
}