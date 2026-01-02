<?php
/**
* Plugin Name: Non-Compliant Plugin
* Author: Kofi Mokome
* Description: Cette est créer pour mon presentation à New Jersey WordPress Meetup
* Version: 0.0.1
*/

$text_domain = 'non-compliant-plugin';

register_text_domain( $text_domain, false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

$some_title = __( 'Some translated title', $text_domain );

require plugin_dir_path( __FILE__ ) . 'another-file.php';