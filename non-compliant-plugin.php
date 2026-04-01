<?php
/**
* Plugin Name: Non-Compliant Plugin
* Author: Kofi Mokome
* Description: Cette est créer pour mon presentation à New Jersey WordPress Meetup
* Version: 0.0.1
*/

$some_title = __( 'Some translated title', 'non-compliant-plugin' );

load_plugin_textdomain( $text_domain, false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

$some_title = __( 'Some translated title', $text_domain );

require plugin_dir_path( __FILE__ ) . 'another-file.php';

$plugin_path = plugin_dir_path( __FILE__ );

require $plugin_path . '/lib/wordpress_tools/WPTools.php';

$wp_tools = new WPTools(__FILE__);

$menu_title = "Non Compliant Plugin";

$menu_page = new KMMenuPage(
    array(
        'page_title' => $menu_title,
        'menu_title' => $menu_title,
        'capability' => 'manage_options',
        'menu_slug'  => 'non-compliant-plugin',
        'icon_url' => 'dashicons-wordpress',
        'position' => 10,
        'function' => 'settings_view'
    )
);

$submenu_page = new KMSubMenuPage(
    array(
        'parent_slug' => $menu_page->get_menu_slug(),
        'page_title'  => $menu_title,
        'menu_title'  => $menu_title,
        'capability'  => 'manage_options',
        'menu_slug'   => $menu_page->get_menu_slug(),
        'function'    => 'settings_view'
    )
);
$menu_page->add_sub_menu_page( $submenu_page );
$menu_page->run();

$settings = new KMSetting( 'non-complaint-plugin' );
$settings->add_section( 'general' );
$settings->add_field(
    array(
        'type' => 'text',
        'id' => 'km_name_field',
        'label' => 'Name',
        'placeholder' => 'Enter your name',
    )
);

$settings->add_field(
    array(
        'type' => 'textarea',
        'id' => 'km_bio_field',
        'label' => 'Bio',
        'placeholder' => 'Enter your bio',
    )
);

$settings->save();

function settings_view(){
    global $settings;
    $settings->show_form();
}