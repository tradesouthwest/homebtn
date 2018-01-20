<?php 
/** 
 * @since ver 1.0.1 shortcode omitted
 * @uses do_shortcode( '[homebtn_postcount]' ).
 * + get_post_type, is_single
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
        <a id="HmBtn" href="' . $homepg . '" title="home" rel=nofollow" 
        class="homebtn-button transition">Home</a>
        </div>';

        $output = ob_get_clean();
        return $output; 
        
        } else {
            return $content;
    }
}
add_filter( 'the_content', 'homebtn_display_button_afterpost' );                

function homebtn_add_bodyhome_class() 
{
    
        //add_filter('body_class', 'homebtn_plugin_body_class');               
    
}
               
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
