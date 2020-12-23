<?php
/**
 * Theme Options
 *
 * @package Tofino
 * @since 1.0.0
 */

namespace Tofino\ThemeOptions\Footer;

/**
 * Footer settings
 *
 * @since 1.2.0
 * @param object $wp_customize Instance of WP_Customize_Manager class.
 * @return void
 */
function footer_settings($wp_customize) {
  $wp_customize->add_section('tofino_footer_settings', [
    'title'    => __('Footer', 'tofino-nt'),
    'priority' => 145
  ]);

  $wp_customize->add_setting('footer_sticky', [
    'default'           => 'disabled',
    'sanitize_callback' => '\Tofino\Helpers\sanitize_choices',
  ]);

  $wp_customize->add_control('footer_sticky', [
    'label'       => __('Sticky Footer', 'tofino-nt'),
    'description' => '',
    'section'     => 'tofino_footer_settings',
    'type'        => 'select',
    'choices'     => [
      'enabled'  => __('Enabled', 'tofino-nt'),
      'disabled' => __('Disabled', 'tofino-nt')
    ]
  ]);

  $wp_customize->add_setting('footer_text', [
    'default'           => __('<a href ="https://github.com/lambdacreatives/tofino">Tofino</a> theme by <a href ="https://github.com/mrchimp">MrChimp</a> and <a href ="https://github.com/danimalweb">Danimalweb</a>.', 'tofino-nt'),
    'sanitize_callback' => 'sanitize_text_field',
  ]);

  $wp_customize->add_control('footer_text', [
    'label'   => __('Footer Text', 'tofino-nt'),
    'section' => 'tofino_footer_settings',
    'type'    => 'textarea'
  ]);
}
add_action('customize_register', __NAMESPACE__ . '\\footer_settings');

/**
 * Add theme options to body class
 *
 * Adds the footer-sticky classes to the body.
 *
 * @since 1.0.0
 * @param array $classes Array of classes passed to the body tag by WP.
 * @return void
 */
function add_footer_sticky_class($classes) {
  if (get_theme_mod('footer_sticky') === 'enabled') {
    $classes[] = 'footer-sticky';
  }
  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\add_footer_sticky_class');
