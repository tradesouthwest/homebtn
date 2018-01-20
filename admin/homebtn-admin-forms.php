<?php 
/** get the value of the setting
 * @uses $options = get_option('wordness(admin)');
 *  field content callbacks = options, fields, pages, docs
*/

/* ------------------------------------- Pages Colors ----- */
/**
 * Render page branding colors option
 * @string $args = array()
 * @since  1.0.0
 */
function homebtn_button_background_cb($args) 
{ 
    //be safe default
    if($args['value'] == '') $args['value'] = sanitize_hex_color('#ededed');

    printf( '<label>%1$s </label> <em> %7$s</em><br>
        <input type="%2$s" name="%3$s[%4$s]" value="%5$s" 
        class="%6$s homebtn-color-picker-1" id="%3$s-%4$s"
         data-default-color="%8$s"/>',
        $args['label'],
        $args['type'],
        $args['option_name'],
        $args['name'],        
        $args['value'],
        $args['class'],
        $args['description'],
        $args['default']
    ); 
}
/**
 * Render page branding colors option
 * @string $args = array()
 * @since  1.0.0
 */
function homebtn_button_textcolor_cb($args) 
{ 
    //be safe default
    if($args['value'] == '') $args['value'] = sanitize_hex_color('#46494c');

    printf( '<label>%1$s </label> <em> %7$s</em><br>
        <input type="%2$s" name="%3$s[%4$s]" value="%5$s" 
        class="%6$s homebtn-color-picker-2" id="%3$s-%4$s"
         data-default-color="%8$s"/>',
        $args['label'],
        $args['type'],
        $args['option_name'],
        $args['name'],        
        $args['value'],
        $args['class'],
        $args['description'],
        $args['default']
    ); 
}
/**
 * Render page branding colors option
 * @string $args = array()
 * @since  1.0.0
 */
function homebtn_page_transition_cb($args) 
{ 
    //be safe default
    if($args['value'] == '') $args['value'] = '.75';

    printf( '<label>%1$s </label> <em> %7$s</em><br>
        <input type="%2$s" name="%3$s[%4$s]" value="%5$s" 
        class="%6$s homebtn-number-value-1" id="%3$s-%4$s"
        min="%9$s" max="%10$s" step="%11$s" placeholder="%8$s"/>',
        $args['label'],
        $args['type'],
        $args['option_name'],
        $args['name'],        
        $args['value'],
        $args['class'],
        $args['description'],
        $args['default'],
        $args['min'],
        $args['max'],
        $args['step']
    ); 
}
/** 
 * switch for 'logo background' field
 * @since 1.0.1
 * @input type checkbox
 
function wordness_loginrepeat_select_cb($args)
{ 
    print('<label for="wordness_loginrepeat_select">');
    if( ! empty ( $args['options'] ) && is_array( $args['options'] ) )
    {
        $options_markup = '';
         $value = $args['value'];
        foreach( $args['options'] as $key => $label )
        {
            $options_markup .= sprintf( '<option value="%s" %s>%s</option>', 
            $key, selected( $value, $key, false ), $label );
        }
        printf( '<select name="%1$s" id="wnLRSelect">%2$s</select>', 
        $args['name'], 
        $options_markup );
    }    
}   */ 
