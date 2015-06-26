<?php

/**
 * @see CMB2_Options_Admin
 */

$prefix =  '';


// Tab General
$cmb_demo = new_cmb2_box( array(
    'id'      => $this->prefix.'general',
    'hookup'  => false,
    'title'   =>'General',
    'show_on' => array(
        // These are important, don't remove
        'key'   => 'options-page',
        'value' => array( $this->key, )
    ),
) );

// Set our CMB2 fields
$cmb_demo->add_field( array(
    'name' => __( 'Test Text Small', 'cmb2' ),
    'desc' => __( 'field description (optional)', 'cmb2' ),
    'id'   => $prefix . 'textsmall',
    'type' => 'text_small',
    // 'repeatable' => true,
) );

$cmb_demo->add_field( array(
    'name' => __( 'Test Text Medium', 'cmb2' ),
    'desc' => __( 'field description (optional)', 'cmb2' ),
    'id'   => $prefix . 'textmedium',
    'type' => 'text_medium',
    // 'repeatable' => true,
) );

$cmb_demo->add_field( array(
    'name' => __( 'Post', 'cmb2' ),
    'desc' => __( 'field description (optional)', 'cmb2' ),
    'id'   => $prefix . 'textmedium',
    'type' => 'post_search_text',
    // 'repeatable' => true,
) );

$cmb_demo->add_field( array(
    'name' => __( 'Website URL', 'cmb2' ),
    'desc' => __( 'field description (optional)', 'cmb2' ),
    'id'   => $prefix . 'url',
    'type' => 'text_url',
    // 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
    // 'repeatable' => true,
) );

$cmb_demo->add_field( array(
    'name' => __( 'Test Text Email', 'cmb2' ),
    'desc' => __( 'field description (optional)', 'cmb2' ),
    'id'   => $prefix . 'email',
    'type' => 'text_email',
    // 'repeatable' => true,
) );

$cmb_demo->add_field( array(
    'name' => __( 'Test Time', 'cmb2' ),
    'desc' => __( 'field description (optional)', 'cmb2' ),
    'id'   => $prefix . 'time',
    'type' => 'text_time',
) );

$cmb_demo->add_field( array(
    'name' => __( 'Time zone', 'cmb2' ),
    'desc' => __( 'Time zone', 'cmb2' ),
    'id'   => $prefix . 'timezone',
    'type' => 'select_timezone',
) );

$cmb_demo->add_field( array(
    'name' => __( 'Test Date Picker', 'cmb2' ),
    'desc' => __( 'field description (optional)', 'cmb2' ),
    'id'   => $prefix . 'textdate',
    'type' => 'text_date',
) );

$cmb_demo->add_field( array(
    'name' => __( 'Test Date Picker (UNIX timestamp)', 'cmb2' ),
    'desc' => __( 'field description (optional)', 'cmb2' ),
    'id'   => $prefix . 'textdate_timestamp',
    'type' => 'text_date_timestamp',
    // 'timezone_meta_key' => $prefix . 'timezone', // Optionally make this field honor the timezone selected in the select_timezone specified above
) );

$cmb_demo->add_field( array(
    'name' => __( 'Test Date/Time Picker Combo (UNIX timestamp)', 'cmb2' ),
    'desc' => __( 'field description (optional)', 'cmb2' ),
    'id'   => $prefix . 'datetime_timestamp',
    'type' => 'text_datetime_timestamp',
) );

// This text_datetime_timestamp_timezone field type
// is only compatible with PHP versions 5.3 or above.
// Feel free to uncomment and use if your server meets the requirement
// $cmb_demo->add_field( array(
// 	'name' => __( 'Test Date/Time Picker/Time zone Combo (serialized DateTime object)', 'cmb2' ),
// 	'desc' => __( 'field description (optional)', 'cmb2' ),
// 	'id'   => $prefix . 'datetime_timestamp_timezone',
// 	'type' => 'text_datetime_timestamp_timezone',
// ) );

$cmb_demo->add_field( array(
    'name' => __( 'Test Money', 'cmb2' ),
    'desc' => __( 'field description (optional)', 'cmb2' ),
    'id'   => $prefix . 'textmoney',
    'type' => 'text_money',
    // 'before_field' => '£', // override '$' symbol if needed
    // 'repeatable' => true,
) );

$cmb_demo->add_field( array(
    'name'    => __( 'Test Color Picker', 'cmb2' ),
    'desc'    => __( 'field description (optional)', 'cmb2' ),
    'id'      => $prefix . 'colorpicker',
    'type'    => 'colorpicker',
    'default' => '#ffffff',
) );

$cmb_demo->add_field( array(
    'name' => __( 'Test Text Area', 'cmb2' ),
    'desc' => __( 'field description (optional)', 'cmb2' ),
    'id'   => $prefix . 'textarea',
    'type' => 'textarea',
) );

$cmb_demo->add_field( array(
    'name' => __( 'Test Text Area Small', 'cmb2' ),
    'desc' => __( 'field description (optional)', 'cmb2' ),
    'id'   => $prefix . 'textareasmall',
    'type' => 'textarea_small',
) );

$cmb_demo->add_field( array(
    'name' => __( 'Test Text Area for Code', 'cmb2' ),
    'desc' => __( 'field description (optional)', 'cmb2' ),
    'id'   => $prefix . 'textarea_code',
    'type' => 'textarea_code',
) );

$cmb_demo->add_field( array(
    'name' => __( 'Test Title Weeeee', 'cmb2' ),
    'desc' => __( 'This is a title description', 'cmb2' ),
    'id'   => $prefix . 'title',
    'type' => 'title',
) );

$cmb_demo->add_field( array(
    'name'             => __( 'Test Select', 'cmb2' ),
    'desc'             => __( 'field description (optional)', 'cmb2' ),
    'id'               => $prefix . 'select',
    'type'             => 'select',
    'show_option_none' => true,
    'options'          => array(
        'standard' => __( 'Option One', 'cmb2' ),
        'custom'   => __( 'Option Two', 'cmb2' ),
        'none'     => __( 'Option Three', 'cmb2' ),
    ),
) );

$cmb_demo->add_field( array(
    'name'             => __( 'Test Radio inline', 'cmb2' ),
    'desc'             => __( 'field description (optional)', 'cmb2' ),
    'id'               => $prefix . 'radio_inline',
    'type'             => 'radio_inline',
    'show_option_none' => 'No Selection',
    'options'          => array(
        'standard' => __( 'Option One', 'cmb2' ),
        'custom'   => __( 'Option Two', 'cmb2' ),
        'none'     => __( 'Option Three', 'cmb2' ),
    ),
) );

$cmb_demo->add_field( array(
    'name'    => __( 'Test Radio', 'cmb2' ),
    'desc'    => __( 'field description (optional)', 'cmb2' ),
    'id'      => $prefix . 'radio',
    'type'    => 'radio',
    'options' => array(
        'option1' => __( 'Option One', 'cmb2' ),
        'option2' => __( 'Option Two', 'cmb2' ),
        'option3' => __( 'Option Three', 'cmb2' ),
    ),
) );

$cmb_demo->add_field( array(
    'name'     => __( 'Test Taxonomy Radio', 'cmb2' ),
    'desc'     => __( 'field description (optional)', 'cmb2' ),
    'id'       => $prefix . 'text_taxonomy_radio',
    'type'     => 'taxonomy_radio',
    'taxonomy' => 'category', // Taxonomy Slug
    // 'inline'  => true, // Toggles display to inline
) );

$cmb_demo->add_field( array(
    'name'     => __( 'Test Taxonomy Select', 'cmb2' ),
    'desc'     => __( 'field description (optional)', 'cmb2' ),
    'id'       => $prefix . 'taxonomy_select',
    'type'     => 'taxonomy_select',
    'taxonomy' => 'category', // Taxonomy Slug
) );

$cmb_demo->add_field( array(
    'name'     => __( 'Test Taxonomy Multi Checkbox', 'cmb2' ),
    'desc'     => __( 'field description (optional)', 'cmb2' ),
    'id'       => $prefix . 'multitaxonomy',
    'type'     => 'taxonomy_multicheck',
    'taxonomy' => 'post_tag', // Taxonomy Slug
    // 'inline'  => true, // Toggles display to inline
) );

$cmb_demo->add_field( array(
    'name' => __( 'Test Checkbox', 'cmb2' ),
    'desc' => __( 'field description (optional)', 'cmb2' ),
    'id'   => $prefix . 'checkbox',
    'type' => 'checkbox',
) );

$cmb_demo->add_field( array(
    'name'    => __( 'Test Multi Checkbox', 'cmb2' ),
    'desc'    => __( 'field description (optional)', 'cmb2' ),
    'id'      => $prefix . 'multicheckbox',
    'type'    => 'multicheck',
    // 'multiple' => true, // Store values in individual rows
    'options' => array(
        'check1' => __( 'Check One', 'cmb2' ),
        'check2' => __( 'Check Two', 'cmb2' ),
        'check3' => __( 'Check Three', 'cmb2' ),
    ),
    // 'inline'  => true, // Toggles display to inline
) );

$cmb_demo->add_field( array(
    'name'    => __( 'Test wysiwyg', 'cmb2' ),
    'desc'    => __( 'field description (optional)', 'cmb2' ),
    'id'      => $prefix . 'wysiwyg',
    'type'    => 'wysiwyg',
    'options' => array( 'textarea_rows' => 5, ),
) );

$cmb_demo->add_field( array(
    'name' => __( 'Test Image', 'cmb2' ),
    'desc' => __( 'Upload an image or enter a URL.', 'cmb2' ),
    'id'   => $prefix . 'image',
    'type' => 'file',
) );

$cmb_demo->add_field( array(
    'name'         => __( 'Multiple Files', 'cmb2' ),
    'desc'         => __( 'Upload or add multiple images/attachments.', 'cmb2' ),
    'id'           => $prefix . 'file_list',
    'type'         => 'file_list',
    'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
) );

$cmb_demo->add_field( array(
    'name' => __( 'oEmbed', 'cmb2' ),
    'desc' => __( 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.', 'cmb2' ),
    'id'   => $prefix . 'embed',
    'type' => 'oembed',
) );

$cmb_demo->add_field( array(
    'name'         => 'Testing Field Parameters',
    'id'           => $prefix . 'parameters',
    'type'         => 'text',
    'before_row'   => 'yourprefix_before_row_if_2', // callback
    'before'       => '<p>Testing <b>"before"</b> parameter</p>',
    'before_field' => '<p>Testing <b>"before_field"</b> parameter</p>',
    'after_field'  => '<p>Testing <b>"after_field"</b> parameter</p>',
    'after'        => '<p>Testing <b>"after"</b> parameter</p>',
    'after_row'    => '<p>Testing <b>"after_row"</b> parameter</p>',
) );






// Product tab
$cmb = new_cmb2_box( array(
    'id'      => $this->prefix.'product',
    'title'   => 'Product',
    'hookup'  => false,
    'show_on' => array(
        // These are important, don't remove
        'key'   => 'options-page',
        'value' => array( $this->key, )
    ),
) );

// Set our CMB2 fields

$cmb->add_field( array(
    'name' => __( 'Test Text', 'myprefix' ),
    'desc' => __( 'field description (optional)', 'myprefix' ),
    'id'   => 'av_test_text',
    'type' => 'text',
    'default' => 'Default Text',
) );
