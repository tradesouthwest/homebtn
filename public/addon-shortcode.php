<?php 
/** 
 * @since ver 1.0.1 shortcode omitted
 * @uses do_shortcode( '[homebtn_postcount]' ).
 * + get_post_type, is_single
 **********************************************
 IMPORTANT! Uncomment add_action line 86 in
 homebtn.php file to use this file
 **********************************************
 */

function homebtn_display_button_afterpost($content ) {
        //validate + check
         if ( is_single() && 'post' == get_post_type() ) 
        {
        //$getclass = homebtn_add_bodyhome_class();
        $homepg = get_home_url();
        ob_start();
    
        echo $content . '<div class="homebtnclearfix"></div>' . 
        '<div class="homebtn-section">
        <p> ' . do_shortcode("[hmbt_redirect url='' sec='3']") . '</p>
        </div>';

        $output = ob_get_clean();
        //$redir = wp_redirect( home_url() ); exit; 
        return $output; 
        
        } else {
            return $content;
    }
}
add_filter( 'the_content', 'homebtn_display_button_afterpost' );  

//shortcode use in function only
//usage: `[redirect url='http://somesite.com' sec='5']` 
add_shortcode('hmbt_redirect', 'homebtn_scr_do_redirect');
function homebtn_scr_do_redirect($atts)
{
$atts['url'] = get_home_url();

	ob_start();
	$myURL = (isset($atts['url']) && !empty($atts['url']))?esc_url($atts['url']):"";
	$mySEC = (isset($atts['sec']) && !empty($atts['sec']))?esc_attr($atts['sec']):"4";
	if(!empty($myURL))
  {
?>
		<meta http-equiv="refresh" content="<?php echo $mySEC; ?>; url=<?php echo $myURL; ?>">
		Please wait while you are redirected...or <a href="<?php echo $myURL; ?>">Click Here</a> if you do not want to wait.
<?php
	}
	$redir = ob_get_clean(); 
	return $redir;
}

// body class           
function homebtn_plugin_homebody_class($classes) {
    
        $classes[] = 'homebtn fadeInRight';
            return $classes;
}
    add_filter('body_class', 'homebtn_plugin_homebody_class');   

/**
 * css head inline rendering 
 *
 * @since             1.0.1
 */
function homebtn_button_placement_css() 
{   
    //wp_register_style( $handle, $src, $deps, $ver, $media );
    //colors
    $options = get_option( 'homebtn_pages' );
    $options2 = (empty($options['homebtn_button_background'])) ? 
    "#ededed" : $options['homebtn_button_background'];
    $options3 = (empty($options['homebtn_button_textcolor'])) ? 
    "#46494c" : $options['homebtn_button_textcolor'];
    $options4 = (empty($options['homebtn_page_transition'])) ? 
    ".75" : $options['homebtn_page_transition'];
    //add styles inline
    ob_start(); 
    echo '.homebtn-section{display:block;width:200px;margin-top: 1em;position:relative;}.homebtn-button{background-color:' . $options2 . '!important; color:' . $options3 . ';}.home.homebtn.fadeInRight{animation-duration: ' . $options4 . 's;}
    html{background: black}';
$output = ob_get_clean();
        
    wp_enqueue_style(    'homebtn-style', HOMEBTN_URL . 'lib/homebtn-style.css' );
    wp_add_inline_style( 'homebtn-style', $output );
 
}  
add_action( 'wp_enqueue_scripts', 'homebtn_button_placement_css' ); 
