<?php
/*
Plugin Name: Elementor Page Visit Counter
Description: Simple page visit counter widget for Elementor.
Version: 1.0
Author: Sony
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Include the main Elementor class.
add_action('elementor/widgets/widgets_registered', 'register_page_visit_counter_widget');
function register_page_visit_counter_widget($widgets_manager)
{
    require_once(__DIR__ . '/class-page-visit-counter-widget.php');
    $widgets_manager->register_widget_type(new Page_Visit_Counter_Widget());
}
