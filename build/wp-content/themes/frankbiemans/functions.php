<?php

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
include_once(dirname(__FILE__) . '/wp/_require.php' );

add_theme_support( 'post-thumbnails', array( 'post' ) );

function return_all_countries() {
    return $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
}

function is_contact_page(){
	$template = basename(get_page_template());
	if($template == 'page-contact.php'){
		return 1;
	} else {
		return 0;
	}
}

function ag_get_theme_menu_name( $theme_location ) {
    if( ! $theme_location ) return false;
 
    $menu_obj = ag_get_theme_menu( $theme_location );
    if( ! $menu_obj ) return false;
 
    if( ! isset( $menu_obj->name ) ) return false;
 
    return $menu_obj->name;
}

function gm_get_theme_menu_name( $theme_location ) {
    if( ! $theme_location ) return false;
 
    $theme_locations = get_nav_menu_locations();
    if( ! isset( $theme_locations[$theme_location] ) ) return false;
 
    $menu_obj = get_term( $theme_locations[$theme_location], 'nav_menu' );
    if( ! $menu_obj ) $menu_obj = false;
    if( ! isset( $menu_obj->name ) ) return false;
} 

function ag_get_theme_menu( $theme_location ) {
    if( ! $theme_location ) return false;
 
    $theme_locations = get_nav_menu_locations();
    if( ! isset( $theme_locations[$theme_location] ) ) return false;
 
    $menu_obj = get_term( $theme_locations[$theme_location], 'nav_menu' );
    if( ! $menu_obj ) $menu_obj = false;
 
    return $menu_obj;
}

function break_off_the_title( $title, $id = null ) {
    $post = get_post($id);
    $title_multiple_lines = get_post_meta($id, 'title_multiple_lines', true);
    if(isset($title_multiple_lines) && !empty($title_multiple_lines) && !is_admin()){
        $new_title = '';
        $temp = '<span class="outer"><span class="inner">%s</span></span>';
        $words = explode(PHP_EOL, $title_multiple_lines);
        foreach($words as $word){
            $new_title .= sprintf($temp, $word);
        }
        $title = $new_title;
    }
    return $title;
}
add_filter( 'the_title', 'break_off_the_title', 10, 2 );

