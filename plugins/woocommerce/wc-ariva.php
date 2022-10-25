<?php
/**
 * Plugin Name: WooCommerce Ariva PGW
 * Plugin URI:  https://ariva.finance
 * Description: Ariva Payment Gateway WooCommerce Plug-in.
 * Version:     1.0.0
 * Author:      ARIVA.FINANCE
 * License:     GPLv2
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('WC_Ariva')) {

    class WC_Ariva
    {

        protected static $instance;

        private function __construct()
        {
        }

        public static function instance()
        {
            if (false === isset (self::$instance)) {
                self::$instance = new self();
                self::$instance->define_constants();
                self::$instance->init();
            }

            return self::$instance;
        }

        private function define_constants()
        {
            if (!defined('WC_ARIVA_INCLUDES')) {
                define('WC_ARIVA_INCLUDES', dirname(__FILE__) . '/inc/');
            }
        }

        private function init()
        {
            add_filter('plugins_loaded', [$this, 'plugins_loaded']);
            add_action('wp_enqueue_scripts', [$this, 'add_assets']);
        }

        public function plugins_loaded()
        {
            add_filter('woocommerce_payment_gateways', [$this, 'add_ariva_gateway']);

            

            self::$instance->includes();
            self::$instance->define_ajax();

            /**
            *  Add Custom Icon 
            */ 

            function custom_gateway_icon( $icon, $id ) {
                if ( $id === 'ariva' ) {
                    return '<img width="175" src="' . plugins_url( 'assets/img/logo.svg', __FILE__ ) . '" > '; 
                } else {
                    return $icon;
                }
            }
            add_filter( 'woocommerce_gateway_icon', 'custom_gateway_icon', 10, 2 );
        }

        private function define_ajax()
        {
            add_action('wp_ajax_validate_ariva_form', ['WC_Ariva_Gateway_Form', 'validate_fields']);
            add_action('wp_ajax_nopriv_validate_ariva_form', ['WC_Ariva_Gateway_Form', 'validate_fields']);
        }

        public function add_assets()
        {
            if (is_checkout()) {
                wp_enqueue_style(
                    'woocommerce-ariva-css',
                    plugins_url('/assets/css/checkout.css', __FILE__)
                );

                wp_enqueue_script(
                    'woocommerce-ariva-js',
                    plugins_url('/assets/js/checkout.js', __FILE__)
                );
            }
        }

        protected function includes()
        {
            if (class_exists('WC_Payment_Gateway')) {
                include_once(WC_ARIVA_INCLUDES . 'class-wc-ariva-request.php');
                include_once(WC_ARIVA_INCLUDES . 'class-wc-ariva-gateway.php');
                include_once(WC_ARIVA_INCLUDES . 'class-wc-ariva-gateway-fields.php');
                include_once(WC_ARIVA_INCLUDES . 'class-wc-ariva-gateway-form.php');
            }
        }

        public function add_ariva_gateway($methods)
        {
            $methods[] = 'WC_Ariva_Gateway';

            return $methods;
        }

        public static function activation()
        {
            if (false === is_plugin_active('woocommerce/woocommerce.php')) {
                wp_die(
                    __('WooCommerce required.', 'wc-ariva'),
                    __('Activation Error  - WC Ariva'),
                    [
                        'back_link' => true
                    ]
                );

                return;
            }
        }

    }

    WC_Ariva::instance();

    register_activation_hook(__FILE__, ['WC_Ariva', 'activation']);
    
}