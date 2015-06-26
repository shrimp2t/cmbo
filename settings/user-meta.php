<?php

// Start with an underscore to hide fields from custom fields list
$prefix = '_yourprefix_user_';

/**
 * Metabox for the user profile screen
 */
$cmb_user = new_cmb2_box( array(
    'id'               => $prefix . 'edit',
    'title'            => __( 'User Profile Metabox', 'cmb2' ),
    'object_types'     => array( 'user' ), // Tells CMB2 to use user_meta vs post_meta
    'show_names'       => true,
    'new_user_section' => 'add-new-user', // where form will show on new user page. 'add-existing-user' is only other valid option.
) );

$cmb_user->add_field( array(
    'name'     => __( 'Extra Info', 'cmb2' ),
    'desc'     => __( 'field description (optional)', 'cmb2' ),
    'id'       => $prefix . 'extra_info',
    'type'     => 'title',
    'on_front' => false,
) );

$cmb_user->add_field( array(
    'name'    => __( 'Avatar', 'cmb2' ),
    'desc'    => __( 'field description (optional)', 'cmb2' ),
    'id'      => $prefix . 'avatar',
    'type'    => 'file',
) );

$cmb_user->add_field( array(
    'name' => __( 'Facebook URL', 'cmb2' ),
    'desc' => __( 'field description (optional)', 'cmb2' ),
    'id'   => $prefix . 'facebookurl',
    'type' => 'text_url',
) );

$cmb_user->add_field( array(
    'name' => __( 'Twitter URL', 'cmb2' ),
    'desc' => __( 'field description (optional)', 'cmb2' ),
    'id'   => $prefix . 'twitterurl',
    'type' => 'text_url',
) );

$cmb_user->add_field( array(
    'name' => __( 'Google+ URL', 'cmb2' ),
    'desc' => __( 'field description (optional)', 'cmb2' ),
    'id'   => $prefix . 'googleplusurl',
    'type' => 'text_url',
) );

$cmb_user->add_field( array(
    'name' => __( 'Linkedin URL', 'cmb2' ),
    'desc' => __( 'field description (optional)', 'cmb2' ),
    'id'   => $prefix . 'linkedinurl',
    'type' => 'text_url',
) );

$cmb_user->add_field( array(
    'name' => __( 'User Field', 'cmb2' ),
    'desc' => __( 'field description (optional)', 'cmb2' ),
    'id'   => $prefix . 'user_text_field',
    'type' => 'text',
) );
